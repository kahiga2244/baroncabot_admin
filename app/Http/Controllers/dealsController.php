<?php

namespace App\Http\Controllers;

use App\Models\Deal_projects;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Deals;
use Session;
use Auth;

class dealsController extends Controller
{
   /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct()
   {
      $this->middleware('auth');
   }

   //deals
   public function index(){
      $properties = Property::whereNull('parent')->where('upload_type','Admin')->orderby('id','desc')->get();
      $deals = Deals::orderby('id','desc')->get();

      return view('pages.property.deals.index', compact('properties','deals'));
   }

   //create deal
   public function store(Request $request){
      $this->validate($request,[
         'title' => 'required',
         'start_date' => 'required',
         'end_date' => 'required',
      ]);

      $code = Str::random(30);

      $deal             = new Deals;
      $deal->deal_code  = $code;
      $deal->title      = $request->title;
      $deal->start_date = $request->start_date;
      $deal->end_date   = $request->end_date;
      $deal->created_by = Auth::user()->admin_code;
      if(!empty($request->cover)){
         $path = base_path().'/public/deals/';

         if (!file_exists($path)) {
            mkdir($path, 0777,true);
         }

         $file = $request->file('cover');

         // GET THE FILE EXTENSION
         $extension = $file->getClientOriginalExtension();
         // RENAME THE UPLOAD WITH RANDOM NUMBER
         $fileName = Str::random(30). '.' . $extension;
         // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
         $file->move($path, $fileName);

         $deal->cover_image = $fileName;
      }
      $deal->save();

      Session::flash('success','Deal added successfully');

      return redirect()->back();
   }

   //view
   public function view($code){
      $deal = Deals::where('deal_code',$code)->first();
      $projects = Deal_projects::join('property','property.property_code','=','deal_projects.unit_code')
                     ->where('deal_projects.deal_code',$code)
                     ->select('*','property.property_code as property_code','property.parent as parentCode')
                     ->orderby('deal_projects.id','desc')
                     ->get();

      return view('pages.property.deals.details', compact('deal','projects'));
   }

   //add units
   public function add_unit(Request $request){
      $this->validate($request,[
         'unit'    => 'required',
         'deals'   => 'required',
         'project' => 'required',
      ]);

		$dealLists = $request->deals;

		foreach($dealLists as $k => $v){
         //check
         $check = Deal_projects::where('unit_code',$request->unit)->where('deal_code',$request->deals[$k])->count();
         if($check == 0){
            $deal 				  = new Deal_projects;
            $deal->deal_code    = $request->deals[$k];
            $deal->unit_code    = $request->unit;
            $deal->project_code = $request->project;
            $deal->allocations  = 0;
            $deal->save();
         }
		}

      return redirect()->back();
   }

   //remove units from deal
   public function remove($unit,$deal){
      Deal_projects::where('unit_code',$unit)->where('deal_code',$deal)->delete();

      Session::flash('success','Unit removed from deal');

      return redirect()->back();
   }
}
