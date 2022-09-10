<?php

namespace App\Console\Commands\Create;

use App\Console\Commands\Traits\CanValidateInput;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class Admin extends Command
{
    use CanValidateInput;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $firstname = $this->askValid(
            'Prénom ?', 
            'firstname', 
            ['min:3']
        );

        $lastname = $this->askValid(
            'Nom ?', 
            'lastname', 
            ['min:3']
        );

        $email = $this->askValid(
            'Email ?', 
            'email', 
            ['required','email', 'unique:users']
        );

        $password = $this->askValid(
            'Mot de passe ?', 
            'password', 
            ['required','min:8'],
            'secret'
        );

        $user = (new User)->forceFill([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => Hash::make($password),
            'email_verified_at' => now()
        ]);

        $user->save();

        $user->assignRole('admin');

        $this->info('Vous pouvez désormais accéder à l\'éspace administrateur !');

        return 0;
    }
}
