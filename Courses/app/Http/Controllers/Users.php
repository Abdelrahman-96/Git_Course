<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Users extends Controller
{
    const URL = 'http://127.0.0.1:8000/api/courses/';
    const API_KEY = ['API_KEY' => 'ABCDEFG'];
    const HEADER = ['headers' => self::API_KEY];

    public function getIndex()
    {
        $client = new Client();
        $api_response = $client->get(self::URL, self::HEADER);
        $courses = json_decode($api_response->getBody());
        $userId = Auth::user()->id;
        return view('user.index',['courses' => $courses , 'userId' => $userId]);
    }

    public function getUserCreate()
    {
        return view('user.create');
    }

    public function getUserEdit($id)
    {
        $client = new Client();
        $api_response = $client->get(self::URL.$id, self::HEADER);
        $course = json_decode($api_response->getBody());
        return view('user.edit', ['course' => $course, 'courseId' => $id]);
    }

    public function postUserCreate(Request $request)
    {
        $user = Auth::user();
        $client = new Client();
        $this->valid($request);
        $api_response = $client->post(self::URL, ['headers' => self::API_KEY
            , 'json' => [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'userId' =>  $user->id,
            ]]);
        json_decode($api_response->getBody());
        return redirect()->route('user.index')->with('info', 'New name is: '. $request->input('name'));
    }

    public function postUserUpdate(Request $request)
    {
        $client = new Client();
        $this->valid($request);
        $api_response = $client->put(self::URL.$request->input('id'), ['headers' => self::API_KEY
            , 'json' => [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
            ]]);
        json_decode($api_response->getBody());
        return redirect()->route('user.index')->with('info', 'New name is: '. $request->input('name'));
    }

    public function getUserDelete($id)
    {
        $client = new Client();
        $client->delete(self::URL.$id, self::HEADER);
        return redirect()->route('user.index')->with('info', 'course deleted');
    }

    public function valid(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:2',
            'description'=>'required|min:3'
        ]);
    }

}
