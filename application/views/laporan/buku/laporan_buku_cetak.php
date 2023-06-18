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
            Laporan Data Anggota<br>
            Perpustakaan Merdeka<br>
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
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>