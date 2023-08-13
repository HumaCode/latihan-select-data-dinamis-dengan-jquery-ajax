<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Indoregion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 m-auto mt-3">
                <div class="card">
                    <h5 class="card-header">FORM</h5>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="" class="mb-2">Provinsi</label>
                            <select class="form-select provinsi" aria-label="Default select example" name="provinsi"
                                id="provinsi">
                                <option selected>--Pilih Provinsi--</option>

                                @foreach ($provinces as $provinsi)
                                    <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                                @endforeach


                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="" class="mb-2">Kabupaten</label>
                            <select class="form-select kabupaten" aria-label="Default select example" name="kabupaten"
                                id="kabupaten">

                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="" class="mb-2">Kecamatan</label>
                            <select class="form-select kecamatan" aria-label="Default select example" name="kecamatan"
                                id="kecamatan">

                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="" class="mb-2">Desa</label>
                            <select class="form-select desa" aria-label="Default select example" name="desa"
                                id="desa">

                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.provinsi').select2();
            $('.kabupaten').select2();
            $('.kecamatan').select2();
            $('.desa').select2();
        })


        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
        })

        $(function() {
            // ambil id provinsi
            $('#provinsi').on('change', function() {
                let id_provinsi = $('#provinsi').val();

                // kirim id provinsi ke controller
                $.ajax({
                    type: "POST",
                    url: "{{ route('getkabupaten') }}",
                    data: {
                        id_provinsi: id_provinsi
                    },
                    cache: false,
                    success: function(msg) {
                        // jika sukses tampilkan data kabupaten berdasarkan id provinsi yang dipilih
                        $('#kabupaten').html(msg);
                        $('#kecamatan').html('');
                        $('#desa').html('');
                    },
                    error: function(data) {
                        console.log('error : ', data);
                    }
                });
            })


            // ambil id kabupaten
            $('#kabupaten').on('change', function() {
                let id_kabupaten = $('#kabupaten').val();

                // kirim id kabupaten ke controller
                $.ajax({
                    type: "POST",
                    url: "{{ route('getkecamatan') }}", // untuk mendapatkan data kecamatan berdasarkan id kabupaten 
                    data: {
                        id_kabupaten: id_kabupaten
                    },
                    cache: false,
                    success: function(msg) {
                        // jika sukses tampilkan data kecamatan berdasarkan id kabupaten yang dipilih
                        $('#kecamatan').html(msg);
                        $('#desa').html('');
                    },
                    error: function(data) {
                        console.log('error : ', data);
                    }
                });
            })

            // ambil id kecamatan
            $('#kecamatan').on('change', function() {
                let id_kecamatan = $('#kecamatan').val();

                // kirim id kecamatan ke controller
                $.ajax({
                    type: "POST",
                    url: "{{ route('getdesa') }}", // untuk mendapatkan data desa berdasarkan id kabupaten 
                    data: {
                        id_kecamatan: id_kecamatan
                    },
                    cache: false,
                    success: function(msg) {
                        // jika sukses tampilkan data desa berdasarkan id kecamatan yang dipilih
                        $('#desa').html(msg);
                    },
                    error: function(data) {
                        console.log('error : ', data);
                    }
                });
            })
        })
    </script>
</body>

</html>
