<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tambah Mahasiswa</title>
  </head>
  <body>
      <div class="container">
          <div class="row mt-5 justify-content-center">
              <div class="col-md-8 text-center">
                  <h1>Tambah data Mahasiswa</h1>
              </div>
          </div>
          <div class="row mt-5 justify-content-center">
              <div class="col-md-8">

                <?php echo form_open_multipart();?>
                    <div class="row mb-3">
                        <label for="nim" class="col-sm-3 col-form-label">Nim</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="nim" name="nim">
                        <small class="form-text text-danger"><?= form_error('nim'); ?></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nama">
                        <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="foto_mahasiswa" class="col-sm-3 col-form-label">Foto Mahasiswa</label>
                        <div class="col-sm-9">
                        <input type="file" class="form-control" id="foto_mahasiswa" name="foto_mahasiswa">
                        <small class="form-text text-danger"><?= form_error('foto_mahasiswa'); ?></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="foto_ktp" class="col-sm-3 col-form-label">Foto Ktp</label>
                        <div class="col-sm-9">
                        <input type="file" class="form-control" id="foto_ktp" name="foto_ktp">
                        <small class="form-text text-danger"><?= form_error('foto_ktp'); ?></small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <!-- <a href="" class="btn btn-primary">Tambah</a> -->
                            <button class="btn btn-primary float-right" type="submit">Tambah</button>
                        </div>
                    </div>
                </form>
              </div>
          </div>
      </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>