/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";

// put user id for role and user mapping
// start multiple checkbox 

        $(document).ready(function () {
            $("#fieldname").CreateMultiCheckBox({ defaultText : 'Select Below', height:'250px'});
           
        });
            $(document).ready(function () {
            $(document).on("click", ".MultiCheckBox", function () {
                var detail = $(this).next();
                detail.show();
            });

            $(document).on("click", ".MultiCheckBoxDetailHeader input", function (e) {
                e.stopPropagation();
                var hc = $(this).prop("checked");
                $(this).closest(".MultiCheckBoxDetail").find(".MultiCheckBoxDetailBody input").prop("checked", hc);
                $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();
            });

            $(document).on("click", ".MultiCheckBoxDetailHeader", function (e) {
                var inp = $(this).find("input");
                var chk = inp.prop("checked");
                inp.prop("checked", !chk);
                $(this).closest(".MultiCheckBoxDetail").find(".MultiCheckBoxDetailBody input").prop("checked", !chk);
                $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();
            });

            $(document).on("click", ".MultiCheckBoxDetail .cont input", function (e) {
                e.stopPropagation();
                $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();

                var val = ($(".MultiCheckBoxDetailBody input:checked").length == $(".MultiCheckBoxDetailBody input").length)
                $(".MultiCheckBoxDetailHeader input").prop("checked", val);
            });

            $(document).on("click", ".MultiCheckBoxDetail .cont", function (e) {
                var inp = $(this).find("input");
                var chk = inp.prop("checked");
                inp.prop("checked", !chk);

                var multiCheckBoxDetail = $(this).closest(".MultiCheckBoxDetail");
                var multiCheckBoxDetailBody = $(this).closest(".MultiCheckBoxDetailBody");
                multiCheckBoxDetail.next().UpdateSelect();

                var val = ($(".MultiCheckBoxDetailBody input:checked").length == $(".MultiCheckBoxDetailBody input").length)
                $(".MultiCheckBoxDetailHeader input").prop("checked", val);
            });

            $(document).mouseup(function (e) {
                var container = $(".MultiCheckBoxDetail");
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    container.hide();
                }
            });
        });

        var defaultMultiCheckBoxOption = {defaultText: 'Select Below', height: '200px' };

        jQuery.fn.extend({
            CreateMultiCheckBox: function (options) {

                var localOption = {};
                localOption.width = (options != null && options.width != null && options.width != undefined) ? options.width : defaultMultiCheckBoxOption.width;
                localOption.defaultText = (options != null && options.defaultText != null && options.defaultText != undefined) ? options.defaultText : defaultMultiCheckBoxOption.defaultText;
                localOption.height = (options != null && options.height != null && options.height != undefined) ? options.height : defaultMultiCheckBoxOption.height;

                this.hide();
                this.attr("multiple", "multiple");
                var divSel = $("<div class='MultiCheckBox'>" + localOption.defaultText + "<span class='k-icon k-i-arrow-60-down'><svg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='sort-down' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512' class='svg-inline--fa fa-sort-down fa-w-10 fa-2x'><path fill='currentColor' d='M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z' class=''></path></svg></span></div>").insertBefore(this);
                divSel.css({ "width": localOption.width });

                var detail = $("<div class='MultiCheckBoxDetail'><div class='MultiCheckBoxDetailHeader'><input type='checkbox' class='mulinput' value='-1982' /><div>Select All</div></div><div class='MultiCheckBoxDetailBody'></div></div>").insertAfter(divSel);
                detail.css({ "width": parseInt(options.width) + 10, "max-height": localOption.height });
                var multiCheckBoxDetailBody = detail.find(".MultiCheckBoxDetailBody");

                this.find("option").each(function () {
                    var val = $(this).attr("value");

                    if (val == undefined)
                        val = '';

                    multiCheckBoxDetailBody.append("<div class='cont'><div><input type='checkbox' class='mulinput' value='" + val + "' /></div><div>" + $(this).text() + "</div></div>");
                });
                multiCheckBoxDetailBody.css("max-height", (parseInt($(".MultiCheckBoxDetail").css("max-height")) - 28) + "px");
            },
            UpdateSelect: function () {
                var arr = [];

                this.prev().find(".mulinput:checked").each(function () {
                    arr.push($(this).val());
                });

                this.val(arr);
            },
        });
// start multiple checkbox

