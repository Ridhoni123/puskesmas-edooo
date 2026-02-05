<!DOCTYPE html>
<html>

<head>
    <title>Laporan Puskesmas</title>
    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4e73df;
            color: white;
        }

        .header {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Puskesmas Gadang Hanyar</h2>
        <p>Laporan Rekapitulasi Data Kesehatan - Tanggal: {{ $tanggal }}</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Jumlah Pasien</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Ibu Hamil</td>
                <td>{{ $total_ibu_hamil }}</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Ibu Bersalin</td>
                <td>{{ $total_ibu_bersalin }}</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Bayi Baru Lahir</td>
                <td>{{ $total_bayi }}</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Pasien HIV</td>
                <td>{{ $total_hiv }}</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Terduga TBC</td>
                <td>{{ $total_tbc }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>