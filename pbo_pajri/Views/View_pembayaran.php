<?php

include '../Controllers/Controller_pembayaran.php';
// Membuat Object dari Class pembayaran
$pembayaran = new Controller_pembayaran();
$GetPembayaran = $pembayaran->GetData_All();

// untuk mengecek di object $siswa ada berapa banyak Property
// echo var_dump($kelas);
?>

<div class="card text-dark bg-info p-2 text-dark bg-opacity-25">
  <div class="card-header bg-info">
    <h3>Data Pembayaran</h3>
  </div>
  <div class="card-body">
      <a href="main.php?menu=<?php echo base64_encode('id_po_pem') ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
          <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg> Tambah Data
    </a>
  </div>
  <div class="card-body bg-primary">


    <table class="table table-bordered table-info">
            <thead class="text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Petugas</th>
                    <th scope="col">NISN</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Bayar</th>
                    <th scope="col">Bulan Bayar</th>
                    <th scope="col">Tahun Bayar</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Jumlah Bayar</th>
                    <th scope="col" class="text-center">Tools</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Decision validation variabel
                if (isset($GetPembayaran)) {
                    $no = 1;
                    foreach ($GetPembayaran as $Get) {
                ?>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td><?php echo $Get['nama_petugas']; ?></td>
                            <td class="text-center"><?php echo $Get['nisn']; ?></td>
                            <td><?php echo $Get['nama']; ?></td>
                            <td class="text-center"><?php echo $Get['tgl_bayar']; ?></td>
                            <td class="text-center"><?php echo $Get['bulan_dibayar']; ?></td>
                            <td class="text-center"><?php echo $Get['tahun_bayar']; ?></td>
                            <td class="text-right"><?php echo $Get['nominal']; ?></td>
                            <td class="text-right"><?php echo $Get['jumlah_bayar']; ?></td>
                            <td class="text-center">
                                <a href="main.php?menu=<?php echo base64_encode('id_pu_pem') ?>&id_pembayaran=<?php echo base64_encode($Get['id_pembayaran']) ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                      <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                    </svg>                                
                                </a>
                                <a onclick="konfirmasi('<?php echo base64_encode($Get['id_pembayaran']) ?>')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                </a>
                        </tr>
                <?php
                    }
                }
                ?>


            </tbody>
        </table>
        </p>
    </div>
</div>

<script>
    function konfirmasi(id_pembayaran) {
        var a = id_pembayaran
        if (window.confirm('apakah anda ingin menghapus data ini ?')) {
            window.location.href = '../Config/Routes.php?function=delete_pembayaran&id_pembayaran=' + a;
        };
    }
</script>