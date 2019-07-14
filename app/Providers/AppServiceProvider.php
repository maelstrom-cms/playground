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
                'url' => '/admin',
                'label' => 'Dashboard',
                'icon' => 'radar-chart',
            ],
            [
                'url' => '/admin/sandbox',
                'label' => 'Sandbox',
                'icon' => 'experiment',
            ],
            [
                'url' => '/admin/posts',
                'label' => 'Posts',
                'icon' => 'read',
            ],
            [
                'url' => '/admin/galleries',
                'label' => 'Galleries',
                'icon' => 'appstore',
            ],
            [
                'url' => '/admin/authors',
                'label' => 'Authors',
                'icon' => 'usergroup-add',
            ],
            [
                'type' => 'SubMenu',
                'label' => 'Settings',
                'icon' => 'setting',
                'children' => [
                    [
                        'url' => '/admin/tags',
                        'label' => 'Tags',
                        'icon' => 'tag',
                    ],
                    [
                        'url' => '/admin/categories',
                        'label' => 'Categories',
                        'icon' => 'appstore',
                    ],
                ],
            ],
        ]);
    }
}
