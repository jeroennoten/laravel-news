<?php


namespace JeroenNoten\LaravelNews;


use Illuminate\Contracts\View\Factory;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use JeroenNoten\LaravelFormat\ServiceProvider as FormatServiceProvider;
use JeroenNoten\LaravelNews\Http\ViewComposers\Latest;
use JeroenNoten\LaravelPackageHelper\ServiceProviderTraits\BladeDirective;
use JeroenNoten\LaravelPackageHelper\ServiceProviderTraits\Migrations;
use JeroenNoten\LaravelPackageHelper\ServiceProviderTraits\Views;

class ServiceProvider extends BaseServiceProvider
{
    use Views, Migrations, BladeDirective;

    public function boot(Routing $routing, Dispatcher $events, Factory $view)
    {
        $this->loadViews();
        $this->publishMigrations();

        $routing->addRoutes();

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add([
                'text' => 'Nieuws',
                'url' => 'admin/news'
            ]);
        });

        $view->composer('news::partials.preview_latest', Latest::class);
    }

    public function register()
    {
        $this->app->register(FormatServiceProvider::class);
    }

    protected function path(): string
    {
        return __DIR__ . '/..';
    }

    protected function name(): string
    {
        return 'news';
    }
}