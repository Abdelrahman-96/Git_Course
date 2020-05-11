<?php

namespace App\Http\Controllers;

use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Self_;

class Admins extends Controller
{
    const URL = 'http://127.0.0.1:8000/api/admin/';
    const HEADER = ['headers' => [ 'API_KEY' => 'ABCDEFG']];

    public function getIndex()
    {
        $client = new Client();
        $apiResponse = $client->get(self::URL, self::HEADER);
        $users = json_decode($apiResponse->getBody());
        return view('admin.index',['users' => $users]);
    }

    public function block($id)
    {
        $client = new Client();
        $client->get(self::URL.'block/'.$id,self::HEADER);
        return redirect()->back();
    }
    public function unblock($id)
    {
        $client = new Client();
        $client->get(self::URL.'unblock/'.$id, self::HEADER);
        return redirect()->back();
    }
}
