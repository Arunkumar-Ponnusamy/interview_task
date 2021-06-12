@extends('admin.layout.nav')

@section('content')

<div class="content">
<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Role</h4>
                  <p class="card-category">Edit SubAdmin Roles & Permissions</p>
                </div>
                <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/roles-update') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="id" value="{{$role->id}}">

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Role Name</label>
                          <input type="text" class="form-control" value="{{$role->name}}" name="role_name">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        <label>Permissions: </label>
                            <div class="form-group">
                            @foreach($role->permissions as $permission)
                              <input type="checkbox" @if($permission->id==1){{'readonly checked'}}@endif @if(in_array($permission->id, $role->UserPermissions)){{'checked'}}@endif class="" name="permission[]" value="{{$permission->id}}">
                              <label class="bmd-label-floating"> {{$permission->display_name}}</label>
                              <br/>
                            @endforeach
                            </div>

                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Update Role & Permission</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
</div>
@endsection
