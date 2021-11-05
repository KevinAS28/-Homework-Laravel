<html>
    <head>

    </head>
    <body>
        <form action="{{route('mahasiswa_store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama mahasiswa</label>
                <input type ="text" name="nama" class="form-control" placeholder=".....">
                </br>
                <label>Jurusan</label>
                <input type ="text" name="jurusan" class="form-control" placeholder=".....">
                </br>
                </br>
            </div>
            <button type="submit" class="btn btn-primary">Simpan </button>
    </body>
</html>