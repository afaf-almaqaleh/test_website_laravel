@extends('layout.master')

@section('title','Create Posts')

@section('content')
<div class="container jumbotron">
    <div class="container"> 
        <div class="card">
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
    
    <div class="container padding_top_5">
        <form action=" 
        
       @if (!empty($post->id))
       {{ route('post.update',$post->id) }} 
        @else
        {{ route('post.store') }} 
        @endif"
        method="POST">
            @csrf
            @if (!empty($post->id))
            @method('PUT')
            @endif
            <div class="form-group">
              <label for="exampleFormControlInput1">Post Name</label>
              <input type="text" name ="title" value ="{{$post->title}}" class="form-control"  placeholder="Post Name">
            </div>
            {{-- <div class="form-group">
              <label for="exampleFormControlSelect1">Example select</label>
              <select class="form-control" >
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div> --}}
            
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Post Detials</label>
              <textarea class="form-control" name="body"  rows="3">
                {!! $post->body !!}
              </textarea>
            </div>
            <div class="form-group">
              @if  (!empty($post->id))
              <button type="submit" class="btn btn-primary" >Update</button> 
                
              @else
              <button type="submit" class="btn btn-primary" >Create</button> 
                 
              @endif 
             
            </div>
          </form>      
    </div>
</div>


@endsection