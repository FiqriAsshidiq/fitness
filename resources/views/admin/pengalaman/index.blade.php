<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight" style="font-size: 40px;">
            {{ __('Daftar Tingkat Pengalaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-4">
                    <a href="{{ route('admin.pengalaman.create') }}" class="btn btn-primary">+ Tambah Pengalaman</a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <x-table>
                    <x-slot name="header">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Level</th>
                            <th class="text-center">Deskripsi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </x-slot>

                    @foreach($pengalaman as $index => $item)                        
                        <tr>
                            <td>{{ $index + 1 }}</td>                            
                            <td class="text-center">{{ $item->level }}</td>
                            <td class="text-center">{{ $item->deskripsi }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.pengalaman.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.pengalaman.destroy', $item->id) }}" method="POST" style="display:inline;">
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
