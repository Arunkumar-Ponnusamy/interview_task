@extends('admin.layout.nav')

@section('content')

<div class="content">
<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit SubAdmin</h4>
                  <p class="card-category">SubAdmin Details</p>
                </div>
                <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/subadmin-update') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="id" value="{{$admin->id}}">

                        <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" required value="{{$admin->name}}" name="name">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" class="form-control" required value="{{$admin->email}}" name="email">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password(Leave Empty if don't want to change)</label>
                          <input type="password" class="form-control" autocomplete="no" name="password">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                        <label>Role: </label>
                            <div class="form-group">
                            <select class="form-control" name="role">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" @if($admin->role==$role->id){{'selected'}}@endif>{{$role->name}}</option>
                            @endforeach
                            </select>
                            </div>

                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Update SubAdmin</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
</div>
@endsection
