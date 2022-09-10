<?php

namespace App\Console\Commands\Update;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class RolesAndPermissions extends Command
{
    public $permissions = [];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:roles-and-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update of roles and permissions';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $admin = Role::findOrCreate('admin');
        $user = Role::findOrCreate('user');

        return 0;
    }
}
