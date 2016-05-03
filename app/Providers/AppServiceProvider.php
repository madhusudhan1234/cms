<?php

namespace cms\Providers;

use cms\View\Composers;
use cms\View\ThemeViewFinder;
use Illuminate\Support\ServiceProvider;
use Monolog\Handler\LogEntriesHandler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['view']->composer(['layouts.auth','layouts.backend'],Composers\AddStatusMessage::class);
        $this->app['view']->composer('layouts.backend',Composers\AddAdminUser::class);
        $this->app['view']->setFinder($this->app['theme.finder']);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('theme.finder',function($app){
            $finder = new ThemeViewFinder($app['files'],$app['config']['view.paths']);
            $config = $app['config']['cms.theme'];
            $finder->setBasePath($app['path.public'] .'/'.$config['folder']);
            $finder->setActiveTheme($config['active']);
            return $finder;
        });
/*
        $logEntriesHandler = newLogEntriesHandler(env('LOGENTRIES_TOKEN'));

        $log = $this->app['log']->getMonolog();
        $log->pushHandler($logEntriesHandler);*/
    }
}
