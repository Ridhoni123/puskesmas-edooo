<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Ibu Hamil</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
            margin: 20px;
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
            width: 80px;
            height: 80px;
            border: 1px solid #000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
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

        /* Garis Ganda Kop Surat */
        .double-line {
            margin-top: 10px;
            border-top: 3px solid black;
            border-bottom: 1px solid black;
            height: 3px;
        }

        /* Judul Laporan */
        .title {
            text-align: center;
            font-weight: bold;
            font-size: 14px;
            margin: 20px 0;
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
            padding: 5px;
            vertical-align: middle;
        }

        table th {
            background-color: #f2f2f2;
            text-align: center;
            font-weight: bold;
        }

        /* Tanda Tangan */
        .footer-signature {
            margin-top: 50px;
            float: right;
            width: 250px;
            text-align: center;
        }

        /* Tombol Cetak (Hanya tampil di layar, hilang saat diprint) */
        .no-print {
            margin-bottom: 20px;
            text-align: right;
        }

        .logo-placeholder {
            position: absolute;
            left: 0;
            top: 0;
            width: 80px;
            height: 80px;
            /* border: 1px solid #000;  <-- Baris ini sudah dihapus agar tidak ada kotak */
        }

        .logo-placeholder img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        @media print {
            .no-print {
                display: none;
            }

            @page {
                margin: 2cm;
                size: landscape;
            }



            /* Cetak Landscape agar muat */
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

    <div style="text-align: center; font-weight: bold; margin-bottom: 20px;">
        {{ $periode }}
    </div>

    <table>
        <thead>
            <tr>
                <th width="30">No</th>
                <th>No e-RM</th>
                <th>Tgl Periksa K6</th>
                <th>Nama Ibu Hamil</th>
                <th>Tgl Lahir</th>
                <th>NIK</th>
                <th>Nama Suami</th>
                <th>Alamat</th>
                <th>Jaminan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $row)
            <tr>
                <td style="text-align: center;">{{ $key + 1 }}</td>
                <td style="text-align: center;">-</td>
                <td style="text-align: center;">{{ \Carbon\Carbon::parse($row->tanggal_k6)->format('d-m-Y') }}</td>
                <td>{{ $row->nama_ibu }}</td>
                <td style="text-align: center;">{{ $row->tanggal_lahir ? \Carbon\Carbon::parse($row->tanggal_lahir)->format('d-m-Y') : '-' }}</td>
                <td style="text-align: center;">{{ $row->nik }}</td>
                <td>{{ $row->nama_suami }}</td>
                <td>{{ $row->alamat }}</td>
                <td style="text-align: center;">{{ $row->is_pbi ? 'BPJS PBI' : 'UMUM/MANDIRI' }}</td>
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