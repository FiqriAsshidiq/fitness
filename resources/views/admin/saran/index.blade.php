<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800 leading-tight">Data Saran Pengguna</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                @if(session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Nama User</th>
                            <th class="border px-4 py-2">Keterangan</th>
                            <th class="border px-4 py-2">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $index => $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border px-4 py-2">{{ $item->user->name ?? 'Tidak diketahui' }}</td>
                                <td class="border px-4 py-2">{{ $item->keterangan }}</td>
                                <td class="border px-4 py-2">{{ $item->created_at->format('d-m-Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">Belum ada saran yang masuk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
