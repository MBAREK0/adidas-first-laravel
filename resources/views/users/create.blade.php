@extends('layouts.layout')

@section('content')


<br>
<div class="row">
    <div class="col align-self-start">
     <a   class="btn btn-primary" href="{{route('products.index')}}" >All products</a>
    </div>
  </div>
  <br>

  @if ($errors->any())
  <div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $item)
        <li>{{$item}}</li>
        @endforeach
       
    </ul>
  </div>
      
  @endif


<div class='container p-5'>


<form action="/add" method="post" enctype="multipart/form-data">
@csrf
<div class="mb-3">
  <label for="" class="form-label">Name</label>
  <input type="text" class="form-control" name="name" >
 </div>
 <div class="mb-3">
   <label for="" class="form-label">Email</label>
   <input type="email" class="form-control" name="email">
  </div>
 <div class="mb-3">
  <label for="" class="form-label">Carte bancaire</label>
  <textarea class="form-control" name="carte_bancaire" id="" rows="3"></textarea>
</div>
<div class="mb-3">
  <label for="" class="form-label">adress</label>
  <textarea class="form-control" name="adress" id="" rows="3"></textarea>
</div>




   <button type="submit" class="btn btn-primary">Submit</button>
 

</form>
   

</div>

@endsection