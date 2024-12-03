<?php

namespace App\Providers;
use App\Models\order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {   $user               = auth()->user();
        $user_id_auth       = Auth::id();

        $user_auth = Auth::user();

        if ($user_auth) {
            $userId = $user_auth->id;
        }
         $order_count = 0;
         //order::where('orderprice', '>', '0')->where('frid', $user->id)->Where('order_stutas', 0)->count();
        $shear_order_list = 0;
       
            view()->share('shear_order_list', $shear_order_list);
    }
       


    }

