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
            <div class="form-group">
                <h3>{{ $title }}</h3>
            </div>

            <form action="{{ route('prosesTambahProduk') }}" class="row g-3" method="POST">
                @csrf
                <div class="col-md-6">
                  <label class="form-label">Nama Barang</label>
                  <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" value="{{ old('nama_barang') }}">
                  @error('nama_barang')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Kode Barang</label>
                    <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" name="kode_barang" value="{{ old('kode_barang') }}">
                    @error('kode_barang')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jumlah Barang</label>
                    <input type="text" class="form-control @error('jumlah_barang') is-invalid @enderror" name="jumlah_barang" value="{{ old('jumlah_barang') }}">
                    @error('jumlah_barang')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                  <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
