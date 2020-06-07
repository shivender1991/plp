<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Model\MasterSced;
use App\Admin\Model\MasterElement;
use App\Admin\Model\MasterAttribute;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MappingformValidation;
use App\Http\Requests\ScedDataformValidation;
use Excel;
use App\Imports\MasterScedImport;




class FederalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.federal.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }


    /**
     * Show the form for maping with attribute and elements a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mapping($id)
    {
        $MasterSCEDData = MasterSced::find($id);
        $elements = MasterElement::where('status', 1)->get();
        $attributes = MasterAttribute::where('status', 1)->get();
        //echo '</pre>'; print_r($elements); echo '<pre>'; exit;
        return view('admin.federal.mapping',['MasterSCEDData'=>$MasterSCEDData, 'elements'=>$elements, 'attributes'=>$attributes]);
    }

/**
     * Show the form for maping with attribute and elements a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storemapping(Request $request,$id)
    {
    
    //echo '<pre>'; print_r( json_encode( $request->all() ) ); echo '</pre>'; exit;
    //  $validatedData = $request->validate([
    //     'scedcourse'=>'required',
    //     'scedtitle'=>'required',
    //     'sceddesc'=>'required',
    //     'changestatus'=>'required',
    //     'courselevel'=>'required',
    //     'carnegieunit'=>'required',
    //     'gradespan'=>'required',
    //     'sequnceofcourse'=>'required',
    //     'gradespan'=>'required'
    // ]);
      // call model
      $updatedata = MasterSced::find($id);

      // received data from post
      // $updatedata->data_course_level                            = $request->input('courselevel');
      // $updatedata->carnegie_unit_credit                         = $request->input('carnegieunit');
      // $updatedata->grade_span                                   = $request->input('gradespan');
      // $updatedata->sequence_of_course                           = $request->input('sequnceofcourse');
      // $updatedata->SCED_creer_cluster                           =  join('|',$request->input('scedcarrier'));
      // $updatedata->additional_credit_type                       =  join('|',$request->input('credittype'));
      // $updatedata->course_GPA_applicability                     =  join('|',$request->input('coursegpa'));
      // $updatedata->course_funding_program                       =  join('|',$request->input('coursefunding'));
      // $updatedata->high_school_course_requirement               = $request->input('highschool');
      // $updatedata->instruction_language                         =  join('|',$request->input('instructionlang'));
      // $updatedata->curriculum_frame_type                        =  join('|',$request->input('curriculamfram'));
      // $updatedata->course_aligned_with_standards                = $request->input('coursealignstan');
      // $updatedata->course_certification_description             =  join('|',$request->input('coursecertificate'));
      // $updatedata->k12_end_of_course_requirement                = join('|',$request->input('k12endofcourse'));
      // $updatedata->course_applicable_education_level            = join('|',$request->input('courseapplicable'));
      // $updatedata->NCAA_eligibility                             = $request->input('ncca');
      // $updatedata->course_section_instructional_delivery_mode   = join('|',$request->input('coursesectioninst'));
      // $updatedata->family_and_consumer_science_course_indicator = $request->input('familyandconsumer');
      // $updatedata->work_based_learning_opportunity_type         = join('|',$request->input('workbasedlearning'));

      $updatedata->map_field_data = json_encode( $request->all() );
      $updatedata->created_by = Auth::user()->id;
      $updatedata->updated_by = Auth::user()->id;
      // save data in table
      if($updatedata->save()){
          return redirect('federal/view')->with('sucess', 'Data has been inserted successfully!!');
      }else{
          return redirect('federal/view')->with('error', 'Data has been not updated please try agian!!');
      }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
		if($request->input('format') == 'manual'){
            // form validation
            // form validation
             $this->validate($request, [
                'scedcoursecode'=>'required',
                'coursetitle'=>'required',
                'coursedescription'=>'required',
                'changestatus'=>'required',
            ]);
            // call model
            $insertdata = new MasterSced;
            // received data from post
            $insertdata->SCED_course_code                 = $request->input('scedcoursecode');
            $insertdata->SCED_course_title                = $request->input('coursetitle');
            $insertdata->SCED_course_description          = $request->input('coursedescription');
            $insertdata->change_status                    = $request->input('changestatus');
            $insertdata->created_by                       = Auth::user()->id;
            $insertdata->updated_by                       = Auth::user()->id;
            // save data in table
            if($insertdata->save()){
                 return redirect('federal/upload')->with('sucess', 'Data has been inserted successfully!!');
            }else{
                return redirect('federal/upload')->with('error', 'Data has been not inserted please try agian!!');
            }
        }elseif($request->input('format') == 'import'){
            //import code here
            $this->validate($request, [
               'select_file' => 'required|mimes:xls,xlsx'
            ]);

            $format                 = $request->input('format');
            $import                 = new MasterScedImport();
            $import->setFormat($format);
            Excel::import($import, request()->file('select_file'));


       // Excel::import(new MasterScedElementImport, request()->file('select_file'));
        return back()->with('sucess', 'Excel Data Imported successfully');

        }elseif($request->input('format') == 'api'){
           // api code here 
        }
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view()
    { 
	
		 $SCEdData=MasterSced::all();
		 return view('admin.federal.list',['scedData'=>$SCEdData]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userviewData=Userdetail::find($id);
        return view('admin.federal.view',['users'=>$userviewData]);
    }

  /**
     * display the form specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload()
    {
       return view('admin.federal.upload');
    }
	
	    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $usereditData=Userdetail::find($id);
        return view('admin.federalfederalfederal.edit',['users'=>$usereditData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UserformValidation $request, $id)
    {
	  $validated = $request->validated();
	  $userDetails=Userdetail::find($id);
	  $userDetails->firstName		 = $request->input('fname');
	  $userDetails->lastName		 = $request->input('lname');
	  $userDetails->email			 = $request->input('email');
	  //$userDetails->username		 = $request->input('username');
	  //$userDetails->password  	 = $request->input('password');
	  $userDetails->instituteId 	 = $request->input('instituteId');
	  $userDetails->addressId		 = $request->input('addressid');
	  $userDetails->titleId	 		 = $request->input('titleid');
	  $userDetails->gender	 		 = $request->input('gender');
	  $userDetails->status			 = $request->input('status');
	  $userDetails->created_by		 = $userDetails->created_by;
	  $userDetails->updated_by		 = Auth::user()->id;
	  if($userDetails->save()){
		  return redirect('admin/federalfederal/view')->with('sucess', 'Data has been updated successfully!!');
	  }else{
		  return redirect('admin/federalfederal/view')->with('error', 'Data has been not updated please try agian!!');
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

	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assignRole(Request $request)
    {
		// get all role id
		$roleassign = $request->input('roleassign');
		// get user id with mapping multiple role id
		$user_id = $request->input('user_id');
		DB::table('user_role')
			->where('user_id', $user_id)
			->update(['status' => 0]);
		// if condition check not empty 
		if(!empty($roleassign) && !empty($user_id)){
				foreach($roleassign as $rolekey => $roleId){
					if(strtolower($roleId) =='on') {
						$roleId=$rolekey;
						$users = DB::table('user_role')
								 ->select('status')
								 ->where('user_id', $user_id)
								 ->where('role_id', $roleId)
								 ->get();
						if(count($users) > 0){
							 DB::table('user_role')
								->where('user_id', $user_id)
								->where('role_id', $roleId)
								->update(['status' => 1]);
							
						}else{
							 DB::table('user_role')->insert([
								'user_id' => $user_id,
								'role_id' => $roleId,
								'status' => 1,
								'created_by' => Auth::user()->id,
								'updated_by' => Auth::user()->id
							]);
						} 
								
					}
				}
			return redirect('admin/federal/view')->with('sucess', 'User Role mapping has been mapped successfully!!');		
		}else{
			return redirect('admin/federal/view')->with('error', 'You must check at least one role!!!');
		}
	}
	// active or inactive function
	public function ajaxCallActiveDeactive(Request $request)
	{
		$user_id = $request->input('id');
		$userDetails=Userdetail::find($user_id);
		if($userDetails->status == '1'){
			$status=0;
		}else{
			$status=1;
		}
		
		$userDetails->status			 = $status;
		$userDetails->updated_by		 = Auth::user()->id;
		if($userDetails->save()){
		  return redirect('admin/federal/view')->with('sucess', 'Data has been updated successfully!!');
		}else{
		  return redirect('admin/federal/view')->with('error', 'Data has been not updated please try agian!!');
		}		
	}
	
	// for assign pop function
	public function userajaxCallPopUp(Request $request)
	{
	
		$user_id = $request->input('id');
		$roleData=Role::where('status',1)
				->orderBy('id', 'asc')
				 ->get();
		$data=array();
		foreach($roleData as $key=>$roleDatas){
			 $roleId=$roleDatas['id'];
			$users = DB::table('user_role')
								->select('status')
								->where('user_id', $user_id)
								->where('role_id', $roleId)
								->orderBy('id', 'desc')
								->get();
								
			if(!empty($users[0]->status)){
				$status=$users[0]->status;
			}else{
				$status=0;
			}
			$data['viewData'][$key]['roledata']=$roleDatas;
			$data['viewData'][$key]['status']=$status;
		}
			echo json_encode($data);
			exit;	 
	}
	

}
