<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $instansi ?? 'Unit Gawat Darurat SehatNusantara' }}</title>
</head>
<body>
    <h2>Sistem Penilaian Traise - {{ $instansi ?? 'Unit Gawat Darurat SehatNusantara' }}</h2>
    
    <form method="POST" action="{{ url('/traise') }}">
        @csrf 

        <label>Detak Jantung (BPM):</label>
        <input type="number" name="detak_jantung" required><br>
        <label>Tingkat Kesadaran Pasien:</label>
        <select name="kesadaran">
            <option value="baik">Sadar Penuh (Alert)</option>
            <option value="penurunan">Mengantuk / Tidak Sadar</option>
        </select><br>
        <button type="submit">Evaluasi Tingkat Darurat</button>
    </form>

    @if(isset($kategori_traise))
        <hr>
        <h3 style="color: {{ $warna_label }};">{{ $kategori_traise }}</h3>
    @endif
</body>
</html>