<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Property;
use Auth;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    public function showLoginForm(Request $request, $id=null)
    {
        $id=$request->input('id');
      if (!$id==null) {
        $property=Property::where("property_id",$id)->first();
        if (count($property) > 0) {
            $user=Property::where("property_id",$id)->where("registration",true)->first();
            if($user){
                return view('auth.login')->with([
                    'property_id'=>$id,
                ]);
            }
            else{
                return redirect('/register')->with("msg","No property with this id:$id");
            }
        }else{
          return redirect('/properties')->with("msg","No property with this id:$id");
        }
      }
      return redirect('/properties')->with("msg","Please select location on the map");
    }


    public function showAdminLoginForm(Request $request)
    {
            return view('auth.adminLogin');
           
    }
    

    public function loginCustom(Request $request){
        $this->validate($request,[
            'property_id'=>'required',
            'password'=>'required|min:6'
          ]);
        
          if (Auth::guard('residential')->attempt([
            'property_id'=>$request->property_id,
            'password'=>$request->password
         ],true)){
            return  redirect()->intended('/dashboard');
          }
          elseif(Auth::guard('commercial')->attempt([
            'property_id'=>$request->property_id,
            'password'=>$request->password
         ],true)){
            return  redirect()->intended('/commercial/dashboard');
          }

          return back()->with(array(
            'msg'=>"Inavalid Cridential"
          ));
    }


    public function adminLoginCustom(Request $request){
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required|min:6'
          ]);
        
          if (Auth::attempt([
            'username'=>$request->username,
            'password'=>$request->password
         ],true)){
            return  redirect()->intended('admin/dashboard');
          }
         

          return back()->with(array(
            'msg'=>"Inavalid Cridential"
          ));
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout','showLoginForm']);
        $this->middleware('guest:residential')->except(['logout','showLoginForm']);
        $this->middleware('guest:commercial')->except(['logout','showLoginForm']);
    }
}
