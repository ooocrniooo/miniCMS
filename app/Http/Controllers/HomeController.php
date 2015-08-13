<?php namespace App\Http\Controllers;
use Input;
use Illuminate\Http\Request;
use App\Pages;

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

	public function pagesEdit($id){
		$page = Pages::where('id', '=', $id)->first();

		return view('pages/edit', compact('page'));
	}

	public function pagesSave(Request $request){



		if($request->get('pageoption') == 'add') {
//			dd('ADD');
			$page = Pages::create([
				'title' => $request->get('title'),
				'slug' => $request->get('slug'),
				'content' => $request->get('content'),
				'description' => $request->get('description'),
				'keywords' => $request->get('keywords'),
				'visible' => $request->get('visible'),
				'featured' => $request->get('featured'),
				'category' => $request->get('category'),
				'forms' => '0'
			]);
		}
		if($request->get('pageoption') == 'edit') {
//			dd('nista');
			$page = Pages::find(1)->first();
			$page->title = $request->get('title');
			$page->slug = $request->get('slug');
			$page->content = $request->get('content');
			$page->description = $request->get('description');
			$page->keywords = $request->get('keywords');
			$page->visible = $request->get('visible');
			$page->featured = $request->get('featured');
			$page->category = $request->get('category');
			$page->save();
		}
		return view('pages/edit', compact('page'));
		}

	public function pagesList(){
		$pages = Pages::all();
		return view('pages/list', compact('pages'));
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
