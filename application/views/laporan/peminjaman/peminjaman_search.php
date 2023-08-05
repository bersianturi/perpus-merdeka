<?php if ($hasil_search->num_rows() > 0) { ?>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td style="text-align: center;">No.</td>
                <td style="text-align: center;">ID Transaksi</td>
                <td style="text-align: center;">Tanggal Pinjam</td>
                <td style="text-align: center;">Tanggal Kembali</td>
                <td style="text-align: center;">Status</td>
                <td style="text-align: center;">Nis</td>
            </tr>
        </thead>
        <?php $no = 0;
        foreach ($hasil_search->result() as $row) : $no++; ?>
            <tr>
                <td style="text-align: center;"><?php echo $no; ?></td>
                <td style="text-align: center;"><?php echo $row->id_transaksi; ?></td>
                <td style="text-align: center;"><?php echo $row->tanggal_pinjam; ?></td>
                <td style="text-align: center;"><?php echo $row->tanggal_kembali; ?></td>
                <td><?php echo $row->status_pinjam; ?></td>
                <td style="text-align: center;"><?php echo $row->nis; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php } else { ?>
    <p class="text-center"> Maaf Data Belum Tersedia </p>
<?php } ?>