<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            table, td, th {
            border: 1px solid;
            text-align: center;
            }

            table {
            width: 100%;
            border-collapse: collapse;
            }
        </style>
    <title>Document</title>
</head>
<body>
    <h2 style="text-align: center;">Laporan Stok Keluar</h2>
    <table class="table table-striped">
        <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Stok Keluar</th>
        <th scope="col">Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @forelse($stokkeluar as $item)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{ $item->barang->nm_barang }}</td>
                <td>{{ $item->stok_keluar }}</td>
                <td>{{ $item->tanggal }}</td>
            </tr>
        @empty
            <tr>
                <th scope="row" colspan="4">Data belum tersedia</th>
            </tr>
        @endforelse
    </tbody>
</table>
</body>
</html>