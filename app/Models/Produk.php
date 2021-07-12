<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produk extends Model
{
    public function allData()
    {
        return DB::table('produk')
                ->get();
    }

    public function detail($id)
    {
        return DB::table('produk')
                ->where('id', $id)
                ->first();
    }

    public function addData($data)
    {
        DB::table('produk')
            ->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('produk')
            ->where('id', $id)
            ->update($data);
    }

    public function cari($nama)
    {
        DB::table('produk')
            ->where('nama_barang','LIKE','%$nama%')
            ->where('kode_barang', 'LIKE', '%$nama%')
            ->get();
    }
}
