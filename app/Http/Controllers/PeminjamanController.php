<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\select;

class PeminjamanController extends Controller
{
    public function index()
    {
        $currentUser = Auth::user()->id;
        $assets = Asset::where('status_id', '1')->get();

        $asset_peminjaman = Peminjaman::leftJoin('assets', 'assets.id', '=', 'peminjaman.aset_id')
            ->leftJoin('users', 'users.id', '=', 'peminjaman.user_id')
            ->select(
                'assets.*',
                'users.*',
                'peminjaman.id as peminjaman_id',
                'peminjaman.tanggal_peminjaman as tanggal_peminjaman',
                'peminjaman.status as status',
                'peminjaman.user_id as user_id',
                'peminjaman.deskripsi as deskripsi',
                'peminjaman.bukti_pengembalian as bukti_pengembalian',
            )
            ->where(function ($query) {
                $query->where('peminjaman.status', 'approve')
                    ->orWhere('peminjaman.status', 'request')
                    ->orWhere('peminjaman.status', 'request_return')
                    ->orWhere('peminjaman.status', 'reject_return')
                    ;
            })
            ->paginate(10);

        $asset_pengembalian =  Peminjaman::leftJoin('assets', 'assets.id', '=', 'peminjaman.aset_id')
            ->leftJoin('users', 'users.id', '=', 'peminjaman.user_id')
            ->select(
                'assets.*',
                'users.*',
                'peminjaman.id as peminjaman_id',
                'peminjaman.tanggal_peminjaman as tanggal_peminjaman',
                'peminjaman.status as status',
                'peminjaman.deskripsi as deskripsi',
                'peminjaman.updated_at as tgl_pengembalian',
            )
            ->whereIn('peminjaman.status', ['approve_return','reject'])
            ->paginate(10);

        return view('peminjaman.index', compact('assets', 'asset_peminjaman', 'asset_pengembalian'));
    }

    public function approvePeminjaman($id)
    {
        $asset = Peminjaman::find($id);
        $asset->update([
            'status' => 'approve',
        ]);

        return redirect()->route('peminjaman')->with('success', 'Pengajuan berhasil di setujui');
    }

    public function rejectPeminjaman($id)
    {
        $peminjaman = Peminjaman::find($id);
        $peminjaman->update([
            'status' => 'reject',
        ]);

        if($id != '0'){   
            $asset_peminjaman = $peminjaman->aset_id;
            $asset = Asset::findOrFail($asset_peminjaman);
            $asset->update([
                'status_id' => '1',
            ]);
        }

        return redirect()->route('peminjaman')->with('success', 'Pengajuan berhasil di ditolak');
    }

    public function approveReturnPeminjaman($id)
    {
        $peminjaman = Peminjaman::find($id);
        $peminjaman->update([
            'status' => 'approve_return',
        ]);

        if($peminjaman->aset_id != '0'){
            $asset_peminjaman = $peminjaman->aset_id;
            $asset = Asset::findOrFail($asset_peminjaman);
            $asset->update([
                'status_id' => '1',
            ]);
        }

        return redirect()->route('peminjaman')->with('success', 'Pengajuan berhasil di setujui');
    }

    public function rejectReturnPeminjaman($id)
    {
        $peminjaman = Peminjaman::find($id);
        $peminjaman->update([
            'status' => 'reject_return',
        ]);

        return redirect()->route('peminjaman')->with('success', 'Penolakan Pengembalian di berhasil dikirimkan');
    }



    /* START STAF BALAI */

