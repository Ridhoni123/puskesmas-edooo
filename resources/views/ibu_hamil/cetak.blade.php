<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Ibu Hamil</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 11px;
            /* Ukuran font diperkecil sedikit agar muat banyak kolom */
            margin: 10px;
        }

        /* Styling Kop Surat */
        .header {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }

        .logo-placeholder {
            position: absolute;
            left: 0;
            top: 0;
            width: 70px;
            height: 70px;
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
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .header h3 {
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 5px;
        }

        .header p {
            font-size: 11px;
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
            font-size: 13px;
            margin: 15px 0;
            text-transform: uppercase;
            text-decoration: underline;
        }

        /* Tabel Data */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th,
        table td {
            border: 1px solid black;
            padding: 4px;
            vertical-align: middle;
            word-wrap: break-word;
        }

        table th {
            background-color: #f2f2f2;
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Tanda Tangan */
        .footer-signature {
            margin-top: 30px;
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
                margin: 1cm;
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
            <img src="{{ asset('img/logo.png') }}" alt="Logo Puskesmas">
        </div>

        <h2>PEMERINTAH KOTA BANJARMASIN</h2>
        <h3>DINAS KESEHATAN PUSKESMAS PEKAPURAN LAUT</h3>
        <p>Jl. Pekapuran B.Laut, Kel. Pekapuran Laut, Kec. Banjarmasin Tengah</p>
        <p>Kota Banjarmasin, Kalimantan Selatan, Telp: (0511) 123456</p>

        <div class="double-line"></div>
    </div>

    <div class="title">LAPORAN DATA IBU HAMIL</div>

    <div style="text-align: center; font-weight: bold; margin-bottom: 15px;">
        {{ $periode }}
    </div>

    <table>
        <thead>
            <tr>
                <th width="20">No</th>
                <th width="70">Tgl Periksa</th>
                <th>Nama Ibu Hamil</th>
                <th width="80">Tgl Lahir</th>
                <th width="90">NIK</th>
                <th>Nama Suami</th>
                <th width="120">Alamat</th>
                <th width="70">Jaminan</th>
                <th width="80">No HP</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $row)
            <tr>
                <td style="text-align: center;">{{ $key + 1 }}</td>
                <td style="text-align: center;">{{ \Carbon\Carbon::parse($row->tanggal_k6)->format('d-m-Y') }}</td>
                <td>{{ $row->nama_ibu }}</td>
                <td style="text-align: center;">{{ \Carbon\Carbon::parse($row->tanggal_lahir)->format('d-m-Y') }}</td>
                <td style="text-align: center;">{{ $row->nik }}</td>
                <td>{{ $row->nama_suami }}</td>
                <td>{{ $row->alamat }}</td>
                <td style="text-align: center;">{{ $row->is_pbi ? 'BPJS PBI' : 'MANDIRI' }}</td>
                <td style="text-align: center;">{{ $row->no_hp ?? '-' }}</td>
                <td>{{ $row->keterangan ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer-signature">
        <p>Banjarmasin, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
        <p>Mengetahui,</p>
        <p><b>Kepala Puskesmas</b></p>
        <br><br><br>
        <p>(.....................................................)</p>
        <p style="text-align: left; margin-left: 25px;">NIP. 19..........................................</p>
    </div>

</body>

</html>