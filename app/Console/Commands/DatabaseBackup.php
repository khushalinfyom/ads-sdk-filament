<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup {version?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'backup database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $this->info("\nDATABASE BACKUP STARTED;");

            $backupDisk = config('app.backup_disc');
            $version = $this->argument('version');
            if ($version) {
                Config::set('backup.backup.destination.filename_prefix', $version . '-');
            }

            if ($backupDisk != 'backup') {
                $this->error('Can not take backup on public disks. Configure backup disk.');

                return Command::FAILURE;
            }

            Artisan::call('backup:run --only-db --only-to-disk=backup');

            $this->info("\nDATABASE BACKUP COMPLETED;");
            Log::info('Database backup completed');
        } catch (Exception $e) {
            $this->info("\nGETTING ERRORS WHILE TAKING BACKUP OF DATABASE;");
            $this->info($e->getMessage());
            Log::info($e->getMessage());
            Log::info($e);
        }

        return Command::SUCCESS;
    }
}
