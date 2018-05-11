@extends('admin/app')
@section('head')
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
	<style type="text/css">
		 span.why:after {
		    content: ",";
		}
		span.why:last-child:after {
		    content: "";
		}




	</style>
@endsection
@section('main_content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	  <!-- Content Header (Page header) -->
	  <section class="content-header">
	    <h1>
	      All Admins
	     
	    </h1>
	    
	  </section>

	  <!-- Main content -->
	  <section class="content">

	    <!-- Default box -->
	    <div class="box">
	      <div class="box-header with-border">
	      	@can('posts.create_admin', Auth::user())
	        <center><a class="btn btn-primary" href="{{ route('user.create') }}">Add New</a></center> 
			@endcan
	        <div class="box-tools pull-right">
	          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
	            <i class="fa fa-minus"></i></button>
	     
	        </div>
	      </div>
	      	      <div class="box-body">
	          <div >
           {{--  <div class="box-header">
              <h3 class="box-title">All Tags</h3>
            </div> --}}
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                   <th>Assigned Roles</th>
                   <th>Status</th>
                   @can('posts.edit_admin', Auth::user())
                  <th>Edit</th>
                  @endcan
                  @can('posts.delete_admin', Auth::user())
                  <th>Delete</th>
				  @endcan
                </tr>
                </thead>
                <tbody>
                	@if(count($users) > 0)

                		@foreach($users as $user )

			                <tr>
			                  <td> {{$loop->index + 1}}</td>
			                  <td>{{ $user->name}}
			                  </td>
			                   <td>
			                
			                   	
                              @foreach ($user->roles as $role)
                              <span class="why" > {{ $role->name}}</span> 

                              @endforeach
               
                             
                              

                            </td>
                            <td> {{$user->status?'Active':'Not Active'}}</td>
			                 @can('posts.edit_admin', Auth::user())
			                   <td> <a href="{{ route('user.edit',$user->id ) }}"><span class="glyphicon glyphicon-edit"></span></a> </td>
			                   @endcan
			                    @can('posts.delete_admin', Auth::user())
			                  <td>
			                  	<form action="{{ route('user.destroy', $user->id) }}"  id="delete-form-{{ $user->id }}" style="display: none" method="post">
			                  	{{ csrf_field() }}	

			                  	{{ method_field('DELETE') }}
			                  		
			                  	</form>

			                  	<a href=""  onclick="

			                  	if (confirm('Are you sure you want to delete this Admin.')) {

			                  		event.preventDefault();
			                  		
			                  	 	document.getElementById('delete-form-{{ $user->id }}').submit();

			                  	}else{

			                  		event.preventDefault();
			                  	}
			                  


			                  	 " ><span class="glyphicon glyphicon-trash"></span></a>


			                  </td>
			                  @endcan
			                </tr>

                		@endforeach

                	

                	@endif

              
            
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
	      </div>
	      <!-- /.box-body -->
	     
	      <!-- /.box-footer-->
	    </div>
	    <!-- /.box -->

	  </section>
	  <!-- /.content -->
	</div>
@endsection
@section('footer')
<script type="text/javascript" src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
@endsection