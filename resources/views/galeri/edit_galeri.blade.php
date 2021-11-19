<?php
use App\Models\Buku;
?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<html>


	<head>
		<title> Edit</title>
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
		<style>
			html, body {
				margin: 300;
				color: #000000;
				background-color: #ffffff;
				/* background-image: url("/resources/views/layout/perpus1.jpg") ; */
			}
		</style>
	</head>
	<body>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
		<h2> <center>EDIT DATA GALERI</center> </h2>
		{{-- @foreach($user as $p) --}}
		<div class="container">
			<div class="card">
				<div class="card-header bg-info text-white">EDIT DATA</div>
				<div class="card-body">
					<form action="/galeri/update" method="POST" enctype="multipart/form-data">
						@csrf  
						<div class="form-group">
							{{-- @method('PUT') --}}
							
							{{-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> --}}
							{{-- <input type="hidden" name="id" value="{{ $galeri->id }}" > 
							Judul<br/>
							<input type="text" required="required" name="judul" value="{{ $galeri->judul }}" class="form-control"> <br/><br/>
							Penulis<br/>
							<input type="text" required="required" name="penulis" value="{{ $galeri->penulis }}" class="form-control"> <br/><br/>
							Harga<br/>
							<input type="number" required="required" name="harga" value="{{ $galeri->harga }}" class="form-control"> <br/><br/>
							Tanggal Terbit <br/>
							<input type="date" required="required" name="tgl_terbit" value="{{ $galeri->tgl_terbit }}" class="form-control"> <br/><br/>
							<input type="submit" class="btn btn-primary"  value="Simpan Data"> --}}
                            {{-- <h1>{{var_dump($galeri[0]->id)}}</h1> --}}
                            
							<input type="hidden" name="id" value="{{ $galeri->id }}" > 

							<label>Nama Galeri</label><br>
							<input type="text" name="nama_galeri" class="form-control" value="{{ $galeri->nama_galeri }}">
							</br>

							
                            <div class="form-group form-control">
                                <label for="id_buku">Buku</label>
                                <select name="id_buku" class="form-control" value="{{ Buku::find( $galeri->id_buku)->judul }}">
                                    <option value="" selected>Pilih Buku</option>
                                    @foreach ($buku as $data)
                                        <option value="{{ $data->id }}">
                                            {{ $data->judul }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
							</br>

							<label>Keterangan</label><br>
							<input type="text" name="keterangan" class="form-control" value="{{ $galeri->keterangan }}">
							</br>

                            <div class="form-group">
                                <label for="foto">Upload Foto</label>
                                <input type="file" class="form-control" name="foto">
                            </div>
                            <br/>
							{{-- <label>Level</label><br>
							<select name="level" class='form-control' value="{{ $galeri->level }}">
								<option value="user">User</option>
								<option value="admin">Admin</option>
							  </select>
							</br> --}}

							<input type="submit" class="btn btn-primary"  value="Simpan Data">
						</div>
			
						
					</form>

				</div>
			</div>
		</div>
		
		{{-- @endforeach --}}
			
	
	</body>
</html>