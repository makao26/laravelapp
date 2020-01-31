<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      // $data = [
      //   ['name'=>'taro','mail'=>'taro@yamada'],
      //   ['name'=>'hanako','mail'=>'hanako@flower'],
      //   ['name'=>'sachiko','mail'=>'sachico@happy'],
      // ];
      // $request -> merge(['data'=>$data]);
      // return $next($request);
      $response = $next($request);
      $content = $response->content();

      //後置オプションiは大文字小文字区別しない
      $pattern = '/<middleware>(.*)<\/middleware>/i';
      $replace = '<a href="http://$1">$1</a>';
      $content = preg_replace($pattern,$replace,$content);
      $response->setContent($content);
      return $response;
    }
}
