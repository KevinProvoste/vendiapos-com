<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tienda - Vendiapos</title>
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
    <!-- Barra de Navegación (puedes reutilizar la de dashboard) -->
    <nav class="bg-white shadow-lg p-4 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <h1 class="text-2xl font-bold text-gray-800">Crear Nueva Tienda</h1>
        </div>
        <div>
            <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-800 font-medium transition duration-300">
                Volver al Dashboard
            </a>
        </div>
    </nav>

    <!-- Formulario para crear tienda -->
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white p-8 rounded-3xl shadow-lg w-full max-w-lg mx-auto">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Detalles de la Tienda</h2>
            <!-- Mensaje de estado -->
            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif

            <!-- Mensajes de error de validación -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
                    <strong class="font-bold">¡Oops!</strong>
                    <span class="block sm:inline">Hubo algunos problemas con tu entrada:</span>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('stores.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Nombre de la Tienda</label>
                    <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="address" class="block text-gray-700 font-semibold mb-2">Dirección</label>
                    <input type="text" name="address" id="address" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-full transition duration-300">
                    Guardar Tienda
                </button>
            </form>
        </div>
    </div>
</body>
</html>
