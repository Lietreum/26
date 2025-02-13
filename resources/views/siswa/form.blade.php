<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa</title>
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

    <h1>Form Siswa</h1>
    <form action="{{url('siswa', @$siswa->id)}}" method="POST">
        @csrf

        @if (!empty($siswa))
        @method('PATCH')
        @endif

        <!-- NIS: <input type="text" name="nis" value="{{ old('nis') }}"><br> -->
        Nama Lengkap: <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}"><br>
        Jenis Kelamin : <br>
        <label for="L"><input type="radio" name="jk" id="L" value="L" {{ old('jk') == 'L' ? 'checked' : '' }}>Laki-laki</label><br>
        <label for="P"><input type="radio" name="jk" id="P" value="P" {{ old('jk') == 'P' ? 'checked' : '' }}>Perempuan</label><br>
        Golongan Darah :
        <select name="golongan_darah">
            <option value="">Pilih Golongan Darah</option>
            <option value="A" {{ old('golongan_darah') == 'A' ? 'selected' : '' }}>A</option>
            <option value="B" {{ old('golongan_darah') == 'B' ? 'selected' : '' }}>B</option>
            <option value="AB" {{ old('golongan_darah') == 'AB' ? 'selected' : '' }}>AB</option>
            <option value="O" {{ old('golongan_darah') == 'O' ? 'selected' : '' }}>O</option>
        </select>
        <input type="submit" value="Simpan">
    </form>
</body>

</html>
