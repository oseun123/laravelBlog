@extends('admin/app')

@section('head')
	
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/select2/select2.min.css')}}">
@endsection

@section('main_content')
	 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Post
        
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
         <div class="box box-primary">
            <div class="box-header with-border">
               @include('admin/layout/messages')
            </div>
          <form role="form"  action="{{ route('post.update', $post->id ) }}" method="post"  enctype="multipart/form-data"  >

            {{csrf_field()}}
             {{ method_field('PATCH') }}

                <div class="box-body">
                <div class="form-group col-md-6">
                  <label for="title">Post Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Post Title"  value="{{ $post->title }}" >
                </div>

                <div class="form-group col-md-6">
                  <label for="subtitle">Post Sub Title</label>
                  <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Post Sub Title"  value="{{ $post->subtitle }}" >
                </div>

                 <div class="form-group col-md-6">
                  <label for="slug">Post Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Post Slug"  value="{{ $post->slug }}" >
                </div>
             
             
                <div class="form-group col-md-6">
                  <label for="image">Image</label>
                  <input type="file" id="image" name="image" class="form-control" >

                  
                </div>
                 <div class="form-group col-md-6">
                 <label>Select Tags</label>
                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="--Select--" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]" >

                    @foreach( $tags as $tag)

                        <option  value="{{ $tag->id }}"

                            @foreach( $post->tags as $postTag)

                            @if($postTag->id == $tag->id)
                               {{ 'selected'}}
                            @endif
                             @endforeach

                         >{{ $tag->name }}</option>

                   @endforeach

                 
                </select>
              </div>



                <div class="form-group col-md-6">
                <label>Select Categories</label>
                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="--Select--" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories[]">
                      @foreach( $categories as $category)

                       <option  value="{{ $category->id }}" 
                           @foreach( $post->categories as $postCategory)

                           @if($postCategory->id == $category->id)
                              {{ 'selected'}}
                           @endif
                            @endforeach




                        >{{ $category->name }}</option>

                  @endforeach
                </select>
              </div>


               
               @can('posts.publish', Auth::user())
                     <div class="checkbox">
                <div class="form-group col-md-6">
                  <br>
                  <label>
                    <input type="checkbox" name="status" value="1"
                      @if($post->status =='1')
                        {{ 'checked' }}
                      @endif
                    > Publish Post
                  </label>
              </div>
                </div>
                @endcan
               
                   <div class="checkbox">
                <div class="form-group col-md-6">
                  <br>
                  <label>
                    <input type="checkbox" name="archive" value="1"
                    > Archive Post
                  </label>
              </div>
                </div>

             


               


          </div>




          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Post body
               
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              
                <textarea id="editor1" name="body" >{{ $post->body }}</textarea>
              
            </div>
          </div>
           <div class="box-footer">
                  <div class="form-group col-md-6">
                   <button type="submit" class="btn btn-primary">Submit</button>
                   {{-- <a href="{{ route('archive.store') }}" class="btn btn-default" > Archive</a> --}}
                   <a href="{{ route('post.index') }}" class="btn btn-default" > Cancel</a>
              </div>
              </div>
            </form>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('footer')

   <script type="text/javascript" src="{{ asset('admin/plugins/select2/select2.full.min.js') }}" ></script>
   <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>



   <script type="text/javascript">
    $(document).ready(function(){
          $("#title").keyup(function() {
            
             var str = $(this).val();
             var trims = $.trim(str);
             var slug = trims.replace(/[^a-z0-9]/gi,'-').replace(/-+/g,'-').replace(/^-|-$/g,'');
             $("#slug").val(slug.toLowerCase());
           });
           $(".select2").select2();




    });





  </script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
</script>
<script>
  $(function () {
    CKEDITOR.replace('editor1', options);
    CKEDITOR.addCss('.cke_editable img { max-width: 100% !important; height: auto !important;}');
    
  });
</script>

@endsection