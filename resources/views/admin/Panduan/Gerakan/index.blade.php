<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
            {{ __('Daftar Gerakan Latihan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Tombol tambah -->
                <div class="mb-4">
                    <a href="{{ route('admin.gerakan.create') }}" class="btn btn-primary">+ Tambah Gerakan</a>
                </div>

                <!-- Notifikasi sukses -->
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Tabel -->
                <x-table>
                    <x-slot name="header">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Gerakan</th>
                            <th class="text-center">Target Otot</th>
                            <th class="text-center">Deskripsi</th>
                            <th class="text-center">GIF</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </x-slot>
                    @foreach($gerakan as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>                            
                            <td class="text-center">{{ $item->nama_gerakan }}</td>
                            <td class="text-center">{{ $item->target_otot }}</td>
                            <td style="white-space: normal; max-width: 200px; vertical-align: top;">{{ $item->deskripsi }}</td>
                            <td class="text-center">
                                @if($item->gif_url)
                                    <img src="{{ asset('storage/' . $item->gif_url) }}" alt="GIF" width="100">
                                @else
                                    <em>Tidak ada GIF</em>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.gerakan.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.gerakan.destroy', $item->id) }}" method="POST" style="display:inline;">
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
