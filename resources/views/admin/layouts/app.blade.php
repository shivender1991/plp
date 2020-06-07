<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.layouts.head')
</head>
<body onload="myOnloadFunc();">
	 <div class="loader"></div>
		<div id="app">
			<div class="main-wrapper main-wrapper-1">
			@include('admin.layouts.header')
			@include('admin.layouts.sidebar')
   			 <div class="main-content">

				@section('main-content')

				@show
			 </div>

				@if (session('sucess'))
					<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-success alert-with-icon" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1060; top: 74px; right: 33px;"><span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span> <span data-notify="title"></span> <span data-notify="message">{{ session('sucess') }}</span><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -13px; z-index: 1062;color:#fff;"><i class="now-ui-icons ui-1_simple-remove"></i>&times;</button></div>
					
				@endif	
				@if (session('error'))
					<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-danger alert-with-icon" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1060; top: 74px; right: 33px;"><span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span> <span data-notify="title"></span> <span data-notify="message">{{ session('error') }}</span><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -13px; z-index: 1062;color:#fff;"><i class="now-ui-icons ui-1_simple-remove"></i>&times;</button></div>
				
				@endif
				
			
				<div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default" tabindex="2" style="overflow: hidden; outline: none;">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked="">
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked="">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black" class="">
                      <div class="black"></div>
                    </li>
                    <li title="purple" class="">
                      <div class="purple"></div>
                    </li>
                    <li title="orange" class="active">
                      <div class="orange"></div>
                    </li>
                    <li title="green" class="">
                      <div class="green"></div>
                    </li>
                    <li title="red" class="">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
       </div>
	</div>
@include('admin.layouts.footer')
</body>
</html>