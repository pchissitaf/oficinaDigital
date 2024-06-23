<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdenServicoRequest;
use App\Models\Funcionario;
use App\Models\Orcamento;
use App\Models\OrdenServico;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrdenServicoController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Recuperar os registros do banco dados
        $user = User::find(auth()->user()->id);
        $ordenServicos = ordenServico::when($request->has('estado'), function ($whenQuery) use ($request) {
            $whenQuery->where('estado', 'like', '%' . $request->estado . '%');
        })
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();
        
        // Carregar a VIEW
        return view('ordenServicos.index', [
            'ordenServicos' => $ordenServicos,
            'estado' => $request->estado,'user'=> $user,
        ]);
    }
    
    public function create()
    {
        // Recuperar do banco de dados os usuarios
        $orcamentos = Orcamento::orderBy('id', 'asc')->get();
        $user = User::find(auth()->user()->id); 
        $funcionarios = Funcionario::orderBy('nome', 'asc')->get();    
        Gate::authorize('alterar_ordenServico', $user);

        // Carregar a VIEW
        return view('ordenServicos.create', [
            'orcamentos' => $orcamentos, 'funcionarios' => $funcionarios,'user'=>$user,
        ]);
    }

    /**
     * Store the newly created resource in storage.
     */
    // Cadastrar no banco de dados novo ordenServico
    public function store(OrdenServicoRequest $request)
    {

        // Validar o formulário
        $request->validated();
            // Cadastrar no banco de dados na tabela ordenServico os valores de todos os campos
            $ordenServico = OrdenServico::create([                
                'valor_total' => str_replace(',', '.', str_replace('.', '', $request->valor_total)), 
                'estado' => $request->estado,
                'observacao'=>$request->observacao,
                'funcionario_id' => $request->funcionario_id,
                'orcamento_id' => $request->orcamento_id,
            ]);
            
            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('ordenServicos.show', ['ordenServico' => $ordenServico->id])->with('success', 'Orden de Servico cadastrada com sucesso');
    }

    /**
     * Display the resource.
     */
   public function show(OrdenServico $ordenServico)
    {
        $user = User::find(auth()->user()->id); 
        // Carregar a VIEW
        return view('ordenServicos.show', ['ordenServico' => $ordenServico, 'user'=> $user]);
    }

    /**
     * Show the form for editing the resource.
     */
   public function edit(OrdenServico $ordenServico)
    {
        // Recuperar do banco de dados as situações
        $orcamentos = Orcamento::orderBy('id', 'asc')->get();
        $funcionarios = Funcionario::orderBy('nome', 'asc')->get();
        $user = User::find(auth()->user()->id);     
        if(Gate::allows('alterar_ordenServico', $user)){
        // Carregar a VIEW
        return view('ordenServicos.edit', [
            'ordenServico' => $ordenServico,
            'orcamentos' => $orcamentos,'funcionarios' => $funcionarios,'user'=>$user,
                ]);}
        if(Gate::denies('alterar_ordenServico', $user)){
            return back()->with('success', 'Não Tem Autorização Para Esta Acção');
        }
    }

    
    // Validar o formulário
    public function update(OrdenServicoRequest $request, OrdenServico $ordenServico)
    {        
        $request->validated();
        
        // Editar as informações do registro no banco de dados
            $ordenServico->update([
                'valor_total' => str_replace(',', '.', str_replace('.', '', $request->valor_total)),
                'estado' => $request->estado,
                'funcionario_id' => $request->funcionario_id,
                'orcamento_id' => $request->orcamento_id,
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('ordenServicos.show', ['ordenServico' => $ordenServico->id])->with('success', 'ordenServico editado com sucesso');

    }
    
    // Excluir o registro do banco de dados
    public function destroy(OrdenServico $ordenServico)
    {
       if(Gate::allows('alterar_ordenServico', $ordenServico)){
            $ordenServico->delete();
            // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('ordenServicos.index')->with('success', 'ordenServico apagado com sucesso');
        }
        if(Gate::denies('alterar_ordenServico', $ordenServico)){
            // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('ordenServicos.index')->with('success', 'Você não tem autorização para apagar esse registo');
        } 
    }
}
