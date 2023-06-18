<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: application/x-msexcel");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Laporan Buku.xls");
?>

<h3>
    <center>
        <!-- <img style="width: 5%;" src="<?= base_url('assets') ?>/images/logo-mini.png" alt="logo" /> -->
        Laporan Anggota<br>
        Perpustakaan Merdeka
    </center>
</h3>
<br />
<table class="table-data">
    <tr>
        <td style="text-align: center;">No.</td>
        <td style="text-align: center;">Kode Buku</td>
        <td style="text-align: center;">Judul</td>
        <td style="text-align: center;">Pengarang</td>
    </tr>
    <?php
    $no = 1;
    foreach ($buku->result() as $row) {
    ?>
        <tr>
            <td style="text-align: center;"><?php echo $no; ?></td>
            <td style="text-align: center;"><?php echo $row->kode_buku; ?></td>
            <td><?php echo $row->judul; ?></td>
            <td style="text-align: center;"><?php echo $row->pengarang; ?></td>
        </tr>
    <?php $no++;
    } ?>
</table>