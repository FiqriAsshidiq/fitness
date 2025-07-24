<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
            {{ __('Daftar Panduan Nutrisi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Tombol tambah -->
                <div class="mb-4">
                    <a href="{{ route('admin.nutrisi.create') }}" class="btn btn-primary">+ Tambah Nutrisi</a>
                </div>

                <!-- Notifikasi sukses -->
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Tabel -->
                <x-table>
                    <x-slot name="header">
                        <tr>
                            <th class="text-center">Nama Makanan</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Kalori</th>
                            <th class="text-center">Protein</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </x-slot>

                    @foreach($nutrisi as $item)
                        <tr>
                            <td class="text-center">{{ $item->nama_makanan }}</td>
                            <td class="text-center">{{ $item->kategori }}</td>
                            <td class="text-center">{{ $item->kalori ?? '-' }}</td>
                            <td class="text-center">{{ $item->protein ?? '-' }}</td>
                            <td class="text-center">
                                @if($item->gambar_url)
                                    <img src="{{ asset('storage/' . $item->gambar_url) }}" alt="Gambar Makanan" width="100">
                                @else
                                    <em>Tidak ada gambar</em>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.nutrisi.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.nutrisi.destroy', $item->id) }}" method="POST" style="display:inline;">
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
