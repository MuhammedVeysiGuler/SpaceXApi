<?php

namespace App\Console\Commands;

use App\Helper\FetchCapsulesHelper;
use Illuminate\Console\Command;

class FetchCapsules extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:capsule {function}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        FetchCapsulesHelper::fetch($this->argument('function'));
    }
}
