<?php
namespace App\Http\Middleware;
use App\Models\User;
use Auth;
use Closure;
class LoginMiddleware
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
        
        if (Auth::check() && Auth::user()->status == 1) {
            $user = Auth::user();

            if ($user->status == 1) {

                return $next($request);

            } else {

                return redirect()->route('view-login');

            }
        } else {
            
            return redirect()->route('view-login');
        }
    }
}
