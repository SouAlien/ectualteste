<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login_Model;

class Login extends Controller {
	public function __construct() {
		session_start ();
	}
	public function teste(){
		return response ()->json (array("oi"=>10));
	}
	/**
	 * Controle de login, recebe a requisição e retorna se o usuario esta autenticado ou não
	 *
	 * @return void
	 */
	public function logar(Request $req) {
		$result = array ();
		$user = Login_Model::join ( 'user', 'login.id_gerada', '=', 'user.id_gerada' )->select ( 'user.*' )->where ( 'login.login', '=', $req->input ( 'login' ), 'and' )->where ( 'login.senha', '=', $req->input ( 'senha' ) )->get ();
		$count = $user->count ();
		if ($count == 1) {
			array_push ( $result, array (
					'status' => [ 
							'logado' => true,
							'tipo' => $user [0]->tipo,
							'id_user' => $user [0]->id_gerada 
					] 
			) );
			$this->toDoLogin ( $result );
		} else {
			array_push ( $result, array (
					'status' => [ 
							'logado' => false 
					] 
			) );
			$this->toDoLogin ($result);
		}
		return response ()->json ( $this->statusLogin () );
	}
	/**
	 * Retorna o status da sessão
	 *
	 * @return \Illuminate\Http\JsonResponse;
	 */
	public function status() {
		if (isset ( $_SESSION ['status'] )) {
			return response ()->json ( $this->statusLogin () );
		} else {
			return response ()->json ( $this->toDoLogout () );
		}
	}
	/**
	 * Re
	 *
	 * @return \Illuminate\Http\JsonResponse;
	 */
	public function logout() {
		if (isset ( $_SESSION )) {
			return response ()->json ( $this->toDoLogout () );
		} else {
			return response ()->json ( $this->toDoLogout () );
		}
	}
	/**
	 * Retorna o status do Login
	 *
	 * @return unknown
	 */
	private function statusLogin() {
		return $_SESSION ['status'];
	}
	/**
	 * Realiza o Login
	 *
	 * @param unknown $status        	
	 */
	private function toDoLogin($status) {
		$_SESSION ['status'] = $status;
	}
	/**
	 * Faz o logout
	 */
	private function toDoLogout() {
		if (! isset ( $_SESSION ['status'] )) {
			$_SESSION ['status'] ['logado'] = false;
		} else {
			unset ( $_SESSION ['status'] );
		}
		$_SESSION ['status'] ['logado'] = false;
		return $_SESSION ['status'];
	}
}
