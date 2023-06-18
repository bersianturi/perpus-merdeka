<!DOCTYPE html>
<html><head>
    <title></title>
</head><body>
    <style type="text/css">
        .table-data {
            margin-top: 20px;
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
            Laporan Data Peminjaman<br>
            Perpustakaan Merdeka<br>
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
</body></html>