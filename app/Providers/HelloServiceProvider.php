<?php

namespace App\Providers;

use Illuminate\Support\Facades\view;
use Illuminate\Support\ServiceProvider;
use Validator;
use App\Http\Validators\HelloValidator;

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    // public function boot()
    // {
    //     //クラス変数・クラスメソッドを呼び出す時には、クラス名に続けてコロン２つ（::）その後変数やメソッドを記述します。
    //     view::composer(
    //       'hello.index','App\Http\Composers\HelloComposer'
    //     );
    // }
    public function boot()
    {
      $validator = $this->app['validator'];
      $validator->resolver(function($translator,$data,$rules,$messages){
        return new HelloValidator($translator,$data,$rules,$messages);
      });
    }
}
