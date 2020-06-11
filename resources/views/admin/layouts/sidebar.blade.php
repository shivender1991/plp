      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{route('admin.dashboard')}}"> <img alt="image" src="{{ url('/assets/img/logo.png')}}" class="header-logo" /> <span              class="logo-name">PLP</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <!--<li class="menu-header">Main</li>-->
            <li class="dropdown">
              <a href="{{ route('admin.dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
			     <li class="dropdown ">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Master SCED Data</span></a>
              <ul class="dropdown-menu">
                <li class=""><a class="nav-link" href="{{ route('federal.list')}}">SCED Data</a></li> 
        				<li><a class="nav-link" href="{{ route('federal.upload')}}">SCED Upload Data</a></li>
        				<li class=""><a class="nav-link" href="{{ route('element.create')}}">Element Upload</a></li>
                <li class=""><a class="nav-link" href="{{ route('attribute.create')}}">Attibute Upload</a></li>
              </ul>
            </li>
			       <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>State SCED Data</span></a>
              <ul class="dropdown-menu ">
                <li class=""><a class="nav-link" href="{{ route('state.list')}}">State SCED List</a></li> 
				      <li ><a class="nav-link" href="{{ route('state.upload')}}">State Upload SCED Data</a></li>
              </ul>
            </li>
			     <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>LSP Data</span></a>
              <ul class="dropdown-menu">
				    <li><a class="nav-link" href="{{ route('lsp.create')}}">LSP Data</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Course Catalog</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('mapped.list')}}">List</a></li>
              </ul>
            </li>


            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Configuration</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('gradplan.list') }}">Grad Plan</a></li>
              <li><a class="nav-link" href="{{ route('gradplan.mapping') }}">Grad Plan Mapping</a></li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>