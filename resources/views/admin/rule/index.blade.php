{{-- resources/views/admin/rule/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight" style="font-size: 40px;">
            {{ __('Daftar Aturan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Tombol tambah -->
                <div class="mb-4">
                    <a href="{{ route('admin.rule.create') }}" class="btn btn-primary">+ Tambah Aturan</a>
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
                            <th class="text-center">Tingkat Pengalaman</th>
                            <th class="text-center">Tujuan</th>
                            <th class="text-center">Target Otot</th>
                            <th class="text-center">Kondisi Tubuh</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </x-slot>

                    @forelse ($rules as $index => $rule)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center">{{ $rule->pengalaman->level ?? '-' }}</td>
                            <td class="text-center">{{ $rule->tujuanLatihan->nama ?? '-' }}</td>
                            <td class="text-center">
                                @foreach ($rule->targetOtot as $otot)
                                    <span>
                                        {{ $otot->kode }} - {{ $otot->fokus }}
                                    </span><br>
                                @endforeach
                            </td>
                            <td class="text-center">{{ $rule->kondisiTubuh->Kondisi ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.rule.edit', $rule->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.rule.destroy', $rule->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus aturan ini?')" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-gray-600 py-4">Belum ada data aturan.</td>
                        </tr>
                    @endforelse

                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>
