@extends('layout.master')

@section('title','All Posts')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Hello, Laravel Test</h1>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-info" href="{{ route('post.create')}}">Create Post</a>                 
        <a class="btn btn-warning" href="{{ route('post.trash')}}">Trashed Posts</a>                 
                        
    </div>
        @if ($message = Session::get('success'))
           <div class="alert alert-success" role="alert">
            {{ $message }}
           </div>   
        @endif
       
    
       
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Post Title</th>
                <th scope="col">Post detials </th>
                <th scope="col">Updated By</th>
                <th scope="col">Updated at</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
               @foreach ($posts as $item)
               <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{ $item->title }}</td>
                <td>{{ $item->body }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>
                    
                        <div class="row">
                          <div class="col-sm-2">
                            <a class="btn btn-success" href="{{ route('post.edit',$item->id)}}">edit</a>
                          </div>
                          <div class="col-sm-2">
                            <a class="btn btn-info" href="{{ route('post.show',$item->id)}}">show</a>                 
                          </div>
                          <div class="col-sm-3">
                            <a class="btn btn-warning" href="{{ route('soft.delete',$item->id)}}">soft delete</a>
                          </div>
                          <div class="col-sm-2">
                            <form action="{{ route('post.destroy',$item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">delete</button>           
                            </form>
                          </div>
                        </div>
                                    
                </td>
              </tr> 
               @endforeach
              
              
            </tbody>
          </table>
    {{$posts->links()}}
    
        {{-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> --}}
     
        
</div>

@endsection