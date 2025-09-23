<!-- File: vendiapos-com/resources/views/products/create.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Nuevo Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Añadir Nuevo Producto</h2>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Producto</label>
                <input type="text" id="name" name="name" class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            
            <!-- CAMPO AÑADIDO: SKU / Código de Barras -->
            <div class="mb-4">
                <label for="sku" class="block text-gray-700 text-sm font-bold mb-2">SKU / Código de Barras (Opcional)</label>
                <input type="text" id="sku" name="sku" class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ej: 1234567890123">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Precio</label>
                    <input type="number" id="price" name="price" step="0.01" class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label for="stock" class="block text-gray-700 text-sm font-bold mb-2">Stock (Cantidad)</label>
                    <input type="number" id="stock" name="stock" class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
            </div>
            <div class="mb-6">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción (Opcional)</label>
                <textarea id="description" name="description" rows="3" class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
            <div class="flex items-center justify-between">
                <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-gray-800 font-medium">Cancelar</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg focus:outline-none focus:shadow-outline">
                    Guardar Producto
                </button>
            </div>
        </form>
    </div>
</body>
</html>

