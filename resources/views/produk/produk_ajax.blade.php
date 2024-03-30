@foreach($res as $index => $produk)
<tr>
    <td>{{$index + $res->firstItem()}}</td>
    <td><img src="{{ url('uploads/'.$produk->foto) }}" width="20px"></td>
    <td>{{$produk->nama_produk}}</td>
    <td>{{$produk->nama_kategori}}</td>
    <td>{{$produk->harga_beli}}</td>
    <td>{{$produk->harga_jual}}</td>
    <td>{{$produk->stok}}</td>
    <td>
        <a href="{{ url('produk/edit') }}/{{ $produk->id_produk }}"><i class="bi-pencil-fill text-primary"></i></a>
        <a onclick="return confirm('Apakah anda yakin ingin menghapus data {{ $produk->nama_produk }} ?');" href="{{ url('produk/hapus') }}/{{ $produk->id_produk }}"><i class="bi-trash-fill text-danger"></i></a>
        
    </td>
</tr>
@endforeach
<tr class="">
  <td colspan="8" align="center">{{$res->links()}}</td>
</tr>