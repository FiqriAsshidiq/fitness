<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
            {{ __('Daftar Teknik Latihan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <!-- Tombol tambah -->
                <div class="mb-4">
                    <a href="{{ route('admin.latihan.create') }}" class="btn btn-primary">+ Tambah Teknik</a>
                </div>

                <!-- Notifikasi sukses -->
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Tabel -->
                <x-table>
                    <x-slot name="header">
                        <tr>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Nama Teknik</th>
                            <th class="text-center">Alat</th>
                            <th class="text-center">Kategori Otot</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </x-slot>

                    @foreach($latihan as $latihan)
                        <tr>
                            <td class="text-center">{{ $latihan->kode }}</td>
                            <td class="text-center">{{ $latihan->nama_teknik }}</td>
                            <td class="text-center">{{ $latihan->alat }}</td>
                            <td class="text-center">{{ $latihan->kategori_otot }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.latihan.edit', $latihan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.latihan.destroy', $latihan->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>

