<?php

namespace App\Console\Commands;

use App\Http\Controllers\FetchController;
use Illuminate\Console\Command;

class FetchData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch all data from api';

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
        $controller = new FetchController();
        $controller->fetchProducts();
        $controller->fetchTireProducts();
        $controller->getVehicles();
    }
}
