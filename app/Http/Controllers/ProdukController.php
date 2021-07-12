<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{

    public function __construct()
    {
        $this->ProdukModel = new Produk();
    }


    public function index()
    {
        $data   = [ 'title'     => 'Data Produk',
                    'produk'    => $this->ProdukModel->allData()
        ];

        return view('admin.produk.index', $data);
    }

    public function tambah()
    {
        $data   = [ 'title'     => 'Tambah Data Produk',
        ];

        return view('admin.produk.tambah', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'nama_barang'      => 'required|max:200',
            'kode_barang'      => 'required|max:50|unique:produk,kode_barang',
            'jumlah_barang'    => 'required|max:10',
        ]);

        $data = [   'nama_barang'    => Request()->nama_barang,
                    'kode_barang'   => Request()->kode_barang,
                    'jumlah_barang' => Request()->jumlah_barang,
        ];

        $this->ProdukModel->addData($data);
        return redirect()->route('produk')->with('pesan', 'Data Produk berhasil ditambah');
    }

    public function ubah($id)
    {
        $data   = [ 'title'     => 'Tambah Data Produk',
                    'produk'    => $this->ProdukModel->detail($id)
        ];

        return view('admin.produk.ubah', $data);
    }

    public function prosesUbah($id)
    {
        Request()->validate([
            'nama_barang'      => 'required|max:200',
            'jumlah_barang'    => 'required|max:10',
        ]);

        $data = [   'nama_barang'    => Request()->nama_barang,
                    'jumlah_barang' => Request()->jumlah_barang,
        ];

        $this->ProdukModel->editData($id, $data);
        return redirect()->route('produk')->with('pesan', 'Data Produk berhasil diubah');
    }

    public function prosesCari()
    {
        $search = Request()->cari;
        $data   = [ 'title'         => 'Cari Produk: '.$search ,
                    'produk'        => $this->ProdukModel->cari($search)
        ];

        return view('admin.produk.cari', $data);
    }
}