function displayFields(val){
  		if(val == 'manual'){
  			$('#form').show();
  			$('#import').hide();
  			$('#api').hide();
  		}else if(val == 'import'){
  			$('#form').hide();
  			$('#import').show();
  			$('#api').hide();
  		}else if(val == 'api'){
  			$('#form').hide();
  			$('#import').hide();
  			$('#api').show();
  		}else{
            $('#form').hide();
            $('#import').hide();
            $('#api').hide();
  			alert('Please choose one of the following options');
  		}
  	}

 function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
            return true;
    }  

     $('#carnegieunit').keypress(function (event) {
           var charCode = (evt.which) ? evt.which : event.keyCode

        if (
            (charCode != 45 || $(element).val().indexOf('-') != -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
            (charCode != 46 || $(element).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
            (charCode < 48 || charCode > 57))
            return false;

        return true;
        });

$(function() {
    $('#fieldnames').change(function(e) {

        var selected = $(e.target).val();
          $('#datashow').html('');
           $('.ShowDataListOfList').html('');
          if(selected){
              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
            url: "ajaxCallGetForLstCatalogData",
            method: 'POST',
            data: {
                fieldcolumn: selected,
              },
            success: function(result){
          //    console.log(result);
          $('#datashow').html(result);
            }
          });
        }
    }); 
});

// first time sced data load in drop down
$(document).ready(function(){
      FederalStateData('01');
});
//end





  // for federal  and state datas
function FederalStateData(id){
   $('#federalData').html('');
   $('#federal_state_selected_rows').html('');
   $('#state_data_federal_listing').html('');
   $('#federal_state_showdatatable').html('');
      if(id){
              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
          url: "ajaxCallGetForFederalStateColumnName",
          method: 'POST',
          data: {
              id: id,
            },
            success: function(result){
             // $('.federalData,').attr('id', 'federalData');
              var json_obj=JSON.parse(result);
              var output='';
              output+='<div class="form-group">';
              output+='<label>Select Below</label>';
              output+='<select name="name[]" id="federal_state_drop_down" class="form-control"  class="form-control" multiple="" data-height="100%" style="height: 100%;">';
              for (var i in json_obj){
                var data=json_obj[i].replace(/_/g, ' ');
                 output+='<option value="'+json_obj[i]+'">'+data.toUpperCase()+'</option>';
              }
            output+=' </select></div>';
              $('#federalData').html(output);
          }
        });
    }
}

$(function() {
    $('#federalData').change(function(e) {
       $('#federal_state_selected_rows').html('');
       $('#state_data_federal_listing').html('');
        var selected = $(e.target).val();
        var state_federal = $("input[name=option]:checked").val();
       
          if(selected){
              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
            url: "ajaxCallGetForFederalStateData",
            method: 'POST',
            data: {
                fieldcolumn: selected,state_federal:state_federal
              },
            success: function(result){
            //  console.log(result);
             $('#state_data_federal_listing').html(result);
            }
          });
        }
    }); 
});

function getDataSelectedDropDown(value){
    $('.ShowDataListOfList').html('');
    var lsp_selected_field=$('#fieldnames').val();
          if(value){
              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
            url: "getDataFromSelectedDropDown",
            method: 'POST',
            data: {
                fieldcolumn: value,lsp_selected_field:lsp_selected_field
              },
            success: function(result){
            var returndata=getSelectedTableRows(value,lsp_selected_field);
              //console.log(result);
              //return false;
            var jsoandata=JSON.parse(result);
            var data=value.split('||||||');
            //console.log(data[0]);
            $.each(lsp_selected_field, function (columnName, columnValue) {
              $.each(jsoandata, function (index, value) { 
                  //console.log(index);
                  //console.log('---------------');
                  //console.log(columnValue);

                  if(index == columnValue){
                      $('.'+columnValue).html('');
                      $('.'+columnValue).html(value);
                  }
                });
              });
           
            }
          });
      }
  }

  // get table after change lsp drop down field
function getSelectedTableRows(value,lsp_selected_field){
   // $('.ShowDataListOfList').html('');
  
          if(value){
              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
            url: "getAllData",
            method: 'POST',
            data: {
                fieldcolumn: value,lsp_selected_field:lsp_selected_field
              },
            success: function(result){
               $('.lsp-showdatatable').html(result);
              return false;
            }
          });
      }
  }


function getDataSelectedStateFederalDropDown(value){
  //alert(value);
     var state_federal = $("input[name=option]:checked").val();
     var statefederalDropDown = $("#federal_state_drop_down").val();
     var data=value.split('||||||');
    $('#federal_state_selected_rows').html('');
     if(value){
              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
            url: "getDataFromSelectedStateFeDropDown",
            method: 'POST',
            data: {
                fieldcolumn: value,state_federal:state_federal,statefederalDropDown:statefederalDropDown
              },
            success: function(result){
              var returndata=getDataFromSelectedStateFeTable(value,state_federal,statefederalDropDown);
            var jsoandata=JSON.parse(result);
              $.each(statefederalDropDown, function (columnName, columnValue) {
              $.each(jsoandata, function (index, value) {
                if(index == columnValue){
                    $('.'+columnValue).html('');
                    $('.'+columnValue).html(value);
                  }
                });
              });
            }
          });
        }
      }
 // get table after change lfederal/state drop down field
