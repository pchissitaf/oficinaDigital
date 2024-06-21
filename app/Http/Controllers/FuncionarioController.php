<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncionarioRequest;
use App\Models\Funcionario;
use App\Models\Nivel;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Recuperar os registros do banco dados
        $user = User::find(1);
        $nivels = Nivel::find(1);
        $funcionarios = Funcionario::when($request->has('nome'), function ($whenQuery) use ($request) {
            $whenQuery->where('nome', 'like', '%' . $request->nome . '%');
        })
            ->with('user')
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();
        // Carregar a VIEW
        return view('funcionarios.index', [
            'funcionarios' => $funcionarios,
            'nome' => $request->nome,
            'user' => $user, 'nivels' => $nivels,
        ]);
    }

    public function create()
    {
        // Recuperar do banco de dados os usuarios
        $users = User::orderBy('email', 'asc')->get();
        $user = User::find(1);
        $nivels = Nivel::orderBy('nome', 'asc')->get();    
        Gate::authorize('alterar_funcionario', $user);

        // Carregar a VIEW
        return view('funcionarios.create', [
            'users' => $users, 'nivels' => $nivels,
        ]);
    }

    /**
     * Store the newly created resource in storage.
     */
    // Cadastrar no banco de dados novo funcionario
    public function store(FuncionarioRequest $request)
    {

        // Validar o formulário
        $request->validated();
            // Cadastrar no banco de dados na tabela funcionarios os valores de todos os campos
            $funcionario = Funcionario::create([
                'nome' => $request->nome, 
                'endereco' => $request->endereco, 
                'telefone' => $request->telefone,
                'bilhete' => $request->bilhete,
                'doc_file' => $request->endereco,
                'nivel_id' => $request->nivel_id,
                'salario' => str_replace(',', '.', str_replace('.', '', $request->salario)), 
                'user_id' => $request->user_id,
            ]);
            
            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('funcionarios.show', ['funcionario' => $funcionario->id])->with('success', 'funcionario cadastrado com sucesso');
    }

    /**
     * Display the resource.
     */
    public function show(Funcionario $funcionario)
    {
        $nivels = Nivel::find(1);
        $user = User::find(1);
        // Carregar a VIEW
        return view('funcionarios.show', ['funcionario' => $funcionario, 'nivels'=> $nivels, 'user' =>$user]);
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit(Funcionario $funcionario)
    {
        // Recuperar do banco de dados as situações
        $users = User::orderBy('email', 'asc')->get();
        $nivels = Nivel::orderBy('nome', 'asc')->get();
        $user = User::find(1);    
        if(Gate::allows('alterar_funcionario', $user)){
       // Carregar a VIEW
       return view('funcionarios.edit', [
        'funcionario' => $funcionario,
        'users' => $users,'nivels' => $nivels,
            ]);}
       if(Gate::denies('alterar_funcionario', $user)){
        return back()->with('success', 'Não Tem Autorização Para Esta Acção');
       }   
    }

    // Validar o formulário
    public function update(FuncionarioRequest $request, Funcionario $funcionario)
    {  
        $request->validated();
        
        // Editar as informações do registro no banco de dados
            $funcionario->update([
                'nome' => $request->nome,
                'endereco' => $request->endereco,
                'telefone' => $request->telefone,
                'bilhete' => $request->bilhete,
                'doc_file' => $request->doc_file,
                'nivel_id' => $request->nivel_id,
                'salario' => str_replace(',', '.', str_replace('.', '', $request->salario)),
                'user_id' => $request->user_id,
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('funcionarios.show', ['funcionario' => $funcionario->id])->with('success', 'funcionario editado com sucesso');

    }

    // Excluir o registro do banco de dados
    public function destroy(Funcionario $funcionario)
    {
        if(Gate::allows('alterar_funcionario', $funcionario)){
            $funcionario->delete();
            // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('funcionarios.index')->with('success', 'funcionario apagado com sucesso');
        }
        if(Gate::denies('alterar_funcionario', $funcionario)){
            // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('funcionarios.index')->with('success', 'Você não tem autorização para apagar esse registo');
        }   
    }

    // Gerar PDF
    public function gerarPdf(Request $request)
    {
        // Recuperar e pesquisar os registros do banco dados
        $funcionarios = Funcionario::when($request->has('nome'), function ($whenQuery) use ($request) {
            $whenQuery->where('nome', 'like', '%' . $request->nome . '%');
        })
            ->orderByDesc('created_at')
            ->get();

        // Calcular a soma total dos salarios
        $totalSalario = $funcionarios->sum('salario');

        // Carregar a string com o HTML/conteúdo e determinar a orientação e o tamanho do arquivo
        $pdf = PDF::loadView('funcionarios.gerar-pdf', [
            'funcionarios' => $funcionarios,
            'totalSalario' => $totalSalario
        ])->setPaper('a4', 'portrait');

        

        // Fazer o download do arquivo
        return $pdf->download('listar_funcionarios.pdf');
    }

}
