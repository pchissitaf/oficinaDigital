<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Carros</title>
</head>

<body style="font-size: 12px;">
    <h2 style="text-align: center">Relatorio de Carros</h2>

    <table style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr style="background-color: #adb5bd;">
                <th style="border: 1px solid #ccc;">N</th>
                <th style="border: 1px solid #ccc;">Modelo</th>
                <th style="border: 1px solid #ccc;">Cor</th>
                <th style="border: 1px solid #ccc;">Marca</th>
                <th style="border: 1px solid #ccc;">Tipo</th>
                <th style="border: 1px solid #ccc;">Estado</th>
                <th style="border: 1px solid #ccc;">Avaria</th>
                <th style="border: 1px solid #ccc;">Proprietario</th>                
                <th style="border: 1px solid #ccc;">Funcionario</th>
                <th style="border: 1px solid #ccc;">Codigo de Validacao</th>
                <th style="border: 1px solid #ccc;">Ano</th>
                <th style="border: 1px solid #ccc;">Valor</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($carros as $carro)
                <tr>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $carro->id }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $carro->modelo }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $carro->cor }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $carro->marca }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $carro->tipo }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $carro->estadoCarro->nome }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $carro->avaria }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $carro->cliente->nome }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $carro->funcionario->nome }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $carro->codigo_validacao }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ \Carbon\Carbon::parse($carro->ano)->format('d/m/Y') }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ 'Akz ' . number_format($carro->valor, 2, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhum carro encontrado!</td>
                </tr>
            @endforelse

            <tr>
                <td colspan="9" style="border: 1px solid #cccccc; border-top: none;">Total</td>
                {{--<td style="border: 1px solid #ccc; border-top: none;">{{ 'Akz ' . number_format($totalValor, 2, ',', '.') }}</td>--}}
            </tr>
        </tbody>

    </table>
</body>

</html>
