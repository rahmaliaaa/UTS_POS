<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class PelangganController extends Controller
{
    public function index(){
        $page = (object)[
            'title' => 'Data Pelanggan'
        ];
        $breadcrumb = 'Data Pelanggan';
        $activeMenu = 'pelanggan';
        return view('pelanggan.index', compact('page', 'breadcrumb', 'activeMenu'));
    }

    public function list(){
        $data = Pelanggan::all();
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                return '
                    <button class="btn btn-warning btn-sm editBtn" data-id="' . $row->id . '">Edit</button>
                    <button class="btn btn-danger btn-sm deleteBtn" data-id="' . $row->id . '">Hapus</button>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create_ajax(){
        return view('pelanggan.create_ajax');
    }

    public function store_ajax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|numeric',
            'alamat' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'msgField' => $validator->errors()
            ]);
        }

        $pelanggan = Pelanggan::create($validator->validated());

        return response()->json([
            'status' => true,
            'message' => 'Data pelanggan berhasil ditambahkan',
            'data' => $pelanggan
        ]);
    }

    public function edit_ajax($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit_ajax', compact('pelanggan'));
    }

    public function update_ajax(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|numeric',
            'alamat' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'msgField' => $validator->errors()
            ]);
        }

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($validator->validated());

        return response()->json([
            'status' => true,
            'message' => 'Data pelanggan berhasil diperbarui',
            'data' => $pelanggan
        ]);
    }

    // Tambahkan method confirm_ajax untuk menampilkan modal
    public function confirm_ajax($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.confirm_ajax', compact('pelanggan'));
    }

    // Ubah method delete_ajax untuk mengeksekusi hapus
    public function delete_ajax($id)
    {
        $pelanggan = Pelanggan::find($id);
        if ($pelanggan) {
            $pelanggan->delete();
            return response()->json(['status' => true, 'message' => 'Data pelanggan berhasil dihapus']);
        }
        return response()->json(['status' => false, 'message' => 'Data pelanggan tidak ditemukan']);
    }

    }
