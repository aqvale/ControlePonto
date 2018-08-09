<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login(){
    	return view('user.login');
    }

    public function telaAdmin(){
    	echo "Tela do Admnistrador";
    }

    public function cadastrar(){
    	echo "Tela de cadastro"; 
    }

}
