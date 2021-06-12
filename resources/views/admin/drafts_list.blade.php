@extends('admin.layout.nav')

@section('content')

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Drafts</h4>
                  <p class="card-category"> Customer details for review</p>
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
                        @can('status-change')
                        <th>
                          Change Status
                        </th>
                        @endcan
                      </thead>
                      <tbody>
                      @foreach($drafts as $draft)
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
                          @can('status-change')
                          <td class="text-primary">
                          <select class="form-control status" data-id="{{$draft->id}}">
                          <option class="form-control" value='review' @if($draft->status=='review') {{'selected'}} @endif>Review</option>
                          <option class="form-control" value='approved' @if($draft->status=='approved') {{'selected'}} @endif>Approved</option>
                          <option class="form-control" value='rejected' @if($draft->status=='rejected') {{'selected'}} @endif>Rejected</option>
                          </select>
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
<script>
$('.status').on('change', function() {

            $.ajax({
                url: "{{url('/admin/status')}}",
                type:'POST',
                data:{  '_token': '{{ csrf_token() }}' ,'id':$(this).data("id"),'status':this.value},
                success: function(data) {
                  alert('Customer '+data.status);
                  location.reload();
                },
                error:function(jqXhr,status) {
                    if(jqXhr.status === 422) {
                        $(".print-error-msg").show();
                        var errors = jqXhr.responseJSON;
                        $.each( errors , function( key, value ) {
                            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                        });
                    }
                }
                });
});
</script>
@endsection
