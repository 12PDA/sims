<?php

namespace App\Exports;

use App\Models\Produk;
use App\Models\Kategori;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProdukExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct(String $id_kategori = null)
     {
        $this->id_kategori   = $id_kategori;
     }

    //function select data from database 
    public function collection()
    {
        if($this->id_kategori == NULL){
            return Produk::select()
                    ->join('kategori', 'produk.id_kategori', '=', 'kategori.id')
                    ->select('produk.nama_produk', 'kategori.nama_kategori', 'produk.harga_beli','harga_jual', 'produk.stok')
                    ->get();  
        } else{
            return Produk::select()
                    ->join('kategori', 'produk.id_kategori', '=', 'kategori.id')
                    ->where('id_kategori','=',$this->id_kategori)
                    ->select('produk.nama_produk', 'kategori.nama_kategori', 'produk.harga_beli','harga_jual', 'produk.stok')
                    ->get();  
        }
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

    //function header in excel
    public function headings(): array
    {
        return [
            'Nama',
            'Kategori',
            'Harga Beli',
            'Harga Jual',
            'Stok'
       ];
   }
}
