<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <style type="text/css">
        .table-data {
            /* margin-top: 20px; */
            width: 90%;
            margin-left: auto;
            margin-right: auto;
            /* padding: 50px; */
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: Verdana;
            padding: 10px 10px 10px 10px;
        }

        .logo {
            width: 5%;
        }

        h3 {
            font-family: Verdana;
        }
    </style>
    <h3>

        <center>
            <img class="logo" src="<?= base_url('assets') ?>/images/logo-mini.png" alt=""><br>
            Laporan Data Peminjaman<br>
            Perpustakaan Merdeka<br>
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
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>