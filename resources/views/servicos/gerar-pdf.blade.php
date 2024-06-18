<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>servico</title>
</head>

<body style="font-size: 12px;">
    <h2 style="text-align: center">servico</h2>

    <table style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr style="background-color: #adb5bd;">
                <th style="border: 1px solid #ccc;">ID</th>
                <th style="border: 1px solid #ccc;">Nome</th>
                <th style="border: 1px solid #ccc;">Valor</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($servicos as $servico)
                <tr>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $servico->id }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $servico->nome }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ 'R$ ' . number_format($servico->valor, 2, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhum servico encontrado!</td>
                </tr>
            @endforelse

            <tr>
                <td colspan="6" style="border: 1px solid #ccc; border-top: none;">Total</td>
                <td style="border: 1px solid #ccc; border-top: none;">{{ 'R$ ' . number_format($totalValor, 2, ',', '.') }}</td>
            </tr>
        </tbody>

    </table>
</body>

</html>
