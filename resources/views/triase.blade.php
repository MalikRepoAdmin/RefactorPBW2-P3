<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $instansi ?? 'Unit Gawat Darurat SehatNusantara' }}</title>
</head>
<body>
    <h2>Sistem Penilaian Triase - {{ $instansi ?? 'Unit Gawat Darurat SehatNusantara' }}</h2>
    
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('triase.proses') }}">
        @csrf 
        <label>Detak Jantung (BPM):</label>
        <input type="number" name="detak_jantung" value="{{ old('detak_jantung', $detak_jantung ?? '') }}" required><br>
        <label>Tingkat Kesadaran Pasien:</label>
        <select name="kesadaran">
            <option value="baik" {{ (old('kesadaran', $kesadaran ?? '') == 'baik') ? 'selected' : '' }}>Sadar Penuh (Alert)</option>
            <option value="penurunan" {{ (old('kesadaran', $kesadaran ?? '') == 'penurunan') ? 'selected' : '' }}>Mengantuk / Tidak Sadar</option>
        </select><br>
        <button type="submit">Evaluasi Tingkat Darurat</button>
    </form>

    @if(isset($kategori_triase))
        <hr>
        <h3 style="color: {{ $warna_label }};">{{ $kategori_triase }}</h3>
    @endif
</body>
</html>
