@extends('admin.layout.nav')

@section('content')

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">SubAdmins</h4>
                  <p class="card-category"> SubAdmin details</p>
                </div>
                @can('subadmin-create')
                <div class="row">
                      <div class="col-md-6">
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <a href="{{ route('admin.subadmins.create') }}"><button class="btn btn-primary" style="float:right;cursor:pointer;margin-right:5%" >Create SubAdmin</button></a>
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
                          Name
                        </th>
                        <th>
                          Email
                        </th>
                        @can('subadmin-edit')
                        <th>
                          Options
                        </th>
                        @endcan
                      </thead>
                      <tbody>
                      @foreach($admins as $admin)
                        <tr>
                          <td>
                          {{$admin->id}}
                          </td>
                          <td>
                          {{$admin->name}}
                          </td>
                          <td>
                          {{$admin->email}}
                          </td>
                          @can('subadmin-edit')
                          <td>
                          <a href="{{ route('admin.subadmins.edit',$admin->id) }}"><button class="btn btn-dark">Edit</button></a>
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
