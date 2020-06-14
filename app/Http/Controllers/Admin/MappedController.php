<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Model\MasterLspMapping;
use App\Admin\Model\MasterSced;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Admin\Model\MasterScedHeader;
use App\Admin\Model\MasterScedElementAttribute;
use App\Admin\Model\MasterElement;
use App\Admin\Model\MasterAttribute;
use App\Admin\Model\MasterCourseCatalog;
use App\Admin\Model\MasterStateSced;
use App\Admin\Model\MasterStateHeader;

class MappedController extends Controller
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
        //
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

        $get_sced_code = MasterLspMapping::select('course_id','sced_course_id')->where('id', $id)->first();
      
        $masterCourseCatalog = MasterCourseCatalog::select('*')->where('id',$get_sced_code['course_id'])->get();
        
        $masterScedData = MasterSced::select('*')->where('SCED_course_code',$get_sced_code['sced_course_id'])->first();

        $masterStateSced = MasterStateSced::select('*')->where('SCED_course_code',$get_sced_code['sced_course_id'])->first();

        $elements       = MasterElement::all();
        $attributes     = MasterAttribute::all();
        $masterScedHeader  = MasterScedHeader::all();
        $masterStateHeaders  = MasterStateHeader::all();
       
        return view('admin.mapped.view',['masterCourseCatalog'=>$masterCourseCatalog, 'masterScedData'=>$masterScedData, 'elements'=>$elements, 'attributes'=>$attributes,'masterScedHeaders'=>$masterScedHeader,'masterStateHeaders'=>$masterStateHeaders]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
         $lspMappedDatas = DB::table('master_sceds')
            ->join('master_lsp_mappings', 'master_sceds.SCED_course_code', '=', 'master_lsp_mappings.sced_course_code')
            ->select('*')
            ->get();
         $lspMappedData=MasterLspMapping::where('SCED_course_code');
         return view('admin.mapped.list',['lspMappedDatas'=>$lspMappedDatas]);
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

    public function getMappedCourseTopics($id){
        $get_sced_code = MasterLspMapping::select('sced_course_id')->where('id', $id)->first();
        //echo '<pre>'; print_r($get_sced_code); echo '</pre>'; exit;
        $sced_sub_course_code = $get_sced_code['sced_course_id'][0].$get_sced_code['sced_course_id'][1];
        $course_topics = MasterSced::select('*')->where('SCED_course_code', 'like' ,$sced_sub_course_code.'%')->get();
        //echo '<pre>'; print_r($course_topics); echo '</pre>'; exit;
        return view('admin.mapped.course', ['course_topics'=>$course_topics]);
    }
}
