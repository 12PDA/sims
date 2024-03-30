@extends('core')

@section ('content')
<div class="col-md-12">
    <h5>Daftar Produk > Ubah Produk</h5>
    <form action="{{ url('produk/proses_update/'.$produk->id) }}" method="post" enctype="multipart/form-data">
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
            <label class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama_produk" value="{{$produk->nama_produk}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="inputCity" class="form-label">Harga Beli</label>
            <input type="number" class="form-control" onkeyup="sum();" id="beli" name="harga_beli" value="{{$produk->harga_beli}}">
        </div>
        <div class="col-md-4">
            <label for="inputjual" class="form-label">Harga Jual</label>
            <input type="number" class="form-control" id="jual" name="harga_jual" value="{{$produk->harga_jual}}" readonly>
        </div>
        <div class="col-md-4">
            <label for="inputZip" class="form-label">Stok Barang</label>
            <input type="number" class="form-control" id="inputZip" name="stok" value="{{$produk->stok}}">
        </div>
    </div>
    <div class="col-md-12">
        <label for="inputimage" class="form-label">Upload Image</label>
        <div class="row">
            <div class="col-md-1"><img src="{{ url('uploads') }}/{{ $produk->foto }}" alt="..." class="img-thumbnail" style="width: 80px;"></div>
            <div class="col-md-11"><input type="file" class="form-control" id="inputimage" name="gambar"></div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-9"></div>
        <div class="col-3">
            <button type="reset" class="btn btn-outline-primary">Batalkan</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
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