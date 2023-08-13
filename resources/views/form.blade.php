<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Indoregion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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
                            <select class="form-select" aria-label="Default select example">
                                <option selected>--Pilih Provinsi--</option>

                                @foreach ($provinces as $provinsi)
                                    <option value="">{{ $provinsi->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="" class="mb-2">Kabupaten</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>--Pilih Kabupaten--</option>

                                @foreach ($regencies as $kabupaten)
                                    <option value="">{{ $kabupaten->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="" class="mb-2">Kecamatan</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>--Pilih Kecamatan--</option>
                                @foreach ($districts as $kecamatan)
                                    <option value="">{{ $kecamatan->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="" class="mb-2">Desa</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>--Pilih Desa--</option>
                                @foreach ($villages as $desa)
                                    <option value="">{{ $desa->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
