<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use http\Client\Response;

class SupplierController extends Controller
{
    public function SupplierAll(){
        $suppliers = Supplier::query()->latest()->get();
        return view('backend.supplier.supplier_all',compact('suppliers'));
    }
    //end method
    public function SupplierAdd(){
        return view('backend.supplier.supplier_add');
    }
    //end SupplierAdd method

    public function SupplierStore(Request $request){
//       dd($request->all());
        Supplier::insert([
            'name'=>$request->name,
            'mobile_no'=>$request->mobile_no,
            'email'=>$request->email,
            'address'=>$request->address,
            'created_by'=>Auth::user()->id,
            'created_at'=>Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Supplier Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('supplier/all')->with($notification);

    }
//End method
    public function SupplierEdit($id){

        $supplier = Supplier::findOrFail($id);
        return view('backend.supplier.supplier_edit',compact('supplier'));

    } // End Method

    public function SupplierUpdate(Request $request){

        $sullier_id = $request->id;

        Supplier::findOrFail($sullier_id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Supplier Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);

    } // End Method


//    public function SupplierDelete($id){
//
//        Supplier::findOrFail($id)->delete();
//
//        $notification = array(
//            'message' => 'Supplier Deleted Successfully',
//            'alert-type' => 'success'
//        );
//
//        return redirect()->back()->with($notification);
//    } // End Method

    public function SupplierDelete($id){
        $delId = $id;
        if (Supplier::query()->where('id',$delId)->exists()){
            $delete =Supplier::query()->find($delId);
            $delete->delete();
            if($delete){
                return response()->json([
                    'status'=>'200',
                    'success'=>'Record Deleted',
                ]);
            }else{
                return response()->json([
                    'status'=>'400',
                    'error'=>'Something went to Wrong',
                ]);
            }

        }else{
            return response()->json([
                'status'=>'404',
                'error'=>'Record not found',
            ]);
        }

    }





}
