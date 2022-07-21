<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\Service;
use App\Models\TherapistDetail;
use App\Models\TherapistDetailService;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Requests\RegisterRequest;
use App\Jobs\SendUserRegisterEmailJob;
use App\Mail\UserRegisteredMail;
use Mail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
       
        return view('frontend.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request)
    {
       
         /**
         * save user 
         */
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_type' =>'therapist',
            'password' => Hash::make($request->password),
        ]);

        /**
         * save therapist 
         */
        $insertDetail  = new TherapistDetail;
        $insertDetail->user_id = $user->id;
        $insertDetail->name = $request->name;
        $insertDetail->email = $request->email;
        $insertDetail->phone = $request->phone;
        $insertDetail->country_id = $request->country_id;
        $insertDetail->state_id  = $request->state_id;
        $insertDetail->save();
        
        /**
         * save service 
         */
        foreach($request->service_id as $serviceId){

            if($serviceId!=''){

                $insertServices = new TherapistDetailService;
                $insertServices->therapist_detail_id = $insertDetail->id;
                $insertServices->service_id = $serviceId;
                $insertServices->save();

            }

        }

        $details['email'] = env('ADMIN_EMAIL');
        dispatch(new SendUserRegisterEmailJob($details));
      

        Auth::login($user);
        
        return redirect(RouteServiceProvider::HOME);
    }

    public function getCountryAjaxData(Request $request)
    {
        if($request->q && $request->q!=''){
            
            $resultData = Country::where('nicename','LIKE',"%$request->q%")
                            ->pluck('id','nicename')
                            ->take(15);

        }else{

            $resultData = Country::pluck('id','nicename')
                                ->take(15);
        }
        $json = [];
        foreach($resultData as $key=>$resultVal)
        {
            $json[] = ['id'=>$resultVal, 'text'=>$key];
        } 
        
       return response()->json($json);
    }
    
    /**
     * get state date
     */
    public function getStateAjaxData(Request $request)
    {
            
        if($request->q && $request->q!=''){
            
            $resultData = State::where('name','LIKE',"%$request->q%")
                            ->where('country_id',$request->country_id)    
                            ->pluck('id','name')
                            ->take(15);

        }else{

            $resultData = State::
                                where('country_id',$request->country_id)  
                                ->pluck('id','name')  
                                ->take(15);
        }
        
        $json = [];
        foreach($resultData as $key=>$resultVal)
        {
            $json[] = ['id'=>$resultVal, 'text'=>$key];
        } 
        
        return response()->json($json);

    }

    public function getServicesAjaxData(Request $request)
    {
        if($request->q && $request->q!=''){
            
            $resultData = Service::where('service_name','LIKE',"%$request->q%")
                            ->where('status',1)  
                            ->pluck('id','service_name')
                            ->take(15);

        }else{

            $resultData = Service::where('status',1)->pluck('id','service_name')
                                ->take(15);
        }
        $json = [];
        foreach($resultData as $key=>$resultVal)
        {
            $json[] = ['id'=>$resultVal, 'text'=>$key];
        } 
        
       return response()->json($json);
    }
}
