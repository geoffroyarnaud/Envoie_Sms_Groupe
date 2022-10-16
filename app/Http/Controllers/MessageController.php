<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        //print_r($Telephones);

       // exit();

       $data = array(
        'authkey' => $authkey,
        'Telephones' => $Telephone,
        'message' => $encodeMessage,
        'sender' => $senderId,
        'route' => $route,
       );
       
    }
}
