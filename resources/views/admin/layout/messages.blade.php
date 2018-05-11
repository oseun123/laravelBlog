      @if(count($errors) > 0)
               <ul class='bg-danger text-center ' style='padding:15px' >
                @foreach($errors->all() as $error )
                   <li class='text-danger center-block'>{{$error}}</li>
                @endforeach
              
              </ul>
         @endif
         @if (session()->has('message'))
         	 <ul class='bg-success text-center ' style='padding:15px' >
         	 	 <li class='text-success center-block'>{{ session('message') }}</li>
         	 </ul>
          
           @endif
            @if (session()->has('status'))

             {!! htmlspecialchars_decode(session('status')) !!}

             {{-- {{ session('status') }} --}}
           
          
           @endif