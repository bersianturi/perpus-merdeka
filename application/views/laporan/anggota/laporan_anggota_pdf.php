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
            Laporan Data Anggota<br>
            Perpustakaan Merdeka<br>
        </center>
    </h3>
    <br />
    <table class="table-data">
            <tr>
                <th style="text-align: center;">No.</th>
                <th style="text-align: center;">NIS</th>
                <th style="text-align: center;">Nama</th>
                <th style="text-align: center;">Tanggal Lahir</th>
                <th style="text-align: center;">Kelas</th>
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
    <script type="text/javascript">
        // window.print();
    </script>
</body></html>