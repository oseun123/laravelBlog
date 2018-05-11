@extends('admin/app')

@section('main_content')
	    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Enter permission
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
            <form role="form" action="{{ route('permission.store') }}" method="post" >
                {{csrf_field()}}
           
              <div class="box-body">
                <div class="form-group col-md-6 col-md-offset-3">
                  <label for="name">Permission Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Permission Title">
                </div>

                 <div class="form-group col-md-6 col-md-offset-3">
                  <label for="for">Permission for</label>
                  <select name="for" id="for" class="form-control">
                    <option value="">--Select--</option>
                    <option value="user">User</option>
                    <option value="post">Post</option>
                    <option value="other">Other</option>
                  </select>
                </div>

                

                 
             
             
                





              </div>
              <!-- /.box-body -->

             

              <div class="box-footer">
              	  <div class="form-group col-md-6 col-md-offset-3">
               		 <button type="submit" class="btn btn-primary">Submit</button>
                   <a href="{{ route('permission.index') }}" class="btn btn-default" >Cancel</a>
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
