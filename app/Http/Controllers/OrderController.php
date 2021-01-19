<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;

class OrderController extends Controller
{
  public function create(Request $request)
  {
    $this->validate($request,[
      'fullname'=>'required',
      'address'=>'required',
      'products'=>'required',
      'phoneNo'=>'required',
      'confirm'=>'required',
      'date'=>'required',
  ]);

  $order=new Orders();
  $order->fullname=$request->input("fullname");
  $order->address=$request->input("address");
  $order->products=$request->input("products");
  $order->phoneNo=$request->input("phoneNo");
  $order->date=$request->input("date");
  $order->save();
  return redirect()->back()->with('success', 'Success::You Just Ordered a Product we will get back to you.');
}
}
