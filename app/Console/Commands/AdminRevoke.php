<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class AdminRevoke extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:revoke {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Revokes the admin role of the specified user.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::where("name", $this->argument("user"))->first();
        $role = Role::findByName("admin");
        $user->removeRole($role);
        return Command::SUCCESS;
    }
}
