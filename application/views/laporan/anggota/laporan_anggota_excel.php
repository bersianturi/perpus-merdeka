<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: application/x-msexcel");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Laporan Anggota.xls");
?>

<h3>
    <center>
        <!-- <img style="width: 5%;" src="<?= base_url('assets') ?>/images/logo-mini.png" alt="logo" /> -->
        Laporan Anggota<br>
        Perpustakaan Merdeka
    </center>
</h3>
<br />
<table>
    <tr>
        <th>No.</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Kelas</th>
    </tr>
    <?php
    $no = 1;
    foreach ($anggota->result() as $row) {
    ?>
        <tr>
            <td style="text-align: center;"><?php echo $no; ?></td>
            <td style="text-align: center;"><?php echo $row->nis; ?></td>
            <td style="text-align: center;"><?php echo $row->nama; ?></td>
            <td style="text-align: center;"><?php echo $row->ttl; ?></td>
            <td style="text-align: center;"><?php echo $row->kelas; ?></td>
        </tr>
    <?php $no++;
    } ?>
</table>