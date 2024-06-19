<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoRequest;
use App\Models\Servico;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;


class ServicoController extends Controller
{
    
    // Listar as servicos
    public function index(Request $request)
    {

        // Recuperar os registros do banco dados
        $servicos = Servico::when($request->has('nome'), function ($whenQuery) use ($request) {
            $whenQuery->where('nome', 'like', '%' . $request->nome . '%');
        })
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();
        // Carregar a VIEW
        return view('servicos.index', [
            'servicos' => $servicos,
            'nome' => $request->nome,
        ]);
    }
   // Detalhes do servico
   public function show(Servico $servico)
   {

       // Carregar a VIEW
       return view('servicos.show', ['servico' => $servico]);
   }

   // Carregar o formulário cadastrar novo servico
   public function create()
   {
       // Carregar a VIEW
       return view('servicos.create');
   }

   // Cadastrar no banco de dados nova servico
   public function store(ServicoRequest $request)
   {

       // Validar o formulário
       $request->validated();

           // Cadastrar no banco de dados na tabela servicos os valores de todos os campos
           $servico = Servico::create([
               'nome' => $request->nome,
               'valor' => str_replace(',', '.', str_replace('.', '', $request->valor)),
           ]);

           // Redirecionar o usuário, enviar a mensagem de sucesso
           return redirect()->route('servicos.show', ['servico' => $servico->id])->with('success', 'servico cadastrada com sucesso');
   }

   // Carregar o formulário editar a servico
   public function edit(Servico $servico)
   {

       // Carregar a VIEW
       return view('servicos.edit', [
           'servico' => $servico,
       ]);
   }

   // Editar no banco de dados a servicos
   public function update(ServicoRequest $request, Servico $servico)
   {
       // Validar o formulário
       $request->validated();

           // Editar as informações do registro no banco de dados
           $servico->update([
               'nome' => $request->nome,
               'valor' => str_replace(',', '.', str_replace('.', '', $request->valor)),
           ]);

           // Redirecionar o usuário, enviar a mensagem de sucesso
           return redirect()->route('servicos.show', ['servico' => $servico->id])->with('success', 'servico editado com sucesso');

   }

   // Excluir a Serviso do banco de dados
   public function destroy(Servico $servico)
   {

       // Excluir o registro do banco de dados
       $servico->delete();

       // Redirecionar o usuário, enviar a mensagem de sucesso
       return redirect()->route('servicos.index')->with('success', 'Servico apagado com sucesso');
   }

   // Gerar PDF
   public function gerarPdf(Request $request)
   {

       // Recuperar e pesquisar os registros do banco dados
       $servicos = Servico::when($request->has('nome'), function ($whenQuery) use ($request) {
           $whenQuery->where('nome', 'like', '%' . $request->nome . '%');
       })
           ->orderByDesc('created_at')
           ->get();

       // Calcular a soma total dos valores
       $totalValor = $servicos->sum('valor');

       // Carregar a string com o HTML/conteúdo e determinar a orientação e o tamanho do arquivo
       $pdf = FacadePdf::loadView('servicos.gerar-pdf', [
        'servicos' => $servicos,
        'totalValor' => $totalValor
    ])->setPaper('a4', 'portrait');


       // Fazer o download do arquivo
       return $pdf->download('listar_servicos.pdf');
   }

   
}
