@extends('admin/layouts/app')
@section('main-content')
<div class="row">
  <div class="col-6">
    <div class="card">
      <div class="card-header">
        <h4>Grad Plan List</h4>
        <div class="card-header-action">
        <a href="javascript:void(0);" onclick="showAddNewPopUpForGradPlanConfig();" class="btn btn-primary">Add New</a>
        </div>
      </div>
      <div class="card-body">
        <div id="accordion">
          <?php
              if($configMainGradPlanDatas){
                $count_grad_plan = count($configMainGradPlanDatas);
                $sr = 1;
              foreach($configMainGradPlanDatas as $configMainGradPlanData){

             ?>
        
          
          <div class="accordion">
            <div class="accordion-header" id="grad_plan_item<?php echo $sr; ?>" role="button" onclick="getGradPlanItemList('<?php echo $configMainGradPlanData->name; ?>','<?php echo $configMainGradPlanData->id; ?>', '<?php echo $sr; ?>', '<?php echo $count_grad_plan; ?>');">
                  <h4><?php echo $configMainGradPlanData->name; ?></h4>
                
                </div>
              <div class="accordion-header" role="button">
                <a href="javascript:void(0);" onclick="editMainGradPlan('<?php echo $configMainGradPlanData->id; ?>');">Edit<a>
              </div>
          </div>
          
          <?php $sr++; }} ?>
        </div>
      </div>
    </div>
  </div>

  <div class="col-6" id="show_right_side_div" style="display: none;">
    <div class="card">
      <div class="card-header">
        <h4 id="right_side_bar_title">Itme List</h4>
        <div class="card-header-action" id="add_new_button">
        <a href="javascript:void(0);" onclick="showSubGradPlanModal();" class="btn btn-primary">Add New</a>
        </div>
        <input type="hidden" value="" id="input_field_hidden_main_id">
      </div>
      <div class="table-responsive" id="sub_grad_data_show">
        
      </div>
    </div>
  </div>

</div>

<!--modal show main grad plan start-->
    <div class="modal" id="grad_plan_config_modal" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="pop_up_title">Add Main Grad Plan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="" method="post">
                
                <div class="form-group">
                  <label id="input_type_name">Name *</label>
                  <div class="input-group">
                    <input type="text" id="main_grad_plan_name" class="form-control">
                  </div>
                </div>
               
                <div class="form-group">
                  <label id="input_type_desc">Description</label>
                  <div class="input-group">
                    <textarea id="main_grad_plan_description" class="form-control"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label id="input_type_status">Status</label>
                  <div class="input-group">
                    <select id="main_grad_plan_status" class="form-control">
                      <option value="1">Enable</option>
                      <option value="0">Disable</option>
                    </select>
                  </div>
                </div>
                <input type="hidden" id="input_field_hidden_edit_id" value="">
                <button type="button" id="add_main_grad_plan_button" onclick="addMainGradePlan()" class="btn btn-primary m-t-15 waves-effect">Add</button>
              </form>
            </div>
          </div>
        </div>
      </div>
<!--modal show end-->




<!--modal show sub grad plan start-->
    <div class="modal" id="sub_grad_plan_config_modal" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="sub_pop_up_title">Add Sub Grad Plan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="" method="post">
                
                <div class="form-group">
                  <label id="sub_input_type_name">Name *</label>
                  <div class="input-group">
                    <input type="text" id="sub_grad_plan_name" class="form-control">
                  </div>
                </div>
               
                <div class="form-group">
                  <label id="sub_input_type_desc">Description</label>
                  <div class="input-group">
                    <textarea id="sub_grad_plan_description" class="form-control"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label id="sub_input_type_status">Status</label>
                  <div class="input-group">
                    <select id="sub_grad_plan_status" class="form-control">
                      <option value="1">Enable</option>
                      <option value="0">Disable</option>
                    </select>
                  </div>
                </div>

                <input type="hidden" value="" id="input_field_hidden_sub_id">
                <button type="button" id="add_sub_grad_plan_button" onclick="addSubGradePlan()" class="btn btn-primary m-t-15 waves-effect">Add</button>
              </form>
            </div>
          </div>
        </div>
      </div>
<!--modal show end-->		

@endsection