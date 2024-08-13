<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_pdf; ?></title>
    <style>
        body {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }

        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #4f3829;
            color: white;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>

    <table style="margin-bottom: 30px;">
        <tbody>
            <tr>
                <td style="width: 400px">
                    <img src="<?= base_url(); ?>assets/front/images/logo-bg-light.png" style="width: 200px;" alt="">
                </td>
                <td style="width: 400px;">
                    <table>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td> <?= format_indo($invoice['tanggal_invoice']) ?></td>
                        </tr>
                        <tr>
                            <td>Nomor</td>
                            <td>:</td>
                            <td> ZFR-<?= $invoice['no_invoice'] ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <p style="width: 450px;">
        <strong>Ditujukan kepada :</strong><br>
        <?= $invoice['nama_customer'] ?> <br>
        <?= preg_replace(["/<p>/", "/<\/p>/"], ["", "<br>"], $invoice['alamat_customer']) ?>
        <?= $invoice['telepon_customer'] ?>
    </p>
    <h3 style="text-align: center;">INVOICE</h3>
    <table id="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Menu</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($details as $d) :
            ?>
                <tr>
                    <td><?= $no++ ?>.</td>
                    <td><?= $d->menu ?></td>
                    <td class="text-right"><?= number_format($d->qty) ?></td>
                    <td class="text-right"><?= number_format($d->harga) ?></td>
                    <td class="text-right"><?= number_format($d->total) ?></td>
                </tr>
            <?php
            endforeach;
            ?>
            <tr>
                <td class="" colspan="4">SUBTOTAL</td>
                <td class="text-right"><?= number_format($invoice['subtotal']) ?></td>
            </tr>
            <?php
            if ($invoice['diskon'] != "0.00") {
            ?>
                <tr>
                    <td class="" colspan="4">DISKON <?= $invoice['diskon'] * 100 ?>%</td>
                    <td class="text-right"><?= number_format($invoice['besaran_diskon']) ?></td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td class="" colspan="4">GRAND TOTAL</td>
                <td class="text-right"><?= number_format($invoice['total_invoice']) ?></td>
            </tr>
            <tr>
                <td colspan="5"><?= terbilang($invoice['total_invoice']) ?> Rupiah</td>
            </tr>
        </tbody>
    </table>

    <p style="margin-top: 30px;">Keterangan: <br><?= $invoice['keterangan'] ?></p>
    <p style="margin-top: 100px;">Bank BNI 8055520835 a.n Lohjinawi Solusi Teknologi</p>
</body>

</html>