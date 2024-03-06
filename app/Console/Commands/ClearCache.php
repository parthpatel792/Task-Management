<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class ClearCache extends Command
{
    protected $signature = 'cache:clear';
    protected $description = 'Clear the application cache';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Cache::flush();
        $this->info('Application cache cleared successfully.');
    }
}
