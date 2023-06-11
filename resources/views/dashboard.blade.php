{{-- @extends('layouts.header') --}}
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sistem Manajemen Parkir Fasilkom Unej</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/4579/bootstrap-table.css'><link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
<!-- partial:index.partial.html -->
<body>
  <div id='wrapper'>
		<nav class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
			<div class='navbar-header'>
				<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-hamburger-delicious'>
					<span class='sr-only'>Toggle navigation</span>
					<span class='icon-bar'></span>
					<span class='icon-bar'></span>
					<span class='icon-bar'></span>
				</button>
				<a class='navbar-brand' >Parkir Fasilkom</a>
			</div>

			<div class='collapse navbar-collapse navbar-hamburger-delicious'>
				<ul class='nav navbar-nav side-nav fadeInLeft'>
					<li class='toggle-nav visible-lg visible-md visible-sm'><a><i class='fa fa-lg fa-arrow-left'></i>Hide Menu</a></li>
					{{-- <li class='dashboard'><a href='#'><i class='fa fa-lg fa-dashboard'></i>Dash</a></li> --}}
					<li class='active docs'><a href='#docs'><i class='fa fa-lg fa-folder-open'></i>Data Parkir</a></li>
					<li class='admin'><a href='#admin'><i class='fa fa-lg fa-user'></i>Admin</a></li>
					<li class='divider'><hr></li>

				</ul>
				<ul class='nav navbar-nav navbar-right navbar-user'>
					<li class='dropdown user-dropdown'>
							<a href='#' class='dropdown-toggle' data-toggle='dropdown'><span class="js-user-name">Ryan Gill</span><b class='caret'></b></a>
							<ul class='dropdown-menu'>
									{{-- <li class='settings'><a href='#settings'><i class='fa fa-lg fa-gear'></i> Settings</a></li> --}}
									<li class='settings'><a href='#settings'><i class='fa fa-lg fa-gear'></i> Logout</a></li>
							</ul>
					</li>
				</ul>
			</div>

		</nav>

		<div id='page-wrapper'>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h2>Data Parkir</h2>
            <hr />
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-xs-12 js-content">
            <div class="docs-table">
				<button id="tombolTambah">Tambah</button>

				@if(session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
				@endif
				
				<!-- Tampilan Pesan Error -->
				@if(session('error'))
				<div class="alert alert-danger">
					{{ session('error') }}
				</div>
				@endif
				
				<table data-toggle="table" data-show-toggle="true" data-show-columns="true" data-search="true" data-striped="true">
					<thead>
						<tr>
							<th data-field="Type">Plat Nomor</th>
							<th data-field="Name">Jenis Kendaraan</th>
							<th data-field="Description">Admin</th>
							<th data-field="">Waktu Masuk</th>
							<th data-field="aksi">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($parkir as $item)
							<tr>
								<td>{{ $item->plat_nomor }}</td>
								<td>{{ $item->jenis_kendaraan->jenis }}</td>
								<td>{{ $item->admin->nama }}</td>
								<td>{{ $item->created_at->setTimezone('Asia/Jakarta')->format('d-m-Y H:i:s') }} WIB</td>


							</tr>
						@endforeach
					</tbody>
				</table>
				
            </div>
					</div>
				</div>
			</div>

		</div>

	</div>
</body>

<div id="modalTambah" class="modal">
	<div class="modal-content">
	  <span class="close">&times;</span>
	  <form action="{{ route('tambahParkir') }}" method="POST">
		@csrf
		<!-- Tambahkan elemen input atau field form yang diinginkan -->
		<label for="plat_nomor">Plat Nomor:</label>
		<input type="text" id="plat_nomor" name="plat_nomor" required><br><br>

		<label for="jenis_kendaraan">Jenis Kendaraan:</label>
		<select id="jenis_kendaraan" name="jenis_kendaraan" required>
			<option disabled value>Pilih Jenis Kendaraan</option>
			@foreach ($jenis_kendaraan as $item)
			<option value="{{ $item->id }}">{{ $item->jenis }}</option>		
			@endforeach

		</select><br><br>

		<input type="submit" value="Simpan">
	  </form>
	</div>
  </div>
<!-- partial -->
<script>

    var tombolTambah = document.getElementById("tombolTambah");
    var modal = document.getElementById("modalTambah");
    var formElement = document.getElementById("formElement");
    var closeButton = document.getElementsByClassName("close")[0];

    // Saat tombol "Tambah" ditekan, tampilkan modal
    tombolTambah.onclick = function() {
      modal.style.display = "block";
    }

	formElement.action = "{{ route('tambahParkir') }}"

    // Saat tombol "Tutup" atau area di luar modal ditekan, sembunyikan modal
    closeButton.onclick = function() {
      modal.style.display = "none";
    }

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/4579/bootstrap.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/4579/bootstrap-table.js'></script><script  src="{{ asset('js/script.js') }}"></script>

</body>
</html>