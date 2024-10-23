<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($banner) ? __('Editar Banner') : __('Banners') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if(isset($banner))
                        <form action="{{ route('banners.update', $banner->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <h3>Editar Banner</h3>
                    @else
                        <form action="{{ route('banners.store') }}" method="POST">
                            @csrf
                            <h3>Criar Banner</h3>
                    @endif

                    <div>
                        <label>Título:</label>
                        <input type="text" name="titulo" value="{{ $banner->titulo ?? '' }}" required class="input">
                    </div>
                    <div>
                        <label>Plataforma:</label>
                        <input type="text" name="plataforma" value="{{ $banner->plataforma ?? '' }}" required class="input">
                    </div>
                    <div>
                        <label>Campanha:</label>
                        <input type="text" name="campanha" value="{{ $banner->campanha ?? '' }}" required class="input">
                    </div>
                    <div>
                        <label>Formato:</label>
                        <input type="text" name="formato" value="{{ $banner->formato ?? '' }}" required class="input">
                    </div>
                    <div>
                        <label>Empresa:</label>
                        <input type="text" name="empresa" value="{{ $banner->empresa ?? '' }}" required class="input">
                    </div>
                    <div>
                        <label>Tipo:</label>
                        <input type="text" name="tipo" value="{{ $banner->tipo ?? '' }}" required class="input">
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                        {{ isset($banner) ? 'Atualizar Banner' : 'Criar Banner' }}
                    </button>
                    </form>

                    <h3 class="mt-6">Lista de Banners</h3>
                    <ul>
                        @foreach($banners as $banner)
                            <li class="flex justify-between items-center">
                                <span>{{ $banner->titulo }} - {{ $banner->plataforma }}</span>
                                <div>
                                    <a href="{{ route('banners.edit', $banner->id) }}" class="text-blue-600">Editar</a>
                                    <form action="{{ route('banners.destroy', $banner->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600">Excluir</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