    public function peminjaman_staf()
    {
        $currentUser = Auth::user()->id;
        $assets = Asset::where('status_id', '1')->get();

        $asset_peminjaman = Peminjaman::leftJoin('assets', 'assets.id', '=', 'peminjaman.aset_id')
            ->leftJoin('users', 'users.id', '=', 'peminjaman.user_id')
            ->select(
                'assets.*',
                'users.name',
                'peminjaman.id as peminjaman_id',
                'peminjaman.tanggal_peminjaman as tanggal_peminjaman',
                'peminjaman.deskripsi as deskripsi',
                'peminjaman.status as status',
            )
            ->where('user_id', $currentUser)
            ->where(function ($query) {
                $query->where('peminjaman.status', 'approve')
                    ->orWhere('peminjaman.status', 'request')
                    ->orWhere('peminjaman.status', 'request_return')
                    ->orWhere('peminjaman.status', 'reject_return')
                    ;
            })
            ->paginate(10);

        $asset_pengembalian =  Peminjaman::leftJoin('assets', 'assets.id', '=', 'peminjaman.aset_id')
            ->leftJoin('users', 'users.id', '=', 'peminjaman.user_id')
            ->select(
                'assets.*',
                'users.name',
                'peminjaman.id as peminjaman_id',
                'peminjaman.tanggal_peminjaman as tanggal_peminjaman',
                'peminjaman.status as status',
                'peminjaman.deskripsi as deskripsi',
                'peminjaman.updated_at as tgl_pengembalian',
            )
            ->where('user_id', $currentUser)
            ->whereIn('peminjaman.status', ['approve_return','reject'])
            ->paginate(10);

        return view('peminjaman.peminjaman_staf', compact('assets', 'asset_peminjaman', 'asset_pengembalian'));
    }

    public function addPeminjaman(Request $request)
    {
        $now = Carbon::now()->format('Y-m-d');
        $asset_id = $request->input('asset_id');
        $currentUser = Auth::user()->id;

        // Insert data Peminjaman
        $peminjaman = new Peminjaman;
        $peminjaman->aset_id = $asset_id;
        $peminjaman->tanggal_peminjaman = $now;
        $peminjaman->status = 'request';
        $peminjaman->user_id = $currentUser;
        $peminjaman->deskripsi = $request->deskripsi;
        $peminjaman->save();

        // Update Data Aset
        if($asset_id != '0'){
            $asset = Asset::findOrFail($asset_id);
            $asset->update([
                'status_id' => '7', // Status Peminjaman
            ]);
        }

        return redirect()->route('peminjaman_staf')->with('success', ' peminjaman Asset berhasil diajukan ');
    }

    public function requestReturnPeminjaman(Request $request, string $id)
    {
        $imageName = '';
        if ($request->has('bukti_pengembalian')) {
            $imageName = time() . '.' . $request->file('bukti_pengembalian')->extension();
            $request->file('bukti_pengembalian')->move(public_path('images_approval'), $imageName);
            // $request['img_url'] = 'images/' . $imageName;
            $img_url = 'images_approval/' . $imageName;
        }

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'status' => 'request_return',
            'bukti_pengembalian' => $img_url,
        ]);

        return redirect()->route('peminjaman_staf')->with('success', 'Aset berhasil direquest dikembalikan');
    }

    public function destroyPeminjaman(string $id)
    {

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        if($id != '0'){
            $asset_peminjaman = $peminjaman->aset_id;
            $asset = Asset::findOrFail($asset_peminjaman);
            $asset->update([
                'status_id' => '1',
            ]);
        }

        return redirect()->route('peminjaman_staf')->with('success', 'Pengajuan berhasil dibatalkan');
    }

    public function search_pengelola(Request $request)
    {
        $query = $request->input('search');
        $assets = Asset::where('status_id', 1)->get();
        $asset_peminjaman  = Asset::where('nama_barang', 'LIKE', "%{$query}%")
            ->whereIn('status_id', ['5'])
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $asset_peminjaman->appends(['search' => $query]);

        return view('peminjaman.index', compact('assets', 'asset_peminjaman'));
    }

    public function search_staf(Request $request)
    {
        $query = $request->input('search');
        $assets = Asset::where('status_id', 1)->get();
        $asset_peminjaman  = Asset::where('nama_barang', 'LIKE', "%{$query}%")
            ->whereIn('status_id', ['5'])
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $asset_peminjaman->appends(['search' => $query]);

        return view('peminjaman.peminjaman_staf', compact('assets', 'asset_peminjaman'));
    }
}
