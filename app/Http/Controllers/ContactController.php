<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $data = Contact::all();
        return view('adminContact', [
            'id' => "id",
            'name' => "name",
            'email' => "email",
            'phone' => "phone",
            'pesan' => "pesan",
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        
    }

    public function create()
    {
        
    }
}
