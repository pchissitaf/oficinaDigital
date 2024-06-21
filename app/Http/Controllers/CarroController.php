<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarroRequest;
use App\Models\Carro;
use App\Models\EstadoCarro;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CarroController extends Controller
{
    
    // Listar as carros
    public function index(Request $request)
    {

        // Recuperar os registros do banco dados
        $user = User::find(1);
        $funcionario=$user->funcionario_id;
        $carros = Carro::when($request->has('modelo'), function ($whenQuery) use ($request) {
            $whenQuery->where('modelo', 'like', '%' . $request->modelo . '%');
        })
            ->when($request->has('estado_carro_id'), function ($whenQuery) use ($request) {
                $whenQuery->where('estado_carro_id', 'like', '%' . $request->estado_carro_id . '%');
            })
            ->when($request->filled('data_inicio'), function ($whenQuery) use ($request) {
                $whenQuery->where('ano', '>=', \Carbon\Carbon::parse($request->data_inicio)->format('Y-m-d'));
            })
            ->when($request->filled('data_fim'), function ($whenQuery) use ($request) {
                $whenQuery->where('ano', '<=', \Carbon\Carbon::parse($request->data_fim)->format('Y-m-d'));
            })
            ->with('estadoCarro','user')
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();
        // Carregar a VIEW
        return view('carros.index', [
            'carros' => $carros,
            'modelo' => $request->modelo,
            'data_inicio' => $request->data_inicio,
            'data_fim' => $request->data_fim,
            'user' => $user,
            'estado_carro_id' => $request->estado_carro_id,
            'funcionario' => $funcionario,
        ]);
    }
    /**
     * Show the form for creating the resource.
     */
    // Detalhes do Carro
    public function show(Carro $carro)
    {

        // Carregar a VIEW
        return view('carros.show', ['carro' => $carro]);
    }

    // Carregar o formulário cadastrar novo carro
    public function create()
    {
        // Recuperar do banco de dados os estados
        $estadoCarros = EstadoCarro::orderBy('nome', 'asc')->get();
        $users = User::orderBy('name', 'asc')->get();
        $user = User::find(1);    
        Gate::authorize('alterar_servico', $user);
        // Carregar a VIEW
        return view('carros.create', [
            'estadoCarros' => $estadoCarros, 'users' => $users,
        ]);
    }

    // Cadastrar no banco de dados novo carro
    public function store(CarroRequest $request)
    {

        // Validar o formulário
        $request->validated();

            // Cadastrar no banco de dados na tabela carros os valores de todos os campos
            $carro = Carro::create([
                'modelo' => $request->modelo, 
                'cor' => $request->cor, 
                'marca' => $request->marca, 
                'tipo' => $request->tipo,
                'estado_carro_id' => $request->estado_carro_id, 
                'avaria' => $request->avaria,
                'user_id' => $request->user_id,
                'funcionario_id' => $request->funcionario_id,
                'codigo_validacao' =>Str::random(5),
                'ano' => $request->ano,
            ]);
            
            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('carro.show', ['carro' => $carro->id])->with('success', 'carro cadastrado com sucesso');
    }

    // Carregar o formulário editar a carro
    public function edit(Carro $carro)
    {
        // Recuperar do banco de dados as situações
        $estadoCarros = EstadoCarro::orderBy('nome', 'asc')->get();
        $users = user::orderBy('name', 'asc')->get();
        $user = User::find(1);    
        if(Gate::allows('alterar_carro', $user)){
       // Carregar a VIEW
       return view('carros.edit', [
        'carro' => $carro,
        'estadoCarros' => $estadoCarros, 'users' =>$users,
        ]);}
       if(Gate::denies('alterar_carro', $user)){
        return back()->with('success', 'Não Tem Autorização Para Esta Acção');
       }
        
    }

    // Editar no banco de dados a carro
    public function update(CarroRequest $request, Carro $carro)
    {
        // Validar o formulário
        $request->validated();
            // Editar as informações do registro no banco de dados
            $carro->update([
                'modelo' => $request->modelo,
                'cor' => $request->cor,
                'marca' => $request->marca,
                'tipo' => $request->tipo,
                'estado_carro_id' => $request->estado_carro_id,
                'avaria' => $request->avaria,
                'user_id' => $request->user_id,
                'funcionario_id' => $request->funcionario_id,
                'ano' => $request->ano,
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('carro.show', ['carro' => $carro->id])->with('success', 'carro editado com sucesso');
    }

    // Excluir a carro do banco de dados
    public function destroy(Carro $carro)
    {
        $user = User::find(1);    
        if(Gate::allows('alterar_carro', $user)){
       // Excluir o registro do banco de dados
       $carro->delete();

       // Redirecionar o usuário, enviar a mensagem de sucesso
       return redirect()->route('carro.index')->with('success', 'carro apagado com sucesso');;}
       if(Gate::denies('alterar_carro', $user)){
        return back()->with('success', 'Não Tem Autorização Para Esta Acção');
       } 
    }

    // Gerar PDF
    public function gerarPdf(Request $request)
    {

        // Recuperar os registros do banco dados
        //$carros = carro::orderByDesc('created_at')->get();

        // Recuperar e pesquisar os registros do banco dados
        $carros = Carro::when($request->has('modelo'), function ($whenQuery) use ($request) {
            $whenQuery->where('modelo', 'like', '%' . $request->modelo . '%');
        })
        ->when($request->has('estado_carro_id'), function ($whenQuery) use ($request) {
            $whenQuery->where('estado_carro_id', 'like', '%' . $request->estado_carro_id . '%');
        })
            ->when($request->filled('data_inicio'), function ($whenQuery) use ($request) {
                $whenQuery->where('ano', '>=', \Carbon\Carbon::parse($request->data_inicio)->format('Y-m-d'));
            })
            ->when($request->filled('data_fim'), function ($whenQuery) use ($request) {
                $whenQuery->where('ano', '<=', \Carbon\Carbon::parse($request->data_fim)->format('Y-m-d'));
            })
            ->orderByDesc('created_at')
            ->get();

        // Calcular a soma total dos valores
        $totalValor = $carros->sum('valor');

        // Carregar a string com o HTML/conteúdo e determinar a orientação e o tamanho do arquivo
        $pdf = PDF::loadView('carros.gerar-pdf', [
            'carros' => $carros,
            'totalValor' => $totalValor
        ])->setPaper('a4', 'portrait');

        // Fazer o download do arquivo
        return $pdf->download('listar_carros.pdf');
    }

    // Alterar Estado do carro
    public function changeEstado(Carro $carro)
    {
            // Editar as informações do registro no banco de dados
            $carro->update([
                'estado_carro_id' => $carro->estado_carro_id == 1 ? 2 : 1,
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return back()->with('success', 'Estado do carro editado com sucesso!');
    }

    
}
