<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Rekapitulasi Puskesmas</title>

    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            margin: 40px;
            color: #000;
        }

        /* Header */
        .kop {
            text-align: center;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
            margin-bottom: 25px;
        }

        .kop h2 {
            margin: 0;
            font-size: 18pt;
            font-weight: bold;
            text-transform: uppercase;
        }

        .kop p {
            margin: 4px 0;
            font-size: 11pt;
        }

        .judul {
            text-align: center;
            margin: 25px 0 15px;
            font-size: 14pt;
            font-weight: bold;
            text-transform: uppercase;
            text-decoration: underline;
        }

        /* Info */
        .info {
            margin-bottom: 20px;
            font-size: 11pt;
        }

        .info span {
            display: inline-block;
            min-width: 120px;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 11pt;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px 6px;
        }

        th {
            background: #e9ecf5;
            text-align: center;
            font-weight: bold;
        }

        td {
            vertical-align: middle;
        }

        td.center {
            text-align: center;
        }

        td.right {
            text-align: right;
        }

        /* Footer */
        .footer {
            margin-top: 50px;
            width: 100%;
        }

        .ttd {
            width: 40%;
            float: right;
            text-align: center;
        }

        .ttd p {
            margin: 5px 0;
        }

        .nama {
            margin-top: 60px;
            font-weight: bold;
            text-decoration: underline;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>

    <!-- Kop Surat -->
    <div class="kop">
        <h2>PUSKESMAS GADANG HANYAR</h2>
        <p>Jl. Contoh No. 123, Kota XXXXX</p>
        <p>Telp: (021) 123456 | Email: puskesmas@email.com</p>
    </div>

    <!-- Judul -->
    <div class="judul">
        Laporan Rekapitulasi Data Kesehatan
    </div>

    <!-- Info -->
    <div class="info">
        <p><span>Tanggal</span>: {{ $tanggal }}</p>
        <p><span>Periode</span>: {{ $periode ?? '-' }}</p>
        <p><span>Petugas</span>: {{ Auth::user()->name ?? '-' }}</p>
    </div>

    <!-- Tabel -->
    <table>
        <thead>
            <tr>
                <th width="8%">No</th>
                <th>Kategori</th>
                <th width="25%">Jumlah Pasien</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="center">1</td>
                <td>Ibu Hamil</td>
                <td class="right">{{ $total_ibu_hamil }}</td>
            </tr>

            <tr>
                <td class="center">2</td>
                <td>Ibu Bersalin</td>
                <td class="right">{{ $total_ibu_bersalin }}</td>
            </tr>

            <tr>
                <td class="center">3</td>
                <td>Bayi Baru Lahir</td>
                <td class="right">{{ $total_bayi }}</td>
            </tr>

            <tr>
                <td class="center">4</td>
                <td>Pasien HIV</td>
                <td class="right">{{ $total_hiv }}</td>
            </tr>

            <tr>
                <td class="center">5</td>
                <td>Terduga TBC</td>
                <td class="right">{{ $total_tbc }}</td>
            </tr>

            <!-- Total -->
            <tr>
                <th colspan="2">TOTAL</th>
                <th class="right">
                    {{ 
                        $total_ibu_hamil +
                        $total_ibu_bersalin +
                        $total_bayi +
                        $total_hiv +
                        $total_tbc 
                    }}
                </th>
            </tr>

        </tbody>
    </table>

    <!-- Footer / TTD -->
    <div class="footer">

        <div class="ttd">
            <p>Gadang Hanyar, {{ $tanggal }}</p>
            <p>Kepala Puskesmas</p>

            <div class="nama">
                ( ____________________ )
            </div>

            <p>NIP. ....................</p>
        </div>

        <div class="clear"></div>

    </div>

</body>

</html>
