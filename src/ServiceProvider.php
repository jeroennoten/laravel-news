<?php


namespace JeroenNoten\LaravelNews;


use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\View\Factory;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use JeroenNoten\LaravelFormat\ServiceProvider as FormatServiceProvider;
use JeroenNoten\LaravelMenu\Pages\Page;
use JeroenNoten\LaravelMenu\Pages\Provider;
use JeroenNoten\LaravelMenu\Pages\Registrar;
use JeroenNoten\LaravelNews\Http\ViewComposers\Latest;
use JeroenNoten\LaravelPackageHelper\ServiceProviderTraits;

class ServiceProvider extends BaseServiceProvider
{
    use ServiceProviderTraits;

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

        $this->provideMenuPage();
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

    private function provideMenuPage()
    {
        if (class_exists('JeroenNoten\\LaravelMenu\\Pages\\Registrar')) {
            Registrar::register(new class implements Provider {

                public function getPages()
                {
                    return [new Page('Nieuws', 'nieuws')];
                }

            });
        }
    }

    /**
     * Return the container instance
     *
     * @return Container
     */
    protected function getContainer()
    {
        return $this->app;
    }
}