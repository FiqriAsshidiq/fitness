<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight" style="font-size: 40px;">
            {{ __('Daftar Aturan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('rule.create') }}" class="btn btn-primary mb-4">+ Tambah Aturan</a>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <x-table>
                    <x-slot name="header">
                        <tr>
                            <th>No</th>
                            <th>Target Otot</th>
                            <th>Aksi</th>
                        </tr>
                    </x-slot>

                    @foreach ($rules as $index => $rule)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @foreach ($rule->targetOtot as $otot)
                                    <span class="badge bg-info">{{ $otot->kode }} - {{ $otot->fokus }}</span><br>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('rule.edit', $rule->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('rule.destroy', $rule->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus aturan ini?')" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>