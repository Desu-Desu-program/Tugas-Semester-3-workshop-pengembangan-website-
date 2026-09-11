<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:nama-perintah')]
#[Description('Command description')]
class NamaPerintah extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
