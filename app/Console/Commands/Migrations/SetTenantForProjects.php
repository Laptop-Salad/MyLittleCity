<?php

namespace App\Console\Commands\Migrations;

use App\Models\User;
use Illuminate\Console\Command;

class SetTenantForProjects extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migration:set-tenant-for-projects';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set the tenant for projects to the users first and only tenant';

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
            $tenant = $user->tenants()->first();

            $user->projects()->update([
                'tenant_id' => $tenant->id
            ]);

            $bar->advance();
        }

        $bar->finish();
    }
}
