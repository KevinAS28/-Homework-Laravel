<html>
    <head>

    </head>
    <body>
        <h2>List Mahasiswa</h2>
        <a href="{{route('mahasiswa_create')}}" class="float-left btn btn-primary">Tambah</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jurusan</th>
            {{-- <th>Action</th> --}}
        </tr>
        @foreach ($mahasiswa as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->jurusan}}</td>
        </tr>
        @endforeach
    </table>
    </body>
</html>