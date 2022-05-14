<!DOCTYPE html>
<html>

<head>
    <title>Wahliyudin</title>
</head>

<style type="text/css">
    @page {
        margin-top: 0.5cm;
        /*margin-bottom: 0.1em;*/
        margin-left: 1cm;
        margin-right: 1cm;
        margin-bottom: 0.1cm;
    }

    .name-school {
        font-size: 15pt;
        font-weight: bold;
        padding-bottom: -15px;
        text-transform: uppercase;
    }

    .alamat {
        font-size: 9pt;
        margin-bottom: 10px;
    }

    .detail {
        font-size: 10pt;
        font-weight: bold;
        padding-top: -15px;
        padding-bottom: -12px;
    }

    body {
        font-family: sans-serif;
    }

    table {
        font-family: verdana, arial, sans-serif;
        font-size: 11px;
        color: #333333;
        border-width: none;
        /*border-color: #666666;*/
        border-collapse: collapse;
        width: 100%;
    }

    th {
        padding-bottom: 8px;
        padding-top: 8px;
        border-color: #666666;
        background-color: #dedede;
        /*border-bottom: solid;*/
        text-align: left;
    }

    td {
        text-align: left;
        border-color: #666666;
        background-color: #ffffff;
    }

    hr {
        border: none;
        height: 1px;
        /* Set the hr color */
        color: #333;
        /* old IE */
        background-color: #333;
        /* Modern Browsers */
    }

    .container {
        position: relative;
    }

    .topright {
        position: absolute;
        top: 0;
        right: 0;
        font-size: 18px;
        border-width: thin;
        padding: 5px;
    }

    .topright2 {
        position: absolute;
        top: 30px;
        right: 50px;
        font-size: 18px;
        border: 1px solid;
        padding: 5px;
        color: red;
    }

</style>

<body>

    <div class="container">
        <div class="topright">Bukti Pembayaran</div>
    </div>
    <p class="name-school">MAN 3 KARAWANG</p>
    <p class="alamat">Jl. Batujaya<br>Telp. 085693296980</p>
    <hr>
    <table style="padding-top: -5px; padding-bottom: 5px">
        <tbody>
            <tr>
                <td style="width: 50px;">NIM</td>
                <td>:</td>
                <td>32365652355</td>
                <td style="width: 120px;">Tanggal Pembayaran</td>
                <td>:</td>
                <td>05 Mei 2002</td>
            </tr>
            <tr>
                <td style="width: 50px;">Nama</td>
                <td>:</td>
                <td>Wahliyudin</td>
                <td style="width: 120px;">Tahun Pelajaran</td>
                <td>:</td>
                <td>2022 / 2023</td>
            </tr>
            <tr>
                <td style="width: 50px;">Kelas</td>
                <td>:</td>
                <td>X&nbsp;IPA</td>
            </tr>
        </tbody>
    </table>
    <hr>
    <p class="detail">Rincian Pembayaran:</p>

    <table style="border-style: solid;">
        <tr>
            <th style="border-top: 1px solid; border-bottom: 1px solid; text-align:center;">No.</th>
            <th style="border-top: 1px solid; border-bottom: 1px solid;">Pembayaran</th>
            <th style="border-top: 1px solid; border-bottom: 1px solid;">Total Tagihan</th>
            <th style="border-top: 1px solid; border-bottom: 1px solid; text-align: center">Jumlah
                Pembayaran</th>
        </tr>
        <tr>
            <td style="border-bottom: 1px solid;padding-top: 10px; padding-bottom: 10px; text-align:center;">
                1</td>
            <td style="border-bottom: 1px solid;">
                INFAQ - (Januari 2022 / 2023)
            </td>
            <td style="border-bottom: 1px solid">Rp. 200.000
            </td>
            <td style="border-bottom: 1px solid; text-align: right;">
                Rp. 200.000</td>
        </tr>
        <tr>
            <td style="border-bottom: 1px solid;padding-top: 10px; padding-bottom: 10px; text-align:center;">
                1</td>
            <td style="border-bottom: 1px solid;">ksGdksad
            </td>
            <td style="border-bottom: 1px solid;">Rp. 100.000
            </td>
            <td style="border-bottom: 1px solid; text-align: right;">
                Rp. 100.000</td>
        </tr>

        <tr>
            <td colspan="2" style="text-align: center;padding-top: 5px; padding-bottom: 5px;">&nbsp;</td>
            <td style="background-color: #dedede; font-weight:bold; border-bottom: 1px solid;">Total Pembayaran</td>
            <td style="background-color: #dedede; font-weight:bold;border-bottom: 1px solid; text-align: right;">
                Rp. 200.000</td>
        </tr>
    </table>
    <br>
</body>

</html>
