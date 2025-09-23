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

    <!-- Encabezado (Header) -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <a href="#" class="text-2xl font-bold text-gray-800">
                    <span class="text-blue-600">Vendiapos</span>
                </a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="#planes" class="text-gray-600 hover:text-blue-600 transition duration-300">Planes</a>
                <a href="/login" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg font-medium transition duration-300">
                    Iniciar Sesión
                </a>
                <a href="/register" class="text-blue-600 border border-blue-600 hover:bg-blue-50 px-4 py-2 rounded-lg font-medium transition duration-300">
                    Regístrate
                </a>
            </div>
        </nav>
    </header>

    <main>
        <!-- Sección Principal (Hero) -->
        <section class="gradient-bg text-white py-20 px-4">
            <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-10 md:mb-0 text-center md:text-left">
                    <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-4">
                        Moderniza tu Negocio con Nuestro Sistema POS
                    </h1>
                    <p class="text-lg md:text-xl font-light mb-8 opacity-90">
                        La solución de punto de venta en la nube más completa y fácil de usar para tu negocio.
                    </p>
                    <a href="#planes" class="bg-white text-blue-600 px-8 py-3 rounded-full font-bold text-lg shadow-lg hover:shadow-xl transition duration-300">
                        Ver Planes y Precios
                    </a>
                </div>
                <div class="md:w-1/2">
                    <div class="bg-white bg-opacity-10 rounded-3xl p-6 md:p-10 shadow-xl border border-white border-opacity-20 transform rotate-3 scale-95 hover:rotate-0 hover:scale-100 transition-transform duration-500 ease-in-out">
                         
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección de Características -->
        <section class="py-20 px-4" id="caracteristicas">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Características Principales</h2>
                <p class="text-gray-600 text-lg mb-12 max-w-2xl mx-auto">
                    Todo lo que necesitas para gestionar tu tienda, en una sola plataforma.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Tarjeta 1 -->
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                        <div class="text-blue-500 mb-4 inline-block p-3 rounded-full bg-blue-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Punto de Venta Móvil</h3>
                        <p class="text-gray-500">Realiza ventas desde cualquier lugar con una interfaz intuitiva y adaptable a cualquier dispositivo.</p>
                    </div>
                    <!-- Tarjeta 2 -->
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                        <div class="text-blue-500 mb-4 inline-block p-3 rounded-full bg-blue-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Gestión de Inventario</h3>
                        <p class="text-gray-500">Mantén un control preciso de tu inventario en tiempo real, con alertas de stock bajo.</p>
                    </div>
                    <!-- Tarjeta 3 -->
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                        <div class="text-blue-500 mb-4 inline-block p-3 rounded-full bg-blue-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 4h8a2 2 0 002-2V8a2 2 0 00-2-2h-4l-4-4H5a2 2 0 00-2 2v16a2 2 0 002 2h14zm-9-4h.01" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Reportes Detallados</h3>
                        <p class="text-gray-500">Accede a reportes completos de ventas, inventario y rendimiento de tus tiendas.</p>
                    </div>
                    <!-- Tarjeta 4 -->
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                        <div class="text-blue-500 mb-4 inline-block p-3 rounded-full bg-blue-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 10h2m-6-4h.01M5 12h2m0 0v2m0-2a4 4 0 110-8 4 4 0 010 8z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Múltiples Tiendas</h3>
                        <p class="text-gray-500">Gestiona varias tiendas desde un único panel de control, ideal para negocios en crecimiento.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección de Precios (Planes) -->
        <section class="py-20 px-4 bg-gray-100" id="planes">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Elige el plan perfecto para tu negocio</h2>
                <p class="text-gray-600 text-lg mb-12 max-w-2xl mx-auto">
                    Planes flexibles y transparentes, sin tarifas ocultas.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Plan Gratuito -->
                    <div class="bg-white p-8 rounded-3xl shadow-lg border border-gray-200 flex flex-col items-center text-center">
                        <h3 class="text-2xl font-bold mb-2">Gratuito</h3>
                        <p class="text-gray-500 mb-4">Ideal para empezar tu negocio.</p>
                        <p class="text-4xl font-extrabold text-blue-600 mb-6">
                            $0<span class="text-xl font-medium text-gray-500">/mes</span>
                        </p>
                        <ul class="text-gray-600 space-y-3 mb-8 text-left w-full">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                <span>1 Tienda</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                <span>1 Cajero</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                <span>20 Productos</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-red-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                <span>Reporte Diario</span>
                            </li>
                        </ul>
                        <a href="/register" class="w-full text-blue-600 border border-blue-600 hover:bg-blue-50 px-6 py-3 rounded-full font-bold transition duration-300 mt-auto">
                            Empieza Gratis
                        </a>
                    </div>

                    <!-- Plan Estándar (Nuevo) -->
                    <div class="bg-white p-8 rounded-3xl shadow-lg border border-gray-200 flex flex-col items-center text-center">
                        <h3 class="text-2xl font-bold mb-2">Estándar</h3>
                        <p class="text-gray-500 mb-4">Perfecto para negocios que ya están creciendo.</p>
                        <p class="text-4xl font-extrabold text-blue-600 mb-6">
                            $19<span class="text-xl font-medium text-gray-500">/mes</span>
                        </p>
                        <ul class="text-gray-600 space-y-3 mb-8 text-left w-full">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                <span>1 Tienda</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                <span>1 Cajero</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                <span>200 Productos</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                <span>Reporte Diario</span>
                            </li>
                        </ul>
                        <a href="#" class="w-full text-white bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-full font-bold transition duration-300 mt-auto">
                            Comprar Ahora
                        </a>
                    </div>

                    <!-- Plan Básico -->
                    <div class="bg-white p-8 rounded-3xl shadow-xl border border-blue-600 flex flex-col items-center text-center transform scale-105">
                        <h3 class="text-2xl font-bold mb-2">Básico</h3>
                        <p class="text-gray-500 mb-4">Funciones esenciales para un crecimiento sólido.</p>
                        <p class="text-4xl font-extrabold text-blue-600 mb-6">
                            $29<span class="text-xl font-medium text-gray-500">/mes</span>
                        </p>
                        <ul class="text-gray-600 space-y-3 mb-8 text-left w-full">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                <span>5 Tiendas</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                <span>5 Cajeros por tienda</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                <span>1000 Productos</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                <span>Reporte Diario y Mensual</span>
                            </li>
                        </ul>
                        <a href="#" class="w-full text-white bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-full font-bold transition duration-300 mt-auto">
                            Comprar Ahora
                        </a>
                    </div>

                    <!-- Plan Premium -->
                    <div class="bg-white p-8 rounded-3xl shadow-lg border border-gray-200 flex flex-col items-center text-center">
                        <h3 class="text-2xl font-bold mb-2">Premium</h3>
                        <p class="text-gray-500 mb-4">Todo el poder para negocios a gran escala.</p>
                        <p class="text-4xl font-extrabold text-blue-600 mb-6">
                            $59<span class="text-xl font-medium text-gray-500">/mes</span>
                        </p>
                        <ul class="text-gray-600 space-y-3 mb-8 text-left w-full">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                <span>Tiendas Ilimitadas</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                <span>Cajeros Ilimitados</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                <span>10,000 Productos</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                <span>Reportes Diarios, Mensuales y Anuales</span>
                            </li>
                        </ul>
                        <a href="#" class="w-full text-blue-600 border border-blue-600 hover:bg-blue-50 px-6 py-3 rounded-full font-bold transition duration-300 mt-auto">
                            Comprar Ahora
                        </a>
                    </div>
                </div>
            </div>
        </section>
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

</body>
</html>
