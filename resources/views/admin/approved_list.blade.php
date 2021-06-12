@extends('admin.layout.nav')

@section('content')

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Approved</h4>
                  <p class="card-category"> Approved Customer details</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          First Name
                        </th>
                        <th>
                          Last Name
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          DOB
                        </th>
                      </thead>
                      <tbody>
                      @foreach($approved as $draft)
                        <tr>
                          <td>
                          {{$draft->id}}
                          </td>
                          <td>
                          {{$draft->first_name}}
                          </td>
                          <td>
                          {{$draft->last_name}}
                          </td>
                          <td>
                          {{$draft->email}}
                          </td>
                          <td>
                          {{date("d-m-Y", strtotime($draft->dob))}}
                          </td>
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
