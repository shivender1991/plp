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
      $('.lsp-showdatatable').html('');
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
        $('#federal_state_showdatatable').html('');
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
             return false;
            }
          });
        }
    }); 
});


  // get table after change lsp drop down field
function getSelectedTableRows(value,lsp_selected_field)
{
    $('.lsp-showdatatable').html('');
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
              //console.log(result);
               $('.lsp-showdatatable').html(result);
              return false;
            }
          });
      }
  }
function getDataSelectedDropDown(value){
var lsp_selected_field=$('#fieldnames').val();
var allValue=[];
 $.each(lsp_selected_field, function (columnName, columnValue) { 
    var selecteValue = $("select[name="+columnValue+"").val();
    if(selecteValue != " "){
      allValue.push(selecteValue);
    }
    
  });
    $('.ShowDataListOfList').html('');
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
                fieldcolumn: value,lsp_selected_field:lsp_selected_field,allValue:allValue
              },
            success: function(result){

              console.log(result);

          var returndata=getSelectedTableRows(value,lsp_selected_field);
            var jsoandata=JSON.parse(result);
            var data=value.split('||||||');
            $.each(lsp_selected_field, function (columnName, columnValue) {
              $.each(jsoandata, function (index, value) { 
                  if(index == columnValue){
                      $('.'+columnValue).html('');
                      $('.'+columnValue).html(value);
                  }
                });
              });
           return false;
            }
          });
      }
  }




function getDataSelectedStateFederalDropDown(value)
{

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
              $('#add_lsp_button').show();
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
              return false;
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
              $('body').tooltip({selector: '[data-toggle="tooltip"]'});
               $('#federal_state_showdatatable').html(result);
              return false;
            }
          });
      }
  }

// mapped for lsp data with federal and state

$('#add_lsp_button').click('on',function(){
  $("#after_mapped_data_show").html('');

  var course_id=$("input[name=lsp_unique_id]:checked").val();
  var sced_course_id=$("input[name=federal_state_unique_id]:checked").val();
  var state_federal = $("input[name=option]:checked").val();

if(course_id ==undefined  && sced_course_id ==undefined){
    alert('Please select LSP data row and Fedral/State Data row');
    return false;

 } else if(course_id ==undefined){
    alert('Please select LSP data row');
    return false;

 }else if(sced_course_id ==undefined){
    alert('Please select Fedral/State Data row');
    return false;

 }else{

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
                  
                  alert(result.msg);
                  $('#setting_for_table_field').show();
                  fetchTableAfterMappedLspWithFederalState(state_federal,course_id,sced_course_id);
                  return false;
              }
          });

    } /*else{
      alert('Please select LSP data row and Fedral/State Data row');
      return false;
    }*/
      
});


function fetchTableAfterMappedLspWithFederalState(state_federal="",course_id,sced_course_id){
    $("#after_mapped_data_show").html('');
       $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
            url: "fetchTableAfterMappedLspWithFederalState",
            type: 'post',
            data:{state_federal:state_federal, course_id:course_id,sced_course_id:sced_course_id},
            success: function(result){
             // alert(result);
             // console.log(result);
             // $("#modal_center").modal("show");
                 $("#after_mapped_data_show").html(result);
                  return false;

            }

        });
  
}




// start pop up active / deactive column for function
function activeDeactiveColumn(id){
        checkxCSRFToken();
          $.ajax({
            url: "activeDeactiveColumn",
            type: 'post',
            data:{id:id},
            success: function(result){
              //console.log(result);
             // return false;
              $("#modal_center").modal("show");
                 $("#modal_center .modal-body").html(result);
                  return false;

            }

        });
  }
// start pop up active / deactive column for function
function federalWithElementAttributeMapping(){

        checkxCSRFToken();
          $.ajax({
            url: "../federalWithElementAttributeMapping",
            type: 'post',
           // data:{id:id},
            success: function(result){
              //console.log(result);
             // return false;
              $("#modal_center").modal("show");
              $("#modal_center .modal-body").html(result);
              return false;

            }

        });
  }

  // start pop up active / deactive column for function
