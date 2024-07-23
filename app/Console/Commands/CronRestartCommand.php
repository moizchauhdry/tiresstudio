<?php

namespace App\Console\Commands;

use App\ScriptLog;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CronRestartCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:restart';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info('restart Cron on  '.Carbon::now());
        shell_exec('sh public/shell-scripts/restart-cron.sh');
        ScriptLog::updateOrCreate(['api_type' => 'WHEEL'], [
            'api_type' => 'WHEEL',
            'total_count' => 5,
            'current_page' => 1,
            'total_page' => 5,
        ]);

    }
}

