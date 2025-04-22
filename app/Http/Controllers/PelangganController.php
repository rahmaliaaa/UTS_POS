<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(){
        return Pelanggan::all();
    }

    public function store(Request $request){
        return Pelanggan::create($request->all());
    }

    public function show($id){
        return Pelanggan::findOrFail($id);
    }

    public function update(Request $request, $id){
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($request->all());
        return $pelanggan;
    }

    public function destroy($id){
        return Pelanggan::destroy($id);
    }
}
