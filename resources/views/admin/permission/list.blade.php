@extends('admin/layouts/app')

@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  <h4>Permission List</h4>
                  <div class="card-header-action"> <a class="btn btn-outline-primary" href="{{ route('admin.permission.create')}}">Add Permission</a>
                  </div>
                </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Permission Name</th>
                            <th>Permission URL</th>
							<th>Custom Data</th>
							<th>Status</th>
                            <th>Created By</th>
							<th>Created At</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($permissions as $permission)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $permission->permissionName }}</td>
							<td>{{ $permission->permissionUrl }}</td>
							<td>{{ $permission->customData }}</td>
							@if($permission->status =='1')
							<td>
								<a class="badge badge-success activeinactive" data-toggle="modal" data-target="#basicModal" onClick="PermissionAjaxCallActiveDeactive({{ $permission->id }})" >Active</a>
								</td>
							@else
							<td><a class="badge badge-danger activeinactive" data-toggle="modal" data-target="#basicModal" onClick="PermissionAjaxCallActiveDeactive({{ $permission->id }})" >Inactive</a></td>
							@endif 
							<td>{{ Auth::user()->name }}</td>
                            <td>{{ $permission->created_at }}</td>
                            <td>
                             <a href="{{ route('admin.permission.show', ['id' => $permission->id]) }}"><i class="far fa-eye"></i></a>&nbsp;<a href="{{ route('admin.permission.edit', ['id' => $permission->id]) }}"><i class="far fa-edit"></i></a>&nbsp;<i class="fas fa-trash-alt"></i></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    @endsection