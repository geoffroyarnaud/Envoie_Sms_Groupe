<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Agence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){

        if(Auth::id()){

            return redirect('home');

        }else
        {

            return view('admin.index');

        }

    }

    public function redirect()
        {
            if(Auth::id()){

                $agence = Agence::all();

                return view('admin.index',compact('agence'));

            }else
            {
                return redirect()->back();
            }

        }

    public function particulier()
    {
        if(Auth::id()){

            $data = Agence::select()->where("TypeClient", "=", "P" )->get();

            return view('admin.particulier', compact('data'));

        }else
        {
             return redirect('login');
        }
    }

    public function transpchauff()
    {
        if(Auth::id()){

            $data = Agence::select()->where("TypeClient", "=", "T" )->get();

            return view('admin.transpchauff',compact('data'));

        }else
        {
         return redirect('login');
        }
    }

    public function mecanogarag()
    {
        if(Auth::id()){

            $data = Agence::select()->where("TypeClient", "=", "M")->orderBy("id", "desc")->get();

            return view('admin.mecanogarag',compact('data'));

        }else
        {
            return redirect('login');
        }
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

        return redirect()->back()->with('message', 'Client Enregistrer Avec success');
    }
}
