<?php
use App\Models\Buku;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    <title>Document</title>
</head>

<body>
    @if (Session::has('pesan'))
        <div class="alert alert-success">{{ Session::get('pesan') }}</div>

    @endif

    @if(Auth::check() && Auth::user()->level=='admin')
        <p align="right"><a href="{{ route('galeri.create') }}">Tambah galeri</a></p>
    @endif

    <p align="right"><a class="dropdown-item" href="http://localhost:8000/logout" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
            Logout
        </a></p>

    <form id="logout-form" action="http://localhost:8000/logout" method="POST" class="d-none" type="hidden">
        @csrf
    </form>

    {{-- @if ($cari_kw)
        @if (count($data_))
            <div class="alert alert-success">
                Ditemukan <strong>{{ count($data_galeri) }}</strong>
                data dengan kata <strong>{{ $cari }}</strong>
            </div>
        @else
            <div class="alert alert-warning">
                <h4>Data "{{ $cari }}" tidak ditemukan</h4>
            </div>
            <a href="/user" class="btn btn-warning">Kembali</a>
        @endif
    @endif
 --}}
    {{-- <form action="{{ route('user.search') }}" method="get">
        @csrf
        <input type="text" name="kata" class="form-control" placeholder="Cari ..."
            style="width: 30%; display: inline; margin-top: 10px; margin-bottom: 10px; margin-left: 35%; float: left;" />
    </form> --}}

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Galeri Table</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>no</th>
                                    <th>id</th>
                                    <th>Nama Galeri</th>
                                    <th>Nama Buku</th>
                                    <th>Foto</th>
                                    @if(Auth::check() && Auth::user()->level=='admin')
                                        <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_galeri as $data)
                                    <tr class="alert" role="alert">
                                        <td scope="row">{{ ++$no }} </td>
                                        <td>{{ $data->id }} </td>
                                        <td>{{ $data->nama_galeri}}</td>
                                        <td>{{ Buku::find( $data->id_buku)->judul }}</td> 
                                        {{-- fix materi --}}
                                        <td><img src="{{ asset('thumb/'.$data->foto)}}" alt="" style="width: 100px;"></td>

                                        @if(Auth::check() && Auth::user()->level=='admin')
                                            <td>
                                                <form action="{{route('galeri.destroy', $data->id)}}" method="POST">
                                                    @csrf
                                                    <a href="{{route('galeri.edit', $data->id)}}" class="btn btn-info">
                                                        <i class="fa fa-pencil-alt"></i>
                                                        Edit
                                                    </a>
                                                    <button class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')">
                                                        <i class="fa fa-times"></i>Hapus
                                                    </button>
                                                </form>
                                                {{-- <a href="{{ route('user.destroy', ['id' => $user->id]) }}">Hapus</a>
                                                <a href="{{ route('user.edit', ['id' => $user->id]) }}">Edit</a>  --}}
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/popper.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>


    <h2>Row count: {{ $row_count }}</h2>
    {{-- <h2>Harga sum: {{ $harga_sum }}</h2> --}}
    <div>{{ $data_galeri->links() }}</div>
</body>

</html>
