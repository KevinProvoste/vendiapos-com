<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- SOLUCIÓN: Se ha corregido el título para que no dependa de la variable $store -->
    <title>Mis Tiendas - Vendiapos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Mis Tiendas</h1>
            <div>
                <a href="{{ route('stores.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">Crear Nueva Tienda</a>
                 <form action="{{ route('logout') }}" method="POST" class="inline ml-4">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Cerrar Sesión</button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($stores as $store)
                <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col justify-between hover:shadow-xl transition-shadow">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">{{ $store->name }}</h2>
                        <p class="text-gray-500">{{ $store->address ?? 'Sin dirección' }}</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('store.dashboard', $store) }}" class="block text-center bg-gray-800 text-white font-semibold py-2 px-4 rounded-lg hover:bg-gray-900 transition-colors">
                            Gestionar Tienda
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-10 text-gray-500 bg-white rounded-2xl shadow-md">
                    <p class="text-lg">Aún no has creado ninguna tienda.</p>
                    <p>¡Haz clic en el botón de arriba para empezar!</p>
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>

