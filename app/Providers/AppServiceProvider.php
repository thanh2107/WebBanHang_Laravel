<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\LoaiSP;
use App\Models\DongGia;

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
        view() ->composer('header',function($view){
            $loai_sp = LoaiSP::all();
            $dong_gia = DongGia::all();
            $view->with('loai_sp', $loai_sp)->with('dong_gia', $dong_gia);
        });
    }
}
