<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrcamentoRequest;
use App\Models\Cliente;
use App\Models\Orcamento;
use App\Models\Servico;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrcamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Recuperar os registros do banco dados
        $user = User::find(auth()->user()->id);
        $orcamentos = Orcamento::when($request->has('estado'), function ($whenQuery) use ($request) {
            $whenQuery->where('estado', 'like', '%' . $request->estado . '%');
        })
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();
        
        // Carregar a VIEW
        return view('orcamentos.index', [
            'orcamentos' => $orcamentos,
            'estado' => $request->estado,'user'=> $user,
        ]);
    }
    
    public function create()
    {
        // Recuperar do banco de dados os usuarios
        $clientes = Cliente::orderBy('nome', 'asc')->get();
        $user = User::find(auth()->user()->id); 
        $servicos = Servico::orderBy('nome', 'asc')->get();    
        Gate::authorize('alterar_orcamento', $user);

        // Carregar a VIEW
        return view('orcamentos.create', [
            'clientes' => $clientes, 'servicos' => $servicos,'user'=>$user,
        ]);
    }

    /**
     * Store the newly created resource in storage.
     */
    // Cadastrar no banco de dados novo orcamento
    public function store(OrcamentoRequest $request)
    {

        // Validar o formulário
        $request->validated();
            // Cadastrar no banco de dados na tabela orcamentos os valores de todos os campos
            $orcamento = Orcamento::create([                
                'valor' => str_replace(',', '.', str_replace('.', '', $request->valor)), 
                'estado' => $request->estado,
                'servico_id' => $request->servico_id,
                'cliente_id' => $request->cliente_id,
            ]);
            
            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('orcamentos.show', ['orcamento' => $orcamento->id])->with('success', 'orcamento cadastrado com sucesso');
    }

    /**
     * Display the resource.
     */
   public function show(Orcamento $orcamento)
    {
        $user = User::find(auth()->user()->id); 
        // Carregar a VIEW
        return view('orcamentos.show', ['orcamento' => $orcamento, 'user'=> $user]);
    }

    /**
     * Show the form for editing the resource.
     */
   public function edit(Orcamento $orcamento)
    {
        // Recuperar do banco de dados as situações
        $clientes = cliente::orderBy('nome', 'asc')->get();
        $servicos = servico::orderBy('nome', 'asc')->get();
        $user = User::find(auth()->user()->id);     
        if(Gate::allows('alterar_orcamento', $user)){
        // Carregar a VIEW
        return view('orcamentos.edit', [
            'orcamento' => $orcamento,
            'clientes' => $clientes,'servicos' => $servicos,'user'=>$user,
                ]);}
        if(Gate::denies('alterar_orcamento', $user)){
            return back()->with('success', 'Não Tem Autorização Para Esta Acção');
        }
    }

    
    // Validar o formulário
    public function update(OrcamentoRequest $request, Orcamento $orcamento)
    {

        
        $request->validated();
        
        // Editar as informações do registro no banco de dados
            $orcamento->update([
                'valor' => str_replace(',', '.', str_replace('.', '', $request->valor)),
                'estado' => $request->estado,
                'servico_id' => $request->servico_id,
                'cliente_id' => $request->cliente_id,
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('orcamentos.show', ['orcamento' => $orcamento->id])->with('success', 'orcamento editado com sucesso');

    }
    
    // Excluir o registro do banco de dados
    public function destroy(Orcamento $orcamento)
    {
       if(Gate::allows('alterar_orcamento', $orcamento)){
            $orcamento->delete();
            // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('orcamentos.index')->with('success', 'orcamento apagado com sucesso');
        }
        if(Gate::denies('alterar_orcamento', $orcamento)){
            // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('orcamentos.index')->with('success', 'Você não tem autorização para apagar esse registo');
        } 
    }

}
