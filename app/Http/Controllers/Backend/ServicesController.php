<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use DataTables; 

class ServicesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        return view('backend.services.index');
    }

   
    /**
     * get datatable response
     */
    public function getdataTableResponse(Request $request)
    {
       
        if($request->ajax()) {

          

            $data = Service::query();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function($row){
                    return view('backend.services.datatable_action',compact('row'));
                })
                ->editColumn('status', function($row){
                    $status = true;
                    return view('backend.services.datatable_action',compact('row','status'));
                })
                ->rawColumns(['actions','status'])
                ->toJson();
          }
    }

    /**
     * @param $request
     * store data
     */
    public function store(Request $request)
    {

        try{

            $insertData                          = new Service;
            $insertData->service_name            = trim($request->service_name);
            $insertData->descriptions            = trim($request->descriptions);
            $insertData->status                  = $request->status;
            $insertData->save();

          


            return response()->json([
                'success'=>1,
                'message'=>'successFully Saved'
            ]);
        
        }catch(\Exception $e){
          return response()->json([
                'success'=>0,
                'message'=>'Something wrong'
            ]);
        }   
    }
   
    /**
     * @param $id
     * edit data
     */
    public function edit($id)
    {
       return Service::find($id);
    }

    /**
     * @param $id
     * show data
     */
    public function show($id)
    {
       
    }

     /**
     * @param $request,$id
     * update data
     */
    public function update(Request $request, $id)
    {

        try{

            $updateData                          =  Service::find($id);
            $updateData->service_name            = trim($request->service_name);
            $updateData->descriptions            = trim($request->descriptions);
            $updateData->status                  = $request->status;
            $updateData->save();

        
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


  
    /**
     * @param $id
     *  delete data
     */
    public function destroy($id)
    {
        
       try{
            
           $destroyData =  Service::find($id);
           $destroyData->delete();

          return response()->json([
                'success'=>1,
                'message'=>'successFully Deleted'
            ]);

        }catch(\Exception $e){
          return response()->json([
                'success'=>0,
                'message'=>'Something Wrong'
            ]);

        }

        
    }


  
}
