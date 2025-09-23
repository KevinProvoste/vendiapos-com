<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendiapos - Sistema de Punto de Venta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9fc;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #1d4ed8, #4f46e5);
        }
    </style>
</head>
<body class="text-gray-800">

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    <!-- Pie de Página (Footer) -->
    <footer class="bg-gray-800 text-white py-10 px-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Vendiapos. Todos los derechos reservados.</p>
            <div class="mt-4 space-x-4">
                <a href="#" class="text-gray-400 hover:text-white transition duration-300">Términos de Servicio</a>
                <a href="#" class="text-gray-400 hover:text-white transition duration-300">Política de Privacidad</a>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('login-btn').addEventListener('click', (e) => {
            e.preventDefault();
            const loginBox = document.createElement('div');
            loginBox.className = "fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50";
            loginBox.innerHTML = `
                <div class="bg-white p-8 rounded-lg shadow-lg text-center max-w-sm w-full">
                    <h3 class="text-xl font-bold mb-4">Redireccionando...</h3>
                    <p class="text-gray-600">Serás dirigido a la página de inicio de sesión.</p>
                    <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition" onclick="this.parentElement.parentElement.remove()">Aceptar</button>
                </div>
            `;
            document.body.appendChild(loginBox);
        });

        document.getElementById('register-btn').addEventListener('click', (e) => {
            e.preventDefault();
            const registerBox = document.createElement('div');
            registerBox.className = "fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50";
            registerBox.innerHTML = `
                <div class="bg-white p-8 rounded-lg shadow-lg text-center max-w-sm w-full">
                    <h3 class="text-xl font-bold mb-4">Redireccionando...</h3>
                    <p class="text-gray-600">Serás dirigido a la página de registro.</p>
                    <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition" onclick="this.parentElement.parentElement.remove()">Aceptar</button>
                </div>
            `;
            document.body.appendChild(registerBox);
        });
    </script>
</body>
</html>
