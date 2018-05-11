@extends('admin/app')
@section('main_content')
	    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Enter Category
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
            </div>
   
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('category.store') }}" method="post">
             {{csrf_field()}}
              <div class="box-body">
                <div class="form-group col-md-6 col-md-offset-3">
                  <label for="name">Category Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Category Title">
                </div>

                

                 <div class="form-group col-md-6 col-md-offset-3">
                  <label for="slug">Category Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Category Slug">
                </div>
             
             
                





              </div>
              <!-- /.box-body -->

             

              <div class="box-footer">
              	  <div class="form-group col-md-6 col-md-offset-3">
               		 <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('category.index') }}" class="btn btn-default" >Cancel</a>
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