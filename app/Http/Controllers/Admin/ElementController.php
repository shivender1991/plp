<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ElementformValidation;
use App\Admin\Model\MasterScedElement;
use App\Admin\Model\MasterElement;
use Illuminate\Support\Facades\Auth;
use Excel;
use App\Imports\MasterScedElementImport;

class ElementController extends Controller
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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = MasterElement::where('status', 1)->get();
        //echo '</pre>'; print_r($datas); echo '</pre>'; exit;
        return view('admin.federal.elements', ['datas'=>$datas]);
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
            //  $this->validate($request, [
            //     'description'=>'required',
            //     'code'=>'required',
            // ]);
              // call model
              $insertdata = new MasterScedElement;
              // received data from post
              $insertdata->element_attribute_id = trim($request->input('element_id'));
              $insertdata->format = trim($request->input('format'));
              $insertdata->field_type = trim($request->input('field_type'));
              $insertdata->description = trim($request->input('description'));
              $insertdata->definition = trim($request->input('definition'));
              $insertdata->code = trim($request->input('code'));
              $insertdata->created_by = Auth::user()->id;
              $insertdata->updated_by = Auth::user()->id;
              // save data in table
              if($insertdata->save()){
                  return redirect('element/create')->with('sucess', 'Data has been inserted successfully!!');
              }else{
                  return redirect('element/create')->with('error', 'Data has been not updated please try agian!!');
              }
        }elseif($request->input('format') == 'import'){
            //import code here
            $this->validate($request, [
               'select_file' => 'required|mimes:xls,xlsx'
            ]);

            $element_id             = $request->input('element_id');
            $format                 = $request->input('format');
            $field_type                 = $request->input('field_type');
            $import = new MasterScedElementImport();
            $import->setElement($element_id);
            $import->setFormat($format);
            $import->setFieldType($field_type);
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
    public function show($id)
    {
         return view('admin.federal.list');
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
}
