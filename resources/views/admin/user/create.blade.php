@extends('admin/app')

@section('main_content')
	    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Admin
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
               @include('admin/layout/messages')
              <!-- <h3 class="box-title">Enter Post</h3> -->
            
            </div>


            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('user.store') }}" method="post" >
                {{csrf_field()}}
           
              <div class="box-body">
                <div class="form-group col-md-6 col-md-offset-3">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Admin Name" value="{{ old('name') }}">
                </div>

                

                 <div class="form-group col-md-6 col-md-offset-3">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                </div>

                <div class="form-group col-md-6 col-md-offset-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>

                <div class="form-group col-md-6 col-md-offset-3">
                  <label for="password_confirmation">Confirm Password</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                </div>

                <div class="form-group col-md-6 col-md-offset-3">
                  <label for="phone">Phone Number</label>
                  <input type="password" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="{{ old('phone') }}">
                </div>

                <div class="form-group col-md-6 col-md-offset-3">
                  <label for="confirm_passowrd">Status</label>
                  <div class="checkbox">
                    <label ><input type="checkbox" name="status" @if (old('status') == 1)
                      checked
                    @endif value="1">Status</label>
                  </div>
                </div>

                 <div class="form-group col-md-6 col-md-offset-3">
                  <label for="role">Assign Role</label>
                <div class="col-md-12">
                  @foreach($roles as $role)
                    <div class="col-md-3" >
                      <div class="checkbox" > 
                        <label><input type="checkbox" name="role[]"   value="{{$role->id}}" >{{$role->name}}</label>
                      </div>
                    </div>
                  @endforeach
                </div>
                </div>
             
             
                





              </div>
              <!-- /.box-body -->

             

              <div class="box-footer">
              	  <div class="form-group col-md-6 col-md-offset-3">
               		 <button type="submit" class="btn btn-primary">Submit</button>
                   <a href="{{ route('user.index') }}" class="btn btn-default" >Cancel</a>
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
 <script type="text/javascript">
    $(document).ready(function(){
          $("#name").keyup(function() {
            
             var str = $(this).val();
             var trims = $.trim(str);
             var slug = trims.replace(/[^a-z0-9]/gi,'-').replace(/-+/g,'-').replace(/^-|-$/g,'');
             $("#slug").val(slug.toLowerCase());
           });

    });
  </script>
@endsection
