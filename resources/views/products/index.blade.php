@extends('layouts.layout')

@section('content')
<br>
 
  @if ($message = Session::get('success'))
  <div class="alert alert-success" role="alert">
   {{$message}}
  </div>
  @endif


  {{-- @auth --}}
  <a class="btn btn-info mb-3"  href="{{route('products.create')}}">Create</a>   
  {{-- @endauth --}}
 <br>
<div class="table-responsive">
    <table class="table table-striped table-hover table-borderless table-primary align-middle">
        <thead class="table-light">
           
            <tr>
                
                <th>Image</th>
                <th>Name</th>
                <th>discreption</th>
                <th>tags</th>
                <th>category</th>
                <th>price</th>
            </tr>
            </thead>
        
            <tbody class="table-group-divider">
                @foreach ($products as $item)
                <tr class="table-primary" >
                    
                    <td><img src="/images/{{$item->image}}" width="300px"></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->tags}}</td>
                    <td>{{$item->category_name}}</td>
                    <td>{{$item->price}}</td>

                    {{-- @auth --}}
                    <td>
                        
                        <form action="{{route('products.destroy',$item->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                             </form>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('products.edit',$item->id)}}">Edit</a>  
                    </td>
                     {{-- @endauth      --}}
                    <td>
                    <a class="btn btn-info" href="{{route('products.show',$item->id)}}">Show</a>     
                    </td>

                </tr>
                @endforeach
               
                
            </tbody>
            <tfoot>
                
            </tfoot>
    </table>

  
</div>



@endsection