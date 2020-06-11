<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Model\MasterStateSced;
use App\Admin\Model\MasterStateHeader;
use App\Admin\Model\MasterStateMetadataValue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StateScedformValidation;
use Excel;
use App\Imports\MasterStateScedImport;
use Maatwebsite\Excel\HeadingRowImport;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;


class StateController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.state.create');
    }

 /**
     * Show the form for maping with attribute and elements a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mapping($id)
    {   $tablecolumnHeader = MasterStateHeader::all();
        $masterstatedata = MasterStateSced::find($id);
        return view('admin.state.mapping',['masterstatedata'=>json_decode($masterstatedata),'tablecolumnHeader'=>$tablecolumnHeader, 'masterStateId'=>$id]);
    }

/**
     * Show the form for maping with attribute and elements a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storemapping(Request $request,$id)
    {
        $updatedata = MasterStateSced::find($id);
        $stateTableHeaders = MasterStateHeader::all('name');
        foreach($stateTableHeaders as  $stateTableHeader){ 
            $columname=$stateTableHeader->name;
            $updatedata->$columname = $request->input(''.$columname.'');
       
        }
        $updatedata->state_field = json_encode( $request->all() );
        $updatedata->updated_by = Auth::user()->id;

        // save data in table
        if($updatedata->save()){
            return redirect('state/view')->with('sucess', 'Data has been mapped successfully!!');
        }else{
            return redirect('state/view')->with('error', 'Data has been not mapped please try agian!!');
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
        $tablecolumnHeader = MasterStateHeader::all();
        //$statescedData=MasterStateSced::all()->limit(10);
         $statescedData = MasterStateSced::select('*')->limit(10)->get();
        //echo '<pre>'; print_r($statescedData); echo '</pre>'; exit;
        return view('admin.state.list',['statescedData'=>$statescedData,'tablecolumnHeader'=>$tablecolumnHeader]);
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

            // $this->validate($request, [
            //     'subjectareacode'=>'required',
            //     'subjectarea'=>'required',
            //     'coursecode'=>'required',
            //     'coursetitle'=>'required',
            //     'coursetitle'=>'coursetitle',
            // ]);
            // call model


            $insertdata = new MasterStateSced;
            $stateTableHeaders = MasterStateHeader::all('name');
            foreach($stateTableHeaders as  $stateTableHeader){ 
            $columname=$stateTableHeader->name;
            $insertdata->$columname = $request->input(''.$columname.'');
       
            }
             //$insertdata->state_field = json_encode( $request->all() );
            $insertdata->format = $request->input('format');
            $insertdata->created_by = Auth::user()->id;
            $insertdata->updated_by = Auth::user()->id;

             // save data in table
            if($insertdata->save()){
                 return redirect('state/view')->with('sucess', 'Data has been inserted successfully!!');
            }else{
                return redirect('state/view')->with('error', 'Data has been not inserted please try agian!!');
            }


            
         }elseif($request->input('format') == 'import'){

            $format = $request->input('format');
            $import = new MasterStateScedImport();
            $import->setFormat($format);
            $headings = (new HeadingRowImport)->toArray(request()->file('select_file'));
            $headerData = $headings[0][0];
            $countexcelHeader = count($headerData);
            $tablecolumnHeader = MasterStateHeader::all();
            $countTableColumn=count($tablecolumnHeader);
            
            if($countexcelHeader != $countTableColumn){
                foreach($headerData as $headerDatas)
                {
                    if(!empty($headerDatas)){
                        $fetchData=MasterStateHeader::where('name', $headerDatas)->get();
                        if(count($fetchData) !=1){
                            $insertdata             = new MasterStateHeader; 
                            $insertdata->name       = trim($headerDatas);
                            $insertdata->created_by = Auth::user()->id;
                            $insertdata->updated_by = Auth::user()->id;
                            $insertdata->save();
                        }
                    }
                }
            // start state alter table column 
             $stateTableHeaders = MasterStateHeader::all('name');
             $headerCount = count($stateTableHeaders);
             $stateHeader="";
            
            for($i = 0; $i < $headerCount; $i++){
                 $stateHeader = $stateTableHeaders[$i]->name;
                    $fieldName = ''.$stateHeader.'';
                if($i == 0){

                   schema::table('master_state_sceds',function($col)  use ($fieldName){
                     $col->string($fieldName, '512')->nullable()->after('format');
                    
                 });

                 }
                   else{
                    $after_column = $stateTableHeaders[$i-1]->name;
                    $after_column1 = ''.$after_column.'';
                   schema::table('master_state_sceds',function($col)  use ($fieldName,$after_column1){
                     $col->text($fieldName,)->nullable()->after($after_column1);
            
                 });
                } 
            }
             // end state alter table column 
            }
             
   
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
    public function show($id)
    {
         $roles=Role::find($id);
         return view('admin.state.view',['roles'=>$roles]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload()
    {
        $tablecolumnHeader = MasterStateHeader::all();
       return view('admin.state.upload',['tablecolumnHeader'=>$tablecolumnHeader]);
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $roles=Role::find($id);
         return view('admin.state.edit',['roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleformValidation $request, $id)
    {
      $role=Role::find($id);
      $role->roleName            = $request->input('rname');
      $role->instituteId         = $request->input('rinstitute');
      $role->status              = $request->input('rstatus');
      $role->created_by          = $role->created_by;
      $role->updated_by          = Auth::user()->id;

      if($role->save()){
          return redirect('admin/state/view')->with('sucess', 'Data has been updated successfully!!');
      }else{
          return redirect('admin/state/view')->with('error', 'Data has been not updated please try agian!!');
      }
     
      //return redirect('admin/role/view');
      //return view('admin.role.list',['roles'=>$roleData]);
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


    public function updateHeaderValue(Request $request)
    {
       //print_r($_POST); 
        $input_header_id = $request->input('hidden_header_id');
        if( !empty($request->input('others_input')) ){
            $header_input_value = trim($request->input('others_input'));
            $insertdata = new MasterStateMetadataValue;
            $insertdata->header_id = $input_header_id;
            $insertdata->metadata_values = $header_input_value;
            $insertdata->created_by = Auth::user()->id;
            $insertdata->updated_by = Auth::user()->id;
            if($insertdata->save()){
                return response()->json([
                'success'=>'Added Successfully!'
                ]);
            }else{
                return response()->json([
                    'fail'=>'Something went wrong!'
                ]);
            }

        }
        
        //$headerDBValues = App\Admin\Model\MasterStateHeader::where('status', 1)->where('id', $tablecolumnHeaders->id)->get();
                      

    }


    public function getHeaderValues(Request $request)
    {
        $header_name = $request->input('header_name');
        $header_id = $request->input('header_id');
         
    $final_arr = array();
    $getMetadataValues = MasterStateMetadataValue::select('metadata_values')->distinct()->where('status', 1)->where('header_id', $header_id)->get();
    if($getMetadataValues){
        $metadata_arr = array();
        foreach($getMetadataValues as $getMetadataValue){
            if( !empty($getMetadataValue->metadata_values) ){
                $metadata_arr[] = $getMetadataValue->metadata_values;
            }
        }
        
    }
    $getSingleColumnStateRows = MasterStateSced::select($header_name)->distinct()->get();
    //print_r($getSingleColumnStateRows); exit;
    if($getSingleColumnStateRows){
        $master_data_arr = array();
        foreach($getSingleColumnStateRows as $getSingleColumnStateRow){
            if( !empty($getSingleColumnStateRow[$header_name]) ){
                $master_data_arr[] = $getSingleColumnStateRow[$header_name];
            }
        }
        
    }
    
        $final_rows = array_merge($metadata_arr,$master_data_arr);
        //print_r($final_rows); exit;
        $result = '';
            if($final_rows){
                    $result .= '<option value=" ">--Choose value--</option>';
                foreach($final_rows as $final_row){
                    $result .= '<option value='.$final_row.'>'.$final_row.'</option>';
                }
                $result .= '<option value="others">Others</option>';
            }else{
                $result .= '<option value=" ">--Choose value--</option>';
                $result .= '<option value="others">Others</option>';
            }
        echo $result;        

    }




    public function showAllColumnsForStateListOnPopUp(){
        $tablecolumnHeaders = MasterStateHeader::where('status', 1)->get();
          $j = 0;        
          $outputHtml ='';   
          $outputHtml.='
                        <div class="table-responsive">
                          <table class="table table-striped" id="table-2">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Table Header</th>
                              </tr>
                            </thead>
                            <tbody>';  
            foreach( $tablecolumnHeaders as  $tablecolumnHeader){
                    if($tablecolumnHeader['state_list_column_status'] == 1){
                        $checked = 'checked';
                    }else{
                        $checked = ' ';
                    }
                    $outputHtml.='<tr>
                                <td class="text-center pt-2">
                                  <div class="custom-checkbox custom-control">
                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                      id="checkbox-'.$j.'" onclick="showHideStateListColumn('.$tablecolumnHeader['id'].')" '.$checked.'>
                                    <label for="checkbox-'.$j.'" class="custom-control-label">&nbsp;</label>
                                  </div>
                                </td>
                                <td>'.ucwords(str_replace('_',' ',$tablecolumnHeader['name'])).'</td>
                                  </tr>';                       
                   
                $j++; }
         $outputHtml.=' </tbody>
                      </table>
                    </div>';

                echo $outputHtml;
    }


    public function showHideStateListColumn(Request $request){
        // update data
        $id = $request->input('header_id');
        
        $updatedata = MasterStateHeader::find($id);
        if($updatedata['state_list_column_status'] =='1'){
        $udaptedvalue="0";
          }else{
             $udaptedvalue="1";
          }
        $updatedata->state_list_column_status = $udaptedvalue;
        $updatedata->updated_by = Auth::user()->id;

        // save data in table
        if($updatedata->save()){
        $tablecolumnHeader = MasterStateHeader::where('state_list_column_status', 1)->get();
        //$statescedData=MasterStateSced::where(''.$columnWithValue[0].'',''.$columnWithValue[1].'')->get();
        //$tablecolumnHeader = MasterStateHeader::all();
        //$statescedData = MasterStateSced::all()->paginate(15);
        $statescedData = MasterStateSced::select('*')->limit(10)->get();
        //print_r($statescedData); exit;
        $output = '';
        $output .= '<div class="table-responsive">';
        $output .= '<table class="table table-striped state-list" id="table-1" >';
        $output .= '<thead>';
        $output .= '<tr>';
        $output .= '<th class="text-center">#</th>';
        foreach($tablecolumnHeader as $tablecolumnHeaders){
            if($tablecolumnHeaders['state_list_column_status'] == 1){
                $output .= '<th style="font-size:10px;">'.strtoupper(str_replace('_',' ',$tablecolumnHeaders['name'])).'</th>';
                    }
                 }

        $output .= '<th class="text-center">Action</th>';
        $output .= '</tr>';
        $output .= '</thead>';
            $output .= '<tbody>';
             if($statescedData){
                $i=1;
                foreach($statescedData as $statescedDatas){
                    $output .= '<tr>';
                        $output .= '<td>'.$i.'</td>';
                    foreach($tablecolumnHeader as $tablecolumnHeaders){
                        $name = $tablecolumnHeaders['name'];
                        $output .= '<td data-toggle="tooltip" data-placement="top">'.$statescedDatas[$name].'</td>';
                    

                    
                 
                 
            } 
            $output .= '<td><a class="btn btn-primary" href="'.route('state.mapping', ['id' => $statescedDatas['id']]).'">Map </a></td>';
           $output .= '</tr>';
               
                 $i++;

        } 



    }else { 

                $output .= '<tr>';
                    $output .= '<td colspan="10">';
                        $output .= '<center style="font-size: 18px;color: red;font-weight: bold;">Data not founds.</center>';
                    $output .= '</td></tr>';
             } 

       $output .= '</tbody>';
       $output .= '</div';
        $output .= '</table>';

        echo $output;
    }


}

}