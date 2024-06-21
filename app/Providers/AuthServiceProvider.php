<?php

namespace App\Providers;

use App\Models\Cliente;
use App\Models\Nivel;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
      //Gates para alterar
          Gate::define('alterar_servico', function(User $user){
            return ($user->nivel_id == 1 || $user->nivel_id == 2 || $user->nivel_id == 5);
          });
          Gate::define('alterar_carro', function(User $user){
            return ($user->nivel_id == 1 || $user->nivel_id == 2);
          });
          Gate::define('alterar_estado', function(User $user){
            return ($user->nivel_id == 1 | $user->nivel_id == 2 || $user->nivel_id == 3);
          });
          Gate::define('alterar_cliente', function(User $user){
            return ($user->nivel_id == 1 || $user->nivel_id == 2 || $user->nivel_id == 4);
          });
          Gate::define('alterar_user', function(User $user){
            return ($user->nivel_id == 1);
          });

      //Gates para Visualizar
        Gate::define('ver_servico', function(User $user){
          return ($user->nivel_id == 1 || $user->nivel_id == 2 || $user->nivel_id == 5);
        });
        Gate::define('ver_carro', function(User $user){
          return ($user->nivel_id == 1 || $user->nivel_id == 2);
        });
        Gate::define('ver_estado', function(User $user){
          return ($user->nivel_id == 1 | $user->nivel_id == 2 || $user->nivel_id == 3);
        });
        Gate::define('ver_cliente', function(User $user){
          return ($user->nivel_id == 1 || $user->nivel_id == 2 || $user->nivel_id == 4);
        });
        Gate::define('ver_user', function(User $user){
          return ($user->nivel_id == 1 || $user->nivel_id == 2);
        });


          Gate::define('acesso', function(User $user){
            return $user->nivel_id = ! 1;
          });
       
    }
}
