<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>DDK-Motos | Gestão de Moto Táxis</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-red-600">DDK-Motos</h1>
            <ul class="flex space-x-6 items-center">
                <li><a href="#sobre" class="hover:text-red-500">Sobre</a></li>
                <li><a href="#funcionalidades" class="hover:text-red-500">Funcionalidades</a></li>
                <li><a href="#contato" class="hover:text-red-500">Contato</a></li>
                <li>
                    <a href="{{route('login')}}"
                       class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                        Login Agente
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-red-50 py-20 text-center relative overflow-hidden" style="background-image: url('{{ asset('img/motobg.png') }}'); background-size: cover; background-position: center;">

        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-red-700 mb-4">Gestão Inteligente de Moto Táxis</h2>
            <p class="text-lg mb-6 text-white">
                A DDK-Motos oferece uma plataforma completa para controlar, monitorar e otimizar o uso de motorizadas em serviços de moto táxi em Angola.
            </p>
            <a href="#contato"
               class="bg-red-600 text-white px-6 py-3 rounded hover:bg-red-700 transition">
                Contactar
            </a>
        </div>
    </section>

    <!-- Sobre -->
    <section id="sobre" class="py-16 bg-white">
        <div class="max-w-5xl mx-auto px-4 text-center">
            <h3 class="text-2xl font-semibold text-red-600 mb-4">Sobre a DDK-Motos</h3>
            <p class="text-gray-700 text-lg">
                Somos uma empresa angolana dedicada à gestão de motorizadas usadas para transporte urbano. Deixe a sua moto Conosco e fique relachado que nós cuidamos de todo e no final da semana você é quem ganha.
            </p>
        </div>
    </section>

    <!-- Funcionalidades -->
    <section id="funcionalidades" class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <h3 class="text-2xl font-semibold text-red-600 mb-6 text-center">Funcionalidades da Plataforma</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded shadow text-center">
                    <h4 class="font-bold text-lg mb-2">Cadastro de Motorizadas</h4>
                    <p class="text-gray-600">Registre e acompanhe cada moto usada no serviço.</p>
                </div>
                <div class="bg-white p-6 rounded shadow text-center">
                    <h4 class="font-bold text-lg mb-2">Gestão de Condutores</h4>
                    <p class="text-gray-600">Controle dados, documentos e histórico de cada condutor.</p>
                </div>
                <div class="bg-white p-6 rounded shadow text-center">
                    <h4 class="font-bold text-lg mb-2">Reservas e Turnos</h4>
                    <p class="text-gray-600">Organize os horários e rotas dos moto táxis com agilidade.</p>
                </div>
                <div class="bg-white p-6 rounded shadow text-center">
                    <h4 class="font-bold text-lg mb-2">Pagamentos e Relatórios</h4>
                    <p class="text-gray-600">Registre pagamentos e acompanhe o desempenho financeiro.</p>
                </div>
                <div class="bg-white p-6 rounded shadow text-center">
                    <h4 class="font-bold text-lg mb-2">Manutenção e Alertas</h4>
                    <p class="text-gray-600">Receba notificações sobre revisões e problemas mecânicos.</p>
                </div>
                <div class="bg-white p-6 rounded shadow text-center">
                    <h4 class="font-bold text-lg mb-2">Suporte ao Agente</h4>
                    <p class="text-gray-600">Interface dedicada para agentes gerenciarem suas operações.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contato -->
    <section id="contato" class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h3 class="text-xl font-semibold text-red-600 mb-4">Fale Conosco</h3>
            <p class="text-gray-700 mb-2">📍 Luanda, Angola</p>
            <p class="text-gray-700 mb-2">📞 +244 923 000 000</p>
            <p class="text-gray-700">📧 contato@ddkmotos.co.ao</p>
        </div>
    </section>

    <!-- Rodapé -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} DDK-Motos. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>