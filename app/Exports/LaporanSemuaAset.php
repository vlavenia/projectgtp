<?php
namespace App\Exports;

use App\Models\Asset;
use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;

class LaporanSemuaAset implements FromView
{
    protected $filter;

    public function __construct($filter)
    {
        $this->filter = $filter;
    }
    
    public function view(): View
    {
        $jenis_laporan = $this->filter['jenis_laporan'];
        $start_date = $this->filter['start_date'];
        $end_date = $this->filter['end_date'];

        $assets = Asset::leftJoin('jenis', 'jenis.id', '=', 'assets.jenis_id')
                ->leftJoin('objeks', 'objeks.id', '=', 'assets.objek_id')
                ->leftJoin('units', 'units.id', '=', 'assets.unit_id')
                ->leftJoin('klasifikasis', 'klasifikasis.id', '=', 'assets.klasifikasi_id')
                ->leftJoin('asals', 'asals.id', '=', 'assets.asal_id')
                // ->leftJoin('statuses', 'statuses.id', '=', 'assets.status_id')
                
                ->select(   'assets.*', 
                            'jenis.jenis_asset as jenis_nama', 
                            'objeks.nama_objek as objek_nama',
                            'units.nama_unit as unit_nama',
                            'klasifikasis.nama_klasifikasi as klasifikasi_nama',
                            'asals.asal_asset as asal_nama'
                        );

                if($jenis_laporan > 0){
                    $assets = $assets->where('assets.status_id', $jenis_laporan);
                }

                if($start_date && $end_date){
                    $assets = $assets->whereBetween('assets.created_at', [
                                                            $this->filter['start_date']." 00:00:00",
                                                            $this->filter['end_date']." 23:59:59"
                                                        ]);     
                }

                $assets = $assets->get();

        $klasifikasi = '';
        switch ($jenis_laporan) {
            case '0':
                $klasifikasi = 'Semua Laporan';
                break;
            case '1':
                $klasifikasi = 'Aset Terkini';
                break;
            case '2':
                $klasifikasi = 'Aset Mutasi Masuk';
                break;
            case '3':
                $klasifikasi = 'Aset Mutasi Keluar';
                break;
            case '4':
                $klasifikasi = 'Aset Perolehan';
                break;
            case '5':
                $klasifikasi = 'Aset Penghapusan';
                break;
            case '6':
                $klasifikasi = 'Aset Rusak';
                break;
            default:
                $klasifikasi = '-';
                break;
        }
        
        $now = Carbon::now()->format('d-m-Y H:i:s');
        $information = [
            'klasifikasi' => $klasifikasi,
            'start_date_asset' => $start_date,
            'end_date_asset' => $end_date,
            'date_diexport' => $now
        ];

        return view('exports.semuaAset', [
            'assets' => $assets,
            'information' => $information
        ]);
    }
}
