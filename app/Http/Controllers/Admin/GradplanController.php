<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


    function addMainGradePlan(Request $request){
        $name = trim( $request->input('main_grad_plan_name') );
        $description = trim( $request->input('main_grad_plan_description') );
        $result = DB::table('config_main_grad_plans')->insert(
            ['name' => $name, 'description' => $description, 'created_by'=>Auth::user()->id, 'updated_by'=>Auth::user()->id,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]
        );

        if($result){
            echo '1';
        }else{
            echo '0';
        }
    }

    function addSubGradePlan(Request $request){
        //echo $request->input('sub_id');
        $main_grad_plan_id = trim( $request->input('main_grad_plan_id') );
        $name = trim( $request->input('sub_grad_plan_name') );
        $description = trim( $request->input('sub_grad_plan_description') );
        if($request->input('sub_id') === '0'){
            $result = DB::table('config_sub_grad_plans')->insert(
                ['main_grad_plan_id'=>$main_grad_plan_id,'name' => $name, 'description' => $description, 'created_by'=>Auth::user()->id, 'updated_by'=>Auth::user()->id,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]

            );
        }else{
            $sub_id = $request->input('sub_id');
            $result = DB::table('config_sub_grad_plans')->where('id', $sub_id)->update(['main_grad_plan_id'=>$main_grad_plan_id,'name' => $name, 'description' => $description,'updated_by'=>Auth::user()->id,'updated_at' => date('Y-m-d H:i:s')]);
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

    function getGradPlanItemList(Request $request){
        $main_id = $request->input('main_id');
        $subGradPlanDatas = DB::table('config_sub_grad_plans')->select('*')->where('main_grad_plan_id', $main_id)->where('status', 1)->get();

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
    }


    function editSubGradPlan(Request $request){
        $id = $request->input('id');
        $subGradPlanSingleRow = DB::table('config_sub_grad_plans')->select('*')->where('id', $id)->where('status', 1)->first();
        $result = json_encode( array('sub_id'=>$subGradPlanSingleRow->id,'main_grad_plan_id'=>$subGradPlanSingleRow->main_grad_plan_id, 'name'=>$subGradPlanSingleRow->name, 'description'=>$subGradPlanSingleRow->description) );
        echo $result;
    }
}
