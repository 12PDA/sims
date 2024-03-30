<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Exports\ProdukExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProdukController extends Controller
{
    public function index(){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Anda belum login, silahkan login terlebih dahulu');
        }
        else{
            $data['kategori']   = Kategori::all();
            $data['res'] = DB::table('produk')
                            ->join('kategori', 'produk.id_kategori', '=', 'kategori.id')
                            ->select('produk.id as id_produk', 'produk.*', 'kategori.*')
                            ->orderby('produk.id', 'DESC')
                            ->paginate(10);
            return view('produk.all_produk', $data);
        }
    }

    public function add(){
        $kategori   = Kategori::all();
        return view('produk.add_produk',compact('kategori'));
    }

    function proses_tambah(Request $request){
        $this->validate($request,[
            'id_kategori' => 'required',
            'nama_produk' => 'required|unique:produk',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:100'
         ]);

        // $filetype = '|file|image|mimes:jpeg,png,jpg|max:200';
        $filename = $request->file('gambar');
        $nama_file = time()."_".$filename->getClientOriginalName();
        $fileloc   = '../public/uploads/';
        $filename->move($fileloc,$nama_file);
        Produk::create([
            'id_kategori'   => $request->id_kategori,
            'nama_produk'   => $request->nama_produk,
            'harga_beli'   => $request->harga_beli,
            'harga_jual'   => $request->harga_jual,
            'stok'         => $request->stok,
            'foto'       => $nama_file,
        ]);
        return redirect('/');
    }

    function hapus($id){
        $gambar = Produk::where('id', $id)->first();
            File::delete(public_path('/uploads/').$gambar->foto);
            Produk::where('id', $id)->delete();
        return redirect('/');
    }

    function edit($id){
        $data= array(
            'produk' => Produk::where('id', $id)->first(),
            'kategori'   => Kategori::all()
        );
        return view('produk.edit_produk', $data);
    }

    public function proses_update(Request $request, $id){
        $this->validate($request,[
            'id_kategori' => 'required',
            'nama_produk' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
         ]);
        $cek = $request->gambar;
        if($cek != null){
            $gambar = Produk::select('foto')->where('id', $id)->first();
            File::delete(public_path('/uploads/').$gambar->foto);

            $filetype = '|file|image|mimes:jpeg,png,jpg|max:100';
            $filename = $request->file('gambar');
            $nama_file = time()."_".$filename->getClientOriginalName();
            $fileloc   = '../public/uploads/';
            $filename->move($fileloc,$nama_file);

            $edit = DB::table('produk')->where('id', $id)->update([
                'id_kategori'   => $request->id_kategori,
                'nama_produk'   => $request->nama_produk,
                'harga_beli'   => $request->harga_beli,
                'harga_jual'   => $request->harga_jual,
                'stok'         => $request->stok,
                'foto'       => $nama_file,
            ]);

            return redirect('/');
        }
        //Edit data tanpa foto
        $edit = DB::table('produk')->where('id', $id)->update([
            'id_kategori'   => $request->id_kategori,
            'nama_produk'   => $request->nama_produk,
            'harga_beli'   => $request->harga_beli,
            'harga_jual'   => $request->harga_jual,
            'stok'         => $request->stok
        ]);
        return redirect('/');
    }
    
    public function search(Request $request){
        if($request->ajax())
         {
 
              $search = $request->get('search');
              if($search != ''){
                $search = str_replace(" ", "%", $search);
                $res = DB::table('produk')
                            ->join('kategori', 'produk.id_kategori', '=', 'kategori.id')
                            ->where('nama_produk', 'like', '%'.$search.'%')
                            ->orwhere('id_kategori', 'like', '%'.$search.'%')
                            ->select('produk.id as id_produk', 'produk.*', 'kategori.*')
                            ->paginate(10);
              } else{
                $res = DB::table('produk')
                            ->join('kategori', 'produk.id_kategori', '=', 'kategori.id')
                            ->where('nama_produk', 'like', '%'.$search.'%')
                            ->orwhere('id_kategori', 'like', '%'.$search.'%')
                            ->select('produk.id as id_produk', 'produk.*', 'kategori.*')
                            ->paginate(10);
              }
              return view('produk.produk_ajax', compact('res'));
         }
    }

    function export_excel(Request $request){
        // $id_kategori= $request->input('id_kategori');
        // dd($id_kategori);
        $method = $request->method();
        if ($request->isMethod('post'))
        {
            $id_kategori= $request->input('id_kategori');
                // select search
                $search = DB::table('produk')
                    ->where('id_kategori', 'like', '%'.$id_kategori.'%');
                // dd($search);
                return Excel::download(new ProdukExport($id_kategori), 'Produk-Excel.xlsx');
        }
    }

    public function searchProduk(Request $request){
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '') {
                $data = DB::table('produk')
                    ->join('kategori', 'produk.id_kategori', '=', 'kategori.id')
                    ->where('nama_produk', 'like', '%'.$query.'%')
                    ->select('produk.id as id_produk', 'produk.*', 'kategori.*')
                    ->paginate(5);
                    
            } else {
                $data = DB::table('produk')
                    ->join('kategori', 'produk.id_kategori', '=', 'kategori.id')
                    ->select('produk.id as id_produk', 'produk.*', 'kategori.*')
                    ->paginate(5);
            }
             
            $total_row = $data->count();
            if($total_row > 0){
                $no=1;
                foreach($data as $row)
                {
                    $output .= '
                            <tr>
                                <td>'.$no.'</td>
                                <td><img src="uploads/'.$row->foto.'" width="20px"></td>
                                <td>'.$row->nama_produk.'</td>
                                <td>'.$row->nama_kategori.'</td>
                                <td>'.$row->harga_beli.'</td>
                                <td>'.$row->harga_jual.'</td>
                                <td>'.$row->stok.'</td>
                                <td>
                                    <a href="produk/edit/'.$row->id_produk.'"><i class="bi-pencil-fill text-primary"></i></a>
                                    <a onclick="return confirm(\'Anda Yakin Menghapus '.$row->nama_produk.'?\')" href="produk/hapus/'.$row->id_produk.'"><i class="bi-trash-fill text-danger"></i></a>
                                    
                                </td>
                            </tr>
                    ';
                $no++;
                }

            } else {
                $output = '
                <tr>
                    <td align="center" colspan="5">No Data Found</td>
                </tr>
                ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );
            echo json_encode($data);
        }
    }
}
