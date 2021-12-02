<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/detail_product.css')}}">
    <title>Document</title>
</head>

<body>
    @if (Session::has('pesan'))
    <div class="alert alert-success">{{ Session::get('pesan') }}</div>

    @endif

    @if(Auth::check() && Auth::user()->level=='admin')
    <p align="right"><a href="{{ route('buku.create') }}">Tambah buku</a></p>
    @endif

    <p align="right"><a class="dropdown-item" href="http://localhost:8000/logout" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
            Logout
        </a></p>

    <form id="logout-form" action="http://localhost:8000/logout" method="POST" class="d-none" type="hidden">
        @csrf
    </form>


    @if ($cari_kw)
    @if (count($data_buku))
    <div class="alert alert-success">
        Ditemukan <strong>{{ count($data_buku) }}</strong>
        data dengan kata <strong>{{ $cari }}</strong>
    </div>
    @else
    <div class="alert alert-warning">
        <h4>Data "{{ $cari }}" tidak ditemukan</h4>
    </div>
    <a href="/buku" class="btn btn-warning">Kembali</a>
    @endif
    @endif

    <form action="{{ route('buku.search') }}" method="get">
        @csrf
        <input type="text" name="kata" class="form-control" placeholder="Cari ..."
            style="width: 30%; display: inline; margin-top: 10px; margin-bottom: 10px; margin-left: 35%; float: left;" />
    </form>
    {{-- <table class="table table-striped" border='3'>
        <thead>
            <tr>
                <th>id</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Harga</th>
                <th>Tgl. Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_buku as $buku) 
                <tr> 
                    <td>{{ ++$no }} </td>
    <td>{{ $buku->judul }} </td>
    <td>{{ $buku->penulis }}</td>

    <td>{{ 'Rp ' . number_format($buku->harga, 0, ',', '.') }}</td>
    <td> {{ $buku->tgl_terbit->format('d/m/Y') }}</td>

    <td> <a href="{{ route('buku.destroy', ['id' => $buku->id]); }}">Hapus</a> <a
            href="{{ route('buku.edit', ['id' => $buku->id]); }}">Edit</a> </td>
    </tr>
    @endforeach
    </tbody>
    </table> --}}

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Buku Table</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>id</th>
                                    <th>Judul Buku</th>
                                    <th>Penulis</th>
                                    <th>Harga</th>
                                    <th>Tgl. Terbit</th>
                                    
                                    <th>Aksi</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_buku as $buku)
                                <tr class="alert" role="alert">
                                    <td scope="row">{{ ++$no }} </td>
                                    <td>{{ $buku->judul }} </td>
                                    <td>{{ $buku->penulis }}</td>

                                    <td>{{ 'Rp ' . number_format($buku->harga, 0, ',', '.') }}</td>
                                    <td> {{ $buku->tgl_terbit->format('d/m/Y') }}</td>

                                    
                                    <td>
                                        @if(Auth::check() && Auth::user()->level=='admin')
                                            <a href="{{ route('buku.destroy', ['id' => $buku->id]) }}">Hapus</a>
                                            <a href="{{ route('buku.edit', ['id' => $buku->id]) }}">Edit</a>
                                        @endif
                                        <div class="action">
                                            <a href="{{ route('buku.love', ['id' => $buku->id]) }}">
                                            <button class="like btn btn-default" type="button"><span
                                                    class="fa fa-heart"></span></button></a>
                                        </div>
                                    </td>
                                    
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
    <h2>Harga sum: {{ $harga_sum }}</h2>
    <div>{{ $data_buku->links() }}</div>
</body>

</html>
