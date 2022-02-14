<?php

namespace App\Console\Commands;

use App\Http\Controllers\FetchController;
use Illuminate\Console\Command;

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
        $controller = new FetchController();
        $controller->fetchProducts();

        return "success";
    }
}
