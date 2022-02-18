<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\PatientRegister;

class DoctorController extends Controller
{
    public function index()
    {
        $title = "doctors";
        $doctors = Doctor::get();

        return view('doctor',compact(
            'title','doctors',
        ));
    }

    public function create(){
        $title= "Add Medicine";
        $doctors = Doctor::get();
        return view('add-medicine',compact(
            'title','doctors',
        ));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            // 'name'=>'required|max:200',
            'medicine'=>'required|max:200',
            'quantity'=>'required|max:1',
            'description'=>'nullable|max:200',
        ]);
        // $price = $request->price;
        // if($request->discount >0){
        //    $price = $request->discount * $request->price;
        // }
        Doctor::create([
            // 'name'=>$request->name,
            'medicine'=>$request->medicine,
            'quantity'=>$request->quantity,
            'description'=>$request->description,
        ]);
        $notification=array(
            'message'=>"medicines has been added",
            'alert-type'=>'success',
        );
        return redirect()->route('doctor')->with($notification);
    }




//  public function show(Request $request, $id)
//  {
//      $title = "Edit Product";
//      $product = Product::find($id);
//      $purchased_products = Purchase::get();
//      return view('edit-product',compact(
//          'title','product','purchased_products'
//      ));
//  }

    public function destroy(Request $request)
    {
        $product = Doctor::find($request->id);
        $product->delete();
        $notification = array(
            'message'=>"patient has been deleted",
            'alert-type'=>'success',
        );
        return back()->with($notification);
    }
}
