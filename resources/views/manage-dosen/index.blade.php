@extends('components.layout')

@section('title', 'Kelola Dosen')

@section('content')
<div class="container mx-auto p-6">
    <div class="relative overflow-x-auto">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold mb-4">Daftar Dosen</h1>

            <a href="{{ route('manage-dosen.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Dosen</a>
        </div>
    </div>

    <!-- Table of Dosen -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white text-center">
            <thead>
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">NIP</th>
                    <th class="border px-4 py-2">Kode Dosen</th>
                    <th class="border px-4 py-2">Kelas</th>
                    <th class="border px-4 py-2">Edit</th>
                    <th class="border px-4 py-2">Hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dosen as $ds)
                <tr>
                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2">{{ $ds->name }}</td>
                    <td class="border px-4 py-2">{{ $ds->nip }}</td>
                    <td class="border px-4 py-2">{{ $ds->kode_dosen }}</td>
                    <td class="border px-4 py-2">
                        @if ($ds->kelas)
                        {{ $ds->kelas->name }}
                        @else
                        <span class="text-red-500">Belum ditugaskan</span>
                        @endif
                    </td>
                    <!-- tombol edit -->
                    <td class="border px-4 py-2">
                        <a href="{{ route('manage-dosen.edit', $ds->id) }}">
                            <svg class="w-6 h-6 text-yellow-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('manage-dosen.destroy', $ds->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-2">
                                <svg class="w-6 h-6 text-red-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    // Menampilkan pesan pop-up jika ada session flash
    @if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        confirmButtonText: 'OK',
    });
    @endif
</script>
@endsection