<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas</title>
</head>
<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table border="1">
        <caption>Daftar Kelas</caption>
        <tr>
            <td>No</td>
            <td>Nama Kelas</td>
            <td>Jurusan</td>
            <td>Lokasi Ruangan</td>
            <td>Nama Wali Kelas</td>
            <td>Aksi</td>
        </tr>
        @foreach ($kelas as $row)
        <tr>
            <td>{{ isset($i) ? ++$i : $i = 1 }}</td>
            <td>{{ $row->nama_kelas }}</td>
            <td>{{ $row->jurusan }}</td>
            <td>{{ $row->lokasi_ruangan }}</td>
            <td>{{ $row->nama_wali_kelas }}</td>
            <td><a href="{{url('/kelas/edit/'. $row->id)}}">Edit</a></td>
            <td>
                <form action="{{url('/kelas', $row->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <br>
    <form action="{{ url('kelas/create') }}">
        <button type="submit">Tambah Data</button>
    </form>
</body>
</html>
