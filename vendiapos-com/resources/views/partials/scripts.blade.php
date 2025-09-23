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
