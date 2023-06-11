{{-- @extends('layouts.header') --}}
{{-- @dd(auth()->check()) --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sistem Manajemen Parkir Fasilkom Unej</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/4579/bootstrap-table.css'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fungsi untuk memperbarui data sisa parkir
            function updateSisaParkir() {
                $.ajax({
                    url: "{{ route('getSisaParkir') }}",
                    type: 'GET',
                    success: function(response) {
                        // Update elemen HTML dengan data sisa parkir yang diperbarui
                        $("#sisaParkirMotor").text(response.sisaParkirMotor);
                        $("#sisaParkirMobil").text(response.sisaParkirMobil);

                        // Simpan data sisa parkir ke sessionStorage
                        sessionStorage.setItem('sisaParkirMotor', response.sisaParkirMotor);
                        sessionStorage.setItem('sisaParkirMobil', response.sisaParkirMobil);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            }

            // Panggil fungsi updateSisaParkir saat halaman pertama kali dimuat
            updateSisaParkir();

            // Panggil fungsi updateSisaParkir secara periodik setiap 5 detik
            setInterval(updateSisaParkir, 5000);

            // Ambil data sisa parkir dari sessionStorage saat halaman direfresh
            if (sessionStorage.getItem('sisaParkirMotor') !== null) {
                $("#sisaParkirMotor").text(sessionStorage.getItem('sisaParkirMotor'));
            }
            if (sessionStorage.getItem('sisaParkirMobil') !== null) {
                $("#sisaParkirMobil").text(sessionStorage.getItem('sisaParkirMobil'));
            }
        });
    </script>


    <style>
        .modal-content {
            max-width: 400px;
            /* Atur lebar maksimal */
            margin: 30 auto;
            /* Pusatkan di tengah */
            padding: 20px;
            background-color: #f1f1f1;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .yes-button,
        .no-button {
            padding: 15px 30px;
            font-size: 14px;
            border-radius: 15px;
            margin: 0 50px;
            /* Tambahkan margin horizontal */
        }

        .yes-button {
            background-color: #4CAF50;
            color: white;
        }

        .no-button {
            background-color: #f44336;
            color: white;
        }

        /* button hapus */
        .btn {
            border-radius: 10px;
            /* Tambahkan sudut melengkung */
        }

        .btn-danger {
            /* Ganti warna latar belakang dan warna teks tombol sesuai kebutuhan */
            background-color: #f44336;
            color: white;
        }

        .btn-sm {
            /* Atur ukuran font dan padding tombol sesuai kebutuhan */
            font-size: 14px;
            padding: 5px 10px;
        }

        th {
            text-align: center;
        }

        tr {
            text-align: center;
        }

        #tombolTambah {
            margin-bottom: 10px;
        }

        .alert {
            margin-bottom: 10px;
        }


        /* tambah data */
        .form-input {
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            border-radius: 10px;
        }

        .form-container {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .button-container {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>

    <!-- partial:index.partial.html -->

    <body>

        <div id='wrapper'>
            <nav class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
                <div class='navbar-header'>
                    <button type='button' class='navbar-toggle' data-toggle='collapse'
                        data-target='.navbar-hamburger-delicious'>
                        <span class='sr-only'>Toggle navigation</span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                    </button>
                    <a class='navbar-brand'>Parkir Fasilkom</a>
                </div>

                <div class='collapse navbar-collapse navbar-hamburger-delicious'>
                    <ul class='nav navbar-nav side-nav fadeInLeft'>
                        <li class='toggle-nav visible-lg visible-md visible-sm'><a><i
                                    class='fa fa-lg fa-arrow-left'></i>Hide Menu</a></li>
                        {{-- <li class='dashboard'><a href='#'><i class='fa fa-lg fa-dashboard'></i>Dash</a></li> --}}
                        <li class='active docs'><a href='#docs'><i class='fa fa-lg fa-folder-open'></i>Data Parkir</a>
                        </li>
                        <li class='admin'><a href='#admin'><i class='fa fa-lg fa-user'></i>Admin</a></li>
                        <li class='divider'>
                            <hr>
                        </li>

                    </ul>
                    <ul class='nav navbar-nav navbar-right navbar-user'>
                        <li class='dropdown user-dropdown'>

                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'><span
                                    class="js-user-name">{{ auth()->user()->nama }}</span><b class='caret'></b></a>
                            <ul class='dropdown-menu'>
                                {{-- <li class='settings'><a href='#settings'><i class='fa fa-lg fa-gear'></i> Settings</a></li> --}}
                                <li class='settings'><a href='{{ route('logout') }}'><i
                                            class='fas fa-sign-out-alt fa-lg'></i> Logout</a></li>

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
                            <p>Sisa Jumlah Parkir Motor: <span id="sisaParkirMotor"></span></p>
                            <p>Sisa Jumlah Parkir Mobil: <span id="sisaParkirMobil"></span></p>
                            <hr />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12 js-content">
                            <div class="docs-table">
                                <button class="btn btn-primary btn-lg" id="tombolTambah">Tambah</button>
                                {{-- <button id="tombolCek">cek</button> --}}

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <!-- Tampilan Pesan Error -->
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <table data-toggle="table" data-show-toggle="true" data-show-columns="true"
                                    data-search="true" data-striped="true">
                                    <thead>
                                        <tr>
                                            <th data-field="No">No</th>
                                            <th data-field="Plat Nomor">Plat Nomor</th>
                                            <th data-field="Jenis Kendaraan">Jenis Kendaraan</th>
                                            <th data-field="Admin">Admin</th>
                                            <th data-field="Waktu Masuk">Waktu Masuk</th>
                                            <th data-field="Aksi">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($parkir as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->plat_nomor }}</td>
                                                <td>{{ $item->jenis_kendaraan->jenis }}</td>
                                                <td>{{ $item->admin->nama }}</td>
                                                <td>{{ $item->created_at->setTimezone('Asia/Jakarta')->format('d-m-Y H:i:s') }}
                                                    WIB</td>
                                                <td>
                                                    <div
                                                        style="display: flex; justify-content: center; align-items: center; height: 100%;">
                                                        <button class="btn btn-success btn-sm"
                                                            onclick="showModal('{{ $item->id }}')">CEK</button>
                                                    </div>
                                                </td>

                                            </tr>
                                            <div id="modalCek-{{ $item->id }}" class="modal">
                                                <div class="modal-content">
                                                    <span class="close"
                                                        onclick="hideModal('{{ $item->id }}')">&times;</span>
                                                    <h2>Konfirmasi</h2>
                                                    <p>Apakah Anda yakin ingin menghapus data parkir ini?</p>
                                                    <div class="button-container">
                                                        <button class="yes-button"
                                                            onclick="window.location.href='{{ route('hapusParkir', $item->id) }}'">Iya</button>
                                                        <button class="no-button"
                                                            onclick="hideModal('{{ $item->id }}')">Tidak</button>
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>

                                </table>
                                {{-- <span id="sisaParkirMotor">Sisa Jumlah Parkir Motor: </span><br>
				<span id="sisaParkirMobil">Sisa Jumlah Parkir Mobil: </span><br> --}}

                                <!-- Tampilan untuk menampilkan sisa jumlah parkir -->
                                {{-- @if (session('sisaParkirMotor'))
                                    <p>Sisa Jumlah Parkir Motor: {{ session('sisaParkirMotor') }}</p>
                                @endif

                                @if (session('sisaParkirMobil'))
                                    <p>Sisa Jumlah Parkir Mobil: {{ session('sisaParkirMobil') }}</p>
                                @endif --}}

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </body>

    <div id="modalTambah" class="modal">
        <div class="modal-content">
            <span class="close" onclick="hideModal1()">&times;</span>
            <form action="{{ route('tambahParkir') }}" method="POST" class="form-container">
                @csrf
                <!-- Tambahkan elemen input atau field form yang diinginkan -->
                <div class="form-group">
                    <label for="plat_nomor">Plat Nomor:</label>
                    <input type="text" id="plat_nomor" name="plat_nomor" placeholder="Masukkan Plat Nomor Kendaraan"
                        autofocus required class="form-input rounded">
                </div>

                <div class="form-group">
                    <label for="jenis_kendaraan">Jenis Kendaraan:</label>
                    <select id="jenis_kendaraan" name="jenis_kendaraan" required class="form-input rounded">
                        <option disabled value>Pilih Jenis Kendaraan</option>
                        @foreach ($jenis_kendaraan as $item)
                            <option value="{{ $item->id }}">{{ $item->jenis }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="button-container">
                    <input class="btn btn-primary btn-lg rounded" type="submit" value="Simpan">
                </div>
            </form>
        </div>


    </div>



    <!-- partial -->
    <script>
        // Fungsi untuk mengambil dan memperbarui sisa jumlah parkir
        //  function updateSisaParkir() {
        //     $.ajax({
        //         url: '{{ route('getSisaParkir') }}',
        //         type: 'GET',
        //         dataType: 'json',
        //         success: function(response) {
        //             // Memperbarui tampilan sisa jumlah parkir motor
        //             $('#sisaParkirMotor').text('Sisa Jumlah Parkir Motor: ' + response.sisaParkirMotor);
        //             // Memperbarui tampilan sisa jumlah parkir mobil
        //             $('#sisaParkirMobil').text('Sisa Jumlah Parkir Mobil: ' + response.sisaParkirMobil);
        //         },
        //         error: function(xhr, status, error) {
        //             console.error(error);
        //         }
        //     });
        // }


        // // Panggil fungsi updateSisaParkir saat halaman selesai dimuat
        // $(document).ready(function() {
        //     updateSisaParkir();
        // });


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

        function hideModal1() {
            modal.style.display = "none";
        }












        function showModal(itemId) {
            var modal = document.getElementById('modalCek-' + itemId);
            modal.style.display = 'block';
        }

        function hideModal(itemId) {
            var modal = document.getElementById('modalCek-' + itemId);
            modal.style.display = 'none';
        }

        function hapusData(itemId) {
            // Lakukan tindakan penghapusan data sesuai dengan itemId yang dipilih
            console.log('Hapus data dengan ID: ' + itemId);
            // Anda dapat mengirim permintaan AJAX ke server untuk menghapus data atau menggunakan metode yang sesuai dengan aplikasi Anda
            hideModal(itemId); // Sembunyikan modal setelah menghapus data
        }
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/4579/bootstrap.min.js'></script>
    <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/4579/bootstrap-table.js'></script>
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
