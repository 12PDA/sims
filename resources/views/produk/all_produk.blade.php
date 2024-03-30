@extends('core')

@section ('content')
<div class="col-md-12">
    <h5 class="pb-3">Daftar Produk</h5>
    <div class="row g-3">
    <div class="col-sm-3">
    <input type="text" name="search" id="search" placeholder="Enter search name" class="form-control-sm" onfocus="this.value=''">
    </div>
    <div class="col-sm-6">
        <form action="{{ url('produk/export_excel') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <select class="form-select-sm" aria-label="Default select example" id="select_kategori" name="id_kategori">
                <option value="">Semua</option>
                @foreach ($kategori as $kat)
                    <option value="{{$kat->id}}">{{$kat->nama_kategori}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm">
                <button class="btn btn-sm btn-success" type="submit">Export to Excel</button>
        </form>
        
        <a href="{{url('tambah_produk')}}">
            <button class="btn btn-sm btn-danger">Tambah Produk</button>
        </a>
    </div>
    </div>

    <div class="x_content">
        <table class="table table-responsive">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Image</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Kategori Produk</th>
                <th scope="col">Harga Beli</th>
                <th scope="col">Harga Jual</th>
                <th scope="col">Stok Produk</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @include('produk.produk_ajax')
            </tbody>
        </table>

    </div>

    <div id="search-list"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
      
      function fetch_data(search="") {
        $.ajax({
            url:"{{url('/search')}}?search=" +search,
           success:function(data){
            $('.x_content tbody').html(data);
           }
        })
       }
       $(document).on('keyup', '#search', function(){
          var search = $('#search').val();
          fetch_data(search);
       });
   
       function fetch_kategori(search="") {
        $.ajax({
            url:"{{url('/search')}}?search=" +search,
           success:function(data){
            $('.x_content tbody').html(data);
            // alert('Load'+search);
           }
        })
       }
       $('#select_kategori').change(function(){
          var search = $('#select_kategori').val();
          fetch_kategori(search);
       });

    });
</script>

@stop