<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
            {{ __('Daftar Rekomendasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('admin.rekomendasi.create') }}" class="btn btn-primary mb-4">+ Tambah Rekomendasi</a>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <x-table>
                    <x-slot name="header">
                        <tr>
                            <th>No</th>
                            <th>Rule ID</th>
                            <th>Metode Latihan</th>
                            <th>Latihan</th> {{-- Baru --}}
                            <th class="tex-center">Nutrisi</th>
                            <th class="tex-center">Catatan</th>
                            <th>Aksi</th>
                        </tr>
                    </x-slot>
                
                    @foreach ($rekomendasi as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>Rule #{{ $item->rule_id }}</td>
                            <td>{{ $item->metode_latihan }}</td>
                            <td>
                                @foreach ($item->latihan as $latihan)
                                    <span >{{ $latihan->nama_teknik }}</span><br>
                                @endforeach
                            </td>
                            <td style="white-space: normal; max-width: 200px; vertical-align: top;">{{ $item->nutrisi }}</td>
                            <td style="white-space: normal; max-width: 200px; vertical-align: top;">{{ $item->catatan }}</td>
                            <td>
                                <a href="{{ route('admin.rekomendasi.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.rekomendasi.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus rekomendasi ini?')" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </x-table>
             </div>
        </div>
    </div>
</x-app-layout>
