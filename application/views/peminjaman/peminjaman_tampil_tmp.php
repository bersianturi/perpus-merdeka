<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td style="text-align: center;">Kode Buku</td>
            <td style="text-align: center;">Judul Buku</td>
            <td style="text-align: center;">Pengarang</td>
            <td></td>
        </tr>
    </thead>
    <?php foreach($tmp as $tmp):?>
    <tr>
        <td style="text-align: center;"><?php echo $tmp->kode_buku;?></td>
        <td><?php echo $tmp->judul;?></td>
        <td><?php echo $tmp->pengarang;?></td>
        <td style="text-align: center;"><a href="#" class="hapus" kode="<?php echo $tmp->kode_buku;?>"><i class="mdi mdi-delete"></i></a></td>
    </tr>
    <?php endforeach;?>
    <tr>
        <td colspan="2">Total Buku</td>
        <td colspan="2"><input type="text" id="jumlahTmp" readonly="readonly" value="<?php echo $jumlahTmp;?>" class="form-control"></td>
    </tr>
</table>