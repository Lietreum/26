<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas</title>
</head>

<body>

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Perhatian!</strong>
        <br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h1>Form Kelas</h1>
    <form action="{{url('kelas', @$kelas->id)}}" method="POST">
        @csrf

        @if (!empty($kelas))
        @method('PATCH')
        @endif

        Nama Kelas: <input type="text" name="nama_kelas" value="{{ old('nama_kelas', @$kelas->nama_kelas) }}"><br>
        Jurusan: <input type="text" name="jurusan" value="{{ old('jurusan', @$kelas->jurusan) }}"><br>
        Lokasi Ruangan: <input type="text" name="lokasi_ruangan" value="{{ old('lokasi_ruangan', @$kelas->lokasi_ruangan) }}"><br>
        Nama Wali Kelas: <input type="text" name="nama_wali_kelas" value="{{ old('nama_wali_kelas', @$kelas->nama_wali_kelas) }}"><br>
        <input type="submit" value="Simpan">
    </form>
</body>

</html>
