<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfVerified
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
        if(!$request->user()->email_verified){
            //如果是AJAX请求，则通过 JSON 返回
            if($request->expectsJson()){
                return response()->json(['msg'=>'请先验证邮件',400]);
            }
            return redirect(route('email_verify_notice'));
        }
        return $next($request);
    }
}
