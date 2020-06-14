@extends('admin/layouts/app')
@section('main-content')
 
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>LSP Data</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Select Below</label>
                      <select  name="fieldname[]"  id="fieldnames" class="form-control" multiple="" data-height="100%" style="height: 100%;">
                      	@foreach($fieldNames as $fieldName )
							         <option value="{{ $fieldName['name'] }}">{{ ucwords(str_replace('_',' ',$fieldName['name'])) }}</option>
                    	 @endforeach
						          </select>
                    </div>
                <!--start getting value from master catalog of the selected column for LSP Data -->   
                  <div id="datashow">
                    
                  </div>
                   <!--end getting value from master catalog of the selected column for LSP Data --> 
                    <!--start getting listing against selected value from master catalog of for LSP Data -->     
                  <div class="ShowDataListOfList">
                    
                  </div>
                  <div class="lsp-showdatatable">
                    
                  </div>
                  <!--start getting listing against selected value from master catalog of for LSP Data -->     
                  </div>
                </div>
              </div>
<!--  end lsp data ------>


              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header" style="height: 49px;">
                   <div class="form-group">
                        <div class="custom-switches-stacked mt-2">
                          <label class="custom-switch">
                            <input type="radio" name="option" value="01" class="custom-switch-input" onchange="FederalStateData('01')"  checked>
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Federal</span>
                          </label>
                        </div>
                      </div>
                     <div class="form-group">
                        <div class="custom-switches-stacked mt-2">
                          <label class="custom-switch">
                            <input type="radio" name="option" value="02" class="custom-switch-input" onchange="FederalStateData('02')">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">State</span>
                          </label>
                        </div>
                      </div>
                  </div>
                  <div class="card-body">
                    <div id="federalData">

                    </div>

                <!--start getting value from master catalog of the selected column for LSP Data -->   
                  <div id="state_data_federal_listing">
                    
                  </div>
                   <!--end getting value from master catalog of the selected column for LSP Data --> 
                    <!--start getting listing against selected value from master catalog of for LSP Data -->     
                  <div id="federal_state_selected_rows">
                    
                  </div>
                   <div id="federal_state_showdatatable">
                    
                  </div>
                  <!--start getting listing against selected value from master catalog of for LSP Data -->     
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-12">
                <div class="row">
                <div class="col-12 col-md-10 col-lg-10"><center><button type="button" id="add_lsp_button" style="display:none;" class="btn btn-primary m-t-15 waves-effect" stryle="display:none;">Add</button><center></div>
                <div class="col-12 col-md-2 col-lg-2"><center><button type="button" id="setting_for_table_field" class="btn btn-primary right-icon-setting" style="display:none;" onclick="settingForAfterAddMappingLspwithFederalState()"><i class="fas fa-cog"></i></button></center></div>
                </div>
                </div>
             </div>
              
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12" id="after_mapped_data_show">
                
              </div>
              

            </div>
        <!-- end Vertically Center -->
     @endsection

