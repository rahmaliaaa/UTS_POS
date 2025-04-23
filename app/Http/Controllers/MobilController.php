<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class MobilController extends Controller
{
    public function index(){
        $page = (object)[
            'title' => 'Data Mobil'
        ];
        $breadcrumb = 'Data Mobil';
        $activeMenu = 'mobil';
        return view('mobil.index', compact('page', 'breadcrumb', 'activeMenu'));
    }
    
    public function list(){
        $data = Mobil::all();

        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                return '
                    <button class="btn btn-warning btn-sm editBtn" data-id="'.$row->id.'">Edit</button>
                    <button class="btn btn-danger btn-sm deleteBtn" data-id="'.$row->id.'">Hapus</button>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    public function create_ajax(){
        return view('mobil.create_ajax');
    }

    public function store_ajax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'merk' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'tipe' => 'required|string|max:225',
            'tahun' => 'required|integer',
            'harga' => 'required|numeric',
            'stok' => 'required|integer', 
        ], [
            'required' => 'data harus terisi'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'msgField' => $validator->errors()
            ]);
        }

        $mobil = Mobil::create($validator->validated());

        return response()->json([
            'status' => true,
            'message' => 'Data mobil berhasil ditambahkan',
            'data' => $mobil
        ]);
    }

    public function show($id)
    {
        $mobil = Mobil::findOrFail($id);
        return view('mobil.show', compact('mobil'));
    }
    
    public function edit_ajax($id)
    {
        $mobil = Mobil::findOrFail($id);
        return view('mobil.edit_ajax', compact('mobil'));
    }

    public function update_ajax(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'merk' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ], [
            'required' => 'data harus terisi'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'msgField' => $validator->errors()
            ]);
        }

        $mobil = Mobil::findOrFail($id);
        $mobil->update($validator->validated());

        return response()->json([
            'status' => true,
            'message' => 'Data mobil berhasil diperbarui',
            'data' => $mobil
        ]);
    }

    public function confirm_ajax($id)
    {
        $mobil = Mobil::find($id);
        return view('mobil.confirm_ajax', compact('mobil'));
    }

    public function delete_ajax($id)
    {
        $mobil = Mobil::find($id);

        if (!$mobil) {
            return response()->json([
                'status' => false,
                'message' => 'Data mobil tidak ditemukan'
            ]);
        }

        $mobil->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data mobil berhasil dihapus'
        ]);
    }

    public function destroy($id)
    {
        return Mobil::destroy($id);
    }
}
