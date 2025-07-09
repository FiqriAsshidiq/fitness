<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white leading-tight" style="font-size: 30px;">
            {{ __('Data Rules') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('rule.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    + Tambah Rule
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table class="table-auto w-full border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">Kode</th>
                            <th class="px-4 py-2 border">Pengalaman</th>
                            <th class="px-4 py-2 border">Tujuan Latihan</th>
                            <th class="px-4 py-2 border">Target Otot</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rules as $rule)
                            <tr>
                                <td class="px-4 py-2 border">{{ $rule->kode }}</td>
                                <td class="px-4 py-2 border">{{ $rule->pengalaman->level ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $rule->tujuanLatihan->nama ?? '-' }}</td>
                                <td class="px-4 py-2 border">
                                    @foreach ($rule->targetOtot as $otot)
                                        <span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm mr-1 mb-1">
                                            {{ $otot->kode }}
                                        </span>
                                    @endforeach
                                </td>
                                <td class="px-4 py-2 border">
                                    <a href="{{ route('rule.edit', $rule->id) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                                    <form action="{{ route('rule.destroy', $rule->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 border text-center text-gray-500">Belum ada data rule.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>