@extends('layouts/main')

@section('title', 'Add Foods Data')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">Add Foods</h6>
        </div>
        <div class="card-body">
            <form class=" form-signin" action="/makanans" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nama">Nama Makanan</label>
                    <input type="text" class="form-control @error('nama_makanan') is-invalid @enderror" id="nama_makanan"
                        placeholder="Masukan Nama" name="nama_makanan" value="{{ old('nama_makanan') }}">
                    @error('nama_makanan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                        placeholder="Masukan Harga" name="harga" value="{{ old('harga') }}">
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="stok">Stok Makanan</label>
                    <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok"
                        placeholder="Masukan Stok Makanan" name="stok" value="{{ old('stok') }}">
                    @error('stok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="foto">Gambar Makanan</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"
                        placeholder="Masukan Stok Makanan" name="foto" value="{{ old('foto') }}">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button style="width: 15%;" class="btn btn-small btn-success btn-block" type="submit"><i
                        class="far fa-save"></i><span class="ml-2">save changes</span></button>
            </form>
        </div>
    </div>
    <a href="/makanans" class="text-danger float-right">
        <i class="fas fa-arrow-left"><span class="ml-2">Back</span></i>
    </a>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection