<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;
use Auth;
use App\Models\Discount;
class InvoiceController extends Controller
{
   public function invoice_mail(Request $requsest){

   }

   public function invoice_discount(Request $request)
{
   $user_id = Auth::user()->id;

   // Collect new tax names from the request
   $newTaxNames = collect($request['taxes'])->pluck('name')->toArray();

   // Process each tax item
   foreach ($request['taxes'] as $tax) {
       Tax::updateOrCreate(
           [
               'user_id' => $user_id,
               'name' => $tax['name'] // Match by user and tax name
           ],
           [
               'value' => $tax['value'] // Update the value field if it exists or create it
           ]
       );
   }

   // Delete old tax entries not present in the new input
   Tax::where('user_id', $user_id)
       ->whereNotIn('name', $newTaxNames)
       ->delete();

   return response()->json([
       'status' => 'success',
       'message' => 'Data saved successfully.'
   ], 200);
}

public function saveDiscount(Request $request){
    // dd($request);
    
    $user_id = Auth::user()->id;

    Discount::updateOrCreate(
        ['user_id' => $user_id], // Match by user_id
        [
            'type' => $request->type, // Update the type
            'value' => $request->value // Update the value
        ]
    );

    return response()->json([
        'status' => 'success',
        'message' => 'Discount saved successfully.'
    ], 200);
}
}
