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
public function pdf_download(Request $request){
        // Validate the incoming request
        $request->validate([
            'invoiceData' => 'required|string',
            'business_name' => 'required|string',
            'invoice_number' => 'required|string',
            'invoice_date' => 'required|string',
            'due_date' => 'required|string',
            'invoice_logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        // Prepare the data to be saved
        $invoiceData = json_decode($request->invoiceData, true);  // Decode the JSON invoiceData

        // If a logo is uploaded, store it
        $logoPath = null;
        if ($request->hasFile('invoice_logo')) {
            $logoPath = $request->file('invoice_logo')->store('invoices/logos', 'public');
        }

        // Create a new invoice record
        $invoice = Invoice::create([
            'invoice_number' => $request->invoice_number,
            'business_name' => $request->business_name,
            'invoice_data' => $invoiceData,
            'invoice_date' => $request->invoice_date,
            'due_date' => $request->due_date,
            'logo_path' => $logoPath,
        ]);

        // Return a success response
        return response()->json([
            'message' => 'Invoice saved successfully.',
            'invoice' => $invoice,
        ]);
}
}
