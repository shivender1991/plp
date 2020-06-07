<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Model\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
		return view('admin.dashboard');

    } 
	
	/**
     * get the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $usersData=User::find(Auth::user()->id);
        return view('admin.layouts.profile',['users'=>$usersData]);
    }
	
	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profileUpdate(Request $request, $id)
    {
	  $users=User::find($id);
	  $users->name		 = $request->input('proname');
	  $users->email		 = $request->input('proemail');
	  if($users->save()){
		  return redirect('admin/dashboard')->with('sucess', 'Profile has been updated successfully!!');
	  }else{
		  return redirect('admin/dashboard')->with('error', 'Profie has been not updated please try agian!!');
	  }
	 
    }
}
