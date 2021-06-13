@extends('layout.master')

@section('title','Create Posts')

@section('content')
<div class="container jumbotron">
    <div class="container"> 
        <div class="title_c card">
            <div class="card-body">
               <h5 class="card-text">
                    @if (!empty($post->title))
                      Post Name : {{ $post->title }} 
                    @else
                      Create new post  
                    @endif
                </h5>
            </div>
        </div>
    </div>  
    
    <div class="container title_block padding_top_5" >
       
            <div class="form-group">
              <label for="exampleFormControlInput1">{{$post->title}}</label>
            </div>
            
            
            <div class="form-group">
              <label for="exampleFormControlTextarea1"> {!! $post->body !!}</label>
             
            </div>
          
           
    </div>
</div>


@endsection