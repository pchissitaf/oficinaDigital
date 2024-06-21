<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Nivel;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {  
       /*$this->authorize('users.index');
        $users = User::paginate(15);
        $user = User::find(1);
        return view('users.index', compact('users'));*/

        $users = User::when($request->has('name'), function ($whenQuery) use ($request) {
            $whenQuery->where('name', 'like', '%' . $request->name . '%');
        })
            ->orderBy('created_at')
            ->paginate(10)
            ->withQueryString();
        // Carregar a VIEW
        return view('users.index', [
            'users' => $users,
            'name' => $request->name,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::find(1);    
        Gate::authorize('alterar_user', $user); 
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    /*public function store(UserRequest $request)
    {
        // Validar o formulário
       $request->validated();

        try {
            $dados = $request->all();

            User::create( $dados);
            return redirect()->back();
            
        } catch (\Throwable $th) {

            $message    =   env('APP_DEBUG') ? $th->getMessage() : 'Erro ao processar sau requisicao!';
          dd( $message);
        }
      
    }*/

    // Cadastrar no banco de dados nova servico
   public function store(UserRequest $request)
   {

       // Validar o formulário
       $request->validated();

           // Cadastrar no banco de dados na tabela servicos os valores de todos os campos
           $user = User::create([
               'name' => $request->name,
               'email' => $request->email,
               'password' => bcrypt($request->password),
           ]);

           // Redirecionar o usuário, enviar a mensagem de sucesso
           return redirect()->route('users.show', ['user' => $user->id])->with('success', 'usuario cadastrado com sucesso');
   }
    /**
     * Display the specified resource.
     */
    /*public function show(string $id)
    {

        return view('users.show');

        
    }*/

    public function show(User $user)
    {

        return view('users.show', ['user' => $user]);
     
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $nivels = Nivel::orderBy('nome', 'asc')->get();
        return view('users.edit', [
            'user' => $user,
            'nivels' => $nivels,
        ]);
    }


    public function update(UserRequest $request, User $user)
    {

        // Validar o formulário
        $request->validated();
        
        // Editar as informações do registro no banco de dados
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'nivel_id'=>$request->nivel_id,
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('users.show', ['user' => $user->id])->with('success', 'user editado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     */
    /*public function destroy(string $id)
    {
        //
    }*/

    public function destroy(User $user)
    {
        
        if(Gate::allows('acesso', $user)){
            $user->delete();
            // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('users.index')->with('success', 'user apagado com sucesso');
        }
        if(Gate::denies('ver_carro', $user)){
            // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('users.index')->with('success', 'Você não tem autorização para apagar esse registo');
        }
    }
}
