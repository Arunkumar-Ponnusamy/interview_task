@extends('admin.layout.nav')

@section('content')

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Roles</h4>
                  <p class="card-category"> Roles and Permissions</p>
                </div>
                @can('role-create')
                <div class="row">
                      <div class="col-md-6">
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <a href="{{ url('/admin/roles-create') }}"><button class="btn btn-primary" style="float:right;cursor:pointer;margin-right:5%" >Create Roles & Permissions</button></a>
                        </div>
                      </div>
                </div>
                @endcan
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Role Name
                        </th>
                        @can('role-edit')
                        <th>
                          Options
                        </th>
                        @endcan
                      </thead>
                      <tbody>
                      @foreach($roles as $role)
                        <tr>
                          <td>
                          {{$role->id}}
                          </td>
                          <td>
                          {{$role->name}}
                          </td>
                          @can('role-edit')
                          <td>
                          <a href="{{ url('/admin/roles-edit',$role->id) }}"><button class="btn btn-primary" style="cursor:pointer;" >Edit</button></a>
                          </td>
                          @endcan
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

@endsection
@section('scripts')
@endsection
