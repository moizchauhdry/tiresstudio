<?php

namespace App\Console\Commands;

use App\Http\Controllers\ImportController;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ImportInventories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:wheel-inventories';

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
        \Log::info('Cron Job Import Wheels at  '.Carbon::now());
        $controller = new ImportController();
        $controller->importFromCRON('wheel',2);
        return 0;
    }
}
