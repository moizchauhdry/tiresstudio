<?php

namespace App\Console\Commands;

use App\Http\Controllers\FetchController;
use App\Http\Controllers\ImportController;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ImportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:wheels';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import wheels by url';

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
        \Log::info('Cron Job Fetch Wheels at  '.Carbon::now());
        $controller = new ImportController();
        $controller->importFromCRON();
    }
}
