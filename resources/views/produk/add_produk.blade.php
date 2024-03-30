@extends('core')

@section ('content')
<div class="col-md-12">
    <h5 class="pb-3">Daftar Produk > Tambah Produk</h5>
    <form action="{{ url('produk/proses_tambah') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <!-- menampilkan error validasi -->
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        <div class="col-md-4">
            <label for="inputState" class="form-label">Kategori Produk</label>
            <select id="inputState" class="form-select" name="id_kategori" required>
                <option value="">Pilih kategori</option>
                @foreach ($kategori as $kat)
                    <option value="{{$kat->id}}">{{$kat->nama_kategori}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-8">
            <label for="inputPassword4" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="inputPassword4" name="nama_produk">
            <small class="text-danger">Gunakan huruf besar pada setiap awal kata</small>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="inputCity" class="form-label">Harga Beli</label>
            <input type="number" class="form-control" onkeyup="sum();" id="beli" name="harga_beli">
        </div>
        <div class="col-md-4">
            <label for="inputjual" class="form-label">Harga Jual</label>
            <input type="number" class="form-control" id="jual" name="harga_jual" readonly>
        </div>
        <div class="col-md-4">
            <label for="inputZip" class="form-label">Stok Barang</label>
            <input type="number" class="form-control" id="inputZip" name="stok">
        </div>
    </div>
    <div class="col-md-12">
        <label for="inputimage" class="form-label">Upload Image</label>
        <input type="file" class="form-control" id="inputimage" name="gambar">
    </div>
    <div class="row">
        <div class="col-9"></div>
        <div class="col-3 content-end">
            <button type="reset" class="btn btn-outline-primary mt-3">Batalkan</button>
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </div>
    </div>
    </form>
</div>

<script>
    function sum(){
        var txtbeli = document.getElementById('beli').value;
        var result = parseInt(txtbeli)+(parseInt(txtbeli)*0.3);
        if(!isNaN(result)){
            document.getElementById('jual').value=result;
        }
    }
</script>
@stop