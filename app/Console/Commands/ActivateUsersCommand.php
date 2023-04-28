<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ActivateUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:activate-users-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        echo "users activated.";
        exit;
        $users = \App\User::whereDate('created_at', now()->format('Y-m-d'))->get();

        foreach ($users as $user) {
            $user->is_active = true;
            $user->save();
        }
    
        $this->info(count($users) . ' users activated.');
    }
}
