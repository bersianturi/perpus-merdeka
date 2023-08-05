<?php if ($hasil_search->num_rows() > 0) { ?>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td style="text-align: center;">No.</td>
                <td style="text-align: center;">ID Transaksi</td>
                <td style="text-align: center;">Tanggal Pengembalian</td>
                <td style="text-align: center;">Denda</td>
                <td style="text-align: center;">Nominal</td>
                <td style="text-align: center;">ID Petugas</td>
            </tr>
        </thead>
        <?php $no = 0;
        foreach ($hasil_search->result() as $data) : $no++; ?>
            <tr>
                <td style="text-align: center;"><?php echo $no; ?></td>
                <td style="text-align: center;"><?php echo $data->id_transaksi; ?></td>
                <td style="text-align: center;"><?php echo $data->tgl_pengembalian; ?></td>
                <td style="text-align: center;"><?php echo $data->denda; ?></td>
                <td style="text-align: center;"><?php echo $data->nominal; ?></td>
                <td style="text-align: center;"><?php echo $data->full_name; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php } else { ?>
    <p class="text-center">Maaf Data Belum Tersedia</p>
<?php } ?>