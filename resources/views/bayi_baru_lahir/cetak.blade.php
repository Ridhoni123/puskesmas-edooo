<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Bayi Baru Lahir</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }

        .logo-placeholder {
            position: absolute;
            left: 0;
            top: 0;
            width: 80px;
            height: 80px;
        }

        .logo-placeholder img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .header h2,
        .header h3,
        .header p {
            margin: 0;
            padding: 0;
        }

        .header h2 {
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .header h3 {
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 5px;
        }

        .header p {
            font-size: 12px;
            font-style: italic;
            margin-top: 5px;
        }

        .double-line {
            margin-top: 10px;
            border-top: 3px solid black;
            border-bottom: 1px solid black;
            height: 3px;
        }

        .title {
            text-align: center;
            font-weight: bold;
            font-size: 14px;
            margin-top: 20px;
            text-transform: uppercase;
            text-decoration: underline;
        }

        /* STYLE KHUSUS PERIODE */
        .periode-text {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 12px;
            margin-top: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th,
        table td {
            border: 1px solid black;
            padding: 5px;
            vertical-align: middle;
        }

        table th {
            background-color: #f2f2f2;
            text-align: center;
            font-weight: bold;
        }

        .footer-signature {
            margin-top: 50px;
            float: right;
            width: 250px;
            text-align: center;
        }

        .no-print {
            margin-bottom: 20px;
            text-align: right;
        }

        @media print {
            .no-print {
                display: none;
            }

            @page {
                margin: 2cm;
                size: landscape;
            }
        }
    </style>
</head>

<body onload="window.print()">

    <div class="no-print">
        <button onclick="window.history.back()">Kembali</button>
        <button onclick="window.print()">Cetak PDF</button>
    </div>

    <div class="header">
        <div class="logo-placeholder">
            <img src="{{ asset('img/logo.png') }}" alt="Logo">
        </div>
        <h2>PEMERINTAH KOTA BANJARMASIN</h2>
        <h3>DINAS KESEHATAN PUSKESMAS PEKAPURAN LAUT</h3>
        <p>Jl. Pekapuran B.Laut, Kel. Pekapuran Laut, Kec. Banjarmasin Tengah</p>
        <p>Kota Banjarmasin, Kalimantan Selatan, Telp: (0511) 123456</p>
        <div class="double-line"></div>
    </div>

    <div class="title">LAPORAN DATA BAYI BARU LAHIR (KN3)</div>

    <div class="periode-text">
        {{ $periode }}
    </div>

    <table>
        <thead>
            <tr>
                <th width="30">No</th>
                <th>Tgl Pelayanan</th>
                <th>Nama Bayi</th>
                <th>Tempat Lahir</th>
                <th>Tgl Lahir</th>
                <th>Nama Ortu</th>
                <th>Alamat</th>
                <th>Berat (gr)</th>
                <th>Panjang (cm)</th>
                <th>Kondisi</th>
                <th>PBI</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $row)
            <tr>
                <td style="text-align: center;">{{ $key + 1 }}</td>
                <td style="text-align: center;">{{ \Carbon\Carbon::parse($row->tanggal_kn3)->format('d-m-Y') }}</td>
                <td>{{ $row->nama_bayi }}</td>
                <td>{{ $row->tempat_lahir }}</td>
                <td style="text-align: center;">{{ \Carbon\Carbon::parse($row->tanggal_lahir)->format('d-m-Y') }}</td>
                <td>{{ $row->nama_orang_tua }}</td>
                <td>{{ $row->alamat }}</td>
                <td style="text-align: center;">{{ $row->berat_badan ?? '-' }}</td>
                <td style="text-align: center;">{{ $row->panjang_badan ?? '-' }}</td>
                <td style="text-align: center;">{{ $row->kondisi_kesehatan ?? '-' }}</td>
                <td style="text-align: center;">{{ $row->is_pbi ? 'Ya' : 'Tidak' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer-signature">
        <p>Banjarmasin, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
        <p>Mengetahui,</p>
        <p><b>Kepala Puskesmas</b></p>
        <br><br><br><br>
        <p>(.....................................................)</p>
        <p style="text-align: left; margin-left: 20px;">NIP. 19..........................................</p>
    </div>

</body>

</html>