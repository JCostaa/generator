<?php

namespace Laravelha\Generator;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use Laravelha\Generator\Commands\ControllerCommand;
use Laravelha\Generator\Commands\CrudGenerator;
use Laravelha\Generator\Commands\FactoryCommand;
use Laravelha\Generator\Commands\LangCommand;
use Laravelha\Generator\Commands\MigrationCommand;
use Laravelha\Generator\Commands\MigrationPivotCommand;
use Laravelha\Generator\Commands\ModelCommand;
use Laravelha\Generator\Commands\PackageCommand;
use Laravelha\Generator\Commands\RequestsCommand;
use Laravelha\Generator\Commands\ResourcesCommand;
use Laravelha\Generator\Commands\RouteCommand;
use Laravelha\Generator\Commands\TestsCommand;
use Laravelha\Generator\Commands\ViewCommand;

class GeneratorServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Config/ha-generator.php' => config_path('ha-generator.php'),
        ], 'ha-generator');
    }

    /**
     * Register the package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/ha-generator.php',
            'ha-generator'
        );

        if ($this->app->runningInConsole()) {
            $this->commands([
                ControllerCommand::class,
                CrudGenerator::class,
                FactoryCommand::class,
                LangCommand::class,
                MigrationCommand::class,
                MigrationPivotCommand::class,
                ModelCommand::class,
                PackageCommand::class,
                RequestsCommand::class,
                ResourcesCommand::class,
                RouteCommand::class,
                TestsCommand::class,
                ViewCommand::class,
            ]);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            ControllerCommand::class,
            CrudGenerator::class,
            FactoryCommand::class,
            LangCommand::class,
            MigrationCommand::class,
            MigrationPivotCommand::class,
            ModelCommand::class,
            PackageCommand::class,
            RequestsCommand::class,
            ResourcesCommand::class,
            RouteCommand::class,
            TestsCommand::class,
            ViewCommand::class,
        ];
    }
}
