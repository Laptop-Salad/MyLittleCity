<?php

namespace App\Console\Commands\Migrations;

use App\Models\User;
use Illuminate\Console\Command;

class SetPersonalWorkspaceForUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migration:set-personal-workspace-for-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set personal_workspace flag on users only tenant to true.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();

        $bar = $this->output->createProgressBar(count($users));
        $bar->start();

        foreach ($users as $user) {
            // at the time of writing users would only be able be part of one tenant
            $user->tenants()->update([
                'personal_workspace' => true
            ]);

            $bar->advance();
        }

        $bar->finish();
    }
}