function getDataFromSelectedStateFeTable(value,state_federal,statefederalDropDown){
   // $('.ShowDataListOfList').html('');
  $('#federal_state_showdatatable').html('');
          if(value){
              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
            url: "getDataFromSelectedStateFeTable",
            method: 'POST',
            data: {
                fieldcolumn: value,state_federal:state_federal,statefederalDropDown:statefederalDropDown
              },
            success: function(result){
              //console.log(result);
               $('#federal_state_showdatatable').html(result);
              return false;
            }
          });
      }
  }

// mapped for lsp data with federal and state

$('#add_lsp_button').click('on',function(){
  var course_id=$("input[name=lsp_unique_id]:checked").val();
  var sced_course_id=$("input[name=federal_state_unique_id]:checked").val();
   var state_federal = $("input[name=option]:checked").val();

  if(course_id !=""  && sced_course_id !=""){

     $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
    $.ajax({
              url: "mappingLspWithFederalStateData",
              type: 'post',
              data:{sced_course_id:sced_course_id, course_id:course_id},
              success: function(result){
                   //console.log(result);
                   alert(result.msg);
                   fetchTableAfterMappedLspWithFederalState(state_federal,course_id,sced_course_id);
                   return false;
              }
          });
    }else{
      alert('Please select LSP data row and Fedral/State Data row');
      return false;
    }
      
});


function fetchTableAfterMappedLspWithFederalState(state_federal="",course_id,sced_course_id){
   
        checkxCSRFToken();
          $.ajax({
            url: "fetchTableAfterMappedLspWithFederalState",
            type: 'post',
            data:{state_federal:state_federal, course_id:course_id,sced_course_id:sced_course_id},
            success: function(result){
              console.log(result);
             // $("#modal_center").modal("show");
                // $("#modal_center .modal-body").html(result);
                  return false;

            }

        });
  
}

// start active / deactive column for function
function activeDeactiveColumn(){
        checkxCSRFToken();
          $.ajax({
            url: "activeDeactiveColumn",
            type: 'post',
           // data:{hidden_header_id:hidden_header_id, others_input:others_input},
            success: function(result){
              $("#modal_center").modal("show");
                 $("#modal_center .modal-body").html(result);
                  return false;

            }

        });
  }


  //function activeDeactiveColumnHeader()
// end active / deactive column for function

// start check cross csrf token for every ajax function
function checkxCSRFToken(){

   $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
}
// end check cross csrf token for every ajax function


// start ajax request for popup
    function addOthersValue(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var others_val = $("#drop_down_headers_val").val();
            if(others_val == ' '){
                alert("Please choose Others field");
                return false;
            }
            var hidden_header_id = $("#hidden_header_id").val();
            var others_input = $("#others_input").val();
     
        $.ajax({
            url: "../updateHeaderValue",
            type: 'post',
            data:{hidden_header_id:hidden_header_id, others_input:others_input},
            success: function(result){
                // console.log(result);
                // return false;
                  alert(result.success);
                  $('#field_id'+hidden_header_id).val('');
                  $('#field_id'+hidden_header_id).val(others_input);
                  $("#others_input").val('');
                  $('#stateModal').modal('hide');
                  return true;
                //location.reload(true);
            }

        });
  
    }
// end ajax request for popup

