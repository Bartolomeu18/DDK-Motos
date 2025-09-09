<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Motoqueiros</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h1, h2 { text-align: center; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        .section-title { background-color: #f0f0f0; padding: 5px; font-weight: bold; }
    </style>
</head>
<body>

    <h1>Relatório Diário de Motoqueiros</h1>
    <h2>{{ \Carbon\Carbon::now()->format('d/m/Y') }}</h2>

    <div class="section-title">🏍️ Motoqueiros que estiveram no campo</div>
     <!-- Tabela de usuários -->
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                   <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Motoqueiro</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Data de saida</th> 
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Hora de chegada</th> 
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($dados as $dado)
                    <tr>
                      <td class="px-6 py-4">{{$dado['id']}}</td>
                       <td class="px-6 py-4">{{$dado['nomeMotoqueiro']}}</td>
                        <td class="px-6 py-4 capitalize"> {{$data}} </td>
                        <td class="px-6 py-4 capitalize">{{$dado['horaDeChegada']??'motoqueiro não regressou'}}</td>
                  </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">Nenhum usuário encontrado.</td>
                    </tr>
                @endforelse
                     
            </tbody>
        </table>
    </div>
</body>
</html>