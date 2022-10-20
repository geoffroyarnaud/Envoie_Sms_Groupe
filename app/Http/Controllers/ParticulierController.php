<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agence;
use Exception;
use Twilio\Rest\Client;

class ParticulierController extends Controller
{
    public function index()
    {
        // affichage des particuliers
        $data = Agence::select()->where("TypeClient", "P" )->get();
        return view('admin.particulier', compact('data'));
    }

    public function envoie(Request $request)
    {
        // récuperation des numéro et du corps du message
        $message = $request->message;

        foreach ($request->Telephone as $numero) {
            try {
                $particuler = Agence::where('contact', $numero)->first();

                // configuration de l'api d'envoie de message
                $account_sid = getenv("TWILIO_SID");
                $auth_token = getenv("TWILIO_TOKEN");
                $twilio_number = getenv("TWILIO_FROM");

                // intialisation d'un envoie
                $client = new Client($account_sid, $auth_token);
                $client->messages->create($numero, [
                    'from' => $twilio_number,
                    'body' => "Bonjour ".$particuler->Nom." ".$message]);

            } catch (Exception $e) {
                dd("Error: ". $e->getMessage());
            }
        }

        return redirect()->back()->with('message','Message envoyé avec succès aux '.count($request->Telephone). ' personnes sélectionnées.');

    }
}
