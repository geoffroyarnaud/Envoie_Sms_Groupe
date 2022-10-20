<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Agence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){

        return redirect('home');
    }

    public function redirect(){

        $agence = Agence::all();
        return view('admin.index',compact('agence'));
    }


    public function transpchauff()
    {
        $data = Agence::select()->where("TypeClient", "T" )->get();
        return view('admin.transpchauff',compact('data'));
    }

    public function mecanogarag()
    {
        $data = Agence::select()->where("TypeClient", "M")->orderBy("id", "desc")->get();
        return view('admin.mecanogarag',compact('data'));

    }

    public function client_register()
    {
        return view('admin.cliregister');
    }

    public function enregistrement_cli(Request $request)
    {
        $data = new Agence();
        $data->Nom = $request->nom;
        $data->Profession = $request->profession;
        $data->Contact = $request->numero;
        $data->Typeclient = $request->typecli;
        $data->save();

        return redirect()->back()->with('message', 'Client Enregistré Avec success');
    }
}
