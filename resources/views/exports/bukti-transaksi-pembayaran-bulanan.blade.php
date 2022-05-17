<!DOCTYPE html>
<html>

<head>
    <title>Bukti Pembayaran</title>
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
    <p class="name-school">{{ $informasi->name }}</p>
    <p class="alamat">{{ $informasi->address }}<br>Telp. {{ $informasi->phone }}</p>
    <hr>
    <table style="padding-top: -5px; padding-bottom: 5px">
        <tbody>
            <tr>
                <td style="width: 50px;">NIM</td>
                <td>:</td>
                <td>{{ $student->nim }}</td>
            </tr>
            <tr>
                <td style="width: 50px;">Nama</td>
                <td>:</td>
                <td>{{ $student->name }}</td>
            </tr>
            <tr>
                <td style="width: 50px;">Kelas</td>
                <td>:</td>
                <td>{{ $student->major->name }}&nbsp;{{ $student->dataClass->name }}</td>
            </tr>
        </tbody>
    </table>
    <hr>
    <p class="detail">Rincian Pembayaran:</p>

    <table style="border-style: solid;">
        <tr>
            <th style="border-top: 1px solid; border-bottom: 1px solid; border-right: 1px solid; text-align:center;">
                No.
            </th>
            <th style="border-top: 1px solid; border-bottom: 1px solid; border-right: 1px solid; padding: 0 10px;">
                Tgl.Pembayaran
            </th>
            <th style="border-top: 1px solid; border-bottom: 1px solid; border-right: 1px solid; padding: 0 10px;">
                Pembayaran
            </th>
            <th style="border-top: 1px solid; border-bottom: 1px solid; border-right: 1px solid; padding: 0 10px;">
                Bulan
            </th>
            <th style="border-top: 1px solid; border-bottom: 1px solid; border-right: 1px solid; padding: 0 10px;">
                Total Tagihan
            </th>
            <th style="border-top: 1px solid; border-bottom: 1px solid; border-right: 1px solid; padding: 0 10px;">
                Status
            </th>
            <th style="border-top: 1px solid; border-bottom: 1px solid; text-align: center">
                Jumlah Pembayaran
            </th>
        </tr>
        {{ $total = 0 }}
        @foreach ($monthlies as $monthly)
            <tr>
                <td
                    style="border-bottom: 1px solid;padding-top: 10px; padding-bottom: 10px; border-right: 1px solid; text-align:center;">
                    {{ $loop->iteration }}
                </td>
                <td style="border-bottom: 1px solid; border-right: 1px solid; padding: 0 10px;">
                    {{ $monthly->payment_date ?? '-' }}
                </td>
                <td style="border-bottom: 1px solid; border-right: 1px solid; padding: 0 10px;">
                    {{ $monthly->type_of_payment_name }}
                </td>
                <td style="border-bottom: 1px solid; border-right: 1px solid; padding: 0 10px;">
                    {{ $monthly->month_name }}
                </td>
                <td style="border-bottom: 1px solid; border-right: 1px solid; padding: 0 10px;">
                    Rp. {{ number_format($monthly->month_bill, 0, ',', '.') }}
                </td>
                <td style="border-bottom: 1px solid; border-right: 1px solid; padding: 0 10px;">
                    {!! $monthly->status ? '<span style="color: green;">Lunas</span>' : '<span style="color: red;">Belum Lunas</span>' !!}
                </td>
                <td style="border-bottom: 1px solid; text-align: right; padding: 0 10px;">
                    Rp. {{ $monthly->status ? number_format($monthly->month_bill, 0, ',', '.') : 0 }}
                </td>
            </tr>
            {{ $total += $monthly->status ? $monthly->month_bill : 0 }}
        @endforeach

        <tr>
            <td colspan="5" style="text-align: center;padding-top: 5px; padding-bottom: 5px;">&nbsp;</td>
            <td style="background-color: #dedede; font-weight:bold; border-bottom: 1px solid; padding: 0 10px;">Total
                Pembayaran
            </td>
            <td
                style="background-color: #dedede; font-weight:bold;border-bottom: 1px solid; text-align: right; padding: 0 10px;">
                Rp. {{ number_format($total, 0, ',', '.') }}
            </td>
        </tr>
    </table>
    <br>
    <div style="position: absolute; bottom: 30px; right: 0; ">
        <span style="font-size: 9pt;">Batujaya,
            {{ \Carbon\Carbon::make(now())->format('d M') }}</span><br><br><br><br><br>
        <span style="margin-top: 100px; font-size: 9pt; margin-left: 50%;">Wahliyudin</span>
    </div>
</body>

</html>
