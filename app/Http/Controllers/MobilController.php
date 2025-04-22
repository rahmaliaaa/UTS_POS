<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function index(){
        return Mobil::all();
    }

    public function store(Request $request){
        return Mobil::create($request->all());
    }

    public function show($id){
        return Mobil::findOrFail($id);
    }

    public function update(Request $request, $id){
        $mobil = Mobil::findOrFail($id);
        $mobil->update($request->all());
        return $mobil;
    }

    public function destroy($id){
        return Mobil::destroy($id);
    }
}
