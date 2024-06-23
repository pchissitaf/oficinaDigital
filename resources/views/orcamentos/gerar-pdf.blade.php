<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>funcionarios</title>
</head>

<body style="font-size: 12px;">
    <h2 style="text-align: center">Lista de funcionarios</h2>

    <table style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr style="background-color: #adb5bd;">
                <th style="border: 1px solid #ccc;">ID</th>
                <th style="border: 1px solid #ccc;">Nome</th>
                <th style="border: 1px solid #ccc;">Endereco</th>
                <th style="border: 1px solid #ccc;">Telefone</th>
                <th style="border: 1px solid #ccc;">Bilhete</th>
                <th style="border: 1px solid #ccc;">Doc. de Identifacação</th>
                <th style="border: 1px solid #ccc;">Cargo</th>
                <th style="border: 1px solid #ccc;">Salario</th>
                <th style="border: 1px solid #ccc;">ID de Usuario</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($funcionarios as $funcionario)
                <tr>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $funcionario->id }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $funcionario->nome }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $funcionario->endereco }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $funcionario->telefone }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $funcionario->bilhete }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $funcionario->doc_file }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $funcionario->nivel_id }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ 'Akz ' . number_format($funcionario->salario, 2, ',', '.') }}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{ $funcionario->user->email }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhuma funcionario encontrada!</td>
                </tr>
            @endforelse

            <tr>
                <td colspan="6" style="border: 1px solid #cccccc; border-top: none;">Total de Salarios</td>
                <td style="border: 1px solid #ccc; border-top: none;">{{ 'Akz ' . number_format($totalSalario, 2, ',', '.') }}</td>
            </tr>
        </tbody>

    </table>
</body>

</html>
