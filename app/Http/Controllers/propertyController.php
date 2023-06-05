<?php

namespace App\Http\Controllers;

use App\Imports\available_units;
use App\Mail\Notifications;
use App\Models\Business;
use App\Models\Media;
use App\Models\Messages;
use App\Models\Property;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use Excel;
use Mail;
use File;
use Auth;

class propertyController extends Controller
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

   //index
   public function index(){
      $properties = Property::whereNull('parent')->orderby('id','desc')->get();
      return view('pages.property.index', compact('properties'));
   }

   //create
   public function create(){
      return view('pages.property.create');
   }

   //store
   public function store(Request $request){
      $this->validate($request, [
         'property_type' => 'required',
         'title' => 'required',
      ]);

      $code = Str::random(30);

      $property = new Property;
      $property->upload_type              = 'Admin';
      $property->title                    = $request->title;
      $property->property_code            = $code;
      $property->property_type            = $request->property_type;
      $property->location                 = $request->location;
      $property->country                  = $request->country;
      $property->price                    = $request->price;
      $property->unit_type                = $request->unit_type;

      if($request->features != ""){
         $features = $request->features;
         $featimpload = implode(", ", $features);

         $property->features = substr($featimpload, 1);
      }

      if($request->amenities != ""){
         $amenities = $request->amenities;
         $amenimpload = implode(", ", $amenities);

         $property->amenities = substr($amenimpload, 1);
      }

      $property->map = $request->map;
      $property->reservation_fee = $request->reservation_fee;
      $property->payment_plan = $request->payment_plan;
      $property->parking_fee = $request->parking_fee;
      $property->include_parking = $request->include_parking;
      $property->description = $request->description;
      $property->completion_period = $request->completion_period;
      $property->mortgage = $request->mortgage;
      $property->created_by  = Auth::user()->admin_code;

      if(!empty($request->image)){
			$path = base_path().'/public/property/'.$code.'/';

			if (!file_exists($path)) {
            mkdir($path, 0777,true);
         }

			$file = $request->file('image');

         // GET THE FILE EXTENSION
         $extension = $file->getClientOriginalExtension();
         // RENAME THE UPLOAD WITH RANDOM NUMBER
         $fileName = Str::random(8). '.' . $extension;
         // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
         $file->move($path, $fileName);

         $property->image = $fileName;
      }

      $property->save();

      Session::flash('success','Property added successfully');

      return redirect()->route('property.index');
   }

   //edit
   public function edit($propertyCode){
      $property = Property::where('property_code',$propertyCode)->first();
      return view('pages.property.edit', compact('property','propertyCode'));
   }

   //update
   public function update(Request $request,$propertyCode){
      $this->validate($request, [
         'property_type' => 'required',
         'title' => 'required',
      ]);

      $property = property::where('property_code',$propertyCode)->first();
      $property->title                    = $request->title;
      $property->property_type            = $request->property_type;
      $property->location                 = $request->location;
      $property->size                     = $request->size;
      $property->price                    = $request->price;
      $property->unit_type                = $request->unit_type;

      if($request->features != ""){
         $features = $request->features;
         $featimpload = implode(", ", $features);

         $property->features = substr($featimpload, 0);
      }

      if($request->amenities != ""){
            $amenities = $request->amenities;
            $amenimpload = implode(", ", $amenities);

            $property->amenities = substr($amenimpload, 0);
      }
      $property->map = $request->map;
      $property->reservation_fee = $request->reservation_fee;
      $property->payment_plan = $request->payment_plan;
      $property->parking_fee = $request->parking_fee;
      $property->include_parking = $request->include_parking;
      $property->description = $request->description;
      $property->completion_period = $request->completion_period;
      $property->mortgage = $request->mortgage;
      $property->updated_by = Auth::user()->admin_code;
      if(!empty($request->image)){
         $path = base_path().'/public/property/'.$propertyCode.'/';

         if (!file_exists($path)) {
            mkdir($path, 0777,true);
         }

         if ($property->image){
            $delete = $path.$property->image;
            if (File::exists($delete)) {
               unlink($delete);
            }
         }

         $file = $request->file('image');

         // GET THE FILE EXTENSION
         $extension = $file->getClientOriginalExtension();
         // RENAME THE UPLOAD WITH RANDOM NUMBER
         $fileName = Str::random(30). '.' . $extension;
         // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
         $file->move($path, $fileName);

         $property->image = $fileName;
      }

      $property->save();

      Session::flash('success','Property updated successfully');

      return redirect()->back();
   }

   //units
   public function units($propertyCode){
      $property = Property::where('property_code',$propertyCode)->first();

      return view('pages.property.units', compact('property','propertyCode'));
   }

   //upload availability
   public function upload_units(Request $request){
      $this->validate($request, [
         'upload_import' => 'required',
         'projectCode' => 'required'
      ]);

      $file = request()->file('upload_import');

		Excel::import(new available_units($request->projectCode), $file);

      Session::flash('success', 'Units imported Successfully.');

      return redirect()->back();
   }

   //upload availability
   public function upload_individual_units(Request $request){
      $this->validate($request, [
         'unit'           => 'required',
         'unit_size'      => 'required',
         'price_per_sqft' => 'required'
      ]);

      $property = new Property;
      $property->parent          = $request->projectCode;
      $property->property_code   = Str::random(30);
      $property->title           = $request->unit;
      $property->bedrooms        = $request->bedroom;
      $property->floor           = $request->floor;
      $property->size            = $request->unit_size;
      $property->bathrooms       = $request->bathrooms;
      $property->price_per_sqf   = $request->unit_price / $request->unit_size;
      $property->price           = $request->unit_price;
      $property->rent_per_month  = $request->rent_per_month;
      $property->furniture_pack  = $request->furniture_pack;
      $property->save();

      Session::flash('success', 'Units added successfully.');

      return redirect()->back();
   }

   //reserved
   public function reserved(){
      $reserves = Reserve::join('property','property.property_code','=','property_reserved.unit_code')
                        ->join('businesses','businesses.business_code','=','property_reserved.business_code')
                        ->select('*','property_reserved.status as status','property_reserved.property_code as propertyCode')
                        ->orderby('property_reserved.id','desc')
                        ->get();

      return view('pages.property.reserved', compact('reserves'));
   }

   //files
   public function files($propertyCode){
      $files = Media::where('property_code',$propertyCode)->where('type','!=','Floor Plans')->orderby('id','desc')->get();
      $property = Property::where('property_code',$propertyCode)->first();
      $units = Property::where('parent',$propertyCode)->orderby('id','desc')->get();
      return view('pages.property.files', compact('files','property','propertyCode','units'));
   }

   //upload files
   public function file_upload(Request $request){
      //upload images
      if($request->hasFile('files')){

         //directory
         $directory = base_path().'/public/property/'.$request->property_code.'/media/';

         if (!file_exists($directory)) {
         mkdir($directory, 0777,true);
         }

         $files = $request->file('files');

         foreach($files as $file) {
            // GET THE FILE EXTENSION
            $extension = $file->getClientOriginalExtension();
            $size =  $file->getSize();

            // RENAME THE UPLOAD WITH RANDOM NUMBER
            $fileName = Str::random(30). '.' .$extension;

            // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
            $file->move($directory, $fileName);

            $upload = new Media;
            $upload->property_code  = $request->property_code;
            $upload->title          = $request->title;
            $upload->type           = $request->type;
            $upload->file_code	   = Str::random(30);
            $upload->unit_code      = json_encode($request->unit);
            $upload->file_name      = $fileName;
            $upload->file_size      = $size;
            $upload->file_mime      = $file->getClientMimeType();
            $upload->created_by     = Auth::user()->admin_code;
            $upload->save();
         }
      }

      Session::flash('success','Files uploaded successfully');

      return redirect()->back();
   }

   //delete file
   public function file_delete($fileCode){
      $delete = Media::where('file_code',$fileCode)->first();

      $directory = base_path().'/public/property/'.$delete->property_code.'/media/';

      $file = $directory.$delete->file_name;
      if (File::exists($file)) {
         unlink($file);
      }

      $delete->delete();

      Session::flash('success','Files deleted successfully');

      return redirect()->back();

   }

   //videos
   public function videos($propertyCode){
      $files = Media::where('property_code',$propertyCode)->where('section','Video')->get();
      $property = Property::where('property_code',$propertyCode)->first();
      return view('pages.property.videos', compact('files','property','propertyCode'));
   }

   //add video
   public function add_video(Request $request){
      $upload = new Media;
      $upload->property_code  = $request->property_code;
      $upload->file_code	   = Str::random(30);
      $upload->title          = $request->title;
      $upload->file_name      = $request->video_link;
      $upload->created_by     = Auth::user()->admin_code;
      $upload->section        = 'Video';
      $upload->save();

      Session::flash('success','Video added successfully');

      return redirect()->back();
   }

   //delete video
   public function delete_video($fileCode){
      Media::where('file_code',$fileCode)->delete();

      Session::flash('success','Video deleted successfully');

      return redirect()->back();
   }


   public function reserved_details($code){
      $reservation = Reserve::where('reserve_code',$code)->first();
      $property = Property::where('property_code',$reservation->property_code)->first();
      $unit = Property::where('property_code',$reservation->unit_code)->first();
      $business = Business::where('business_code',$reservation->business_code)->first();

      return view('pages.property.reservation_details', compact('reservation','property','unit','business'));
   }

   //approve reserve
   public function approve_reserve_unit($reserveCode){
      $reservation = Reserve::where('reserve_code',$reserveCode)->first();
      $unit = Property::where('property_code',$reservation->unit_code)->first();
      $unit->reserved_by = $reservation->business_code;
      $business = Business::where('business_code',$reservation->business_code)->first();
      $unit->save();

      $reservation->status = 'Reserved';
      $reservation->approved_by = Auth::user()->admin_code;
      $reservation->approved_on = date('Y-m-d');
      $reservation->due_date = date('Y-m-d');
      $reservation->save();

      $reservationDays = 3;
      $subject = 'Unit #'.$unit->title.' Reservation Approved';
      $content = '<h4>Hello, '.$business->name.'</h4><p>Your reservation request has been approved</p>
      <p>Approved on '.date('F jS, Y', strtotime(date('Y-m-d'))).' to '.date('F jS, Y', strtotime(date('Y-m-d'). ' + '.$reservationDays.' days')).'</p>';
      $to = $business->email;
      Mail::to($to)->send(new Notifications($content,$subject));

      //send email
      $message = new Messages;
      $message->business_code    = $reservation->business_code;
      $message->mail_code        = Str::random(30);
      $message->message          = $content;
      $message->subject          = $subject;
      $message->folder           = 'inbox';
      $message->status           = 'Unread';
      $message->mail_to          = $business->business_code;
      $message->mail_from        = 'Admin';
      $message->names            = $business->name;
      $message->reservation_code = $reserveCode;
      $message->created_by       = Auth::user()->admin_code;
      $message->save();

      Session::flash('success','Reservation Approved');

      return redirect()->back();
   }

   //reject reservation
   public function reject_reservation(Request $request,$reserveCode){
      $reservation = Reserve::where('reserve_code',$reserveCode)->first();
      $unit = Property::where('property_code',$reservation->unit_code)->first();
      $business = Business::where('business_code',$reservation->business_code)->first();
      $unit->reserved_by = NULL;
      $unit->save();

      $reservation->status = 'Rejected';
      $reservation->rejection_reason = $request->reason;
      $reservation->updated_by = Auth::user()->admin_code;
      $reservation->save();

      $subject = 'Unit #'.$unit->title.' Reservation Rejected';
      $content = '<h4>Hello, '.$business->name.'</h4><p>Your reservation request has been rejected due to the following reasons</p><p>'.$request->reason.'</p>';
      $to = $business->email;
      Mail::to($to)->send(new Notifications($content,$subject));

      //send email
      $message = new Messages;
      $message->business_code    = $reservation->business_code;
      $message->mail_code        = Str::random(30);
      $message->message          = $content;
      $message->subject          = $subject;
      $message->folder           = 'inbox';
      $message->status           = 'Unread';
      $message->mail_to          = $business->business_code;
      $message->mail_from        = 'Admin';
      $message->names            = $business->name;
      $message->reservation_code = $reserveCode;
      $message->created_by       = Auth::user()->admin_code;
      $message->save();

      Session::flash('success','Reservation rejected');

      return redirect()->back();
   }

   //stop reservation
   public function stop_reservation($reserveCode){
      $reservation = Reserve::where('reserve_code',$reserveCode)->first();
      $unit = Property::where('property_code',$reservation->unit_code)->first();
      $unit->reserved_by = NULL;
      $unit->save();

      $reservation->status = NULL;
      $reservation->updated_by = Auth::user()->admin_code;
      $reservation->reservation_stopped_on = date('Y-m-d');
      $reservation->save();

      Session::flash('success','Reservation stopped');

      return redirect()->back();
   }

   //download sample
   public function download_sample(){
      $file_path = public_path('ImportSample.csv');
      return response()->download( $file_path);
   }

   //floor_plans
   public function floor_plans($propertyCode){
      $files = Media::where('type','Floor Plans')->where('property_code',$propertyCode)->get();
      $property = Property::where('property_code',$propertyCode)->first();
      $units = Property::where('parent',$propertyCode)->orderby('id','desc')->get();
      return view('pages.property.floor_plan', compact('files','property','propertyCode','units'));
   }

   //upload files
   public function floor_plan_upload(Request $request){
      //upload images
      if($request->hasFile('files')){

         //directory
         $directory = base_path().'/public/property/'.$request->property_code.'/media/';

         if (!file_exists($directory)) {
         mkdir($directory, 0777,true);
         }

         $files = $request->file('files');

         foreach($files as $file) {
            // GET THE FILE EXTENSION
            $extension = $file->getClientOriginalExtension();
            $size =  $file->getSize();

            // RENAME THE UPLOAD WITH RANDOM NUMBER
            $fileName = Str::random(30). '.' .$extension;

            // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
            $file->move($directory, $fileName);

            $upload = new Media;
            $upload->property_code  = $request->property_code;
            $upload->unit_code      =json_encode($request->unit);
            $upload->title          = $request->title;
            $upload->type           = 'Floor Plans';
            $upload->file_code	   = Str::random(30);
            $upload->file_name      = $fileName;
            $upload->file_size      = $size;
            $upload->file_mime      = $file->getClientMimeType();
            $upload->created_by     = Auth::user()->admin_code;
            $upload->save();
         }
      }

      Session::flash('success','Files uploaded successfully');

      return redirect()->back();
   }

   //deals settings
   public function deals_settings($propertyCode){
      $property = Property::where('property_code',$propertyCode)->first();
      return view('pages.property.deals', compact('property','propertyCode'));
   }

   //deals settings update
   public function deals_settings_update(Request $request, $propertyCode){
      $property = Property::where('property_code',$propertyCode)->first();
      $property->deal_marketing_statement = $request->deal_marketing_statement;
      $property->save();

      Session::flash('success','Information updated successfully');

      return redirect()->back();
   }
   //comparing companies against reservedby column
   public function compareCompanies()
    {
        $reservations = Reserve::all()->groupBy('reserved_by')->map(function($group) {
            return count($group);
        });

        $reservations = $reservations->sortDesc();

        $most_reserved = $reservations->first();
        $least_reserved = $reservations->last();

        return view('comparison.reservedCompany', [
            'most_reserved' => $most_reserved,
            'least_reserved' => $least_reserved,
        ]);
    }
    public function search(Request $req){

      //    $title = $req->input('title');
      //    $property = Property::where('title', $title)->first();
      //  return view('pages.search', compact('property'));
      $query = $req->input('query');
      $results = Property::query()
         ->where('title', 'LIKE', '%'.$query.'%')
         ->orWhere('location', 'LIKE', '%'.$query.'%')
         ->get();
      //return view('property.index', compact('results'));
      return view('pages.search', compact('results'));

    }
    public function searchreserve(Request $req){

      $reserves = Reserve::join('property', 'property.property_code', '=', 'property_reserved.unit_code')
                  ->join('businesses', 'businesses.business_code', '=', 'property_reserved.business_code')
                  ->select('*', 'property_reserved.status as status', 'property_reserved.property_code as propertyCode')
                  ->orderBy('property_reserved.id', 'desc')
                  ->get();

       $query = $req->input('query');
       $results = Reserve::query()
         ->where('buyer_email', 'LIKE', '%' . $query . '%')
         ->orWhere('buyer_name', 'LIKE', '%' . $query . '%')
         ->get();
      //  return $results;
     return view('pages.searchreserve', compact('results'));
    }
    public function location(){
      return view('pages.location');
      
    }

}
