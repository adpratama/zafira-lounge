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
                    <img src="<?= base_url(); ?>assets/front/img/logo.jpg" style="width: 200px;" alt="">
                </td>
                <td style="width: 400px;">
                    <table>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td style="text-align: right"><?= format_indo($invoice['booking_date']) ?></td>
                        </tr>
                        <tr>
                            <td>Nomor</td>
                            <td>:</td>
                            <td style="text-align: right"><?= $invoice['no_reservasi'] ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <p style="width: 450px;">
        <strong>Bill to :</strong><br>
        <?= $invoice['customer_name'] ?> <br>
        +<?= $invoice['phone_number'] ?>
    </p>
    <h3 style="text-align: center;">INVOICE</h3>
    <table id="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Room Type</th>
                <th>Price</th>
                <th>Pax</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1.</td>
                <td><?= $invoice['lounge_name'] ?></td>
                <td class="text-right"><?= number_format($invoice['price']) ?></td>
                <td class="text-right"><?= number_format($invoice['pax']) ?></td>
                <td class="text-right"><?= number_format($invoice['subtotal']) ?></td>
            </tr>
            <tr>
                <td class="" colspan="4">SUBTOTAL</td>
                <td class="text-right"><?= number_format($invoice['subtotal']) ?></td>
            </tr>
            <tr>
                <td class="" colspan="4">PPN</td>
                <td class="text-right"><?= number_format($invoice['tax']) ?></td>
            </tr>
            <tr>
                <td class="" colspan="4">GRAND TOTAL</td>
                <td class="text-right"><?= number_format($invoice['total']) ?></td>
            </tr>
            <tr>
                <td colspan="5"><?= terbilang($invoice['total']) ?> Rupiah</td>
            </tr>
        </tbody>
    </table>

    <p style="margin-top: 100px;">Bank BCA 2060888399 a.n Handayani</p>
</body>

</html>