<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anda</title>
    
</head>
<body>
    <!-- @session('success') -->
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        <!-- @endsession -->

    <!-- @session('error') -->
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        <!-- @endsession -->

    <table border="1">
        <caption>Ini adalah judul</caption>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Jenis Kelamin</td>
            <td>Golongan Darah</td>
            <td>Aksi</td>
        </tr>
        @foreach ($siswa as $row)
        <tr>
            <td>{{ isset($i) ? ++$i : $i = 1 }}</td>
            <td>{{ $row->nama_lengkap }}</td>
            <td>{{ $row->jk }}</td>
            <td>{{ $row->golongan_darah }}</td>
            <td><a href="{{url('/siswa/edit/'. $row->id)}}">Edit</a></td>
            <td>
                <form action="{{url('/siswa', $row->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <br>
    <form action="{{ url('siswa/create') }}">
        <button type="submit">Tambah Data</button>
    </form>
</body>
</html>