function activeDeactiveFederalColumn(){
        checkxCSRFToken();
          $.ajax({
            url: "activeDeactiveFederalColumn",
            type: 'post',
            //data:{id:id},
            success: function(result){
              $("#modal_center").modal("show");
              $("#modal_center .modal-body").html(result);
              return false;

            }

        });
  }


 // end pop up active / deactive column for function
  // start active / deactive update agiant column 
function activeDeactiveUpdateColumn(id)
{
   var dataarray=id.split('#######');
    // for federal or state value 
   var state_federal = $("input[name=option]:checked").val();
   var select_value = $("select[name=fieldname]").val();
   var statefederalDropDown = $("#federal_state_drop_down").val();
// lsp value
   var lspvalue = $("select[name=lspFieldName]").val();
   var lsp_selected_field=$('#fieldnames').val();

        if(id !=""){
            $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
             });

          $.ajax({
            url: "activeDeactiveUpdateColumn",
            type: 'post',
            data:{id:id},
            success: function(result){
              if(dataarray[0] =='01' || dataarray[0] =='02'){
                    getDataFromSelectedStateFeTable(select_value,state_federal,statefederalDropDown);
                }else{
                    getSelectedTableRows(lspvalue,lsp_selected_field);
                }
                  return false;
            }
        });
      }
  }
 // start active / deactive update agiant column 
function federalactiveDeactiveUpdateColumn(id)
{
    if(id !=""){
            $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
             });
          $.ajax({
            url: "federalactiveDeactiveUpdateColumn",
            type: 'post',
            data:{id:id},
            success: function(result){
               alert(result.msg);
              window.location.reload();
                  return false;
            }
        });

      }
  }
// start active / deactive update agiant column 
function federalElemntAttributeactivedeactive(id)
{
    if(id !=""){
            $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
             });
          $.ajax({
            url: "../federalElemntAttributeactivedeactive",
            type: 'post',
            data:{id:id},
            success: function(result){
               alert(result.msg);
              window.location.reload();
                  return false;
            }
        });

      }
  }


  // start active / deactive update agiant column 

function settingForAfterAddMappingLspwithFederalState(){

      checkxCSRFToken();
      var state_federal = $("input[name=option]:checked").val();
      $.ajax({
        url: "settingForAfterAddMappingLspwithFederalState",
        type: 'post',
        data:{state_federal:state_federal},
        success: function(result){
          console.log(result);
          $("#modal_center").modal("show");
          $("#modal_center .modal-body").html(result);
          return false;
        }
    });
}

// start active / deactive update agiant column 
function settingForAfterAddMappingColumnUpdate(id)
{

  var course_id=$("input[name=lsp_unique_id]:checked").val();
  var sced_course_id=$("input[name=federal_state_unique_id]:checked").val();
  var state_federal = $("input[name=option]:checked").val();
    if(id !=""){
            $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
             });
          $.ajax({
            url: "settingForAfterAddMappingColumnUpdate",
            type: 'post',
            data:{id:id},
            success: function(result){
               alert(result.msg);
              //return false;
                fetchTableAfterMappedLspWithFederalState(state_federal,course_id,sced_course_id);
                  return false;
            }
        });

      }
  }

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
                 //var json_result = JSON.parse(result); 
                 // $('#t_head').html('');
                 // $('#t_body').html('');
                 // $('#t_head').html(json_result.t_head);
                 // $('#t_body').html(json_result.t_body);
                  return false;

            }

        });
}
// end pop up


// start check cross csrf token for every ajax function
function checkxCSRFToken(){

   $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
}
// end check cross csrf token for every ajax function

// funnction for grad plan (configuration) start
function showAddNewPopUpForGradPlanConfig(){
  $('#main_grad_plan_name').val('');
  $('#main_grad_plan_description').val('');
  $('#input_field_hidden_edit_id').val('');
  $("#grad_plan_config_modal").modal("show");
}

