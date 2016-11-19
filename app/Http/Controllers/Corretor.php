<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Auth\GenericUser;
use Illuminate\Http\Request;
class Corretor extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        return response()->json(User::saved());
    }
	public function getId(){
	
	}
    
}
