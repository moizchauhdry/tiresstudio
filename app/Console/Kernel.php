<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        Log::info('A Hit by CRONJOB at '.Carbon::now());
        $schedule->command('fetch:wheels')->daily()->withoutOverlapping()->onSuccess(function (){ \Log::info('fetch:wheels Successes');})->onFailure(function (){ \Log::info('fetch:wheels Faileddaily');});
        $schedule->command('fetch:tires')->daily()->withoutOverlapping()->onSuccess(function (){ \Log::info('fetch:tires Successes');})->onFailure(function (){ \Log::info('fetch:tires Faileddaily');});
        $schedule->command('fetch:vehicles')->daily()->withoutOverlapping()->onSuccess(function (){ \Log::info('fetch:vehicles Successes');})->onFailure(function (){ \Log::info('fetch:vehicles Faileddaily');});
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
