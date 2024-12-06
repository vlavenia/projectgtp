<?php

namespace App\Console;

use App\Models\Asset;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            // Menghapus data yang sudah lebih dari 1 minggu di soft delete
            Asset::onlyTrashed()
                ->where('deleted_at', '<=', now()->subWeek())
                ->forceDelete();
        })->daily(); // Jalankan setiap hari
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
