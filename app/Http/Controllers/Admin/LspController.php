<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Model\MasterSced;
use Illuminate\Support\Facades\Auth;
use App\Admin\Model\MasterStateHeader;
use App\Admin\Model\MasterCourseCatalog;
use App\Admin\Model\MasterLspMapping;
use App\Admin\Model\MasterStateSced;
use Illuminate\Support\Str;


class LspController extends Controller
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
        $MasterCourseCatalog = new MasterCourseCatalog;
        $ColumnName = $MasterCourseCatalog->getTableColumns();
        $i = 0;
        $len = count($ColumnName);
        $columnArray=array();
        foreach( $ColumnName as  $ColumnNames){ 
            if ($i == 0) {
              // 
            } else if ($i > $len -5 ) {
            //
            }else{
               $columnArray[]=$ColumnNames;
            } 
         $i++;
        }
       // print_r($columnArray);
        return view('admin.lsp.create',['fieldNames'=>$columnArray]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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



    // LSP Selected Field
    public function ajaxCallGetForLstCatalogData(Request $request)
    {
        $input_column_names = $request->input('fieldcolumn');
        $output="";
        $output.='<div class="scrolllist">';
        foreach ($input_column_names as  $input_column_name) 
        {
            $output.='<div class="form-group" id="'.$input_column_name.'">';
            $output.='<label>Select '.ucfirst(str_replace('_',' ',$input_column_name)).'</label>';
            $output.='<select  name="'.$input_column_name.'"  class="form-control '.$input_column_name.' " onchange="getDataSelectedDropDown(this.value)">';
            $lsp_Datas=MasterCourseCatalog::all($request->input('fieldcolumn'));
             $output.='<option value=" ">Select '.ucfirst(str_replace('_',' ',$input_column_name)).'</option>';
            foreach ($lsp_Datas as  $lsp_Data) { 
                if(!empty($lsp_Data->$input_column_name)){
                    $output.='<option value="'.$input_column_name.'||||||'.$lsp_Data->$input_column_name.'">'.$lsp_Data->$input_column_name.'</option>';
                }
            }
            $output.='</select>';
            $output.='</div>';
        }
        $output.='</div>';
        // $output.='</div>';
      echo $output;
    exit;
    
    } 

// start for chnage value of drop down after chnage one drop down value in lsp 
public function getDataFromSelectedDropDown(Request $request){

      $lsp_selected_fields=$request->input('lsp_selected_field');
      $columnWithValue=explode('||||||',$request->input('fieldcolumn'));
      $lsp_Datas=MasterCourseCatalog::where(''.$columnWithValue[0].'',''.$columnWithValue[1].'')->get();
        $resultArray=array();
        $outputHtml ='';
        $outputHtmldropdown='';
        foreach($lsp_selected_fields as $lsp_selected_field){
            $outputHtmldropdown='';
            if($columnWithValue[0] != $lsp_selected_field ){
                $outputHtmldropdown.='<option value=" ">Select '.ucfirst(str_replace('_',' ',$lsp_selected_field)).'</option>';
                foreach($lsp_Datas as  $lspData){
                    $outputHtmldropdown.='<option value="">'.$lspData->$lsp_selected_field.'</option>';
                }
                $resultArray[$lsp_selected_field]=$outputHtmldropdown;
            }
        }
    print_r(json_encode($resultArray));

}

public function getAllData(Request $request){
      $outputHtml ='';

      $columnWithValue=explode('||||||',$request->input('fieldcolumn'));
      $lsp_Datas=MasterCourseCatalog::where(''.$columnWithValue[0].'',''.$columnWithValue[1].'')->get();
        $MasterSced  = new MasterCourseCatalog;
        $ColumnNames = $MasterSced->getTableColumns();
        $i = 0;
        $len = count($ColumnNames);
        $outputHtml.='<div class="lsp-table-list-scroll"><div class="card-header">
                   <h4><button type="button" class="btn btn-primary" onclick="activeDeactiveColumn()"><i class="fas fa-cog"></i>Setting</button></h4>
                  </div> <div class="card-body" style="margin-left: -11px;"><div class="table-responsive"><table class="table table-striped ShowDataListOfList"><thead>';
        $outputHtml.=' <tr>';
        $outputHtml.='<th>#</th>';
        foreach( $ColumnNames as  $ColumnName){ 
            if ($i == 0) {
            } else if ($i > $len -5 ) {
            }else{   
               $outputHtml.='<th>'.ucwords(str_replace('_',' ',$ColumnName)).'</th>';
            } 
         $i++;
        }
        $outputHtml.='</tr>';
        $outputHtml.='</thead></div></div>';
        $outputHtml.='<tbody>';
        $i=0;
        foreach( $lsp_Datas as  $lsp_Datas){ 
        $outputHtml.='<tr>';
        $outputHtml.='<td> <div class="form-checkbox">
                       <input class="form-check-input" type="radio" name="lsp_unique_id" id="lsp_unique_id'.$i.'" value="'.$lsp_Datas->id.'">
                    <label class="form-check-labe1" for="lsp_unique_id'.$i.'">
                    </label>
                  </div></td>';
              $j=0;
            foreach( $ColumnNames as  $ColumnName){
            
                if ($j == 0) {
                } else if ($j > $len -5 ) {
                }else{
                    $outputHtml.='<td title="'.$lsp_Datas->$ColumnName.'">'.Str::limit($lsp_Datas->$ColumnName,50).'</td>';       
            }
            $j++;
        } 
               
         $i++;
        }
    $outputHtml.='</tr>';
    $outputHtml.='</tbody></table></div></div>';
    echo $outputHtml;
    exit;
    }

    // start for creating drop down for federal or state 
    public function getDataFromSelectedStateFeDropDown(Request $request){
         $statefederalDropDowns=$request->input('statefederalDropDown');
         $columnWithValue=explode('||||||',$request->input('fieldcolumn'));
        if($request->input('state_federal')=='01'){ 
            $lsp_Datas=MasterSced::where(''.$columnWithValue[0].'',''.$columnWithValue[1].'')->get();
        }else{

             $lsp_Datas=MasterStateSced::where(''.$columnWithValue[0].'',''.$columnWithValue[1].'')->get();
        }
            $resultArray=array();
            $outputHtmldropdown='';
            foreach($statefederalDropDowns as $statefederalDropDown){

                $outputHtmldropdown='';
                if($columnWithValue[0] != $statefederalDropDown ){
                    $outputHtmldropdown.='<option value=" ">Select '.ucfirst(str_replace('_',' ',$statefederalDropDown)).'</option>';
                    foreach($lsp_Datas as  $lspData){
                        $outputHtmldropdown.='<option value="">'.$lspData->$statefederalDropDown.'</option>';
                    }
                    $resultArray[$statefederalDropDown]=$outputHtmldropdown;
                }
              
                
            }
            print_r(json_encode($resultArray)); 
        }

    // end for creating drop down for federal or state 
    public function getDataFromSelectedStateFeTable(Request $request)
    {
        $statefederalDropDowns=$request->input('statefederalDropDown');

        if($request->input('state_federal')=='01'){ 
            $columnWithValue=explode('||||||',$request->input('fieldcolumn'));
            
            $lsp_Datas=MasterSced::where(''.$columnWithValue[0].'',''.$columnWithValue[1].'')->get();
              //  print_r($lsp_Datas); 
            $MasterSced  = new MasterSced;
            $ColumnNames = $MasterSced->getTableColumns();
            $i = 0;
            $len = count($ColumnNames);
            $columnArray=array();
            $outputHtml ='';
            $outputHtml.='<div class="federal-state-scrolllist"><div class="card-header">
                    <h4><button type="button" class="btn btn-primary" onclick="activeDeactiveColumn()"><i class="fas fa-cog"></i>Setting</button></h4>
                  </div><div class="card-body"><div class="table-responsives"><table class="table table-bordered table-md"><thead>';
            $outputHtml.=' <tr>';
             $outputHtml.='<th>#</th>';
            foreach( $ColumnNames as  $ColumnName){ 
                if ($i == 0 || $i == 1 || $i == 2) {
                } else if ($i > $len -5 ) {
                }else{   
                   $outputHtml.='<th>'.ucwords(str_replace('_',' ',$ColumnName)).'</th>';
                } 
             $i++;
            }
            $outputHtml.='</tr>';
            $outputHtml.='</thead>';
            $outputHtml.='<tbody>';
            $i=0;
            foreach( $lsp_Datas as  $lsp_Data){ 
            $outputHtml.='<tr>';
            $outputHtml.='<td><div class="form-checkbox">
                           <input class="form-check-input" type="radio" name="federal_state_unique_id" style="margin-left: 8px;" id="federal'.$i.'" value="'.$lsp_Data->SCED_course_code.'">
                        <label class="form-check-labe1" for="federal'.$i.'">
                        </label>
                      </div>';

                  $j=0;
                foreach( $ColumnNames as  $ColumnName){
                
                    if ($j == 0 || $j == 1 || $j == 2) {
                    } else if ($j > $len -5 ) {
                    }else{
                        $outputHtml.='<td title="'.$lsp_Data->$ColumnName.'">'.Str::limit($lsp_Data->$ColumnName,50).'</td>';       
                }
                $j++;
            } 
                   
             $i++;
            }
            $outputHtml.='</tr>';
            $outputHtml.='</tbody></table></div></div></div>';
            echo $outputHtml;
              
        }else{
            $columnWithValue=explode('||||||',$request->input('fieldcolumn'));

            $lsp_Datas=MasterStateSced::where(''.$columnWithValue[0].'',''.$columnWithValue[1].'')->get();

            $MasterSced  = new MasterStateSced;
            $ColumnNames = $MasterSced->getTableColumns();
            $i = 0;
            $len = count($ColumnNames);
            $columnArray=array();
            $outputHtml ='';



         $outputHtml.='<div class="federal-state-scrolllist"><div class="card-header">
                    <h4><button type="button" class="btn btn-primary" onclick="activeDeactiveColumn()"><i class="fas fa-cog"></i>Setting</button></h4>
                  </div><div class="card-body"><div class="table-responsives"><table class="table table-bordered table-md"><thead>';
            $outputHtml.=' <tr>';
            $outputHtml.='<th>#</th>';
            foreach( $ColumnNames as  $ColumnName){ 
            if ($i == 0 || $i==1) {
            } else if ($i > $len -5 ) {
            }else{   
               $outputHtml.='<th>'.$ColumnName.'</th>';
            } 
            $i++;
            }
            $outputHtml.='</tr>';
            $outputHtml.='</thead>';
            $outputHtml.='<tbody>';
            $i=0;
            foreach( $lsp_Datas as  $lsp_Data){ 
            $outputHtml.='<tr>';
            $outputHtml.='<td><div class="form-checkbox">
                           <input class="form-check-input" type="radio" name="federal_state_unique_id" style="margin-left: 8px;" id="state'.$i.'">
                        <label class="form-check-labe1" for="state'.$i.'" value="'.$lsp_Data->SCED_course_code.'">
                        </label>
                      </div>';

                  $j=0;
                foreach( $ColumnNames as  $ColumnName){
                
                    if ($j == 0 || $j == 1) {
                    } else if ($j > $len -5 ) {
                    }else{
                        $outputHtml.='<td title="'.$lsp_Data->$ColumnName.'">'.Str::limit($lsp_Data->$ColumnName,50).'</td>';       
                }
                $j++;
                } 
                   
             $i++;
            }
            $outputHtml.='</tr>';
            $outputHtml.='</tbody></table></div></div></div>';
            echo $outputHtml;

        }

    }
    // end for lsp listing with radio button 
    // start for federal or state column name listing 
    public function ajaxCallGetForFederalStateColumnName(Request $request)
    {
        // for federal column name
        if($_POST['id']=='01'){
            $MasterSced = new MasterSced;
            $ColumnName = $MasterSced->getTableColumns();
            $i = 0;
            $len = count($ColumnName);
            $columnArray=array();
            foreach( $ColumnName as  $ColumnNames){ 
                if ($i == 0 || $i == 1 || $i == 2 ) {
                } else if ($i > $len -5 ) {
                }else{
                   $columnArray[]=$ColumnNames;
                } 
             $i++;
            }
        print_r(json_encode($columnArray));
        exit;
        // for statte data column name
        }elseif($_POST['id']=='02'){
            $MasterStateHeader=MasterStateHeader::all('name');
            $i = 0;
            $len = count($MasterStateHeader);
            $columnArray=array();
            foreach( $MasterStateHeader as  $ColumnNames){ 
                if ($i == 0) {
                  // 
                } else if ($i > $len -5 ) {
                //
                }else{
                   $columnArray[]=$ColumnNames->name;
                } 
             $i++;
            }
            print_r(json_encode($columnArray));
            exit;
        }
    }


    public function ajaxCallGetForFederalStateData(Request $request)
    {
      

        if($_POST['state_federal'] =='01'){

            $datasss=MasterSced::all($request->input('fieldcolumn'));
        }else if($_POST['state_federal'] =='02'){

            $datasss=MasterStateSced::all($request->input('fieldcolumn'));
        }


        $input_column_names = $request->input('fieldcolumn');
        $output="";
        $output.='<div class="scrolllist">';
        foreach ($input_column_names as  $input_column_name) 
        {   
            $output.='<div class="form-group" id="'.$input_column_name.'">';
            $output.='<label>Select '.ucfirst(str_replace('_',' ',$input_column_name)).'</label>';
            $output.='<select  name="fieldname"  class="form-control '. $input_column_name.'" onchange="getDataSelectedStateFederalDropDown(this.value)">';
            $federal_datas= $datasss;
             $output.='<option value=" ">Select '.ucfirst(str_replace('_',' ',$input_column_name)).'</option>';
            foreach ($federal_datas as  $federal_data) { 
                if(!empty($federal_data->$input_column_name)){
                    $output.='<option value="'.$input_column_name.'||||||'.$federal_data->$input_column_name.'">'.$federal_data->$input_column_name.'</option>';
                }
            }
            $output.='</select>';
            $output.='</div>';
        }
         $output.='</div>';
        echo $output;
        exit;
    } 

// start for mapping lSP data with federal or state data
    public function mappingLspWithFederalStateData(Request $request)
    {
         
            $sced_course_id = $request->input('sced_course_id');
            $course_id = $request->input('course_id');

            $getLspMappingDatas = MasterLspMapping::where('course_id', $course_id)->where('sced_course_id', $sced_course_id)->get();
            if(count($getLspMappingDatas) > 0){
                return response()->json([
                    'msg'=>'This data already mapped'
                    ]);
            }else{
                $insertdata = new MasterLspMapping;
                $insertdata->sced_course_id = $sced_course_id;
                $insertdata->course_id = $course_id;
                $insertdata->created_by = 1;
                $insertdata->updated_by = 1;
                if($insertdata->save()){
                    return response()->json([
                    'msg'=>'Added Successfully!'
                    ]);
                }else{
                    return response()->json([
                    'msg'=>'Something went wrong!'
                    ]);
                }
                }
       
    } 
    // end for mapping lSP data with federal or state data


    // start for active or deactive column for listing  of lsp data mapping with federal or state data

    function activeDeactiveColumn(){
        $MasterSced  = new MasterCourseCatalog;
        $ColumnNames = $MasterSced->getTableColumns();
        $len = count($ColumnNames);
         $j=0;

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
            foreach( $ColumnNames as  $ColumnName){
            
                if ($j == 0) {
                } else if ($j > $len -5 ) {
                }else{
                    $outputHtml.='<tr>
                                <td class="text-center pt-2">
                                  <div class="custom-checkbox custom-control">
                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                      id="checkbox-'.$j.'" onclick="activeDeactiveColumnHeader()">
                                    <label for="checkbox-'.$j.'" class="custom-control-label">&nbsp;</label>
                                  </div>
                                </td>
                                <td>'.ucwords(str_replace('_',' ',$ColumnName)).'</td>
                                  </tr>';                       
                    }
                $j++;
                }
         $outputHtml.=' </tbody>
                      </table>
                    </div>';

                echo $outputHtml;
    }
    // end for active or deactive column for listing  of lsp data mapping with federal or state data

    // start LSP mapped with federal/ state listing
    function fetchTableAfterMappedLspWithFederalState(Request $request){

     // print_r();

     // die;
      $outputHtml ='';   
       if($request->input('course_id')){

          $outputHtml.='ssssssssssss';
       }


       if($_POST['state_federal'] =='01'){
         $outputHtml.='ssssssssssssrrrrrrrrrrrrrrrr';

       }else if($_POST['state_federal'] =='02'){
          $outputHtml.='ssssssffffffffffffssssssrrrrrrrrrrrrrrrr';
       }




       
    echo $outputHtml;

    }
    // start LSP mapped with federal/ state listing
}
