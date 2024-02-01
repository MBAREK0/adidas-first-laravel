@extends('layouts.layout')

@section('content')
<br>
 
  @if ($message = Session::get('success'))
  <div class="alert alert-success" role="alert">
   {{$message}}
  </div>
  @endif

  <a class="btn btn-info mb-3" href="/create">Create</a>  

  <br>
<div class="table-responsive">
    <table class="table table-striped table-hover table-borderless table-primary align-middle">
        <thead class="table-light">
           
            <tr>
                
                <th>name</th>
                <th>email</th>
                <th>carte_bancaire</th>
                <th>adress</th>
                
            </tr>
            </thead>
        
            <tbody class="table-group-divider">
                @foreach ($Users as $item)
                <tr class="table-primary" >
                    
                    
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->carte_bancaire}}</td>
                    <td>{{$item->adress}}</td>
                    <td>
                        
                        <form action="delete/{{$item->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                             </form>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="edit/{{$item->id}}">Edit</a>  
                    </td>
                          


                </tr>
                @endforeach
               
                
            </tbody>
            <tfoot>
                
            </tfoot>
    </table>

  
</div>



@endsection