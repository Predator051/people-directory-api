<?php

namespace App\Console\Commands;

use Binafy\LaravelStub\Facades\LaravelStub;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Pluralizer;

class MakeDtoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:dto {name}';

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
        $dtoDirectoryPath = base_path('/App/Dto');

        $this->info($dtoDirectoryPath);

        $this->makeDirectory($dtoDirectoryPath);

        LaravelStub::from(__DIR__ . '/../../../stubs/dto.stub')
            ->to($dtoDirectoryPath)
            ->name($this->getSingularClassName($this->argument('name')))
            ->ext('php')
            ->replaces([
                'NAMESPACE' => 'App\\Dto',
                'CLASS_NAME' => $this->getSingularClassName($this->argument('name')),
            ])
            ->generate();
    }

    /**
     * Return the Singular Capitalize Name
     * @param string $name
     * @return string
     */
    public function getSingularClassName(string $name): string
    {
        return ucwords(Pluralizer::singular($name));
    }

    /**
     * Build the directory for the class if necessary.
     *
     * @param string $path
     * @return string
     */
    protected function makeDirectory(string $path): string
    {
        if (!File::exists($path)) {
            File::makeDirectory($path);
        }

        return $path;
    }
}
