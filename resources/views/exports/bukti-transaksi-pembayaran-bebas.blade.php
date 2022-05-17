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
        top: 10px;
        right: 0;
        font-size: 18px;
        border-width: thin;
        padding: 5px;
    }

    .topright2 {
        position: absolute;
        top: 40px;
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
        {{-- <div class="topright2">Lunas</div> --}}
    </div>
    <p class="name-school">{{ $informasi->name }}</p>
    <p class="alamat">{{ $informasi->address }}<br>{{ $informasi->phone }}</p>
    <hr>
    <table style="padding-top: -5px; padding-bottom: 5px">
        <tbody>
            <tr>
                <td style="width: 50px;">NIM</td>
                <td style="width: 10px;">:</td>
                <td>{{ $student->nim }}</td>
            </tr>
            <tr>
                <td style="width: 50px;">Nama</td>
                <td style="width: 10px;">:</td>
                <td>{{ $student->name }}</td>
            </tr>
            <tr>
                <td style="width: 50px;">Kelas</td>
                <td style="width: 10px;">:</td>
                <td>{{ $student->dataClass->name }}</td>
            </tr>
        </tbody>
    </table>
    <hr>
    <p class="detail">Dengan rincian pembayaran sebagai berikut:</p>

    <table style="border-style: solid;">
        <tr>
            <th style="border-top: 1px solid; border-bottom: 1px solid;">No.</th>
            <th style="border-top: 1px solid; border-bottom: 1px solid;">Tgl.Pembayaran</th>
            <th style="border-top: 1px solid; border-bottom: 1px solid;">No.Pembayaran</th>
            <th style="border-top: 1px solid; border-bottom: 1px solid;">Pembayaran</th>
            <th style="border-top: 1px solid; border-bottom: 1px solid;">Keterangan</th>
            <th style="border-top: 1px solid; border-bottom: 1px solid;">Total Tagihan</th>
            <th style="border-top: 1px solid; border-bottom: 1px solid;">Jumlah Pembayaran</th>
        </tr>
        {{ $total = 0 }}
        {{ $sisa = 0 }}
        @foreach ($frees as $free)
            <tr>
                <td style="border-bottom: 1px solid;padding-top: 15px; padding-bottom: 15px;">
                    {{ $loop->iteration }}
                </td>
                <td style="border-bottom: 1px solid;">
                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $free->created_at, 'Asia/Jakarta')->subDays(1)->format('d M Y') }}
                </td>
                <td style="border-bottom: 1px solid;">{{ $free->payment_number }}</td>
                <td style="border-bottom: 1px solid;">{{ $free->type_payment }}</td>
                <td style="border-bottom: 1px solid;">{{ $free->description }}</td>
                <td style="border-bottom: 1px solid">
                    Rp.
                    {{ number_format($free->free_bill != 0 ? ($free->total_payment != 0 ? $free->total_payment + $free->free_bill : $free->free_bill) : $free->total_payment, 0, ',', '.') }}
                </td>
                <td style="border-bottom: 1px solid;">Rp. {{ number_format($free->billing, 0, ',', '.') }}</td>
            </tr>
            {{ $total += $free->billing }}
            {{ $sisa += $free->free_bill }}
        @endforeach

        <tr>
            <td colspan="5" style="text-align: center;padding-top: 5px; padding-bottom: 5px;">&nbsp;</td>
            <td style="background-color: #dedede; font-weight:bold; border-bottom: 1px solid;">Total Pembayaran</td>
            <td style="background-color: #dedede; font-weight:bold;border-bottom: 1px solid;">Rp.
                {{ number_format($total, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td colspan="5">&nbsp;</td>
            <td style="background-color: #ECECEC; font-weight:bold; padding-top: 5px; padding-bottom: 5px;">
                Sisa Tagihan
            </td>
            <td style="background-color: #ECECEC; font-weight:bold;">Rp. {{ number_format($sisa, 0, ',', '.') }}</td>
        </tr>
    </table>
    <br>
</body>

</html>
