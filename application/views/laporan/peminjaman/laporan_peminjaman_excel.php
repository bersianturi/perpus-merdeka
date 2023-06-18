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
            <td style="text-align: center;">Tanggal Pinjam</td>
            <td style="text-align: center;">Tanggal Kembali</td>
            <td style="text-align: center;">Status</td>
            <td style="text-align: center;">Nis</td>
        </tr>
        <?php $no = 0;
        foreach ($peminjaman->result() as $row) : $no++; ?>
            <tr>
                <td style="text-align: center;"><?php echo $no; ?></td>
                <td style="text-align: center;"><?php echo $row->id_transaksi; ?></td>
                <td style="text-align: center;"><?php echo $row->tanggal_pinjam; ?></td>
                <td style="text-align: center;"><?php echo $row->tanggal_kembali; ?></td>
                <td style="text-align: center;"><?php echo $row->status; ?></td>
                <td style="text-align: center;"><?php echo $row->nis; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>