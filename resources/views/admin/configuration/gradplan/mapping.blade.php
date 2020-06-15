@extends('admin/layouts/app')
@section('main-content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Grad Plan Mapping </h4>
         <button type="button" class="btn btn-primary form-fields" onclick="hideShowMasterLSPHeaders('lsp')"><i class="fas fa-cog"></i></button> 
      </div>
      
      <div class="card-body">
      <div class="row">

        <!--masterSced Headers-->
        <?php
            if( count($masterScedHeaders) > 0 ){
              foreach($masterScedHeaders as $masterScedHeader){
                $column_name = $masterScedHeader['name'];
                $masterScedRow = App\Admin\Model\MasterSced::select('id', ''.$column_name.'')->where('SCED_course_code',$sced_course_code)->first();
          ?>
          <div class="col-12 col-md-6 col-lg-6">
             <div class="form-group">
                  <label><?php echo ucwords(str_replace('_',' ',$column_name)); ?></label>
                  <select class="form-control">
                    <!-- <option value=" ">--Please Choose--</option> -->
                    <?php
                    if($masterScedRow){
                    ?>
                    <option value="<?php echo $masterScedRow->id; ?>"><?php echo $masterScedRow->$column_name; ?></option>
                  <?php } ?>
                  </select>
              </div>
          </div>
        <?php }} ?>

        <!--masterElements Headers-->
        <?php
            if( count($masterScedElementHeaders) > 0 ){
              foreach($masterScedElementHeaders as $masterScedElementHeader){
                $column_name = $masterScedElementHeader['input_type_name'];
                $masterScedElementRow = App\Admin\Model\MasterSced::select('id', ''.$column_name.'')->where('SCED_course_code',$sced_course_code)->first();
          ?>
          <div class="col-12 col-md-6 col-lg-6">
             <div class="form-group">
                  <label><?php echo ucwords(str_replace('_',' ',$column_name)); ?></label>
                  <select class="form-control">
                    <!-- <option value=" ">--Please Choose--</option> -->
                    <?php
                    if($masterScedElementRow){
                    ?>
                    <option value="<?php echo $masterScedElementRow->id; ?>"><?php echo $masterScedElementRow->$column_name; ?></option>
                  <?php } ?>
                  </select>
              </div>
          </div>
        <?php }} ?>


        <!--masterAttribute Headers-->
        <?php
            if( count($masterScedAttributeHeaders) > 0 ){
              foreach($masterScedAttributeHeaders as $masterScedAttributeHeader){
                $column_name = $masterScedAttributeHeader['input_type_name'];
                $masterScedAttributeRow = App\Admin\Model\MasterSced::select('id', ''.$column_name.'')->where('SCED_course_code',$sced_course_code)->first();
          ?>
          <div class="col-12 col-md-6 col-lg-6">
             <div class="form-group">
                  <label><?php echo ucwords(str_replace('_',' ',$column_name)); ?></label>
                  <select class="form-control">
                    <!-- <option value=" ">--Please Choose--</option> -->
                    <?php
                    if($masterScedAttributeRow){
                    ?>
                    <option value="<?php echo $masterScedAttributeRow->id; ?>"><?php echo $masterScedAttributeRow->$column_name; ?></option>
                  <?php } ?>
                  </select>
              </div>
          </div>
        <?php }} ?>


        <!--masterAttribute Headers-->
        <?php
            if( count($masterStateHeaders) > 0 ){
              foreach($masterStateHeaders as $masterStateHeader){
                $column_name = $masterStateHeader['name'];
                $masterSceStateRow = App\Admin\Model\MasterStateSced::select('id', ''.$column_name.'')->where('sced_code',$sced_course_code)->first();
          ?>
          <div class="col-12 col-md-6 col-lg-6">
             <div class="form-group">
                  <label><?php echo ucwords(str_replace('_',' ',$column_name)); ?></label>
                  <select class="form-control">
                    <!-- <option value=" ">--Please Choose--</option> -->
                    <?php
                    if($masterSceStateRow){
                    ?>
                    <option value="<?php echo $masterSceStateRow->id; ?>"><?php echo $masterSceStateRow->$column_name; ?></option>
                  <?php } ?>
                  </select>
              </div>
          </div>
        <?php }} ?>


        <!--masterLsp Headers-->
          <?php
            if($masterLspHeaders){
              foreach($masterLspHeaders as $masterLspHeader){
                $column_name = $masterLspHeader['name'];
                $lspRow = DB::table('mdl_course')->select('id', ''.$column_name.'')->where('id', $course_id)->first();
          ?>
          <div class="col-12 col-md-6 col-lg-6">
             <div class="form-group">
                  <label><?php echo ucwords(str_replace('_',' ',$column_name)); ?></label>
                  <select class="form-control">
                    <!-- <option value=" ">--Please Choose--</option> -->
                    <?php
                    if($lspRow){
                      //foreach($lspRows as $lspRow){
                    ?>
                    <option value="<?php echo $lspRow->id; ?>"><?php echo $lspRow->$column_name; ?></option>
                  <?php }//} ?>
                  </select>
              </div>
          </div>
        <?php }} ?>
          

          <?php
            if($configMainGradPlanDatas){
              $i = 1;
              $slug_str = '';
              foreach($configMainGradPlanDatas as $configMainGradPlanData){
                $main_grad_id = $configMainGradPlanData->id;
                $SubGardRowsValues = DB::table('config_sub_grad_plans')->select('*')->where('main_grad_plan_id', $main_grad_id)->where('status', 1)->get();
                $slug_str .= $configMainGradPlanData->slug.'||';
          ?>
          <div class="col-12 col-md-6 col-lg-6">
             <div class="form-group">
                  <label><?php echo ucwords($configMainGradPlanData->name); ?></label>
                  <?php
                    if(count($SubGardRowsValues) > 0){
                  ?>
                  <select class="form-control" id="<?php echo $configMainGradPlanData->slug; ?>">
                  <option value=" ">--Please Choose--</option>
                  <?php foreach($SubGardRowsValues as $SubGardRowsValue){ ?>
                    <option value="<?php echo $SubGardRowsValue->id; ?>"><?php echo $SubGardRowsValue->name; ?></option>
                  <?php } ?>
                  </select>
                  <?php }else{ ?>
                  <input type="text" id="<?php echo $configMainGradPlanData->slug ?>" onclick="prerequisiteShowSelectedHeaders(<?php echo $i; ?>,'lsp', '<?php echo $configMainGradPlanData->slug ?>');" class="form-control" value="" name="">
                <?php } ?>
              </div>
          </div>
        <?php $i++; }} ?>

          

        </div>
      </div>
      <div class="card-footer">
          <button class="btn btn-primary" id="gradplan_save" onclick="gradplanMappingSave(<?php echo $i-1; ?>, <?php echo $master_catalog_id; ?>, '<?php echo rtrim($slug_str, "||"); ?>');">Save</button>
      <a class="btn btn-primary" href="{{ URL::previous() }}">Go Back</a>

  </div>
</div> 	

@endsection