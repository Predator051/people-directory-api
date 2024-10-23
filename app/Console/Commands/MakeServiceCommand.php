<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Pluralizer;

class MakeServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name} {--contract=}';

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
        $path = $this->getSourceFilePath();

        $this->makeDirectory(dirname($path));
        $this->generateFile(
            $path,
            $this->getSourceFile($this->getSourceStubPath(), $this->getStubVariables())
        );

        if ($this->isNeedService()) {
            $contractPath = $this->getContractFilePath();
            $this->makeDirectory(dirname($contractPath));
            $this->generateFile(
                $contractPath,
                $this->getSourceFile($this->getContractStubPath(), [
                    'NAMESPACE' => 'App\\Contracts',
                    'CLASS_NAME' => $this->getSingularClassName($this->option('contract')) . 'Contract',
                ])
            );
        }
    }

    public function isNeedService(): bool
    {
        return (bool)$this->option('contract');
    }

    public function generateFile(string $path, $contents): void
    {
        if (!File::exists($path)) {
            File::put($path, $contents);
            $this->info("File : {$path} created");
        } else {
            $this->info("File : {$path} already exits");
        }
    }

    /**
     * Return the stub file path
     * @return string
     *
     */
    public function getSourceStubPath(): string
    {
        $path = __DIR__ . '/../../../stubs/';
        if ($this->isNeedService()) {
            return $path . 'service.contract.stub';
        }

        return $path . 'service.stub';
    }

    /**
     * Return the stub file path
     * @return string
     *
     */
    public function getContractStubPath(): string
    {
        $path = __DIR__ . '/../../../stubs/';

        return $path . 'interface.stub';
    }

    /**
     **
     * Map the stub variables present in stub to its value
     *
     * @return array
     *
     */
    public function getStubVariables(): array
    {
        $stubsVars = [
            'NAMESPACE' => 'App\\Services',
            'CLASS_NAME' => $this->getSingularClassName($this->argument('name')),
        ];

        $contractOpt = $this->option('contract');

        if ($contractOpt) {
            $stubsVars = [
                ...$stubsVars,
                'CONTRACT_NAME' => $contractOpt . 'Contract',
                'CONTRACT_INCLUDE' => 'App\\Contracts\\' . $this->getSingularClassName($contractOpt) . 'Contract'
            ];
        }

        return $stubsVars;
    }

    /**
     * Get the stub path and the stub variables
     *
     * @return bool|mixed|string
     *
     */
    public function getSourceFile(string $stubPath, array $stubVars): mixed
    {
        return $this->getStubContents($stubPath, $stubVars);
    }


    /**
     * Replace the stub variables(key) with the desire value
     *
     * @param string $stub
     * @param array $stubVariables
     * @return bool|mixed|string
     */
    public function getStubContents(string $stub, array $stubVariables = []): mixed
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace) {
            $contents = str_replace('$' . $search . '$', $replace, $contents);
        }

        return $contents;
    }

    /**
     * Get the full path of generate class
     *
     * @return string
     */
    public function getSourceFilePath(): string
    {
        return base_path('app/Services/') . $this->getSingularClassName(
                $this->argument('name')
            ) . 'Service.php';
    }

    /**
     * Get the full path of generate class
     *
     * @return string
     */
    public function getContractFilePath(): string
    {
        return base_path('app/Contracts/') . $this->getSingularClassName(
                $this->option('contract')
            ) . 'Contract.php';
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
