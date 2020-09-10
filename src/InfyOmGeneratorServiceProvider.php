<?php

namespace Hoangk51\Generator;

use Illuminate\Support\ServiceProvider;
use Hoangk51\Generator\Commands\API\APIControllerGeneratorCommand;
use Hoangk51\Generator\Commands\API\APIGeneratorCommand;
use Hoangk51\Generator\Commands\API\APIRequestsGeneratorCommand;
use Hoangk51\Generator\Commands\API\TestsGeneratorCommand;
use Hoangk51\Generator\Commands\APIScaffoldGeneratorCommand;
use Hoangk51\Generator\Commands\Common\MigrationGeneratorCommand;
use Hoangk51\Generator\Commands\Common\ModelGeneratorCommand;
use Hoangk51\Generator\Commands\Common\RepositoryGeneratorCommand;
use Hoangk51\Generator\Commands\Publish\GeneratorPublishCommand;
use Hoangk51\Generator\Commands\Publish\LayoutPublishCommand;
use Hoangk51\Generator\Commands\Publish\PublishTemplateCommand;
use Hoangk51\Generator\Commands\Publish\PublishUserCommand;
use Hoangk51\Generator\Commands\RollbackGeneratorCommand;
use Hoangk51\Generator\Commands\Scaffold\ControllerGeneratorCommand;
use Hoangk51\Generator\Commands\Scaffold\RequestsGeneratorCommand;
use Hoangk51\Generator\Commands\Scaffold\ScaffoldGeneratorCommand;
use Hoangk51\Generator\Commands\Scaffold\ViewsGeneratorCommand;

class InfyOmGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__.'/../config/laravel_generator.php';

        $this->publishes([
            $configPath => config_path('infyom/laravel_generator.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('infyom.publish', function ($app) {
            return new GeneratorPublishCommand();
        });

        $this->app->singleton('infyom.api', function ($app) {
            return new APIGeneratorCommand();
        });

        $this->app->singleton('infyom.scaffold', function ($app) {
            return new ScaffoldGeneratorCommand();
        });

        $this->app->singleton('infyom.publish.layout', function ($app) {
            return new LayoutPublishCommand();
        });

        $this->app->singleton('infyom.publish.templates', function ($app) {
            return new PublishTemplateCommand();
        });

        $this->app->singleton('infyom.api_scaffold', function ($app) {
            return new APIScaffoldGeneratorCommand();
        });

        $this->app->singleton('infyom.migration', function ($app) {
            return new MigrationGeneratorCommand();
        });

        $this->app->singleton('infyom.model', function ($app) {
            return new ModelGeneratorCommand();
        });

        $this->app->singleton('infyom.repository', function ($app) {
            return new RepositoryGeneratorCommand();
        });

        $this->app->singleton('infyom.api.controller', function ($app) {
            return new APIControllerGeneratorCommand();
        });

        $this->app->singleton('infyom.api.requests', function ($app) {
            return new APIRequestsGeneratorCommand();
        });

        $this->app->singleton('infyom.api.tests', function ($app) {
            return new TestsGeneratorCommand();
        });

        $this->app->singleton('infyom.scaffold.controller', function ($app) {
            return new ControllerGeneratorCommand();
        });

        $this->app->singleton('infyom.scaffold.requests', function ($app) {
            return new RequestsGeneratorCommand();
        });

        $this->app->singleton('infyom.scaffold.views', function ($app) {
            return new ViewsGeneratorCommand();
        });

        $this->app->singleton('infyom.rollback', function ($app) {
            return new RollbackGeneratorCommand();
        });

        $this->app->singleton('infyom.publish.user', function ($app) {
            return new PublishUserCommand();
        });

        $this->commands([
            'infyom.publish',
            'infyom.api',
            'infyom.scaffold',
            'infyom.api_scaffold',
            'infyom.publish.layout',
            'infyom.publish.templates',
            'infyom.migration',
            'infyom.model',
            'infyom.repository',
            'infyom.api.controller',
            'infyom.api.requests',
            'infyom.api.tests',
            'infyom.scaffold.controller',
            'infyom.scaffold.requests',
            'infyom.scaffold.views',
            'infyom.rollback',
            'infyom.publish.user',
        ]);
    }
}
