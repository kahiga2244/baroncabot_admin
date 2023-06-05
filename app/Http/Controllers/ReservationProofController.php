<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Reserve;
use App\Models\Property;
use App\Models\Business;
use App\Models\User;


class ReservationProofController extends Controller
{
    public function index(){
      return view('reservations.index');
    }
   //  public function store(Request $request){
   //    $payment = new Payment;
   //    $payment->name_property = $request-> name_property;
   //    $payment->address_property = $request-> address_property;
   //    $payment->agent_name = $request-> agent_name;
   //    $payment->type = $request-> type;
   //    $payment->plot_no = $request-> plot_no;
   //    $payment->unit_no = $request-> unit_no;
   //    $payment->first_name = $request->first_name;
   //    $payment->last_name = $request->last_name;
   //    // $payment->last_name = $request->first_name_2;
   //    // $payment->last_name = $request->last_name_2;
   //    $payment->email = $request->email;
   //    // $payment->email_2 = $request->email_2;
   //    $payment-> title = $request -> title;
   //    // $payment-> title_2 = $request -> title_2;
   //    $payment->phone_number = $request->phone_number;
   //    // $payment->phone_number = $request->phone_number_2;
   //    $payment->passport = $request->passport;
   //    // $payment->passport = $request->passport_2;
   //    $payment->upload = $request->upload;
   //    $payment->method_of_payment = $request->method_of_payment;
   //    $payment->signature1 = $request -> input('signature1');
   //    // $payment->signature_2 = $request -> signature_2;
   //    $payment->address_1 = $request->address_1;
   //    $payment->state = $request->state;
   //    // $payment->state_2 = $request->state_2;
   //    // $payment->address_2 = $request->address_2;
   //    $payment->postcode = $request->postcode;
   //    $payment->city = $request->city;
   //    // $payment->city_2 = $request->city_2;
   //    $payment->country = $request->country;


   //    $payment->save();

   //      // Redirect back or to a success page
   //      return redirect()->back()->with('success', 'Form submitted successfully!');

   //  }
    public function retrieve(){
      $retrieve = DB::table('buyers')
            ->join('rerservations_form', 'buyers.payment_id', '=', 'rerservations_form.id')
            ->select('*', 'rerservations_form.property_name AS PropertyName', 'buyers.first_name AS BuyersName')
            ->get(8);
      // dd($retrieve);
      return view('reservations.details', compact('retrieve'));
    }
    public function download($id)
    {

          // Retrieve the document from the database based on the $id parameter
          $document = Payment::findOrFail($id); // Replace 'YourModel' with your actual model name

          // Retrieve the image data from the 'upload' column
          $imageData = $document->upload;

          // Set the appropriate response headers for displaying the image in the browser
          return response($imageData)
              ->header('Content-Type', 'image/jpeg'); // Adjust the Content-Type based on the image format
      }

public function store(Request $request)
{
    // Store reservation data
    $reservation = Payment::create([
      //   'signature' => $request->input('signature'),
        'property_name' => $request->input('property_name'),
        'address_property' => $request->input('address_property'),
        'agent_name' => $request->input('agent_name'),
        'plot_no' => $request->input('plot_no'),
        'unit_no' => $request->input('unit_no'),
        'unit_size' => $request->input('unit_size'),
        'unit_price' =>$request->input('unit_price'),
        'type' => $request->input('type'),
        'total_price' => $request->input('total_price'),
        'address_1' => $request->input('address_1'),
        'state' => $request->input('state'),
        'address_2' => $request->input('address_2'),
        'postcode' => $request->input('postcode'),
        'city' => $request->input('city'),
        'country' => $request->input('country'),
        'upload' => $request->input('upload'),
    ]);

    // Store buyer data
    $buyerCount = $request->input('buyer_count', 1);

    for ($i = 1; $i <= $buyerCount; $i++) {
        $buyerSignature = $request->input('signatureData' . $i);
        $buyerFirstName = $request->input('first_name' . $i);
        $buyerLastName = $request->input('last_name' . $i);
        $buyerTitle = $request->input('title' . $i);
        $buyerPhone = $request->input('phone_number' . $i);
        $buyerPassport = $request->input('passport' . $i);
        $buyerEmail = $request->input('email' . $i);

        // Process and store buyer data
        // Here, you can perform any necessary validation or data manipulation

        // Example: Store buyer data in the database
        $reservation->buyers()->create([
            'signature' => $buyerSignature,
            'first_name' => $buyerFirstName,
            'last_name' => $buyerLastName,
            'title' => $buyerTitle,
            'phone_number' => $buyerPhone,
            'email' => $buyerEmail,
            'passport' => $buyerPassport,
        ]);
    }
   // return dd($reservation);
    // Redirect or perform any additional actions after storing the data
    // For example, you can redirect to a success page
    return redirect()->back()->with('success', 'Buyers saved successfully.');
}
public function proof_index($code){
   // $users = User::where('business_code', $code)->first();
   $reservation = Reserve::where('reserve_code',$code)->first();
   $property = Property::where('property_code',$reservation->property_code)->first();
   $unit = Property::where('property_code',$reservation->unit_code)->first();
   $business = Business::where('business_code',$reservation->business_code)->first();
   // $property_reserved =
      //  return($reservation);
  return view('reservations.proof_index', compact('reservation','property','unit','business'));
}


}
