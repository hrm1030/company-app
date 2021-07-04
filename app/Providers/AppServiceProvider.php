<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Menu;

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
        $admin_menus = array();
        $pmenus = Menu::where('pid', 9)->orderBy('order_num', 'asc')->get();
        foreach( $pmenus as $pmenu ) {
            $new_pmenu = Menu::get_children($pmenu);
            array_push($admin_menus, $new_pmenu);
        }
        view()->share('admin_menus', $admin_menus);


        $user_menus = array();
        $pmenus = Menu::where('pid', 10)->orderBy('order_num', 'asc')->get();
        foreach( $pmenus as $pmenu ) {
            $new_pmenu = Menu::get_children($pmenu);
            array_push($user_menus, $new_pmenu);
        }
        view()->share('user_menus', $user_menus);
    }
}
