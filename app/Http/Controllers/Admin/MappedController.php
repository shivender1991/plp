<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Model\MasterLspMapping;
use App\Admin\Model\MasterSced;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view()
    {

         //$lspMappedDatas=MasterLspMapping::all();
         $lspMappedDatas = DB::table('master_sceds')
            ->join('master_lsp_mappings', 'master_sceds.SCED_course_code', '=', 'master_lsp_mappings.sced_course_id')
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
