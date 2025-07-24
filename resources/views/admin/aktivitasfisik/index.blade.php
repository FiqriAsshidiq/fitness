<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
            {{ __('Daftar Aktivitas Fisik') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-4">
                    <a href="{{ route('admin.aktivitasfisik.create') }}" class="btn btn-primary">+ Tambah Aktivitas</a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <x-table>
                    <x-slot name="header">
                        <tr>
                            <th class="text-center">Tingkat</th>
                            <th class="text-center">Nilai</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </x-slot>

                    @foreach($data as $item)
                        <tr>
                            <td class="text-center">{{ $item->tingkat }}</td>
                            <td class="text-center">{{ $item->nilai }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.aktivitasfisik.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.aktivitasfisik.destroy', $item->id) }}" method="POST" style="display:inline;">
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