// show popup
function showPopup(header_label_name, header_name, header_id){
    //alert('test');
    $.ajaxSetup({
                headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

    $.ajax({
            url: "../getHeaderValues",
            type: 'post',
            data:{header_name:header_name, header_id:header_id },
            success: function(result){
                // console.log(result);
                // return false;
                //$('#stateModal').modal('show');
                if(result){
                    $('#pop_up_title').html('');
                    $('#pop_up_title').html(header_label_name);

                    $('#hidden_header_id').val('');
                    $('#hidden_header_id').val(header_id);

                    $('#drop_down_headers_val').html('');
                    $('#drop_down_headers_val').html(result);

                    $('#stateModal').modal('show');
                    return true; 
                }
                
            }

        });
    }


// state function for others value showing
function showOthersInput(val) {
    var hidden_headerId = $('#hidden_header_id').val();
    if(val == 'others'){
        $('#others').show();
        $('#add_button').show();
        $('#field_id'+hidden_headerId).val('');
    }else{
       
        $('#field_id'+hidden_headerId).val(val);
        $('#others').hide();
        $('#add_button').hide();
    }
}


function showAllColumnsForStateListOnPopUp(){
  
  checkxCSRFToken();
          $.ajax({
            url: "showAllColumnsForStateListOnPopUp",
            type: 'post',
           // data:{hidden_header_id:hidden_header_id, others_input:others_input},
            success: function(result){
                 $("#modal_center").modal("show");
                 $("#modal_center .modal-body").html(result);
                  return false;

            }

        });
}


function showHideStateListColumn(val){
  
  checkxCSRFToken();
          $.ajax({
            url: "showHideStateListColumn",
            type: 'post',
           data:{header_id:val},
            success: function(result){
             $('.state-list').html('');
             $('.state-list').html(result);
             //window.location.reload();
              console.log(result);
                  return false;

            }

        });
}

// end pop up

// funnction for grad plan (configuration) start
function showAddNewPopUpForGradPlanConfig(){
  $("#grad_plan_config_modal").modal("show");
}

function addMainGradePlan(){
  var main_grad_plan_name = $('#main_grad_plan_name').val();
  var main_grad_plan_description = $('#main_grad_plan_description').val();
  if(main_grad_plan_name == ''){
    alert('Please enter name!');
    return false;
  }
  checkxCSRFToken();
          $.ajax({
            url: "addMainGradePlan",
            type: 'post',
           data:{main_grad_plan_name:main_grad_plan_name, main_grad_plan_description:main_grad_plan_description},
            success: function(result){
              alert("Data insrted successfully!");
             $('#main_grad_plan_name').val('');
             $('#main_grad_plan_description').val('');
             window.location.reload();
              $("#grad_plan_config_modal").modal("hide");
                  return true;

            }

        });
}

function getGradPlanItemList(name, id, sr, total_sr){
  $('#right_side_bar_title').html('');
  $('#right_side_bar_title').html(name);
  $('#input_field_hidden_main_id').val('');
  $('#input_field_hidden_main_id').val(id);
  for(var i = 1; i <= total_sr; i++){
    $('#grad_plan_item'+i).removeClass('btn-primary');
  }
  $('#grad_plan_item'+sr).addClass('btn-primary');
  checkxCSRFToken();
          $.ajax({
            url: "getGradPlanItemList",
            type: 'post',
           data:{main_id:id},
            success: function(result){
              console.log(result);
             $('#sub_grad_data_show').html('');
             $('#sub_grad_data_show').html(result);
             $('#show_right_side_div').show();
             //window.location.reload();
                  return true;

            }

        });
  
}

function showSubGradPlanModal(){

  $("#sub_grad_plan_config_modal").modal("show");
}


function addSubGradePlan(){
  var input_field_hidden_main_id = $('#input_field_hidden_main_id').val();
  var sub_grad_plan_name = $('#sub_grad_plan_name').val();
  var sub_grad_plan_description = $('#sub_grad_plan_description').val();
  if($('#input_field_hidden_sub_id').val() != ''){
  var sub_id = $('#input_field_hidden_sub_id').val();
  }else{
    sub_id = '0';
  }
  //alert(sub_id); return false;
  if(sub_grad_plan_name == ''){
    alert('Please enter name!');
    return false;
  }
  checkxCSRFToken();
          $.ajax({
            url: "addSubGradePlan",
            type: 'post',
           data:{sub_id:sub_id,sub_grad_plan_name:sub_grad_plan_name, sub_grad_plan_description:sub_grad_plan_description, main_grad_plan_id:input_field_hidden_main_id},
            success: function(result){
              //alert(result); return false;
              alert("Data Updated successfully!");
             $('#sub_grad_plan_name').val('');
             $('#sub_grad_plan_description').val('');
             //window.location.reload();
             $('#sub_grad_data_show').html('');
             $('#sub_grad_data_show').html(result);
              $("#sub_grad_plan_config_modal").modal("hide");
                  return true;

            }

        });
}


function editSubGradPlan(id){
  $('#input_field_hidden_main_id').val('');
  $('#input_field_hidden_sub_id').val('');
  $('#sub_grad_plan_name').val('');
  $('#sub_grad_plan_description').val('');
  checkxCSRFToken();
          $.ajax({
            url: "editSubGradPlan",
            type: 'post',
           data:{id:id},
            success: function(result){
              //console.log(result); return false;
              var json_result=JSON.parse(result);
              var input_field_hidden_main_id = $('#input_field_hidden_main_id').val(json_result.main_grad_plan_id);
              var input_field_hidden_main_id = $('#input_field_hidden_sub_id').val(json_result.sub_id);
              var sub_grad_plan_name = $('#sub_grad_plan_name').val(json_result.name);
              var sub_grad_plan_description = $('#sub_grad_plan_description').val(json_result.description);
             $("#sub_grad_plan_config_modal").modal("show");
                  return true;

            }

        });
}


// funnction for grad plan (configuration) end



