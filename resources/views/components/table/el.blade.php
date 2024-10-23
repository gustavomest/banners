<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <x-table.th>#</x-table.th>
                <x-table.th>Arquivo</x-table.th>
                <x-table.th>Título</x-table.th>
                <x-table.th>Plataforma</x-table.th>
                <x-table.th>Campanha</x-table.th>
                <x-table.th>Resolução</x-table.th>
                <x-table.th>Peso</x-table.th>
                <x-table.th>Tempo</x-table.th>
                <x-table.th>Formato</x-table.th>
                <x-table.th>Empresa</x-table.th>
                <x-table.th>Tipo</x-table.th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($items as $item)
                <tr>
                    <x-table.td>{{ $loop->iteration }}</x-table.td>
                    <x-table.td>{{ $item->arquivo }}</x-table.td>
                    <x-table.td>{{ $item->titulo }}</x-table.td>
                    <x-table.td>{{ $item->plataforma }}</x-table.td>
                    <x-table.td>{{ $item->campanha }}</x-table.td>
                    <x-table.td>{{ $item->resolucao }}</x-table.td>
                    <x-table.td>{{ $item->peso }}</x-table.td>
                    <x-table.td>{{ $item->tempo }}</x-table.td>
                    <x-table.td>{{ $item->formato }}</x-table.td>
                    <x-table.td>{{ $item->empresa }}</x-table.td>
                    <x-table.td>{{ $item->tipo }}</x-table.td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
