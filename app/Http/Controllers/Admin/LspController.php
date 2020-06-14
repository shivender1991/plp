<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Model\MasterSced;
use Illuminate\Support\Facades\Auth;
use App\Admin\Model\MasterStateHeader;
use App\Admin\Model\MasterCourseCatalog;
use App\Admin\Model\MasterLspMapping;
use App\Admin\Model\MasterLspHeader;
use App\Admin\Model\MasterScedHeader;
use App\Admin\Model\MasterStateSced;
use Illuminate\Support\Str;
use App\Admin\Model\MasterElement;
use App\Admin\Model\MasterAttribute;
use Illuminate\Support\Facades\DB;


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
        $MasterCourseCatalog = MasterLspHeader::all();
       
        return view('admin.lsp.create',['fieldNames'=>$MasterCourseCatalog]);
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



    ////  start for all LSP function 
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


           // $lsp_Datas=MasterCourseCatalog::all($request->input('fieldcolumn'));
            $lsp_Datas=DB::table('mdl_course')->select('*')->where('format','topics')->get();
          //  echo "<pre>";
//print_r($lsp_Datas);
          //  die;
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
      $allValues=$request->input('allValue');
      $data ="";
      foreach($allValues as $allValue){
           $data .= "[,$field_one_value]";


      }

       $someData = DB::table('mytable')
    ->where([
        ['field_one',$field_one_value],
        ['field_two' , date('Y-m-d',strtotime($field_two_value))],
        ]
    )
    ->get();


      $lsp_Datas=DB::table('mdl_course')->select('*')->get();
     // $lsp_Datas=MasterCourseCatalog::where(''.$columnWithValue[0].'',''.$columnWithValue[1].'')->get();

      die;
        $resultArray=array();
        $outputHtml ='';
        $outputHtmldropdown='';
        foreach($lsp_selected_fields as $lsp_selected_field){
            $outputHtmldropdown='';
            if($columnWithValue[0] != $lsp_selected_field ){
                $outputHtmldropdown.='<option value=" ">Select '.ucfirst(str_replace('_',' ',$lsp_selected_field)).'</option>';
                foreach($lsp_Datas as  $lspData){
                    $outputHtmldropdown.='<option value="'.$lspData->$lsp_selected_field.'">'.$lspData->$lsp_selected_field.'</option>';
                }
                $resultArray[$lsp_selected_field]=$outputHtmldropdown;
            }
        }
    print_r(json_encode($resultArray));

}

public function getAllData(Request $request)
{
      $columnWithValue=explode('||||||',$request->input('fieldcolumn'));
      $getFederalStateHeaders = MasterLspHeader::where('lsp_federal_state_screen_status', 1)->get();
     // $lsp_Datas=MasterCourseCatalog::where(''.$columnWithValue[0].'',''.$columnWithValue[1].'')->get();
       $lsp_Datas=DB::table('mdl_course')->select('*')->where(''.$columnWithValue[0].'',''.$columnWithValue[1].'')->get();
 
        $outputHtml ='';
        $outputHtml.='<div class="lsp-table-list-scroll"><div class="card-header">
                   <h4><button type="button" class="btn btn-primary" onclick="activeDeactiveColumn(03)"><i class="fas fa-cog"></i></button></h4>
                  </div><div class="table-responsives"><table class="table ShowDataListOfList"><thead>';
        $outputHtml.=' <tr>';
        $outputHtml.='<th>#</th>';
        foreach($getFederalStateHeaders as $getFederalStateHeader){
             $outputHtml.=' <th>'.ucwords(str_replace('_',' ',$getFederalStateHeader->name)).'</th>';
        }

        $outputHtml.='</tr>';
        $outputHtml.='</thead>';
        $outputHtml.='<tbody>';
        $i=0;
        foreach( $lsp_Datas as  $lsp_Data){ 

        //print_r($lsp_Data);die;
        $outputHtml.='<tr>';
        $outputHtml.='<td><div class="form-checkbox">
                       <input type="radio" name="lsp_unique_id" id="lsp_unique_id'.$i.'" value="'.$lsp_Data->id.'">
                    <label class="form-check-labe1" for="lsp_unique_id'.$i.'">
                    </label>
                  </div>';
              foreach($getFederalStateHeaders as $getFederalStateHeader){
                   $name=$getFederalStateHeader->name;
                   $outputHtml.=' <td data-toggle="tooltip" data-placement="top" data-original-title="">'.Str::limit($lsp_Data->$name,50).'</td>';
                    }
            $i++;
        }
        $outputHtml.='</tr>';
        $outputHtml.='</tbody></table></div></div>';
        echo $outputHtml;
    }



