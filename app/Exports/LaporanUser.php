<?php
namespace App\Exports;

use App\Models\Asset;
use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;

class LaporanUser implements FromView
{
    protected $filter;

    public function __construct($filter)
    {
        $this->filter = $filter;
    }
    
    public function view(): View
    {
        $jenis_role = $this->filter['jenis_role'];

        $users = User::leftJoin('role', 'role.id', '=', 'users.role_id')
                
                ->select(   'users.*', 
                            'role.role_name as role_name'
                        );

                if($jenis_role > 0){
                    $users = $users->where('users.role_id', $jenis_role);
                }

                $users = $users->get();

        $klasifikasi = '';
        switch ($jenis_role) {
            case '0':
                $klasifikasi = 'Semua Role';
                break;
            case '1':
                $klasifikasi = 'Admin';
                break;
            case '2':
                $klasifikasi = 'Staf Pengelola';
                break;
            case '3':
                $klasifikasi = 'Staf Balai';
                break;
            default:
                $klasifikasi = '-';
                break;
        }
        
        $now = Carbon::now()->format('d-m-Y H:i:s');
        $information = [
            'klasifikasi' => $klasifikasi,
            'date_diexport' => $now
        ];

        return view('exports.users', [
            'users' => $users,
            'information' => $information
        ]);
    }
}
