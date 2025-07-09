<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight" style="font-size: 40px;">
            {{ __('Daftar Aturan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('rule.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
                    + Tambah Aturan
                </a>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="table-auto w-full text-left border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border">No</th>
                                <th class="px-4 py-2 border">Kode</th>
                                <th class="px-4 py-2 border">Tingkat Pengalaman</th>
                                <th class="px-4 py-2 border">Tujuan</th>
                                <th class="px-4 py-2 border">Target Otot</th>
                                <th class="px-4 py-2 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rules as $index => $rule)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2 border">{{ $rule->kode }}</td>
                                    <td class="px-4 py-2 border">{{ $rule->pengalaman->level ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $rule->tujuanLatihan->nama ?? '-' }}</td>
                                    <td class="px-4 py-2 border">
                                        @foreach ($rule->targetOtot as $otot)
                                            <span class="inline-block bg-blue-100 text-blue-800 text-sm px-2 py-1 rounded mb-1">
                                                {{ $otot->kode }} - {{ $otot->fokus }}
                                            </span><br>
                                        @endforeach
                                    </td>
                                    <td class="px-4 py-2 border space-x-1">
                                        <a href="{{ route('rule.edit', $rule->id) }}"
                                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm">Edit</a>
                                        <form action="{{ route('rule.destroy', $rule->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Yakin hapus aturan ini?')"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center px-4 py-4 border text-gray-600">Belum ada data aturan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
