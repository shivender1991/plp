<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin\Model\MasterLspHeader;
use App\Admin\Model\MasterScedHeader;
use App\Admin\Model\MasterStateHeader;
use App\Admin\Model\MasterSced;
use App\Admin\Model\MasterStateSced;
use Illuminate\Support\Str;
use App\Admin\Model\MasterElement;
use App\Admin\Model\MasterAttribute;
use App\Admin\Model\MasterLspMapping;
use DB;

class GradplanController extends Controller
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
        $configMainGradPlanDatas = DB::table('config_main_grad_plans')->select('*')->where('status', 1)->get();

        return view('admin.configuration.gradplan.list', ['configMainGradPlanDatas'=>$configMainGradPlanDatas]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$datas = MasterElement::where('status', 1)->get();
        //echo '</pre>'; print_r($datas); echo '</pre>'; exit;
        //return view('admin.federal.elements', ['datas'=>$datas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
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

    // grad plan listing methods start
    public function addMainGradePlan(Request $request){
        $name = trim( $request->input('main_grad_plan_name') );
        $description = trim( $request->input('main_grad_plan_description') );
        $status = trim( $request->input('main_grad_plan_status') );
        if($request->input('main_grad_edit_id') === '0'){
            $result = DB::table('config_main_grad_plans')->insert(
                ['name' => $name, 'description' => $description,'status'=>$status, 'created_by'=>Auth::user()->id, 'updated_by'=>Auth::user()->id,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]
            );
        }else{
            $main_grad_edit_id = $request->input('main_grad_edit_id');
            $result = DB::table('config_main_grad_plans')->where('id', $main_grad_edit_id)->update(['name' => $name, 'description' => $description,'status'=>$status,'updated_by'=>Auth::user()->id,'updated_at' => date('Y-m-d H:i:s')]);
        }

        

        if($result){
            echo '1';
        }else{
            echo '0';
        }
    }

    public function addSubGradePlan(Request $request){
        //echo $request->input('sub_id');
        $main_grad_plan_id = trim( $request->input('main_grad_plan_id') );
        $name = trim( $request->input('sub_grad_plan_name') );
        $description = trim( $request->input('sub_grad_plan_description') );
        $status = trim( $request->input('sub_grad_plan_status') );
        if($request->input('sub_id') == '0'){
            $result = DB::table('config_sub_grad_plans')->insert(
                ['main_grad_plan_id'=>$main_grad_plan_id,'name' => $name, 'description' => $description,'status'=>$status, 'created_by'=>Auth::user()->id,'updated_by'=>Auth::user()->id,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]

            );
        }else{
            $sub_id = $request->input('sub_id');
            $result = DB::table('config_sub_grad_plans')->where('id', $sub_id)->update(['main_grad_plan_id'=>$main_grad_plan_id,'name' => $name, 'description' => $description,'status'=>$status,'updated_by'=>Auth::user()->id,'updated_at' => date('Y-m-d H:i:s')]);
        }
        
        

        if($result){
        $subGradPlanDatas = DB::table('config_sub_grad_plans')->select('*')->where('main_grad_plan_id', $main_grad_plan_id)->where('status', 1)->get();

        $j = 1;        
          $outputHtml ='';   
          $outputHtml.='
                          <table class="table table-striped" id="table-2">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>';
            if(count($subGradPlanDatas) > 0){
                foreach( $subGradPlanDatas as  $subGradPlanData){
                    $outputHtml.='<tr>
                                <td>'.$j.'</td>
                                <td>'.$subGradPlanData->name.'</td>
                                <td>'.$subGradPlanData->description.'</td>
                                <td><a href="javascript:void(0);" onclick="editSubGradPlan('.$subGradPlanData->id.');">Edit</a></td>
                                  </tr>';                  
                   
                $j++; }
         

                
            }else{
                $outputHtml.='<tr><td colspan="10"><center style="font-size: 18px;color: red;font-weight: bold;">Data not founds.</center></td></tr>';
            }
            $outputHtml.=' </tbody>
                      </table>';
           echo $outputHtml;
        }else{
            echo '0';
        }
    }

    public function getGradPlanItemList(Request $request){
        $main_id = $request->input('main_id');
        if(strtolower($request->input('name')) == 'prerequisite'){
            $coulumn_name = $request->input('name');
            $lspHeaders=MasterLspHeader::all();
            $output_pre = '';
            $output_pre .= '<div class="card-body"><div class="form-group">';
            $output_pre .= '<label id="input_type_header">Master Catalog Headers</label>';
            $output_pre .= '<div class="input-group">';
            $output_pre .= '<select id="master_catalog_headers" name="master_catalog_headers[]" multiple=""  data-height="100%" style="height: 100%;" class="form-control" onchange="showSelectedList()">';
            if($lspHeaders){
              foreach($lspHeaders as $lspHeader){
                if($lspHeader['prerequisite_mapping_status'] == 1){
                  $selected = 'selected';
                }else{
                  $selected = '';
                }
                $output_pre .= '<option value="'.$lspHeader['id'].'||||||'.$lspHeader['name'].'" '.$selected.' >'.$lspHeader['name'].'</option>';
              }
            }
            echo $output_pre .= '</select></div></div><div id="show_selected_list"></div></div>';
        }else{
            $subGradPlanDatas = DB::table('config_sub_grad_plans')->select('*')->where('main_grad_plan_id', $main_id)->where('status', 1)->get();

            $j = 1;        
            $outputHtml ='';   
            $outputHtml .='<table class="table table-striped" id="table-2">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Description</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>';
              if(count($subGradPlanDatas) > 0){
                  foreach( $subGradPlanDatas as  $subGradPlanData){
                      $outputHtml .='<tr>
                                  <td>'.$j.'</td>
                                  <td>'.$subGradPlanData->name.'</td>
                                  <td>'.$subGradPlanData->description.'</td>
                                  <td><a href="javascript:void(0);" onclick="editSubGradPlan('.$subGradPlanData->id.');">Edit</a></td>
                                    </tr>';                  
                     
                  $j++; }
           

                  
              }else{
                  $outputHtml .='<tr><td colspan="10"><center style="font-size: 18px;color: red;font-weight: bold;">Data not founds.</center></td></tr>';
              }
              $outputHtml .=' </tbody></table>';
             echo $outputHtml;
        }
         
    }


    public function editMainGradPlan(Request $request){
        $id = $request->input('id');
        $mainGradPlanSingleRow = DB::table('config_main_grad_plans')->select('*')->where('id', $id)->where('status', 1)->first();
        if($mainGradPlanSingleRow->status == 1){
            $status = '<option value="1">Enable</option><option value="0">Disable</option>';
        }else{
            $status = '<option value="0">Disable</option><option value="1">Enable</option>';
        }
        $result = json_encode( array('main_grad_edit_id'=>$mainGradPlanSingleRow->id,'name'=>$mainGradPlanSingleRow->name, 'description'=>$mainGradPlanSingleRow->description, 'status'=>$status) );
        echo $result;
    }


    public function editSubGradPlan(Request $request){
        $id = $request->input('id');
        $subGradPlanSingleRow = DB::table('config_sub_grad_plans')->select('*')->where('id', $id)->where('status', 1)->first();
        if($subGradPlanSingleRow->status == 1){
            $status = '<option value="1">Enable</option><option value="0">Disable</option>';
        }else{
            $status = '<option value="0">Disable</option><option value="1">Enable</option>';
        }
        $result = json_encode( array('sub_id'=>$subGradPlanSingleRow->id,'main_grad_plan_id'=>$subGradPlanSingleRow->main_grad_plan_id, 'name'=>$subGradPlanSingleRow->name, 'description'=>$subGradPlanSingleRow->description, 'status'=>$status) );
        echo $result;
    }
    // grad plan listing methods end


    // grad plan mapping methods start
    public function mapping($id){
        // $mainGradPlanRows = DB::table('config_main_grad_plans')->select('*')->where('status', 1)->get();
        // return view('admin.configuration.gradplan.mapping', ['mainGradPlanRows'=>$mainGradPlanRows]);
        $masterCatalogMappingRow = MasterLspMapping::select('course_id', 'sced_course_code')->where('id', $id)->first();
        $course_id = $masterCatalogMappingRow->course_id; 
        $sced_course_code = $masterCatalogMappingRow->sced_course_code; 
        $masterLspHeaders = MasterLspHeader::select('*')->where('gradplan_mapping_status', 1)->get();
        $masterScedHeaders = MasterScedHeader::select('*')->where('gradplan_mapping_status', 1)->get();
        $masterScedElementHeaders = MasterElement::select('*')->where('gradplan_mapping_status', 1)->get();
        $masterScedAttributeHeaders = MasterAttribute::select('*')->where('gradplan_mapping_status', 1)->get();
        $masterStateHeaders = MasterStateHeader::select('*')->where('gradplan_mapping_status', 1)->get();
        $configMainGradPlanDatas = DB::table('config_main_grad_plans')->select('*')->where('status', 1)->where('mapping_field', 1)->get();
        return view('admin.configuration.gradplan.mapping',['masterLspHeaders'=>$masterLspHeaders, 'configMainGradPlanDatas'=>$configMainGradPlanDatas,'masterScedHeaders'=>$masterScedHeaders,'masterScedElementHeaders'=>$masterScedElementHeaders,'masterScedAttributeHeaders'=>$masterScedAttributeHeaders,'masterStateHeaders'=>$masterStateHeaders,'course_id'=>$course_id,'sced_course_code'=>$sced_course_code]);
    }


    public function hideShowMasterLSPHeaders(Request $request){
      $id = $request->input('id');
      $ColumnNames = MasterLspHeader::all();
      $masterScedHeaders = MasterScedHeader::select('*')->get();
      $masterScedElementHeaders = MasterElement::select('*')->get();
      $masterScedAttributeHeaders = MasterAttribute::select('*')->get();
      $masterStateHeaders = MasterStateHeader::select('*')->get();
      $masterLspHeaders = MasterLspHeader::select('*')->get();
      $totalHeaders = array('masterScedHeaders'=>$masterScedHeaders, 'masterScedElementHeaders'=>$masterScedElementHeaders, 'masterScedAttributeHeaders'=>$masterScedAttributeHeaders, 'masterStateHeaders'=>$masterStateHeaders, 'masterLspHeaders'=>$masterLspHeaders);
      //print_r($totalHeaders); exit;
      $tableHeader="Grad Plan Mapping"; 
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
                    
                  foreach( $totalHeaders as  $key => $totalHeader){
                    foreach( $totalHeader as  $row){
                 if($row['gradplan_mapping_status'] == '1'){
                      $checked="checked";
                 }else{
                  $checked='';
                 }  
                  $outputHtml.='<tr>
                    <td class="text-center pt-2">
                      <div class="custom-checkbox custom-control"><input type="hidden" id="header_table'.$j.'" value="'.$key.'">
                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"  '.$checked.' name="column_update_checkbox"
                          id="checkbox-'.$j.'" onclick="updateMasterHeaders('.$row['id'].', '.$j.')">
                        <label for="checkbox-'.$j.'" class="custom-control-label">&nbsp;</label>
                      </div>
                    </td>
                    <td>'.ucwords(str_replace('_',' ',$row['name'])).'</td>
                      </tr>';   
                      $j++;                    
              }

            }
             $outputHtml.=' </tbody>
                          </table>
                        </div>';
            echo $outputHtml; 
    }

    public function updateMasterHeaders(Request $request){
      $id = $request->input('id');
      $header_table = $request->input('header_table');
      if($header_table == 'masterScedHeaders'){
        $updataData = MasterScedHeader::find($id);
      }elseif($header_table == 'masterScedElementHeaders'){
        $updataData = MasterElement::find($id);
      }elseif($header_table == 'masterScedAttributeHeaders'){
        $updataData = MasterAttribute::find($id);
      }elseif($header_table == 'masterStateHeaders'){
        $updataData = MasterStateHeader::find($id);
      }elseif($header_table == 'masterLspHeaders'){
        $updataData = MasterLspHeader::find($id);
      }
      
       if($updataData['gradplan_mapping_status'] =='1'){
           $udaptedvalue="0";
        }else{
           $udaptedvalue="1";
        }  
        $updataData->gradplan_mapping_status = $udaptedvalue;
        $updataData->updated_by = Auth::user()->id;
        $updataData->updated_at = date('Y-m-d H:i:s');
        if($updataData->save()){
            echo '1';
        }else{
            echo '0';
        }
    }

    public function getMasterLSPSelectedHeaderValue(Request $request){
      $coulumn_name = $request->input('column_name');
      $lsp_Datas=DB::table('mdl_course')->select('id', ''.$coulumn_name.'')->get();
      $output = '';
      if($lsp_Datas){
        foreach($lsp_Datas as $lsp_Data){
          $output .= '<option value="'.$lsp_Data['id'].'">'.$lsp_Data['name'].'</option>';
        }
      }
    }


    function setHeaderForMapping(Request $request){
      $input_arrays = explode(',', $request->input('val_array'));
      DB::table('master_lsp_headers')->update(['prerequisite_mapping_status' => 0, 'updated_by'=>Auth::user()->id]);
      foreach($input_arrays as $input_id){
          $updataData = MasterLspHeader::find($input_id);
          $updataData->prerequisite_mapping_status = 1;
          $updataData->updated_by = Auth::user()->id;
          $updataData->save();
      }
      echo '1';
      
    }



    public function hideShowMasterCatalogHeaders(Request $request){
      $id = $request->input('id');
      $ColumnNames = MasterLspHeader::all();
      $tableHeader="LSP Master Course Headers"; 
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

                 if($ColumnName['prerequisite_mapping_status'] == '1'){
                      $checked="checked";
                 }  
                  $outputHtml.='<tr>
                    <td class="text-center pt-2">
                      <div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"  '.$checked.' name="column_update_checkbox"
                          id="checkbox-'.$j.'" onclick=updateMasterLSPHeader("'.$ColumnName['id'].'")>
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


    public function prerequisiteShowSelectedHeaders(Request $request){
      $masterLspHeaders = MasterLspHeader::select('*')->where('prerequisite_mapping_status', 1)->get();
      if($masterLspHeaders){
        $output_selected = '';
        foreach($masterLspHeaders as $masterLspHeader){
          $column_name = $masterLspHeader['name'];
          $lspRows = DB::table('mdl_course')->select('id', ''.$column_name.'')->get();
          $output_selected .= '<div class="col-12">';
          $output_selected .= '<div class="form-group">';
          $output_selected .= '<label>'.ucwords(str_replace('_',' ',$masterLspHeader['name'])).'</label>';
          $output_selected .= '<select class="form-control" onchange="prequestFilter(this.value);">';
          $output_selected .= '<option value=" ">--Please Choose--</option>';
          if($lspRows){
            foreach($lspRows as $lspRow){
              $output_selected .= '<option value="'.$lspRow->$column_name.'||||||'.$column_name.'">'.$lspRow->$column_name.'</option>';
            }
          }
          $output_selected .='</select>';
          $output_selected .='</div>';
          $output_selected .='</div>';
        }

        $output_selected .= '<div class="col-12">';
        $output_selected .= '<div class="form-group">';
        $output_selected .= '<label>Shortname</label>';
        $output_selected .= '<select class="form-control" id="shortname">';
        $output_selected .= '<option value=" ">--Please Choose--</option>';
        $output_selected .='</select>';
        $output_selected .='</div>';
        $output_selected .='</div>';

      }

      echo $output_selected;
    }


    public function prequestFilter(Request $request){
      $value_and_column = explode('||||||', $request->input('value_and_column'));
      $lsp_Datas=DB::table('mdl_course')->select('shortname')->where(''.$value_and_column[1].'',''.$value_and_column[0].'')->get();
      $output = '';
      if($lsp_Datas){
        foreach($lsp_Datas as $lsp_Data){
          $output .= '<option value="'.$lsp_Data->shortname.'">'.$lsp_Data->shortname.'</option>';
        }
      }
      echo $output;
      exit;
    } 
    // grad plan mapping methods end


}
