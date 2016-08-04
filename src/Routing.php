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
        ], function () {

            $this->router->group([
                'as' => 'news.',
                'prefix' => 'nieuws'
            ], function () {
                $this->userRoutes();
            });

            $this->router->group([
                'as' => 'admin.news.',
                'prefix' => 'admin/news'
            ], function () {
                $this->adminRoutes();
            });

        });
    }

    private function userRoutes()
    {
        $this->router->get('nieuws', 'NewsController@index')->name('index');
        $this->router->get('nieuws/{article}', 'NewsController@show')->name('show');
    }

    private function adminRoutes()
    {
        $this->router->get('/', 'NewsAdminController@index')->name('index');
        $this->router->get('/create', 'NewsAdminController@create')->name('create');
        $this->router->post('/', 'NewsAdminController@store')->name('store');
        $this->router->get('/{article}', 'NewsAdminController@edit')->name('edit');
        $this->router->put('/{article}', 'NewsAdminController@update')->name('update');
        $this->router->delete('/{article}', 'NewsAdminController@destroy')->name('destroy');
    }
}