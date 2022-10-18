<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use Illuminate\Http\Request;
use Illuminate\Auth\User;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function Message(Request $request)
    {
        $message = $request->input('message');

        $Telephone = $request->input('Telephone');

         $encodeMessage = urlencode($message);

         $authkey = '';

        $senderId = '';

         $route = 3;

        $postData = $request->all();

        $mobileNumber = implode('', $postData['Telephone']);

        $arr = str_split($mobileNumber, '14');

        $Telephones = implode(",", $arr);

        // try{

        //     $account_sid = getenv("TWILIO_SID");
        //     $auth_token = getenv("TWILIO_TOKEN");
        //     $twilio_number = getenv("TWILIO_FROM");

        //     $client = new Agence([$account_sid], $auth_token);
        //     $client->messages->create($Telephones, [
        //         'from' => $twilio_number,
        //         'body' => $message
        //     ]);
        //     return redirect()->back()->with('response', 'Message Envoyé avec succes');
        // }catch (Exception $e) {
        //     //
       // }
        print_r($Telephone);
       exit();
    }
}
