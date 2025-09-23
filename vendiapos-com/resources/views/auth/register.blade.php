<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Vendiapos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9fc;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-3xl shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Regístrate</h2>
        <form action="#" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre Completo</label>
                <input type="text" id="name" name="name" class="shadow appearance-none border border-gray-200 rounded-xl w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" placeholder="Tu nombre">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="shadow appearance-none border border-gray-200 rounded-xl w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" placeholder="tu_correo@ejemplo.com">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Contraseña</label>
                <input type="password" id="password" name="password" class="shadow appearance-none border border-gray-200 rounded-xl w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" placeholder="***************">
            </div>
            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="shadow appearance-none border border-gray-200 rounded-xl w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" placeholder="***************">
            </div>
            <div class="flex items-center justify-center">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-full focus:outline-none focus:shadow-outline transition duration-300 w-full">
                    Regístrate
                </button>
            </div>
        </form>
        <p class="text-center text-gray-600 text-sm mt-6">
            ¿Ya tienes una cuenta?
            <a href="/login" class="font-bold text-blue-600 hover:text-blue-800">
                Iniciar Sesión
            </a>
        </p>
    </div>
</body>
</html>