function addMainGradePlan(){
  var main_grad_plan_name = $('#main_grad_plan_name').val();
  var main_grad_plan_description = $('#main_grad_plan_description').val();
  var main_grad_plan_status = $('#main_grad_plan_status').val();
  if(main_grad_plan_name == ''){
    alert('Please enter name!');
    return false;
  }
  if($('#input_field_hidden_edit_id').val() != ''){
  var main_grad_edit_id = $('#input_field_hidden_edit_id').val();
  }else{
    main_grad_edit_id = '0';
  }
  checkxCSRFToken();
          $.ajax({
            url: "addMainGradePlan",
            type: 'post',
           data:{main_grad_edit_id:main_grad_edit_id,main_grad_plan_name:main_grad_plan_name, main_grad_plan_description:main_grad_plan_description,main_grad_plan_status:main_grad_plan_status},
            success: function(result){
              alert("Data insrted successfully!");
             $('#main_grad_plan_name').val('');
             $('#main_grad_plan_description').val('');
             window.location.reload();
              $("#grad_plan_config_modal").modal("hide");
              $("#main_grad_popup").trigger("reset");
                  return true;

            }

        });
}

function editMainGradPlan(id){
  $('#main_grad_plan_name').val('');
  $('#main_grad_plan_description').val('');
  $('#input_field_hidden_edit_id').val('');
  
  checkxCSRFToken();
          $.ajax({
            url: "editMainGradPlan",
            type: 'post',
           data:{id:id},
            success: function(result){
              //console.log(result); return false;
              var json_result=JSON.parse(result);
              $('#input_field_hidden_edit_id').val(json_result.main_grad_edit_id);
              $('#main_grad_plan_name').val(json_result.name);
              $('#main_grad_plan_description').val(json_result.description);
              //var sub_grad_plan_status = $('#sub_grad_plan_status').val(json_result.status);
             $("#grad_plan_config_modal").modal("show");
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
  if(name.toLowerCase() == 'prerequisite'){
    $('#add_new_button').hide();
  }else{
    $('#add_new_button').show();
  }
  checkxCSRFToken();
          $.ajax({
            url: "getGradPlanItemList",
            type: 'post',
           data:{main_id:id,name:name},
            success: function(result){
              console.log(result);

             $('#sub_grad_data_show').html('');
             $('#sub_grad_data_show').html(result);
             showSelectedList();
             $('#show_right_side_div').show();
             //window.location.reload();
                  return true;

            }

        });
  
}

function showSubGradPlanModal(){
  $('#sub_grad_plan_name').val('');
  $('#input_field_hidden_sub_id').val('');
  $("#sub_grad_plan_config_modal").modal("show");
}


function addSubGradePlan(){
  var input_field_hidden_main_id = $('#input_field_hidden_main_id').val();
  var sub_grad_plan_name = $('#sub_grad_plan_name').val();
  var sub_grad_plan_description = $('#sub_grad_plan_description').val();
  var sub_grad_plan_status = $('#sub_grad_plan_status').val();
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
           data:{sub_id:sub_id,sub_grad_plan_name:sub_grad_plan_name, sub_grad_plan_description:sub_grad_plan_description, main_grad_plan_id:input_field_hidden_main_id,sub_grad_plan_status:sub_grad_plan_status},
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
  //$('#sub_grad_plan_status').val('');
  checkxCSRFToken();
          $.ajax({
            url: "editSubGradPlan",
            type: 'post',
           data:{id:id},
            success: function(result){
              //console.log(result); return false;
              var json_result=JSON.parse(result);
              $('#input_field_hidden_main_id').val(json_result.main_grad_plan_id);
              $('#input_field_hidden_sub_id').val(json_result.sub_id);
              $('#sub_grad_plan_name').val(json_result.name);
              $('#sub_grad_plan_description').val(json_result.description);
              //var sub_grad_plan_status = $('#sub_grad_plan_status').val(json_result.status);
             $("#sub_grad_plan_config_modal").modal("show");
                  return true;

            }

        });
}


// funnction for grad plan (configuration) end


// function for grad plan mapping start
function hideShowMasterLSPHeaders(val){
  $(".modal-title").html('Grad Plan Mapping Headers');
  //$("#modal_center").modal("show");
  checkxCSRFToken();
          $.ajax({
            url: "../hideShowMasterLSPHeaders",
            type: 'post',
            data:{id:val},
            success: function(result){
              $("#modal_center").modal("show");
              $("#modal_center .modal-body").html(result);
              return false;

            }

        });

}

function updateMasterHeaders(id, sr){
  var header_table = $('#header_table'+sr).val();
  checkxCSRFToken();
          $.ajax({
            url: "../updateMasterHeaders",
            type: 'post',
            data:{id:id, header_table:header_table},
            success: function(result){
              //alert(result); return false;
              $("#modal_center").modal("hide");
              //$("#modal_center .modal-body").html(result);
              window.location.reload();
              return false;

            }

        });
}

function getMasterLSPSelectedHeaderValue(val){
  checkxCSRFToken();
          $.ajax({
            url: "getMasterLSPSelectedHeaderValue",
            type: 'post',
            data:{column_name:val},
            success: function(result){
              //console.log(result); return false;
              $('#fieldname_value').html('');
              $('#fieldname_value').html(result);
              return false;

            }

        });
}

// $('#master_catalog_headers').on('change',function() {
//     alert($(this).val());
//     console.log($(this).val());
//   });

function showSelectedList(){
  console.log('list');
  $('#show_selected_list').html('');
  var selected=[];
  var list_output = '';
      list_output += '<ul class="list-group">';
      var i = 0;
 $('#master_catalog_headers :selected').each(function(){
    var selected_val = $(this).val();
    var final_selected = selected_val.split('||||||');
    list_output += '<li class="list-group-item">'+final_selected[1]+'</li>';
     selected[i] = final_selected[0];
    i++; });
 list_output += '</ul>';
 list_output += '<input type="hidden" id="selected_all_id" value="'+selected+'"><button type="button" class="btn btn-primary" onclick="setHeaderForMapping()">SET</button>';
 $('#show_selected_list').html(list_output);
  //console.log(selected);
}

function setHeaderForMapping(){
  var val_array = $('#selected_all_id').val();
  //console.log(val_array);
  checkxCSRFToken();
          $.ajax({
            url: "setHeaderForMapping",
            type: 'post',
            data:{val_array:val_array},
            success: function(result){
              alert('Header Updated Successfully');
              console.log(result);
               return false;
              // $('#fieldname_value').html('');
              // $('#fieldname_value').html(result);
              return false;

            }

        });
}

function hideShowMasterCatalogHeaders(val){
  checkxCSRFToken();
          $.ajax({
            url: "hideShowMasterLSPHeaders",
            type: 'post',
            data:{id:val},
            success: function(result){
              $("#modal_center").modal("show");
              $("#modal_center .modal-body").html(result);
              return false;

            }

        });

}

function prerequisiteShowSelectedHeaders(sr, val, slug){
  $('#gradplan_header_sr').val('');
  $(".modal-title").html('');
  $(".modal-body").html('');
  $(".modal-title").html('Prequisite');
  checkxCSRFToken();
          $.ajax({
            url: "../prerequisiteShowSelectedHeaders",
            type: 'post',
            data:{id:val},
            success: function(result){
              $("#modal_center .modal-body").html(result);
              $('#gradplan_header_sr').val(slug);
              $("#modal_center").modal("show");
              return false;

            }

        });
}

function prequestFilter(value_and_column){
  checkxCSRFToken();
          $.ajax({
            url: "../prequestFilter",
            type: 'post',
            data:{value_and_column:value_and_column},
            success: function(result){
              $("#shortname").html('');
              $("#shortname").html(result);
              return false;

            }

        });
}

function setPrequisiteValueInInputBox(val){
  console.log(val);
  var slug = $('#gradplan_header_sr').val();
  $('#'+slug).val(val);
}


function gradplanMappingSave(total_count, master_catalog_id, slug){
  console.log(slug);
  var slug_split = slug.split("||");
  //alert(slug_split[0]);

  var input_str = '';
  $.each(slug_split, function(key, value) {
    input_str += value+'@@'+$('#'+value).val()+'||';
  });
  checkxCSRFToken();
          $.ajax({
            url: "../gradplanMappingSave",
            type: 'post',
            data:{master_catalog_id:master_catalog_id, input_str:input_str},
            beforeSend:function(){
              //alert('beforeSend');
              //return false;
            },
            success: function(result){
              console.log(result.msg);
              alert(result.msg);
              return false;

            }

        });
}

// function for grad plan mapping end


