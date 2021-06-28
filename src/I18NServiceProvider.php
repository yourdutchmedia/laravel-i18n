<?php

namespace Ydm\I18N;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Ydm\I18N\Middleware\SetLocale;

class I18NServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $this->app['router']->pushMiddlewareToGroup('web', SetLocale::class);

        $package->name('laravel-i18n')
            ->hasAssets()
            ->hasConfigFile('i18n')
            ->hasMigrations([
                'alter_user_table_add_locale'
            ])
            ->hasRoute('web');
    }
}
