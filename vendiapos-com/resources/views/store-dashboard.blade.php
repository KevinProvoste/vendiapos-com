<!-- File: vendiapos-com/resources/views/store-dashboard.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard de la Tienda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-white shadow-lg p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">Panel de Gestión</h1>
        <div>
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-800 mr-4">Mis Tiendas</a>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Cerrar Sesión</button>
            </form>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white p-8 rounded-3xl shadow-lg w-full max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Bienvenido al panel de tu tienda</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-blue-50 p-6 rounded-2xl shadow-md hover:shadow-xl transition-shadow">
                    <h3 class="font-bold text-xl text-blue-800 mb-2">Productos</h3>
                    <p class="text-blue-600 mb-4">Añade, edita y gestiona el inventario de tu tienda.</p>
                    <a href="{{ route('products.index') }}" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors">Gestionar Productos</a>
                </div>
                <div class="bg-green-50 p-6 rounded-2xl shadow-md hover:shadow-xl transition-shadow">
                    <h3 class="font-bold text-xl text-green-800 mb-2">Cajeros</h3>
                    <p class="text-green-600 mb-4">Administra los usuarios que pueden realizar ventas.</p>
                    <a href="{{ route('cashiers.index') }}" class="bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition-colors">Gestionar Cajeros</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
