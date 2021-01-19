<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\UserCom;
use App\UserRes;
use SebastianBergmann\Comparator\ResourceComparator;
use Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function getProperty(Request $request)
    {
        if ($request->ajax()) {
            $address=Property::where('property_id',$request->input('property_id'))->get();
            return  response()->json(['success'=>true,'address'=>$address[0]->address]);
        }
    }
    
    public function registerRes(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request,[
                'title'=>'required',
            ]);
            UserRes::create([
                'property_title' =>$request->input('title'),
                'property_id' =>$request->input('property_id') ,
                'property_address' =>$request->input('property_address') ,
                'date_o_b' =>$request->input('date_o_b') ,
                'surname' =>$request->input('surname') ,
                'firstname' =>$request->input('firstname') ,
                'middlename' =>$request->input('middle_name') ,
                'email' =>$request->input('email') ,
                'phone_number' =>$request->input('phone_number') ,
                'place_address' =>$request->input('place_o_w') ,
                'occupation' =>$request->input('occupation') ,
                'type_of_o' =>$request->input('type_of_o') ,
                'password' => bcrypt($request->input('password')),
            ]);
            Property::where('property_id',$request->input('property_id'))->update([
                'registration'=>true,
              ]);
            // event(new Registered($user = $this->create($request->all())));
            return  response()->json(['success'=>true,'property_id'=>$request->input('property_id')]);

        }
    }

    public function registerCom(Request $request)
    {
        if ($request->ajax()) {
            UserCom::create([
                'property_id' =>$request->input('property_id') ,
                'property_address' =>$request->input('property_address') ,
                'org_name' =>$request->input('org_name') ,
                'registration_no' =>$request->input('registration_no'),
                'contact_no' =>$request->input('contact_no'),
                'email' =>$request->input('email') ,
                'use' =>$request->input('use'),
                'password' => bcrypt($request->input('password')),
            ]);
            Property::where('property_id',$request->input('property_id'))->update([
                'registration'=>true,
              ]);
            return  response()->json(['success'=>true,'property_id'=>$request->input('property_id')]);
        }
    }


    public function dashboard()
    {
       return view('admin/dashboard');
    }


    public function comDashboard()
    {
       return view('admin/com_dashboard');
    }

    public function mapPage()
    {
        $properties=Property::all();
        return view("user.mapPage")->with([
            'properties'=>$properties,
        ]);
    }

    public function contact()
    {
       return view('user.contact');
    }


    public function about()
    {
       return view('user.about');
    }


    public function guidelines()
    {
       return view('user.guidelines');
    }

    public function paymentSuccess(Request $request)
    {
        if ($request->ajax()) {
            if ($request->input('type')=="commercial") {
            UserCom::where('property_id',$request->input('property_id'))->update([
                'payment'=>true,
            ]);
            }else{
                UserRes::where('property_id',$request->input('property_id'))->update([
                    'payment'=>true,
                ]);
            }
        }
    }
    public function dashboardRedirect()
    {
        if (auth()->user()) {
            return redirect('/admin/dashboard');
            # code...
        }
        elseif (Auth::guard('residential')->user()) {
            return redirect('/dashboard');
        }
        elseif (Auth::guard('commercial')->user()) {
            return redirect('/commercial/dashboard');
        }
    }

    public function invoice($id)
    {
        $order=UserRes::where("property_id",$id)->first();
        $orderC=UserCom::where("property_id",$id)->first();
        
       return view("user.invoice")->with([
           'order'=>$order,
           'orderCom'=>$orderC
       ]);
    }


}
