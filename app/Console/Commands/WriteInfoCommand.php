<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InfoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'write:info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Write Info';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        info('test message');
        return Command::SUCCESS;
    }
}
