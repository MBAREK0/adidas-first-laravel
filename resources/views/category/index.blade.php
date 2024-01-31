@extends('category.layout')

@section('content')
<br>
 
  @if ($message = Session::get('success'))
  <div class="alert alert-success" role="alert">
   {{$message}}
  </div>
  @endif


  <a class="btn btn-info" href="{{route('cat.create')}}">create</a>  
<div class="table-responsive">
    <table class="table table-striped table-hover table-borderless table-primary align-middle">
        <thead class="table-light">
           
            <tr>
                <th>Name</th>
            </tr>
            </thead>
        
            <tbody class="table-group-divider">
                @foreach ($cats as $item)
                <tr class="table-primary" >
                    <td>{{$item->name}}</td>
                    <td></td>
                    <td></td>
                 
                    <td>
                        <form action="{{route('cat.destroy',$item->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                             </form>
                            </td>
                            <td><a class="btn btn-primary" href="{{route('cat.edit',$item->id)}}">Edit</a>  </td>

                  
                </tr>
                @endforeach
               
                
            </tbody>
            <tfoot>
                
            </tfoot>
    </table>

  
</div>



@endsection