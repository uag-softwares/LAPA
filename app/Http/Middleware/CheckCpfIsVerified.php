<?php

namespace App\Http\Middleware;

use Closure;

class CheckCpfIsVerified
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

    /*
    * Verifica se o cpf foi verificado
    */
   
    $cpf_verified = auth()->user()->cpf_verified_at;
 
    
 
    // Verifica se o cpf foi verificado
    if ( $cpf_verified == null )
        
        return redirect('/');
 
 
    // Permite que continue (Caso não entre em nenhum dos if acima)...
    return $next($request);
    }
}
