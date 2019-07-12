<?php

namespace App\Providers;

use App\Observers\PostObserver;
use App\Post;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Post::observe(PostObserver::class);

        View::share('maelstrom_sidebar', [
            [
                'id' => 'Dashboard',
                'url' => '/admin',
                'label' => 'Dashboard',
                'icon' => 'radar-chart',
            ],
            [
                'id' => 'Posts',
                'url' => '/admin/posts',
                'label' => 'Posts',
                'icon' => 'read',
            ],
            [
                'id' => 'galleries',
                'url' => '/admin/galleries',
                'label' => 'Galleries',
                'icon' => 'appstore',
            ],
            [
                'id' => 'Authors',
                'url' => '/admin/authors',
                'label' => 'Authors',
                'icon' => 'usergroup-add',
            ],
            [
                'id' => 'settings',
                'type' => 'SubMenu',
                'label' => 'Settings',
                'icon' => 'setting',
                'children' => [
                    [
                        'id' => 'Tags',
                        'url' => '/admin/tags',
                        'label' => 'Tags',
                        'icon' => 'tag',
                    ],
                    [
                        'id' => 'Categories',
                        'url' => '/admin/categories',
                        'label' => 'Categories',
                        'icon' => 'appstore',
                    ],
                ],
            ],
        ]);
    }
}
