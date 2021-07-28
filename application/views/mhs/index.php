<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD Mahasiswa CI-3</title>
  </head>
  <body>
    <div class="container">
      <div class="row mt-5">
        <div class="col-md-6">
          <h1 class="">CRUD Mahasiswa CI-3</h1>
        </div>
        <div class="col-md-6 text-end">
          <a href="<?php echo base_url('mahasiswa/create/') ?>" class="btn btn-primary btn-lg">Tambah data mahasiswa</a>
        </div>
      </div>

      <?php if( $this->session->flashdata('flash') ):?>
      <div class="row my-2">
        <div class="col-md-6">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          Data Mahasiswa <strong><?= $this->session->flashdata('flash'); ?></strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        </div>
      </div>
      <?php endif; ?>

      <div class="row">
        <div class="col-md-12 mt-5">
          
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Foto Mahasiswa</th>
                <th scope="col">Foto KTP</th>
                <th scope="col">Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <?php $index=1; ?>
              <?php foreach($mhs as $m): ?>
                <tr>
                  <th scope="row"><?= $index++; ?></th>
                  <td><?php echo $m->nim ?></td>
                  <td><?php echo $m->nama ?></td>
                  <td>
                    <img width="100px" height="100px" src="<?= base_url() ?>assets/<?= $m->foto_mahasiswa?>" alt="">
                  </td>
                  <td>
                    <img width="100px" height="100px" src="<?= base_url() ?>assets/<?= $m->foto_ktp?>" alt="">
                  
                  </td>
                  <td>
                    <a href="<?php echo base_url('mahasiswa/edit/').$m->id; ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="<?php echo base_url('mahasiswa/delete/').$m->id; ?>" class="btn btn-outline-danger btn-sm" onclick=" return confirm('yakin?');">Hapus</a>
                    
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          
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