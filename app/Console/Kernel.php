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
        // Log::info('A Hit by CRONJOB at '.Carbon::now());
        
        // if (!$this->osProcessIsRunning('queue:work')) {
        //     Log::info('queue:work');
        //     $schedule->command('php artisan queue:work --timeout=3600  --daemon > storage/logs/laravel-queue.log')->everyMinute();
        // }
        // $schedule->command('import:wheels')->dailyAt('02:35')->withoutOverlapping()->onSuccess(function (){ \Log::info('import:wheels Successes');})->onFailure(function (){ \Log::info('import:wheels Faileddaily');});
        // $schedule->command('fetch:wheels')->weekly()->withoutOverlapping()->onSuccess(function (){ \Log::info('fetch:wheels Successes');})->onFailure(function (){ \Log::info('fetch:wheels Faileddaily');});
        // $schedule->command('fetch:tires')->weekly()->withoutOverlapping()->onSuccess(function (){ \Log::info('fetch:tires Successes');})->onFailure(function (){ \Log::info('fetch:tires Faileddaily');});
        // $schedule->command('fetch:vehicles')->weekly()->withoutOverlapping()->onSuccess(function (){ \Log::info('fetch:vehicles Successes');})->onFailure(function (){ \Log::info('fetch:vehicles Faileddaily');});
        // $schedule->command('fetch:accessories')->weekly()->withoutOverlapping()->onSuccess(function (){ \Log::info('fetch:accessories Successes');})->onFailure(function (){ \Log::info('fetch:accessories Faileddaily');});

        $schedule->command('fetch:wheels')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }

    protected function osProcessIsRunning($needle)
    {
        // get process status. the "-ww"-option is important to get the full output!
        exec('ps aux -ww', $process_status);

        // search $needle in process status
        $result = array_filter($process_status, function ($var) use ($needle) {
            return strpos($var, $needle);
        });

        // if the result is not empty, the needle exists in running processes
        if (!empty($result)) {
            return true;
        }
        return false;
    }
}
