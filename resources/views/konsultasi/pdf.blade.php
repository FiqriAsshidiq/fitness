<!DOCTYPE html>
<html>
<head>
    <title>Hasil Konsultasi</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Hasil Konsultasi Latihan Fitness</h2>

    <p><strong>Nama:</strong> {{ $konsultasi->user->name }}</p>

    @if($konsultasi->rekomendasi)
        <h3>Rekomendasi:</h3>
        <ul>
            <li><strong>Kode:</strong> {{ $konsultasi->rekomendasi->kode }}</li>
            <li><strong>Fokus:</strong> {{ $konsultasi->rekomendasi->fokus }}</li>
            <li><strong>Metode:</strong> {{ $konsultasi->rekomendasi->metode_latihan }}</li>
            <li><strong>Keterangan:</strong> {{ $konsultasi->rekomendasi->keterangan }}</li>
        </ul>

        <h4>Latihan yang Direkomendasikan:</h4>
        <ul>
            @forelse($konsultasi->rekomendasi->latihan as $latihan)
                <li>{{ $latihan->kode }} - {{ $latihan->nama_teknik }}</li>
            @empty
                <li><i>Tidak ada data latihan terkait.</i></li>
            @endforelse
        </ul>
    @else
        <p><strong>Tidak ditemukan rekomendasi yang sesuai.</strong></p>
    @endif
</body>
</html>
