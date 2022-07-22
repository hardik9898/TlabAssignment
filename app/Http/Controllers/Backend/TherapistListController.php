<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TherapistDetail;
use App\Jobs\SendTherapistStatusMailJob;
use DataTables; 

class TherapistListController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.therapist_list.index');
    }

   
    /**
     * get datatable response
     */
    public function getdataTableResponse(Request $request)
    {
       
        if($request->ajax()) {

            $data = TherapistDetail::with([
                'country:id,nicename',
                'state:id,name',
                'therapist_detail_service:id,therapist_detail_id,service_id',
                'therapist_detail_service.service:id,service_name'
            ]);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function($row){
                    return view('backend.therapist_list.datatable_action',compact('row'));
                })
                ->editColumn('admin_status', function($row){
                    $status = true;
                    return view('backend.therapist_list.datatable_action',compact('row','status'));
                })
                ->editColumn('therapist_detail_service.service', function($row){
                    $serviceName = [];
                    foreach($row->therapist_detail_service as $serviceValue)
                    {
                        if(isset($serviceValue->service->service_name)){
                            $serviceName[] = $serviceValue->service->service_name;
                        }
                    }
                    return implode(",",$serviceName);
                })
                ->rawColumns(['actions','status'])
                ->toJson();
          }
    }

   
   
    /**
     * @param $id
     * edit data
     */
    public function edit($id)
    {
       return TherapistDetail::find($id);
    }

  

     /**
     * @param $request,$id
     * update data
     */
    public function update(Request $request, $id)
    {

        try{

            $updateData                          =  TherapistDetail::find($id);
            $updateData->admin_status            = $request->admin_status;
            $updateData->save();
           
            $details['email'] = env('ADMIN_EMAIL');
            dispatch(new SendTherapistStatusMailJob($details));
      
        
            return response()->json([
                'success'=>1,
                'message'=>'successFully Saved'
            ]);
            
                 
            }catch(\Exception $e){
                return response()->json([
                    'success'=>0,
                    'message'=>'Something Wrong'
                ]);
            }
    
    }


  
 


  
}
