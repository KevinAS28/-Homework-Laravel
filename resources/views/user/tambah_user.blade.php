<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>


    <title>Tambah Data</title>
    <h2>
        <center>Tambah Data User</center>
    </h2>
    <style>
        html,
        body {
            margin: 100;
            color: #000000;
            background-color: #8675d4;
            /* background-image: url("/resources/views/layout/perpus1.jpg") ; */
        }

    </style>

</head>

<body>
    @if (count($errors) > 0)
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama</label><br>
            <input type="text" name="name" class="form-control">
            </br>
            <label>E-mail</label><br>
            <input type="text" name="email" class="form-control">
            </br>
            <label>Password</label><br>
            <input type="text" name="password" class="form-control">
            </br>
            <label>Level</label><br>
            <select name="level" class='form-control'>
                <option value="user">User</option>
                <option value="admin">Admin</option>
              </select>
            </br>
            {{-- <label>Tanggal</label><br>
            <div class="container">

            </div>
            <td>

                <input type ="date" name="tgl_terbit" class="form-control">
                <input type="date" id="tgl_terbit" class="" placeholder="yyyy/mm/dd" name="tgl_terbit" required>
            </td> --}}

            <script type="text/javascript">
                $('.date').datepicker({
                    format: 'mm-dd-yyyy'
                });
            </script>

        </div>
        <button type="submit" class="btn btn-primary">Simpan </button>
        <a href="/user" class="btn btn-light">Batal</a>

</body>

</html>
