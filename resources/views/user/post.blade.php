@extends('user/app')


@section('head')
<style type="text/css">
  .romo{
    margin: 0px !important;
  }
  .img-fluid{
    width: 100%!important;
    height: auto !important;
  }
  #ptitle{
    margin-top: 0px;
  }
   #ptitle a {
    height:30px;
    
  }
</style>


@endsection

@section('main_content')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=553879911624864';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



	  <!-- Post Content -->
    <section class="contents">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-9">
                        <div class="post-detail  padd-right-30">
                            <div class="postdetail-img">
                                <a href="#"><img src="{{ Storage::disk('local')->url($post->image)}}" alt="Post"></a>
                            </div>
                       
                            <div class="postdtl-info">
                                <p class="post-category"><a href="#">{{ $post->categories()->first()->name}}</a></p>
                                <h3 class="post-title"><a href="#">{{ $post->title}}</a></h3>
                                <h4 id="ptitle"><a href="#">{{ $post->subtitle}}</a></h4>
                                <div class="post-meta">
                                    {{-- <span><a href="#"><i class="fa fa-user"></i> By Sojib Rahman</a></span> --}}
                                    <span><a href="#"><i class="fa fa-clock-o"></i>  {{  $post->created_at->diffForHumans()}} </a></span>
                                </div>
                                 {!! htmlspecialchars_decode($post->body) !!}

                            </div>
                     
                            <div class="title">
                                <h2>You May also Like</h2>
                            </div>
                            <div class="related_blogs rlpost-sidebar">

                                <!-- blog-item Post -->
                                @foreach($allpost as $post)
                                <div class="blog-item">
                                    <div class="blog-post">
                                        <div class="blogpost-img">
                                            <a href="{{ route('post', $post->slug) }}"><img src="{{ Storage::disk('local')->url($post->image)}}" alt="Post"></a>
                                        </div>
                                      
                                        <div class="blogpost-info">
                                            <p class="post-category"><a href="{{ route('post', $post->slug) }}" title="{{ $post->categories()->first()->name}}">{{ $post->categories()->first()->name}}</a></p>
                                            <h3 class="post-title"><a href="{{ route('post', $post->slug) }}">{{ $post->title}}</a></h3>
                                            <div class="post-meta">
                                                {{-- <span><a href="#"><i class="fa fa-user"></i> By Sojib Rahman</a></span> --}}
                                                <span><a href="#"><i class="fa fa-clock-o"></i> {{  $post->created_at->toFormattedDateString()}}</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- blog-item Post end -->

                                <!-- blog-item Post -->
                              
                                <!-- blog-item Post end -->

                                <!-- blog-item Post -->
                               
                                <!-- blog-item Post end -->

                            </div>

                        <div class="fb-comments  " data-href="{{ Request::url() }}" data-numposts="5"></div>

                          

                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="sidebar">
                          
                        
                            <div class="widget w-insta">
                                <h4 class="widget-title">Latest Posts</h4>
                                <div class="widget-box">
                                 @foreach($post4 as $post)
                                    <div class="side-letest">
                                        <div class="sidelist-img">
                                            <a href="{{ route('post', $post->slug) }}"><img src="{{ Storage::disk('local')->url($post->image)}}" alt="image"></a>
                                        </div>
                                        <div class="sidelist-info">
                                            <h4><a href="{{ route('post', $post->slug) }}">{{ $post->title}}</a></h4>
                                            <span class="post-date"> {{  $post->created_at->toFormattedDateString()}}</span>
                                        </div>
                                    </div>
                                 @endforeach
                                 
                                </div>
                            </div>
                         @if(count($archives) > 0)
                             <div class="widget w-insta">
                                <h4 class="widget-title">Archive</h4>
                                <div class="widget-box">
                                 @foreach($archives as $archive)
                           
                                    <div class="side-letest">
                                       {{--  <div class="sidelist-img">
                                            <a href="{{ route('archive', $archive->slug) }}"><img src="{{ Storage::disk('local')->url($archive->image)}}" alt="image"></a>
                                        </div> --}}
                                        <div class="sidelist-info">
                                            <h4><a href="{{ route('archive', ["date" => $archive->created_at,"slug" => $archive->slug]) }}">{{  $archive->created_at->toFormattedDateString()}}, {{ $archive->created_at->diffForHumans()}}</a></h4>
                                           
                                        </div>
                                    </div>
                                 @endforeach
                                 
                                </div>
                            </div>
                            @endif()

                        {{--      @if(count($thepost->posts) > 0)
                             <div class="widget w-insta">
                                <h4 class="widget-title">Updated Version</h4>
                                <div class="widget-box">
                                 @foreach($thepost->posts as $post)
                           
                                    <div class="side-letest">
                                        <div class="sidelist-img">
                                            <a href="{{ route('post', $post->slug) }}"><img src="{{ Storage::disk('local')->url($post->image)}}" alt="image"></a>
                                        </div>
                                        <div class="sidelist-info">
                                            <h4><a href="{{ route('post', $post->slug) }}">{{ $post->title}}</a></h4>
                                            <span class="post-date"> {{  $post->created_at->toFormattedDateString()}}</span>
                                        </div>
                                    </div>
                                 @endforeach
                                 
                                </div>
                            </div>
                            @endif() --}}
                           
                               
                             
                           
                            <div class="widget w-tags">
                                <h4 class="widget-title">All Categories</h4>
                                <div class="widget-box">
                                    <ul class="srch_catagory">

                               
                                        @foreach($categorys as $category)
                                        <li><a href="{{ route('category',$category->slug) }}">{{$category->name}}</a></li>
                                       @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="widget w-tags">
                                <h4 class="widget-title">Related by Tags</h4>
                                <div class="widget-box">
                                    <ul class="srchtags">
                                       @foreach ($postag as $tag)
                                        <li><a href="{{ route('tag',$tag->slug) }}"> {{ $tag->name }}</a></li>
                                       @endforeach
                                    </ul>
                                </div>
                            </div>
                             <div class="widget w-tags">
                                <h4 class="widget-title">Related by Categories</h4>
                                <div class="widget-box">
                                    <ul class="srchtags">
                                       @foreach ($postcat as $category)
                                        <li><a href="{{ route('category',$category->slug) }}">  {{ $category->name }}</a></li>
                                       @endforeach
                                    </ul>
                                </div>
                            </div>
                         {{--    <div class="widget w-newleter">
                                <h4 class="widget-title">Newsletter</h4>
                                <div class="widget-box">
                                    <div class="subscribe-form">
                                        <div class="input-holder">
                                            <input name="EMAIL" placeholder="Your email address" required="" type="email">
                                        </div>
                                        <div class="btn-holder">
                                            <input value="Subscribe" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                         {{--    <div class="widget ads-widget">
                                <div class="widget-box">
                                    <img src="{{ asset ('user/images/widget/ad-sample.jpg')}}" alt="image" />
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>

        </section>
    




@endsection

@section('footer')
<script type="text/javascript">
    $(document).ready(function(){
      var cont= $(".content > p");
      var cont;
    for (i = 0; i < cont.length; i++) {
        cont[i].setAttribute("class"," romo ");
    }

    });
</script>

<script type="text/javascript">
$(document).ready(function(){

    var x = $(".postdtl-info img ");
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].setAttribute("class","img-fluid");
    }
    });



</script>


@endsection

