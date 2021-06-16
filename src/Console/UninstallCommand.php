<?php

namespace Zx\Admin\Console;

use Zx\Admin\Admin;
use Illuminate\Console\Command;

class UninstallCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'admin:uninstall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Uninstall the admin package';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (! $this->confirm('Are you sure to uninstall zx-center?')) {
            return;
        }

        $this->removeFilesAndDirectories();

        $this->line('<info>Uninstalling zx-center!</info>');
    }

    /**
     * Remove files and directories.
     *
     * @return void
     */
    protected function removeFilesAndDirectories()
    {
        $this->laravel['files']->deleteDirectory(config('admin.directory'));
        $this->laravel['files']->deleteDirectory(public_path(Admin::asset()->getRealPath('@extension')));
        $this->laravel['files']->deleteDirectory(public_path(Admin::asset()->getRealPath('@admin')));
        $this->laravel['files']->delete(config_path('admin.php'));
    }
}
