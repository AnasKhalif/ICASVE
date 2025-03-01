<?php

namespace App\Http\Controllers\Landing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Whatsapp;

class WhatsappController extends Controller
{
    public function index()
    {
        $whatsapp = Whatsapp::all();
        
        return view('landingpage-editor.whatsapp.index', compact('whatsapp'));
    }

    public function create(){
        return view('landingpage-editor.whatsapp.create');
    }

    public function store(Request $request){
        $request->validate([
            'nomor' => 'required|string|max:255',
        ]);
        $whatsapp = new Whatsapp();
        $whatsapp->nomor = $request->nomor;
        $whatsapp->save();
        return redirect()->route('landing.whatsapp.index');
    }

    public function edit($id){
        $whatsapp = Whatsapp::find($id);
        return view('landingpage-editor.whatsapp.edit', compact('whatsapp'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nomor' => 'required|string|max:255',
        ]);
        $whatsapp = Whatsapp::find($id);
        $whatsapp->nomor = $request->nomor;
        $whatsapp->save();
        return redirect()->route('landing.whatsapp.index');
    }

    public function destroy($id){
        $whatsapp = Whatsapp::find($id);
        $whatsapp->delete();
        return redirect()->route('landing.whatsapp.index');
    }
}
