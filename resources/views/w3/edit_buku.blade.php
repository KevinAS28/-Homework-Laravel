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
		<h2> <center>EDIT DATA USER</center> </h2>
		@foreach($user as $p)
		<div class="container">
			<div class="card">
				<div class="card-header bg-info text-white">EDIT DATA</div>
				<div class="card-body">
					<form action="/user/update" method="POST" >
						@csrf  
						<div class="form-group">
							@method('PUT')
							
							{{-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> --}}
							<input type="hidden" name="id" value="{{ $p->id }}" > 
							Judul<br/>
							<input type="text" required="required" name="judul" value="{{ $p->judul }}" class="form-control"> <br/><br/>
							Penulis<br/>
							<input type="text" required="required" name="penulis" value="{{ $p->penulis }}" class="form-control"> <br/><br/>
							Harga<br/>
							<input type="number" required="required" name="harga" value="{{ $p->harga }}" class="form-control"> <br/><br/>
							Tanggal Terbit <br/>
							<input type="date" required="required" name="tgl_terbit" value="{{ $p->tgl_terbit }}" class="form-control"> <br/><br/>
							<input type="submit" class="btn btn-primary"  value="Simpan Data">
			
						</div>
			
						
					</form>

				</div>
			</div>
		</div>
		
		@endforeach
			
	
	</body>
</html>