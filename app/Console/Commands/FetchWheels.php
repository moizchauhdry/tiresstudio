<?php

namespace App\Console\Commands;

use App\Http\Controllers\FetchController;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class FetchWheels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:wheels';

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
        $start_message = 'Cron Job Fetch Wheels at  ' . Carbon::now();
        Log::info($start_message);
        dump($start_message);

        $controller = new FetchController();
        $controller->fetchProducts();

        dd('success');
    }
}
