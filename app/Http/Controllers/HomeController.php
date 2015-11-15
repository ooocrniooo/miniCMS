<?php namespace App\Http\Controllers;
use App\Models\EventClients;
use App\Models\Events;
use App\Models\Pages;
use App\Models\FlightArrival;
use App\Models\FlightDeparture;

use App\Models\TransferCars;
use App\Models\TransferCityExtend;
use App\Models\TransferClients;
use App\Models\TransferStartCity;
use Input;
use Session;
use Html;
use Illuminate\Pagination;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
//use App\Http\Requests\AddEventRequest;
use Illuminate\Support\MessageBag;
use Illuminate\Foundation\Validation;
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
			// checking file is valid.

			if (Input::file('image')->isValid()) {
				$destinationPath = 'images/featured'; // upload path
				$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
//				$fileName = rand(11111,99999).'.'.$extension; // renameing image
				$fileName = $page->id.'-'.$request->get('slug').'.'.$extension; // renameing image

				Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
				// sending back with message
				Session::flash('success', 'Upload successfully');
//				return Redirect::to('upload');
				Pages::where('id', '=', $page->id)->first();
				$page->image = $fileName;
				$page->save();
			}
		}
		if($request->get('pageoption') == 'edit') {
//			dd($request);
			$page = Pages::where('id', '=', $request->get('pageid'))->first();

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

	public function eventsEdit(Request $request, $id){
		if($request->get('pageoption')  == 'adddepartureflight'){
			return 'DTARTDATE';
		}
		$timetableArrival = FlightArrival::where('event_id', $id)->get();
		$timetableDeparture = FlightDeparture::where('event_id', $id)->get();
		$event = Events::where('id', '=', $id)->first();
		return view('events/edit', compact('event', 'timetableArrival', 'timetableDeparture'));
	}

	public function eventsList(){
		$events = Events::all();

		return view('events/list', compact('events'));
	}

	public function eventsSaveArr(Request $request, $id, $fromair, $startdate, $starttime, $fromway, $location){
		if($fromway == 'arrival'){
			$flight = new FlightArrival();
		}
		else{
			$flight = new FlightDeparture();
		}

		$flight->event_id = $id;
		$flight->date = $startdate;
		$flight->time = $starttime;
		$flight->from = $fromair;
		$flight->to = $location;

		$flight->save();

		$sendvar = $id.' - '.$fromair.' - '.$startdate.' - '.$starttime.' - '.$fromway;
		return $sendvar;
//		}
	}

	public function eventsSaveDep(Request $request){
		if($request->get('pageoption')  == 'adddepartureflight'){
			dd('SAVE Deppppp');
			return 'DTARTDATE';
		}
	}

	public function eventsSave(Request $request){

//dd($request);
		// Validate the form request, redirect on fail

		if($request->get('pageoption') == 'add') {
			$event = Events::create([
				'title' => $request->get('title'),
				'slug' => $request->get('slug'),
				'content' => $request->get('content'),
				'description' => $request->get('description'),
				'keywords' => $request->get('keywords'),
				'startdate' => $request->get('startdate'),
				'enddate' => $request->get('enddate'),
				'location' => $request->get('locationtxt'),
				'visible' => $request->get('visible'),
				'featured' => $request->get('featured'),
				'category' => $request->get('category'),
				'festival' => $request->get('festival'),
				'forms' => '0'
			]);
			// checking file is valid.

			if(!is_null(Input::file('image'))){
				if (Input::file('image')->isValid()) {
					$destinationPath = 'images/featured'; // upload path
					$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
	//				$fileName = rand(11111,99999).'.'.$extension; // renameing image
					$fileName = $event->id.'-'.$request->get('slug').'.'.$extension; // renameing image

					Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
					// sending back with message
					Session::flash('success', 'Upload successfully');
	//				return Redirect::to('upload');
					Events::where('id', '=', $event->id)->first();
					$event->image = $fileName;
					$event->save();
				}
			}
		}
//		dd($request);
		if($request->get('pageoption') == 'edit') {
//			dd($request);
			$event = Events::where('id', '=', $request->get('pageid'))->first();

			$event->title = $request->get('title');
			$event->slug = $request->get('slug');
			$event->content = $request->get('content');
			$event->description = $request->get('description');
			$event->keywords = $request->get('keywords');
			$event->startdate = $request->get('startdate');
			$event->enddate = $request->get('enddate');
			$event->location  = $request->get('locationtxt');
			$event->visible = $request->get('visible');
			$event->featured = $request->get('featured');
			$event->category = $request->get('category');
			$event->festival = $request->get('festival');
			$event->forms = '0';
			$event->save();
		}

		$timetableArrival = FlightArrival::where('event_id', $event->id)->get();
		$timetableDeparture = FlightDeparture::where('event_id', $event->id)->get();

		return Redirect::to('events/edit/'.$event->id)->with('id', $event->id);
//		return view('events/edit', compact('event', 'timetableArrival', 'timetableDeparture'));
	}

public function eventsGetCoachTable($id, $airport, $way){
	if($way == 'arrival'){
		$timetableArrival = FlightArrival::where('event_id', $id)->where('from', $airport)->orderBy('date')->get();
	}else{
		$timetableArrival = FlightDeparture::where('event_id', $id)->where('from', $airport)->orderBy('date')->get();
	}

	return $timetableArrival;
}


	public function pagesPicUpload(){
		$input = Input::all();
		$rules = array(
			'file' => 'image|max:3000',
		);

		$validation = Validator::make($input, $rules);

		if ($validation->fails())
		{
			return Response::make($validation->errors->first(), 400);
		}

		$file = Input::file('file');

		$extension = File::extension($file['name']);
		$directory = path('public').'uploads/'.sha1(time());
		$filename = sha1(time().time()).".{$extension}";

		$upload_success = Input::upload('file', $directory, $filename);

		if( $upload_success ) {
			return Response::json('success', 200);
		} else {
			return Response::json('error', 400);
		}
	}

//	public function upload() {
//		if(Input::hasFile('file')) {
//			//upload an image to the /img/tmp directory and return the filepath.
//			$file = Input::file('file');
//			$tmpFilePath = '/img/tmp/';
//			$tmpFileName = time() . '-' . $file->getClientOriginalName();
//			$file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
//			$path = $tmpFilePath . $tmpFileName;
//			return response()->json(array('path'=> $path), 200);
//		} else {
//			return response()->json(false, 200);
//		}
//	}



public function eventTransfer(){
	$list = EventClients::where('ID', '>', 0)->paginate(50);
	return view('bookinglist/coachList', compact('list'));
}

public function transTransfer(){
	$list = TransferClients::where('ID', '>', 0)->paginate(50);
	return view('bookinglist/transferList', compact('list'));
}


public function transOptions(){
//	$startCityList = TransferStartCity::all();
	$toCityList = TransferCityExtend::all();
	$startCityList = TransferCityExtend::where('startcity', '1')->get();
	$cars = TransferCars::all();

	return view('options/transferMap', compact('startCityList', 'toCityList', 'cars'));
}

}
