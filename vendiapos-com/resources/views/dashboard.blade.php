<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Vendiapos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9fc;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    @auth
    <!-- Barra de Navegación del Dashboard -->
    <nav class="bg-white shadow-lg p-4 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
            <span class="text-sm text-gray-500">Bienvenido, {{ Auth::user()->name }}</span>
        </div>
        <div class="flex items-center space-x-4">
            <!-- Botón "Crear Tienda" ahora es un enlace que dirige a la ruta correcta -->
            <a href="{{ route('stores.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full transition duration-300">
                Crear Tienda
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-red-500 hover:text-red-700 font-medium transition duration-300">
                    Cerrar Sesión
                </button>
            </form>
        </div>
    </nav>

    <!-- Contenido del Dashboard -->
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white p-8 rounded-3xl shadow-lg w-full max-w-4xl mx-auto">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Resumen de la tienda</h1>

            <!-- Contenido de ejemplo para el dashboard -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-blue-100 p-6 rounded-xl shadow-md">
                    <h3 class="text-xl font-semibold text-blue-800">Ventas de Hoy</h3>
                    <p class="text-3xl font-bold text-blue-600 mt-2">$1,250</p>
                </div>
                <div class="bg-green-100 p-6 rounded-xl shadow-md">
                    <h3 class="text-xl font-semibold text-green-800">Productos en Stock</h3>
                    <p class="text-3xl font-bold text-green-600 mt-2">345</p>
                </div>
                <div class="bg-yellow-100 p-6 rounded-xl shadow-md">
                    <h3 class="text-xl font-semibold text-yellow-800">Órdenes Pendientes</h3>
                    <p class="text-3xl font-bold text-yellow-600 mt-2">12</p>
                </div>
            </div>

            <!-- Lista de Tiendas (ahora dinámica) -->
            <div class="mt-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Mis Tiendas</h2>
                @if($stores->isEmpty())
                    <p class="text-gray-600">Aún no tienes tiendas. ¡Crea una ahora!</p>
                @else
                    <ul class="space-y-4">
                        @foreach($stores as $store)
                            <li class="bg-gray-50 p-4 rounded-xl border border-gray-200 shadow-sm flex justify-between items-center">
                                <div>
                                    <h4 class="font-semibold text-gray-800">{{ $store->name }}</h4>
                                    <p class="text-sm text-gray-500">{{ $store->address ?? 'Dirección no especificada' }}</p>
                                </div>
                                <a href="#" class="text-blue-600 hover:text-blue-800 font-medium transition duration-300">Ir a la tienda</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
    @endauth

    @guest
    <!-- Mensaje para usuarios no autenticados -->
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white p-8 rounded-3xl shadow-lg w-full max-w-lg mx-auto text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Acceso denegado</h1>
            <p class="text-lg text-gray-600 mb-6">Debes iniciar sesión para ver tu dashboard.</p>
            <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-full transition duration-300">
                Iniciar Sesión
            </a>
        </div>
    </div>
    @endguest
</body>
</html>
