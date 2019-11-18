<?php

namespace App\Http\Controllers;

use App\DynamicField;
use Illuminate\Http\Request;

class DynamicFieldController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function add(Request $request)
    {
        $request->validate([
            'addmore.*.brand_id' => 'required',
            'addmore.*.model' => 'required',
            'addmore.*.price' => 'required',
        ]);

        foreach ($request->addmore as $key => $value) {
            DynamicField::create($value);
        }

        return back()->with('success', 'Record Created Successfully.');
    }
}
