<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Model\User;
use App\Admin\Model\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PermissionformValidation;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
    }
	
	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
	   $permissions=permission::all();
       return view('admin.permission.list',['permissions'=>$permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionformValidation $request)
    {
	  $validated = $request->validated();
      $Permission=new Permission();
	  $Permission->permissionName		 = $request->input('pname');
	  $Permission->permissionUrl		 = $request->input('purl');
	  $Permission->customData			 = $request->input('ccata');
	  $Permission->status				 = $request->input('pstatus');
	  $Permission->created_by			 = Auth::user()->id;
	  $Permission->updated_by	 		 = Auth::user()->id;
	  if($Permission->save()){
		  return redirect('admin/permission/view')->with('sucess', 'Data has been added successfully!!');
	  }else{
		  return redirect('admin/permission/view')->with('error', 'Data has been not added please try agian!!');
	  }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permissions=Permission::find($id);
        return view('admin.permission.view',['permissions'=>$permissions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $permissions=Permission::find($id);
         return view('admin.permission.edit',['permissions'=>$permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionformValidation $request, $id)
    {
	  $validated = $request->validated();
	  $Permission=Permission::find($id);
	  $Permission->permissionName		 = $request->input('pname');
	  $Permission->permissionUrl		 = $request->input('purl');
	  $Permission->customData			 = $request->input('ccata');
	  $Permission->status				 = $request->input('pstatus');
	  $Permission->created_by			 = $Permission->created_by;
	  $Permission->updated_by	 		 = Auth::user()->id;

	  if($Permission->save()){
		  return redirect('admin/permission/view')->with('sucess', 'Data has been updated successfully!!');
	  }else{
		  return redirect('admin/permission/view')->with('error', 'Data has been not updated please try agian!!');
	  }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	// active or inactive function
	public function ajaxCallActiveDeactive(Request $request)
	{
		$role_id = $request->input('id');
		
		$PermissionDetails=Permission::find($role_id);
		
		if($PermissionDetails->status == '1'){
			$status=0;
		}else{
			$status=1;
		}
		
		$PermissionDetails->status			 = $status;
		$PermissionDetails->updated_by		 = Auth::user()->id;
		if($PermissionDetails->save()){
		  return redirect('admin/user/view')->with('sucess', 'Status has been updated successfully!!');
		}else{
		  return redirect('admin/user/view')->with('error', 'Status has been not updated please try agian!!');
		}		
	}
}
