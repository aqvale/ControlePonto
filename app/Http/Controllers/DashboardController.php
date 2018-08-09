<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UsuarioRepository;
use App\Validators\UsuarioValidator;
//use Auth;

class DashboardController extends Controller
{
	private $repository;
	private $validator;

    public function __construct(UsuarioRepository $repository, UsuarioValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function auth(Request $request){
        $data = [
            'userpass' => $request->get('visor')
        ];  

        try {
            \Auth::attempt($data, false);
            return redirect()->route('usuario.login');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        

        dd($request->all());
    	echo "Outro Metodo";
    }
}
