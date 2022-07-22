<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Validator;
use Hash;
use DB;
use Mail;


class ServiceAPIController extends Controller
{
    /**
     * service list
     */
    public function index()
    {
        $services = Service::select(['id','service_name','descriptions'])->get();
        if(!empty($services[0])){

            return response()->json([
                'servicesData'=>$services,
                'message' =>'Successfully retrived',
                'success' => '1'
            ]);

        }else{

            return response()->json([
                'message' =>'No Data found',
                'success' => '0'
            ]);

        }
    }

    /**
     * store
     */
    public function store(Request $request)
    {
            $service_name = $request->service_name;
            $descriptions = $request->descriptions;

            $validator = Validator::make($request->all(), [
                'service_name' =>'required',
                'descriptions' =>'required',
            ]);

            /* Validation  */
            if($validator->fails()){
                $response = [
                        'success' =>0,
                        'message' => 'Something Went Wrong',
                    ];
                
                $response['data'] = $validator->errors();
                return response()->json($response);
            
            }else{

                Service::create([
                    'service_name'=>$request->service_name,
                    'descriptions'=>$request->descriptions
                ]);
                
                return response()->json([
                    'message' =>'Successfully Saved',
                    'success' => '1'
                ]);

            }
     }
}
