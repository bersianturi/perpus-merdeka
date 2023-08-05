<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: application/x-msexcel");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Laporan Peminjaman.xls");
?>

<h3>
    <center>
        <!-- <img style="width: 5%;" src="<?= base_url('assets') ?>/images/logo-mini.png" alt="logo" /> -->
        Laporan Peminjaman<br>
        Perpustakaan Merdeka
    </center>
</h3>
<br />
<table class="table-data">
<tr>
<td style="text-align: center;">No.</td>
                <td style="text-align: center;">ID Transaksi</td>
                <td style="text-align: center;">Tanggal Pengembalian</td>
                <td style="text-align: center;">Denda</td>
                <td style="text-align: center;">Nominal</td>
                <td style="text-align: center;">ID Petugas</td>
        </tr>
        <?php $no = 0;
        foreach ($pengembalian->result() as $row) : $no++; ?>
            <tr>
            <td style="text-align: center;"><?php echo $no; ?></td>
                <td style="text-align: center;"><?php echo $row->id_transaksi; ?></td>
                <td style="text-align: center;"><?php echo $row->tgl_pengembalian; ?></td>
                <td style="text-align: center;"><?php echo $row->denda; ?></td>
                <td style="text-align: center;"><?php echo $row->nominal; ?></td>
                <td style="text-align: center;"><?php echo $row->full_name; ?></td>
            </tr>
    <?php endforeach; ?>
</table>