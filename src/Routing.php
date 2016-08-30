<?php


namespace JeroenNoten\LaravelNews;


use Illuminate\Routing\Router;

class Routing
{
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function addRoutes()
    {
        $this->router->group([
            'namespace' => __NAMESPACE__ . '\\Http\\Controllers',
            'middleware' => 'web',
        ], function (Router $router) {

            $router->group([
                'as' => 'news.',
                'prefix' => 'nieuws'
            ], function (Router $router) {
                $this->userRoutes($router);
            });

            $router->group([
                'as' => 'admin.news.',
                'prefix' => 'admin/news',
                'middleware' => 'auth'
            ], function (Router $router) {
                $this->adminRoutes($router);
            });

        });
    }

    private function userRoutes(Router $router)
    {
        $router->get('/', 'NewsController@index')->name('index');
        $router->get('/{article}', 'NewsController@show')->name('show');
    }

    private function adminRoutes(Router $router)
    {
        $router->get('/', 'NewsAdminController@index')->name('index');
        $router->get('/create', 'NewsAdminController@create')->name('create');
        $router->post('/', 'NewsAdminController@store')->name('store');
        $router->get('/{article}', 'NewsAdminController@edit')->name('edit');
        $router->put('/{article}', 'NewsAdminController@update')->name('update');
        $router->delete('/{article}', 'NewsAdminController@destroy')->name('destroy');
    }
}