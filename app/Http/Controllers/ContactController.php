<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
   public function send(Request $request)
    {
            $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Lead::create([
            'name'        => $request->name,
            'phone'       => $request->phone,
            'message'     => $request->message,
            'source_form' => 'Головна форма (Onepage)', 
            'status'      => 'new',
        ]);

             return response()->json([
            'message' => 'Заявка успішно відправлена!'
        ], 200);
    }
}
