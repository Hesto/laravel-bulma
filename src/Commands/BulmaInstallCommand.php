<?php

namespace Hesto\LaravelBulma\Commands;

use Hesto\Core\Commands\InstallCommand;
use Symfony\Component\Console\Input\InputOption;
use SplFileInfo;
use Illuminate\Support\Facades\Artisan;


class BulmaInstallCommand extends InstallCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'bulma:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Admin LTE into Laravel 5 project';

    /**
     * Execute the console command.
     *
     * @return bool|null
     */
    public function fire()
    {
        $this->installResourcesFiles();
        $this->copyGulpFile();

        Artisan::call('bulma:dependencies', [
            '--force' => true
        ]);
    }

    /**
     * Copy all assets files to base assets folder path
     *
     */
    public function installResourcesFiles()
    {
        $assetsFiles = $this->files->allFiles(__DIR__ . '/../../resources/resources/');
        $this->installFiles('/resources/', $assetsFiles);
    }

    /**
     * Copy gulpfile.js to project's base path.
     *
     * @return bool
     */
    public function copyGulpFile()
    {
        $gulpfile = new SplFileInfo(__DIR__ . '/../../resources/gulpfile.js');
        $path = base_path() . '/gulpfile.js';

        if($this->putFile($path, $gulpfile)) {
            $this->info('Installed: ' . $path);
        }
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    public function getOptions()
    {
        return [
            ['force', 'f', InputOption::VALUE_NONE, 'Force override existing files'],
        ];
    }
}
