<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Script --}}
    <script src="{{ asset('bootstrap') }}/js/bootstrap.js"></script>
    <script src="{{ asset('bootstrap') }}/js/bootstrap.min.js"></script>

    {{-- Style --}}
    <link rel="stylesheet" href="{{ asset('bootstrap') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('bootstrap') }}/css/bootstrap.min.css">

    <title>{{ $title }}</title>
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-6">
                <h3>{{ $title }}
                </h3>

                <div class="form-group">
                    <label>Cari Nama Produk:</label>
                    <form action="{{ route('prosesCariProduk') }}" method="POST">
                        @csrf
                        <input type="text" class="form-control" name="cari">
                        <button type="submit" class="btn btn-success btn-m mt-1">Cari</button>
                    </form>
                </div>
            </div>

            <div class="col-6">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('produk') }}" class="btn btn-primary btn-m">Data Users</a>
                </div>
            </div>
        </div>
        @if (session('pesan'))
            <div class="alert alert-success alert-dismissible mt-1">
                <h6> {{ session('pesan') }}</h6>
            </div>
        @endif
        <div class="row mt-3">
            <div class="col-12">
                <table class="table table-striped tabel-hover">
                    <tr>
                        <td>No.</td>
                        <td>Kode Barang</td>
                        <td>Nama Barang</td>
                        <td>Jumlah Barang</td>
                        <td>Tanggal</td>
                    </tr>

                    @if (is_array($produk) || is_object($produk))
                        @foreach ($produk as $result)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $result->kode_barang }}</td>
                                <td>{{ $result->nama_barang }}</td>
                                <td>{{ $result->jumlah_barang }}</td>
                                <td>{{ $result->tanggal }}</td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="text-center">
                            Tidak ada data ....
                        </td>
                    </tr>
                    @endif


                </table>
            </div>
        </div>
    </div>
</body>
</html>
