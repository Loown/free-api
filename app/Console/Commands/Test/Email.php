<?php

namespace App\Console\Commands\Test;

use App\Mail\TestMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Email extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Testing email sends';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Mail::to('luis.campos-nunes@cafffeine.com')->send(new TestMail());
    }
}
