<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<link rel="stylesheet" href="{{asset('/css/buku_galeri.css')}}">
{{-- <link rel="stylesheet" href="{{asset('/css/buku_galery1.css')}}"> --}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
<script>
    $(document).ready(function() {
        $('#lightgallery').lightGallery();
    });
</script>

<div class="lightbox-gallery">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Galeri Buku Kevin</h2>
            <p class="text-center">PPWA2</p>
        </div>
        
        <div id="lightgallery" class="row photos lightGallery">        

            @foreach ($all_buku as $buku)
                <div class="col-sm-6 col-md-3 col-lg-4 item image-tile" data-abc="true">
                    <div class="card" style="width: 20rem;">
                        <a href="{{$buku->foto}}" data-lightbox="photos">
                            <img class="img-fluid" src="{{$buku->foto}}">
                        </a>
        
                        <div class="card-body">
                            <h5 class="card-title text-primary" >{{$buku->judul}}</h5>
                            <p class="card-text" style="color: black;">
                                {{$buku->judul}}<br/>
                                Penulis: {{$buku->penulis}}<br/>
                                Tgl terbit: {{$buku->tgl_terbit}}<br/>
                                Harga: {{$buku->harga}}<br/>
                                
                            </p>
                            <a href="#" class="btn btn-outline-dark">Beli</a>
                        </div>
                    </div>    
                </div>                
            @endforeach
            
            
            {{-- <div class="col-sm-6 col-md-4 col-lg-3 item image-tile" data-abc="true"><a href="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg" data-lightbox="photos"><img class="img-fluid" src="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item image-tile" data-abc="true"><a href="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg" data-lightbox="photos"><img class="img-fluid" src="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item image-tile" data-abc="true"><a href="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg" data-lightbox="photos"><img class="img-fluid" src="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item image-tile" data-abc="true"><a href="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg" data-lightbox="photos"><img class="img-fluid" src="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item image-tile" data-abc="true"><a href="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg" data-lightbox="photos"><img class="img-fluid" src="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item image-tile" data-abc="true"><a href="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg" data-lightbox="photos"><img class="img-fluid" src="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item image-tile" data-abc="true"><a href="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg" data-lightbox="photos"><img class="img-fluid" src="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item image-tile" data-abc="true"><a href="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg" data-lightbox="photos"><img class="img-fluid" src="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item image-tile" data-abc="true"><a href="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg" data-lightbox="photos"><img class="img-fluid" src="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item image-tile" data-abc="true"><a href="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg" data-lightbox="photos"><img class="img-fluid" src="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item image-tile" data-abc="true"><a href="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg" data-lightbox="photos"><img class="img-fluid" src="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item image-tile" data-abc="true"><a href="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg" data-lightbox="photos"><img class="img-fluid" src="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item image-tile" data-abc="true"><a href="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg" data-lightbox="photos"><img class="img-fluid" src="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item image-tile" data-abc="true"><a href="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg" data-lightbox="photos"><img class="img-fluid" src="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item image-tile" data-abc="true"><a href="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg" data-lightbox="photos"><img class="img-fluid" src="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item image-tile" data-abc="true"><a href="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg" data-lightbox="photos"><img class="img-fluid" src="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item image-tile" data-abc="true"><a href="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg" data-lightbox="photos"><img class="img-fluid" src="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item image-tile" data-abc="true"><a href="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg" data-lightbox="photos"><img class="img-fluid" src="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item image-tile" data-abc="true"><a href="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg" data-lightbox="photos"><img class="img-fluid" src="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg"></a></div>
            <div class="col-sm-6 col-md-4 col-lg-3 item image-tile" data-abc="true"><a href="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg" data-lightbox="photos"><img class="img-fluid" src="https://img.freepik.com/free-vector/books-stack-realistic_1284-4735.jpg?size=338&ext=jpg"></a></div> --}}
        </div>
    </div>
    <div style="text-align: center">{{ $all_buku->links() }}</div>        
</div>




{{-- 
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.0/css/lightgallery.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/lightgallery-all.min.js"></script>
<script>
    $(document).ready(function() {
        $('#lightgallery').lightGallery();
    });
</script>

<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">light Gallery</h4>
                        <p class="card-text"> Click on any image to open in lightbox gallery </p>
                        <div id="lightgallery" class="row lightGallery">
                            <a href="https://i.imgur.com/EEguU02.jpg" class="image-tile" data-abc="true">
                                <img src="https://i.imgur.com/EEguU02.jpg" alt="image small">
                            </a>
                            <a href="https://i.imgur.com/Uv2Yqzo.jpg" class="image-tile" data-abc="true">
                                <img src="https://i.imgur.com/Uv2Yqzo.jpg" alt="image small"></a>
                            <a href="https://i.imgur.com/xbTAITF.jpg" class="image-tile" data-abc="true">
                                <img src="https://i.imgur.com/xbTAITF.jpg" alt="image small"></a>
                            <a href="https://i.imgur.com/EEguU02.jpg" class="image-tile" data-abc="true">
                                <img src="https://i.imgur.com/EEguU02.jpg"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

</body>
</html>