//  end for all LSP function 



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
        $columnWithValue=explode('||||||',$request->input('fieldcolumn'));
        if($request->input('state_federal')=='01'){ 
           
            $getFederalStateHeaders = MasterScedHeader::where('lsp_federal_screen_status', 1)->get();
            $lsp_Datas=MasterSced::where(''.$columnWithValue[0].'',''.$columnWithValue[1].'')->get();
          }else if($request->input('state_federal')=='02'){
            $getFederalStateHeaders = MasterStateHeader::where('lsp_state_screen_status', 1)->get();
            $lsp_Datas=MasterStateSced::where(''.$columnWithValue[0].'',''.$columnWithValue[1].'')->get();
          }

          $outputHtml ='';
          $outputHtml.='<div class="federal-state-scrolllist"><div class="card-header">
                 <button type="button" class="btn btn-primary" onclick="activeDeactiveColumn('.$request->input('state_federal').')"><i class="fas fa-cog"></i></button>
                </div><div class="table-responsives"><table class="table" style="width:180%"><thead>';
          $outputHtml.=' <tr>';
          $outputHtml.='<th>#</th>';
          foreach($getFederalStateHeaders as $getFederalStateHeader){
               $outputHtml.=' <th style="width: 200px;font-size: 13px;">'.Str::limit(ucwords(str_replace('_',' ',$getFederalStateHeader->name)),15).'</th>';
          }

          $outputHtml.='</tr>';
          $outputHtml.='</thead>';
          $outputHtml.='<tbody>';
          $i=0;
          foreach( $lsp_Datas as  $lsp_Data){ 

          if($request->input('state_federal')=='01'){ 
           
            $id=$lsp_Data->SCED_course_code;
          }else if($request->input('state_federal')=='02'){
            $id=$lsp_Data->sced_code;
           }

          $outputHtml.='<tr>';
          $outputHtml.='<td>

          <div class="form-checkbox">
                         <input  type="radio" name="federal_state_unique_id" style="margin-left: 8px;" id="federal'.$i.'" value="'.$id.'">
                      <label class="form-check-labe1" for="federal'.$i.'">
                      </label>
                    </div>';
                foreach($getFederalStateHeaders as $getFederalStateHeader){
                                $outputHtml.=' <td>'.Str::limit($lsp_Data[$getFederalStateHeader->name],20).'</td>';
                      }
              $i++;
          }
          $outputHtml.='</tr>';
          $outputHtml.='</tbody></table></div></div>';
          echo $outputHtml;
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

            $getLspMappingDatas = MasterLspMapping::where('course_id', $course_id)->where('sced_course_code', $sced_course_id)->get();
            if(count($getLspMappingDatas) > 0){
                return response()->json([
                    'msg'=>'This data already mapped.'
                    ]);
            }else{
                $insertdata = new MasterLspMapping;
                $insertdata->sced_course_code = $sced_course_id;
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

    function activeDeactiveColumn(Request $request){

      $sced_course_id = $request->input('id');

      if($sced_course_id == '01'){
         $value=$sced_course_id;
          $value='01';
         $ColumnNames = MasterScedHeader::all();
         $tableHeader="Master SCED Header";
      }else if($sced_course_id == '02'){
        $value='02';
         $ColumnNames = MasterStateHeader::all();
         $tableHeader="Master State SCED Header";
      }else{
        $value='03';
         $ColumnNames = MasterLspHeader::all();
         $tableHeader="LSP Header";
      }

          $outputHtml ='';   
          $outputHtml.='
                        <div class="table-responsive">
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

                         if($ColumnName['lsp_federal_screen_status'] == '1'){
                              $checked="checked";
                         }else if($ColumnName['lsp_state_screen_status'] =='1'){
                              $checked="checked";
                         }else if($ColumnName['lsp_federal_state_screen_status'] == '1'){
                              $checked="checked";

                         }   
                              $outputHtml.='<tr>
                                <td class="text-center pt-2">
                                  <div class="custom-checkbox custom-control">
                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"  '.$checked.' name="column_update_checkbox"
                                      id="checkbox-'.$j.'" onclick=activeDeactiveUpdateColumn("'.$value.'#######'.$ColumnName['id'].'")>
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
    // end for active or deactive column for listing  of lsp data mapping with federal or state data

    // start LSP mapped with federal/ state listing
    function fetchTableAfterMappedLspWithFederalState(Request $request){
      $Course_id=$request->input('course_id');
      $outputHtml ='';   
      $outputHtml.='<div class="table-responsive">
                    <table class="table table-striped" id="table-2">
                      <thead>
                        <tr>';

                         if($Course_id){
                           $getLspMappingDatas = MasterLspHeader::where('after_add_lsp_list_screen_status', 1)->get();
                           foreach($getLspMappingDatas as $getLspMappingData){
                                $outputHtml.=' <th>'.ucwords(str_replace('_',' ',$getLspMappingData->name)).'</th>';
                           }
                        }

                        if($request->input('state_federal')  =='01'){
                          $getFederalStateHeaders = MasterScedHeader::where('after_add_lsp_list_screen_status', 1)->get();

                        }else if($request->input('state_federal')  =='02'){
                          $getFederalStateHeaders = MasterStateHeader::where('after_add_lsp_list_screen_status', 1)->get();
                        }

                        foreach($getFederalStateHeaders as $getFederalStateHeader){
                                  $outputHtml.=' <th>'.ucwords(str_replace('_',' ',$getFederalStateHeader->name)).'</th>';
                        }
          $outputHtml.='</tr>
                      </thead>
                      <tbody>';  

              $outputHtml.='<tr>';
                         if($Course_id){
                           $getLspMappingDatas = MasterLspHeader::where('after_add_lsp_list_screen_status', 1)->get();
                           // $getLspcatalogDatas = MasterCourseCatalog::where('id',$Course_id)->get();
                            $getLspcatalogDatas=DB::table('mdl_course')->select('*')->where('id',$Course_id)->get();

                           foreach($getLspMappingDatas as $getLspMappingData){
                            $name=$getLspMappingData->name;
                                $outputHtml.=' <td>'.$getLspcatalogDatas[0]->$name.'</td>';
                           }
                        }

                        if($request->input('state_federal') =='01'){
                          $getFederalStateHeaders = MasterScedHeader::where('after_add_lsp_list_screen_status', 1)->get();
                          $getFederalStateData = MasterSced::where('SCED_course_code',$request->input('sced_course_id') )->get();


                        }else if($request->input('state_federal') =='02'){


                          $getFederalStateHeaders = MasterStateHeader::where('after_add_lsp_list_screen_status', 1)->get();
                          $getFederalStateData = MasterStateSced::where('sced_code',$request->input('sced_course_id') )->get();
                        }

                       foreach($getFederalStateHeaders as $getFederalStateHeader){
                          $outputHtml.=' <td>'.Str::limit($getFederalStateData[0][$getFederalStateHeader->name],50).'</td>';
                        }
    $outputHtml.='</tr>';                                
   $outputHtml.=' </tbody>
                </table>
                    </div>';
      echo $outputHtml;

    }

     // update column for active or deactive
    function activeDeactiveUpdateColumn(Request $request){
    
      if( !empty($request->input('id')) ){
          $id=$request->input('id');
          $data=explode('#######',$id);

          $udaptedvalue="";
          if($data[0] == '01'){
              $updataData = MasterScedHeader::find($data[1]);
              $columnName=$updataData['lsp_federal_screen_status'];
              if($updataData['lsp_federal_screen_status'] =='1'){
                 $udaptedvalue="0";
              }else{
                 $udaptedvalue="1";
              }             
              $updataData->lsp_federal_screen_status = $udaptedvalue;

          }else if($data[0] == '02'){
              $updataData = MasterStateHeader::find($data[1]);
              $columnName=$updataData['lsp_state_screen_status'];
              if($updataData['lsp_state_screen_status'] =='1'){
                 $udaptedvalue="0";
              }else{
                 $udaptedvalue="1";
              }              
              $updataData->lsp_state_screen_status = $udaptedvalue;

          }else if($data[0] == '0101'){
              $updataData = MasterStateHeader::find($data[1]);
              $columnName=$updataData['lsp_state_screen_status'];
              if($updataData['lsp_state_screen_status'] =='1'){
                 $udaptedvalue="0";
              }else{
                 $udaptedvalue="1";
              }              
              $updataData->lsp_state_screen_status = $udaptedvalue;

          }else if($data[0] == '0102'){
              $updataData = MasterAttribute::find($data[1]);
              $columnName=$updataData['lsp_state_screen_status'];
              if($updataData['lsp_state_screen_status'] =='1'){
                 $udaptedvalue="0";
              }else{
                 $udaptedvalue="1";
              }              
              $updataData->lsp_state_screen_status = $udaptedvalue;

          }else{
              $updataData = MasterLspHeader::find($data[1]);
              $columnName=$updataData['lsp_federal_state_screen_status'];
              if($updataData['lsp_federal_state_screen_status'] =='1'){
                 $udaptedvalue="0";
              }else{
                 $udaptedvalue="1";
              }  
              $updataData->lsp_federal_state_screen_status = $udaptedvalue;

          }
            $updataData->created_by = Auth::user()->id;
            $updataData->updated_by = Auth::user()->id;
            if($updataData->save()){
                return response()->json([
                'success'=>'Updated Successfully!'
                ]);
            }else{
                return response()->json([
                    'fail'=>'Something went wrong!'
                ]);
            }
        } 
      }
 // update column for active or deactive
  function settingForAfterAddMappingLspwithFederalState(Request $request){
    
          $state_federal = $request->input('state_federal');
          $outputHtml ='';   
          $outputHtml.='
                        <div class="table-responsive">
                          <table class="table table-striped" id="table-2">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>All Headers</th>
                              </tr>
                            </thead>
                            <tbody>'; 

                          $lspHeaderNames = MasterLspHeader::all();
                          $k=0;
                          foreach( $lspHeaderNames as  $lspHeaderName){
                          $checked=""; 
                          $value='03';
                          if($lspHeaderName['after_add_lsp_list_screen_status'] == '1'){
                                $checked="checked";
                          } 
                              $outputHtml.='<tr>
                                <td class="text-center pt-2">
                                  <div class="custom-checkbox custom-control">
                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"  '.$checked.' name="column_update_checkbox"
                                      id="lspHeaderName-'.$k.'" onclick=settingForAfterAddMappingColumnUpdate("'.$value.'#######'.$lspHeaderName['id'].'")>
                                    <label for="lspHeaderName-'.$k.'" class="custom-control-label">&nbsp;</label>
                                  </div>
                                </td>
                                <td>'.ucwords(str_replace('_',' ',$lspHeaderName['name'])).'</td>
                                  </tr>';   
                                  $k++;                    
                          }
                        if($state_federal == '01'){
                            $j=0; 
                            $masterScedHeaders = MasterScedHeader::all();
                            $elements          = MasterElement::all();
                            $attributes        = MasterAttribute::all();

                            foreach( $masterScedHeaders as  $masterScedHeader){
                            $checked=""; 
                             $value='01';
                             if($masterScedHeader['after_add_lsp_list_screen_status'] == '1'){
                                  $checked="checked";
                             } 
                                $outputHtml.='<tr>
                                  <td class="text-center pt-2">
                                    <div class="custom-checkbox custom-control">
                                      <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"  '.$checked.' name="column_update_checkbox"
                                        id="masterScedHeader-'.$j.'" onclick=settingForAfterAddMappingColumnUpdate("'.$value.'#######'.$masterScedHeader['id'].'")>
                                      <label for="masterScedHeader-'.$j.'" class="custom-control-label">&nbsp;</label>
                                    </div>
                                  </td>
                                  <td>'.ucwords(str_replace('_',' ',$masterScedHeader['name'])).'</td>
                                    </tr>';   
                                    $j++;                    
                              }

                              foreach( $elements as  $element){
                                 $value='0101';
                                  $checked=""; 
                                   if($element['after_add_lsp_list_screen_status'] == '1'){
                                        $checked="checked";
                                   } 
                                      $outputHtml.='<tr>
                                        <td class="text-center pt-2">
                                          <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"  '.$checked.' name="column_update_checkbox"
                                              id="element-'.$j.'" onclick=settingForAfterAddMappingColumnUpdate("'.$value.'#######'.$element['id'].'")>
                                            <label for="element-'.$j.'" class="custom-control-label">&nbsp;</label>
                                          </div>
                                        </td>
                                        <td>'.ucwords(str_replace('_',' ',$element['name'])).'</td>
                                          </tr>';   
                                          $j++;                    
                              }

                              foreach( $attributes as  $attribute){
                                $value='0102';
                                $checked=""; 
                                 if($attribute['after_add_lsp_list_screen_status'] == '1'){
                                      $checked="checked";
                                 } 
                                    $outputHtml.='<tr>
                                      <td class="text-center pt-2">
                                        <div class="custom-checkbox custom-control">
                                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"  '.$checked.' name="column_update_checkbox"
                                            id="attribute-'.$j.'" onclick=settingForAfterAddMappingColumnUpdate("'.$value.'#######'.$attribute['id'].'")>
                                          <label for="attribute-'.$j.'" class="custom-control-label">&nbsp;</label>
                                        </div>
                                      </td>
                                      <td>'.ucwords(str_replace('_',' ',$attribute['name'])).'</td>
                                        </tr>';   
                                        $j++;                    
                              }

                        }else if($state_federal == '02'){

                           $j=0; 
                            $value='02';
                            $ColumnNames = MasterStateHeader::all();


                            foreach( $ColumnNames as  $ColumnName){
                             $checked=""; 
                             if($ColumnName['after_add_lsp_list_screen_status'] == '1'){
                                  $checked="checked";
                             } 
                                $outputHtml.='<tr>
                                  <td class="text-center pt-2">
                                    <div class="custom-checkbox custom-control">
                                      <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"  '.$checked.' name="column_update_checkbox"
                                        id="ColumnName-'.$j.'" onclick=settingForAfterAddMappingColumnUpdate("'.$value.'#######'.$ColumnName['id'].'")>
                                      <label for="ColumnName-'.$j.'" class="custom-control-label">&nbsp;</label>
                                    </div>
                                  </td>
                                  <td>'.ucwords(str_replace('_',' ',$ColumnName['name'])).'</td>
                                    </tr>';   
                                    $j++;                    
                            }
                        }
                         $outputHtml.=' </tbody>
                                      </table>
                                    </div>';
            echo $outputHtml;
      }

     // update column for active or deactive

       // update column for active or deactive
    function settingForAfterAddMappingColumnUpdate(Request $request){
    
      if( !empty($request->input('id')) ){
          $id=$request->input('id');
          $data=explode('#######',$id);

       //   print_r($data);
//die;
          $udaptedvalue="";
          if($data[0] == '01'){
              $updataData = MasterScedHeader::find($data[1]);
              $columnName=$updataData['after_add_lsp_list_screen_status'];
              if($updataData['after_add_lsp_list_screen_status'] =='1'){
                 $udaptedvalue="0";
              }else{
                 $udaptedvalue="1";
              }             
              $updataData->after_add_lsp_list_screen_status = $udaptedvalue;

          }else if($data[0] == '02'){
              $updataData = MasterStateHeader::find($data[1]);
              $columnName=$updataData['after_add_lsp_list_screen_status'];
              if($updataData['after_add_lsp_list_screen_status'] =='1'){
                 $udaptedvalue="0";
              }else{
                 $udaptedvalue="1";
              }              
              $updataData->after_add_lsp_list_screen_status = $udaptedvalue;

          }else{
              $updataData = MasterLspHeader::find($data[1]);
              $columnName=$updataData['after_add_lsp_list_screen_status'];
              if($updataData['after_add_lsp_list_screen_status'] =='1'){
                 $udaptedvalue="0";
              }else{
                 $udaptedvalue="1";
              }  
              $updataData->after_add_lsp_list_screen_status = $udaptedvalue;

          }
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
