@extends('admin.layout.nav')

@section('content')

<div class="content">
<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Create SubAdmin</h4>
                  <p class="card-category">SubAdmin </p>
                </div>
                <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/subadmin-create') }}">
                        {{ csrf_field() }}

                        <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" name="name">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" class="form-control" name="email">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" class="form-control" name="password">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                        <label>Role: </label>
                            <div class="form-group">
                            @foreach($roles as $role)
                              <select class="form-control" name="role">
                                <option value="{{$role->id}}">{{$role->name}}</option>
                              </select>
                            @endforeach
                            </div>

                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Create SubAdmin</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
</div>
@endsection
