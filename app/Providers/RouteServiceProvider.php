<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Usuario;
use App\Models\Personal;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     * si te fijas aqui es donde define a donde va despues del login aqui
     * pero se hace la llamada desde AutenticatedSessionController
     */
    public const HOME = 'dashboard';
    public static function HOME(){
        //el objetivo es crear 4 opciones para cada nivel de usuario siendo admin=dashboard
        //con estas consultas tendremos la información para esto y la carga de datos
        $user=User::All();
        $usuario=Usuario::findOrFail(Auth::user()->id);
        $personal=Personal::All();//me parece que este no es necesario aqui, sino en el controlador de perfiles
        
        switch($usuario->nivel){
            case 1:
                $HOME1 = 'admin/perf45a';
            break;
            case 2:
                $HOME1 = 'admin/perf45j';
            break;
            case 3:
                $HOME1 = '/admin/perf45i';
                //$HOME1 = 'admin/perf45a';
            break;
            case 4:
                $HOME1 = 'admin/perf45r';
            break;
            default:
                $HOME1 = '/';
            break;
        }
        
        /*if(Auth::user()->id==1){
            //if($usuario->nivel==1)
            dd($usuario->nivel, 'dentro de home'); //para verificar que realmente está leiendo al usuario
            //dd(Auth::user()->id);
            $HOME1 = '/admin/imprimir';
        }else{
            dd($usuario->nivel, 'dentro de home');
            $HOME1 = 'dashboard';
        }*/
        return $HOME1;
    }
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
