<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gerenciador de Tokens') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form onsubmit="createToken(event)" class="space-y-4">
                        <label for="tokenable_type" class="block">Tipo de Tokenable:</label>
                        <input type="text" id="tokenable_type" name="tokenable_type" required class="input">

                        <label for="tokenable_id" class="block">ID de Tokenable:</label>
                        <input type="number" id="tokenable_id" name="tokenable_id" required class="input">

                        <label for="name" class="block">Nome do Token:</label>
                        <input type="text" id="name" name="name" required class="input">

                        <label for="abilities" class="block">Habilidades (opcional):</label>
                        <input type="text" id="abilities" name="abilities" class="input">

                        <label for="expires_at" class="block">Expira em (opcional):</label>
                        <input type="datetime-local" id="expires_at" name="expires_at" class="input">

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Criar Token</button>
                    </form>

                    <h2 class="mt-6 text-lg font-semibold">Tokens Existentes</h2>
                    <ul id="tokensList" class="mt-4"></ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        const apiUrl = '/api/personal-access-tokens';

        async function fetchTokens() {
            const response = await fetch(apiUrl);
            const tokens = await response.json();
            const tokensList = document.getElementById('tokensList');
            tokensList.innerHTML = '';

            tokens.forEach(token => {
                const li = document.createElement('li');
                li.textContent = `${token.name} - ${token.token}`;
                const editButton = document.createElement('button');
                editButton.textContent = 'Editar';
                editButton.onclick = () => editToken(token);
                const deleteButton = document.createElement('button');
                deleteButton.textContent = 'Excluir';
                deleteButton.onclick = () => deleteToken(token.id);
                
                li.appendChild(editButton);
                li.appendChild(deleteButton);
                tokensList.appendChild(li);
            });
        }

        async function createToken(event) {
            event.preventDefault();
            const formData = new FormData(event.target);
            const response = await fetch(apiUrl, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            });

            if (response.ok) {
                event.target.reset();
                fetchTokens();
            } else {
                alert('Erro ao criar o token');
            }
        }

        async function deleteToken(id) {
            const response = await fetch(`${apiUrl}/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            });

            if (response.ok) {
                fetchTokens();
            } else {
                alert('Erro ao excluir o token');
            }
        }

        async function editToken(token) {
            const name = prompt('Nome do Token:', token.name);
            const abilities = prompt('Habilidades (opcional):', token.abilities);
            const expiresAt = prompt('Expira em (opcional):', token.expires_at);

            const response = await fetch(`${apiUrl}/${token.id}`, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    name,
                    abilities,
                    expires_at: expiresAt,
                }),
            });

            if (response.ok) {
                fetchTokens();
            } else {
                alert('Erro ao atualizar o token');
            }
        }

        document.addEventListener('DOMContentLoaded', fetchTokens);
    </script>
</x-app-layout>
