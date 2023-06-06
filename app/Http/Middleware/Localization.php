<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
class Localization
{
    public function handle($request, Closure $next)
    {   
        //dd(session('locale')); 
        if (session()->has('locale')) {
            $locale = session('locale');
            
            App::setLocale($locale);
        }
        //dd(app()->getLocale()); 
        return $next($request);
    }
}