@extends('layout.master')

@section('title','All Trashed Posts')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Hello, Laravel Test</h1>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-info" href="{{ route('post.index')}}">Home</a>                 
                        
    </div>
        
    
       
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
                          
                          <div class="col-sm-3">
                            <a class="btn btn-success" href="{{ route('back.from.trash',$item->id)}}">back</a>                 
                          </div>
                          
                          <div class="col-sm-3">
                            <a class="btn btn-danger" href="{{ route('delete.from.database',$item->id)}}">delete</a>                 
                          </div>
                          
                        </div>
                                    
                </td>
              </tr> 
               @endforeach
              
              
            </tbody>
          </table>
   {{-- {{$posts->links()}}--}} 
    
        {{-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> --}}
     
        
</div>

@endsection