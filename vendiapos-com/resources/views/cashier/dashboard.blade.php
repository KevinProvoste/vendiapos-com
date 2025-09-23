<!-- File: vendiapos-com/resources/views/cashier/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS - Vendiapos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js para la interactividad -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .product-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); gap: 1rem; }
    </style>
</head>
<body class="bg-gray-100 h-screen overflow-hidden">

    <!-- Se pasa la colección de productos a Alpine.js para la búsqueda por SKU -->
    <div class="flex h-full" x-data="pos({{ $products->toJson() }})">
        
        <!-- Panel de Productos (Izquierda) -->
        <div class="w-2/3 flex flex-col p-4">
            <header class="mb-4 flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Punto de Venta</h1>
                    <p class="text-gray-500">Bienvenido, {{ Auth::user()->name }}</p>
                </div>
                <!-- NUEVO: Formulario para Cerrar Sesión -->
                <form action="{{ route('cashier.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-red-600 transition-colors">
                        Cerrar Sesión
                    </button>
                </form>
            </header>

            <!-- NUEVO: Campo de Búsqueda por SKU -->
            <div class="mb-4">
                <input type="text"
                       x-model="skuInput"
                       @keydown.enter.prevent="findBySku()"
                       placeholder="Escanear o ingresar código de producto y presionar Enter"
                       class="w-full p-3 border-2 border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500 transition">
            </div>

            <div class="flex-1 bg-white p-4 rounded-2xl shadow-lg overflow-y-auto">
                <div class="product-grid">
                    @forelse ($products as $product)
                        <div @click="addToCart({{ json_encode($product) }})"
                             class="bg-white border rounded-xl p-3 text-center cursor-pointer hover:border-blue-500 hover:shadow-md transition-all duration-200">
                            <div class="font-bold text-gray-700">{{ $product->name }}</div>
                            <div class="text-sm text-gray-500">${{ number_format($product->price, 0) }}</div>
                        </div>
                    @empty
                        <p class="text-gray-500 col-span-full text-center mt-10">La tienda no tiene productos asignados.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Panel del Carrito (Derecha) -->
        <div class="w-1/3 bg-white p-6 flex flex-col shadow-2xl">
            <div class="flex-1 overflow-y-auto">
                <h2 class="text-2xl font-bold mb-4 border-b pb-2">Ticket de Venta</h2>
                <div x-show="cart.length === 0" class="text-center text-gray-500 py-10">
                    <p>Selecciona productos para añadirlos al ticket.</p>
                </div>
                <ul class="divide-y divide-gray-200">
                    <template x-for="item in cart" :key="item.id">
                        <li class="py-3 flex justify-between items-center">
                            <div>
                                <p class="font-semibold" x-text="item.name"></p>
                                <p class="text-sm text-gray-600" x-text="`$${item.price.toLocaleString()}`"></p>
                            </div>
                            <div class="flex items-center">
                                <input type="number" min="1" x-model.number="item.quantity" @input="updateTotal()" class="w-16 text-center border rounded-md mr-2">
                                <button @click="removeFromCart(item.id)" class="text-red-500 hover:text-red-700 font-bold text-xl">&times;</button>
                            </div>
                        </li>
                    </template>
                </ul>
            </div>
            <div class="border-t pt-4">
                <div class="flex justify-between font-bold text-xl mb-4">
                    <span>TOTAL:</span>
                    <span x-text="`$${total.toLocaleString()}`"></span>
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <button @click="clearCart()" class="w-full bg-red-500 text-white py-3 rounded-lg font-semibold hover:bg-red-600 transition-colors">Limpiar</button>
                    <button @click="checkout()" class="w-full bg-green-500 text-white py-3 rounded-lg font-semibold hover:bg-green-600 transition-colors">Cobrar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function pos(products) {
            return {
                products: products, // Guarda la lista completa de productos.
                skuInput: '',       // Almacena el valor del campo de búsqueda.
                cart: [],
                total: 0,
                
                // NUEVO: Función para buscar y añadir por SKU.
                findBySku() {
                    if (this.skuInput.trim() === '') return;
                    
                    const foundProduct = this.products.find(p => p.sku === this.skuInput.trim());
                    
                    if (foundProduct) {
                        this.addToCart(foundProduct);
                        this.skuInput = ''; // Limpia el campo después de añadir.
                    } else {
                        alert('Producto no encontrado.');
                        this.skuInput = ''; // Limpia el campo si no se encuentra.
                    }
                },
                
                addToCart(product) {
                    const existingItem = this.cart.find(item => item.id === product.id);
                    if (existingItem) {
                        existingItem.quantity++;
                    } else {
                        this.cart.push({ ...product, quantity: 1 });
                    }
                    this.updateTotal();
                },
                removeFromCart(productId) {
                    this.cart = this.cart.filter(item => item.id !== productId);
                    this.updateTotal();
                },
                updateTotal() {
                    this.total = this.cart.reduce((sum, item) => {
                        // Aseguramos que el precio sea un número
                        const price = parseFloat(item.price);
                        return sum + (price * item.quantity);
                    }, 0).toFixed(2); // Calculamos el total con 2 decimales
                },
                clearCart() {
                    this.cart = [];
                    this.total = 0;
                },
                checkout() {
                    if (this.cart.length === 0) {
                        alert('El ticket está vacío.');
                        return;
                    }
                    alert(`Venta realizada por un total de: $${parseFloat(this.total).toLocaleString()}`);
                    // Aquí iría la lógica para guardar la venta en la base de datos.
                    this.clearCart();
                }
            }
        }
    </script>
</body>
</html>

