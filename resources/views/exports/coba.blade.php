<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
            font-size: 12px;
        }

        th {
            background-color: rgb(102, 174, 245);
            color: white;
            white-space: nowrap;
            font-size: 12px;
        }

    </style>
</head>

<body style="padding: 20px;">
    <header style="margin-bottom: 10px; position: absolute; transform: translateX(55%);">
        <img style="max-height: 80px;" src="{{ asset('Logo_SMK_NU.png') }}" alt="">
        <div class="desc" style="margin: 0 20px; transform: translateY(-120%), translateX(20%);">
            <h4 style="text-align: center;">DAFTAR HONORARIUM GURU & STAFF</h4>
            <h5 style="line-height: 20px;">SMK NAHDLATUL ATTARBIYYAH TELAGASARI-KARAWANG</h5>
            <h5 style="line-height: 20px;text-align: center;">TAHUN PELAJARAN 2020/2021</h5>
        </div>
        <img style="max-height: 80px; transform: translateY(-180%), translateX(580%);"
            src="{{ asset('Logo_SMK_NU.png') }}" alt="">
    </header>

    <table style="transform: translateY(85px);">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Bidang Diklat</th>
                <th>Jam</th>
                <th>Biaya</th>
                <th>Honor</th>
                <th>W. Kelas</th>
                <th>T. Staff & Yayasan</th>
                <th>Piket</th>
                <th>Rapat</th>
                <th>Total</th>
                <th>Total Honor</th>
                <th>Tanda Tangan</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td align="center">1</td>
                <td>kjdfgslafhsdjfhdsjfhsdjfhdsjfhasdasads</td>
                <td>Bidang Diklatsdsads</td>
                <td align="center">20</td>
                <td>20.000</td>
                <td align="right">200.000</td>
                <td align="right">100.000</td>
                <td align="right">2.000.000</td>
                <td align="right">100.000</td>
                <td align="right">100.000</td>
                <td align="right">8.100.000</td>
                <td align="right">8.100.000</td>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>

</html>
