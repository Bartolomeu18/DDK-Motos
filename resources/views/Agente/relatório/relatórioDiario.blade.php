<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Motoqueiros</title>
        <script>
        window.cotas = @json($cotas ?? []);
    </script>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
   <style>
        body { 
            font-family: DejaVu Sans, sans-serif; 
            font-size: 12px; 
        }   
        h1, h2 { 
            text-align: center; 
            margin-bottom: 10px; 
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-bottom: 20px; 
        }
        th, td { 
            border: 1px solid #000; 
            padding: 6px; 
            text-align: left; 
        }
        .section-title { 
            background-color: #f0f0f0; 
            padding: 5px; 
            font-weight: bold; 
            text-align: center;
        }
        .text-center {
            text-align: center;
        }
        .font-bold {
            font-weight: bold;
        }
        img {
            display: block;
            margin: 20px auto;
            width: 150px;
        }
        .w-300 {
            width: 100%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <img src="{{ asset('img/ddk-logo-rbg.png') }}" alt="" class=" pt-4 w-20 rounded-lg m-auto">
    
    <h1 class="text-center  font-bold font-DejaVu">Relatório Diário de Motoqueiros</h1>
    <br>
   <h2 class="text-center font-bold font-DejaVu">Motoqueiro no Campo em {{ \Carbon\Carbon::now()->format('d/m/Y') }}</h2>

    <p class="text-center font-DejaVu">Na presente lista temos os nomes dos motoqueiros que foram reconhecidos pelo nosso sistema que estiveram no campo: </p>
    <div class="m-auto font-DejaVu w-200 pt-3">
        <ul class="">
            @forelse($Motoqueiros as $Motoqueiro)
            <li>{{$Motoqueiro->motoqueiro->name}}</li>
            @empty
            <li>Nenhum Motoqueiro entrou no Campo</li>
            @endforelse
        </ul> 
    </div>
    <div class="section-title text-center m-5 font-bold font-DejaVu">Tabela Informativa</div>
    <p class="text-center font-DejaVu p-2">Na presente tabela encontramos todos os dados do Regresso dos Motoqueiros.</p>
     <!-- Tabela de usuários -->
    <div class="m-auto w-300 bg-red-50 rounded-lg">
        <table class="divide-gray-200 w-full rounded-lg ">
            <thead class="bg-gray-100 rounded-lg bg-red-500 text-white">
                <tr class="rounded-lg">
                 <th class="px-6 py-3 text-left text-sm font-medium ">ID</th> 
                   <th class="px-6 py-3 text-left text-sm font-medium">Motoqueiro</th> 
                    <th class="px-6 py-3 text-left text-sm font-medium">Moto</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Cota</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Divida</th>
                    <th class="px-6 py-3 text-left text-sm font-medium ">Multa</th>                    
                    <th class="px-6 py-3 text-left text-sm font-medium">Hora de chegada</th> 
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-gray-600">
                @forelse ($dados as $dado)
                    <tr>
                     <td class="px-6 py-4">{{ $dado->id }}</td>
                     <td class="px-6 py-4">{{ $dado->name }}</td>
                       <td class="px-6 py-4">{{ $dado->moto }}</td>
                       <td class="px-6 py-4">{{ $dado->cota }}</td>
                    <td class="px-6 py-4">{{ $dado->divida }}</td>
                     <td class="px-6 py-4">{{ $dado->multa }}</td>
                        <td class="px-6 py-4 capitalize"> {{ $dado->hora_de_chegada }} </td>
                  </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">Nenhum usuário encontrado.</td>
                    </tr>
                @endforelse
                     
            </tbody>
        </table>
    </div>
    <h2 class="section-title text-center mt-15 mb-10 font-bold font-DejaVu">Gráfico Informátivo</h2>
    <div class="w-200 h-300 m-auto">
     <canvas id="meuGrafico"></canvas>
    </div>

</body>
</html