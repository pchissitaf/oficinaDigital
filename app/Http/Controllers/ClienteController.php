<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ClienteController extends Controller
{
    // Listar as clientes
    public function index(Request $request)
    {
        

        // Recuperar os registros do banco dados
        $user = User::find(1);
        $clientes = Cliente::when($request->has('nome'), function ($whenQuery) use ($request) {
            $whenQuery->where('nome', 'like', '%' . $request->nome . '%');
        })
            ->with('user')
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();
        // Carregar a VIEW
        return view('clientes.index', [
            'clientes' => $clientes,
            'nome' => $request->nome,
            'user' => $user,
        ]);
    }
    /**
     * Show the form for creating the resource.
     */
    public function create()
    {
        // Recuperar do banco de dados os usuarios
        $users = User::orderBy('email', 'asc')->get();
        $user = User::find(1);    
        Gate::authorize('alterar_cliente', $user);

        // Carregar a VIEW
        return view('clientes.create', [
            'users' => $users,
        ]);
    }

    /**
     * Store the newly created resource in storage.
     */
    // Cadastrar no banco de dados novo cliente
    public function store(ClienteRequest $request)
    {

        // Validar o formulário
        $request->validated();

        

            // Cadastrar no banco de dados na tabela clientes os valores de todos os campos
            $cliente = Cliente::create([
                'nome' => $request->nome, 
                'endereco' => $request->endereco, 
                'telefone' => $request->telefone, 
                'user_id' => $request->user_id,
            ]);
            
            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('clientes.show', ['cliente' => $cliente->id])->with('success', 'cliente cadastrado com sucesso');
    }

    /**
     * Display the resource.
     */
    public function show(Cliente $cliente)
    {
        // Carregar a VIEW
        return view('clientes.show', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit(Cliente $cliente)
    {
        // Recuperar do banco de dados as situações
        $users = User::orderBy('email', 'asc')->get();
        $user = User::find(1);    
        if(Gate::allows('alterar_cliente', $user)){
       // Carregar a VIEW
       return view('clientes.edit', [
        'cliente' => $cliente,
        'users' => $users,
            ]);}
       if(Gate::denies('alterar_cliente', $user)){
        return back()->with('success', 'Não Tem Autorização Para Esta Acção');
       }   
    }

    // Validar o formulário
    public function update(ClienteRequest $request, Cliente $cliente)
    {

        
        $request->validated();
        
        // Editar as informações do registro no banco de dados
            $cliente->update([
                'nome' => $request->nome,
                'endereco' => $request->endereco,
                'telefone' => $request->telefone,
                'user_id' => $request->user_id,
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('clientes.show', ['cliente' => $cliente->id])->with('success', 'Cliente editado com sucesso');

    }

    // Excluir o registro do banco de dados
    public function destroy(Cliente $cliente)
    {
        if(Gate::allows('alterar_cliente', $cliente)){
            $cliente->delete();
            // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('clientes.index')->with('success', 'cliente apagado com sucesso');
        }
        if(Gate::denies('alterar_cliente', $cliente)){
            // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('clientes.index')->with('success', 'Você não tem autorização para apagar esse registo');
        }   
    }
}
