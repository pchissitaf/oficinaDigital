<?php

namespace App\Providers;

use App\Models\Carro;
use App\Models\Cliente;
use App\Models\Funcionario;
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
            return ($user->nivel_id == 1 || $user->nivel_id == 2 || $user->nivel_id == 3);
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
          Gate::define('alterar_funcionario', function(User $user){
            return ($user->nivel_id == 1 || $user->nivel_id == 2);
          });

      //Gates para Visualizar
        Gate::define('ver_cliente', function(User $user){
          return ($user->nivel_id == 1 || $user->nivel_id == 2 
          || $user->nivel_id == 4 || $user->nivel_id == 5);
        });
        Gate::define('ver_user', function(User $user){
          return ($user->nivel_id == 1 || $user->nivel_id == 2);
        });
        
        Gate::define('ver_funcionario', function(User $user){
          return ($user->nivel_id == 1 || $user->nivel_id == 2 
          || $user->nivel_id == 3 || $user->nivel_id == 5);
        });

        //Gates para Filtros ao exibir
        Gate::define('filtro_carro', function(User $user, Carro $carro){
          return ($user->funcionario->id == $carro->funcionario_id ||
          $user->id == $carro->cliente_id || $user->nivel_id == 1 || $user->nivel_id == 2);
        });
        
        Gate::define('filtro_cliente', function(User $user, Cliente $cliente){
          return ($user->id == $cliente->user_id || 
          $user->id == $cliente->cliente_id || 
          $user->nivel_id == 1 || $user->nivel_id == 2 || $user->nivel_id == 3);
        });

       /* Gate::define('filtro_user', function(User $user){
          return ($user->id == $cliente->user_id || 
          $user->id == $cliente->cliente_id || 
          $user->nivel_id == 1 || $user->nivel_id == 2 || $user->nivel_id == 3);
        });  */
    }
}
