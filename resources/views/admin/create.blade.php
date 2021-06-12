@extends('admin.layout.nav')

@section('content')

<div class="content">
<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Create Role</h4>
                  <p class="card-category">SubAdmin Roles</p>
                </div>
                <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/roles-create') }}">
                        {{ csrf_field() }}

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Role Name</label>
                          <input type="text" class="form-control" name="role_name">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        <label>Permissions: </label>
                            <div class="form-group">
                            @foreach($permissions as $permission)
                              <input type="checkbox" @if($permission->id==1){{'checked readonly'}}@endif class="" name="permission[]" value="{{$permission->id}}">
                              <label class="bmd-label-floating"> {{$permission->display_name}}</label>
                              <br/>
                            @endforeach
                            </div>

                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Add Role & Permission</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
</div>
@endsection
