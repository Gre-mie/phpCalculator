<?php

namespace App\Console\Commands;

// use Illuminate\Console\Attributes\Description;
// use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

// #[Signature('app:check-version')]
// #[Description('Command description')]
class CheckVersion extends Command
{
    protected $signature = 'check:version';
    protected $description = 'Checks the project environment meets version requirements';

    public function handle()
    {
        $this->line("working");
    }
}
