@extends('admin/app')

@section('main_content')
	    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Enter Role
        <!-- <small>Advanced form element</small> -->
      </h1>
     <!--  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

        	  <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Enter Post</h3> -->
              @include('admin/layout/messages')
            </div>


            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('role.store') }}" method="post" >
                {{csrf_field()}}
           
              <div class="box-body">
                <div class="form-group col-md-6 col-md-offset-3">
                  <label for="name">Role Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Role Title">
                </div>

                <div class="row col-md-6 col-md-offset-3 form-group">
                <div class="col-lg-4">
                  <label for="name">Posts Permissions</label>
                  @foreach ($permissions as $permission)
                    @if ($permission->for == 'post')
                      <div class="checkbox">
                        <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                      </div>
                    @endif
                  @endforeach
                </div>
                <div class="col-lg-4">
                  <label for="name">User Permissions</label>
                    @foreach ($permissions as $permission)
                      @if ($permission->for == 'user')
                        <div class="checkbox">
                          <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                      @endif
                    @endforeach
                </div>

                <div class="col-lg-4">
                  <label for="name">Other Permissions</label>
                    @foreach ($permissions as $permission)
                      @if ($permission->for == 'other')
                        <div class="checkbox">
                          <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                      @endif
                    @endforeach
                </div>
              </div>

                

                 
             
             
                





              </div>
              <!-- /.box-body -->

             

              <div class="box-footer">
              	  <div class="form-group col-md-6 col-md-offset-3">
               		 <button type="submit" class="btn btn-primary">Submit</button>
                   <a href="{{ route('role.index') }}" class="btn btn-default" >Cancel</a>
            	</div>
              </div>
            </form>
          </div>
          
          <!-- /.box -->

         
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('footer')

@endsection
