<?php

namespace App\Http\Middleware;

use App\Model\Karyawan;
use Closure;
use Illuminate\Http\Request;
class apiLoginMid
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
        if ($request->header('token')) {
            $check =  Karyawan::where('api_token', $request->header('token'))->first();             
            if (!$check) {
                return response()->json(['msg'=>'Tidak Ada Otoritas','sts'=>'0']);
            } else {
                  return $next($request);
            }
        } else {
            return response()->json(['msg'=>'Tidak Ada Otoritas','sts'=>'0']);
        }
    }
}
