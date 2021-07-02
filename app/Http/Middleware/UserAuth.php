<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

use App\User;

class UserAuth
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
        // utente loggato
        $user = Auth::user();

        // array contente i task dell'utente colegato
        $task = $user -> tasks;

        // ottengo uri della show con id del task, es: "show_tasks/83"
        $url = $request -> path();

        // ottengo id del task digitati su uri, aggiungendo [1] alla fine di $idTask
        $idTask = explode('/', $url);
        $idInt = (int)$idTask[1];

        $stato = false;

        // ciclo dentro l'array per verificare la presenza dell'id task digitato
        for ($i=0; $i < count($task) ; $i++) {

            if ($task[$i]['id'] === $idInt) {
                $stato = true;
            }
        };
        
        if ($stato) {
            // dd($task[0]['id'], $url, $idInt);
            
            return $next($request);
        } else {

            return redirect('home');
        };

    }
}
