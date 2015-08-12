<?php namespace App\Http\Controllers;
use Input;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}

	public function pagesAdd(){
		return view('pages/add');
	}

	public function pagesEdit(){
		return view('pages/edit');
	}

	public function pagesSave(){
			return view('pages/edit');
		}

	public function newsAdd(){
		return view('news/add');
	}

	public function newsEdit(){
		return view('news/edit');
	}

	public function eventsAdd(){
		return view('events/add');
	}

	public function eventsEdit(){
		return view('events/edit');
	}

	public function upload() {
		if(Input::hasFile('file')) {
			//upload an image to the /img/tmp directory and return the filepath.
			$file = Input::file('file');
			$tmpFilePath = '/img/tmp/';
			$tmpFileName = time() . '-' . $file->getClientOriginalName();
			$file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
			$path = $tmpFilePath . $tmpFileName;
			return response()->json(array('path'=> $path), 200);
		} else {
			return response()->json(false, 200);
		}
	}
}
