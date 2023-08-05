<?php if($buku->num_rows() > 0) { ?>
<br /><br />
<div class="table-responsive">
<table style="width: 100%;" class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Kode Buku</td>
                <td style="width: 40%;">Judul Buku</td>
                <td>Pengarang</td>
                <td></td>
            </tr>
        </thead>
        <?php foreach($buku->result() as $data):?>
        <tr>
            <td><?php echo $data->kode_buku;?></td>
            <td><?php echo $data->judul;?></td>
            <td><?php echo $data->pengarang;?></td>
            <td><a href="#" class="tambah" 
                kode="<?php echo $data->kode_buku;?>"
                judul="<?php echo $data->judul;?>"
                pengarang="<?php echo $data->pengarang;?>"><i class="mdi mdi-plus"></i></a></td>
        </tr>
        <?php endforeach;?>
    </table>
    </div>
<?php }else{ ?>
<br />
<strong>Book Not Found</strong>

<?php } ?>
