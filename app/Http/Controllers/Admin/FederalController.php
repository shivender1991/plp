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
use App\Admin\Model\MasterScedHeader;
use App\Admin\Model\MasterScedElementAttribute;




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
        $masterScedData = MasterSced::find($id);
        $elements       = MasterElement::where('federal_element_attribute_screen_status', 1)->get();
        $attributes     = MasterAttribute::where('federal_element_attribute_screen_status', 1)->get();
        $masterScedHeader  = MasterScedHeader::where('federal_element_attribute_screen_status', 1)->get();
       
        return view('admin.federal.mapping',['masterScedData'=>$masterScedData, 'elements'=>$elements, 'attributes'=>$attributes,'masterScedHeaders'=>$masterScedHeader]);
    }

/**
     * Show the form for maping with attribute and elements a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storemapping(Request $request,$id)
    {

        $allFields=$request->input('SCED_course_code');
       // die;
   
      $updatedata = MasterSced::find($id);
      $allHeadersArray=array();
        $masterScedHeaders  = MasterScedHeader::all('name');
        $elements       = MasterElement::where('status', 1)->get();
        $attributes     = MasterAttribute::where('status', 1)->get();
        

        foreach($masterScedHeaders  as $masterScedHeader){
                $allHeadersArray[]=$masterScedHeader['name'];
        }
        foreach($elements  as $element){
                $allHeadersArray[]=$element['input_type_name'];
        }
        foreach($attributes  as $attribute){
                $allHeadersArray[]=$attribute['input_type_name'];
        }
        //print_r($allHeadersArray);
        foreach($allHeadersArray as $allHeader){
            $updatedata->$allHeader=$request->input(''.$allHeader.'');
        }
     // $updatedata->map_field_data = json_encode( $request->all() );
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
        $getFederalHeaders = MasterScedHeader::where('federal_list_status', 1)->get();
        //echo "<pre>";
      //  print_r($getFederalHeaders);die;
		return view('admin.federal.list',['scedDatas'=>$SCEdData,'federal_headers'=>$getFederalHeaders]);
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

function activeDeactiveFederalColumn(Request $request){

      $sced_course_id = $request->input('id');
      $ColumnNames = MasterScedHeader::all();
      $tableHeader="Master SCED Header"; 
      $outputHtml ='';   
      $outputHtml.='<div class="table-responsive">
                  <table class="table table-striped" id="table-2">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>'. $tableHeader.'</th>
                      </tr>
                    </thead>
                    <tbody>'; 
                    $j=0; 
                  foreach( $ColumnNames as  $ColumnName){
                  $checked=""; 

                 if($ColumnName['federal_list_status'] == '1'){
                      $checked="checked";
                 }  
                  $outputHtml.='<tr>
                    <td class="text-center pt-2">
                      <div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"  '.$checked.' name="column_update_checkbox"
                          id="checkbox-'.$j.'" onclick=federalactiveDeactiveUpdateColumn("'.$ColumnName['id'].'")>
                        <label for="checkbox-'.$j.'" class="custom-control-label">&nbsp;</label>
                      </div>
                    </td>
                    <td>'.ucwords(str_replace('_',' ',$ColumnName['name'])).'</td>
                      </tr>';   
                      $j++;                    
              }
             $outputHtml.=' </tbody>
                          </table>
                        </div>';
            echo $outputHtml;
    }

       function federalactiveDeactiveUpdateColumn(Request $request){
    
          if( !empty($request->input('id')) ){
                $id=$request->input('id');
              
                $updataData = MasterScedHeader::find($id);
                $columnName=$updataData['federal_list_status'];
                  if($updataData['federal_list_status'] =='1'){
                     $udaptedvalue="0";
                  }else{
                     $udaptedvalue="1";
                  }             
                  $updataData->federal_list_status = $udaptedvalue;

                    $updataData->created_by = Auth::user()->id;
                    $updataData->updated_by = Auth::user()->id;
                if($updataData->save()){
                    return response()->json([
                    'msg'=>'Updated Successfully!'
                    ]);
                }else{
                    return response()->json([
                        'msg'=>'Something went wrong!'
                    ]);
                }
            }
        }



    static function federalWithElementAttributeMapping()
    {
        $allHeaders=array();
        $masterScedHeaders  = MasterScedHeader::all();
        $elements       = MasterElement::where('federal_element_attribute_screen_status', 1)->get();
        $attributes     = MasterAttribute::where('federal_element_attribute_screen_status', 1)->get();
        $tableHeader="List of fields"; 
        $outputHtml ='';   
        $outputHtml.='<div class="table-responsive">
                  <table class="table table-striped" id="table-2">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>'. $tableHeader.'</th>
                      </tr>
                    </thead>
                    <tbody>'; 
                    $j=0; 
                  foreach($masterScedHeaders as  $masterScedHeader){
                  $checked=""; 
                  $value='01';
                        if($masterScedHeader['federal_element_attribute_screen_status'] == '1'){
                          $checked="checked";
                        }  
                  $outputHtml.='<tr>
                    <td class="text-center pt-2">
                      <div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"  '.$checked.' name="column_update_checkbox"
                          id="masterScedHeader-'.$j.'" onclick=federalElemntAttributeactivedeactive("'.$value.'#######'.$masterScedHeader['id'].'")>
                        <label for="masterScedHeader-'.$j.'" class="custom-control-label">&nbsp;</label>
                      </div>
                    </td>
                    <td>'.ucwords(str_replace('_',' ',$masterScedHeader['name'])).'</td>
                      </tr>';   
                      $j++;                    
              }
              $i=0;
              foreach($elements as  $element){
                $value="02";
                  $checked=""; 
                        if($element['federal_element_attribute_screen_status'] == '1'){
                          $checked="checked";
                        }  
                  $outputHtml.='<tr>
                    <td class="text-center pt-2">
                      <div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"  '.$checked.' name="column_update_checkbox"
                          id="element-'.$i.'" onclick=federalElemntAttributeactivedeactive("'.$value.'#######'.$element['id'].'")>
                        <label for="element-'.$i.'" class="custom-control-label">&nbsp;</label>
                      </div>
                    </td>
                    <td>'.ucwords(str_replace('_',' ',$element['name'])).'</td>
                      </tr>';   
                      $i++;                    
              }
              $k=0;
              foreach($attributes as  $attribute){
                $value="03";
                  $checked=""; 
                        if($attribute['federal_element_attribute_screen_status'] == '1'){
                          $checked="checked";
                        }  
                  $outputHtml.='<tr>
                    <td class="text-center pt-2">
                      <div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"  '.$checked.' name="column_update_checkbox"
                          id="attribute-'.$k.'" onclick=federalElemntAttributeactivedeactive("'.$value.'#######'.$attribute['id'].'")>
                        <label for="attribute-'.$k.'" class="custom-control-label">&nbsp;</label>
                      </div>
                    </td>
                    <td>'.ucwords(str_replace('_',' ',$attribute['name'])).'</td>
                      </tr>';   
                      $j++;                    
              }
             $outputHtml .='</tbody>
                          </table>
                        </div>';
            echo $outputHtml;
       
        }

         function federalElemntAttributeactivedeactive(Request $request){
    
          if( !empty($request->input('id')) ){
                $id=$request->input('id');

                $data=explode('#######',$id);
               // die;
              if($data[0] =='01'){
                $updataData = MasterScedHeader::find($data[1]);
                $columnName=$updataData['federal_element_attribute_screen_status'];
                  if($updataData['federal_element_attribute_screen_status'] =='1'){
                     $udaptedvalue="0";
                  }else{
                     $udaptedvalue="1";
                  }

              }else if($data[0] =='02'){
                $updataData = MasterElement::find($data[1]);
                $columnName=$updataData['federal_element_attribute_screen_status'];
                  if($updataData['federal_element_attribute_screen_status'] =='1'){
                     $udaptedvalue="0";
                  }else{
                     $udaptedvalue="1";
                  }

              }else if($data[0] =='03'){
                $updataData = MasterAttribute::find($data[1]);
                $columnName=$updataData['federal_element_attribute_screen_status'];
                  if($updataData['federal_element_attribute_screen_status'] =='1'){
                     $udaptedvalue="0";
                  }else{
                     $udaptedvalue="1";
                  }


              }
                             
                  $updataData->federal_element_attribute_screen_status = $udaptedvalue;

                    $updataData->created_by = Auth::user()->id;
                    $updataData->updated_by = Auth::user()->id;
                if($updataData->save()){
                    return response()->json([
                    'msg'=>'Updated Successfully!'
                    ]);
                }else{
                    return response()->json([
                        'msg'=>'Something went wrong!'
                    ]);
                }
            }
        }
    }
