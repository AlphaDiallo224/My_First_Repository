@extends('Admin.index')
@section('container')
<div class="row">
 <div class="col-md-12">
@if (session()->has('message'))
  <div class="alert alert-icon alter-success">
    {{session('message')}} 
  </div>
  @endif

@if($errors->any())
@foreach ($errors ->all() as $errors) 
<div class="alert alert-icon alter-danger">
    {{session('$errors')}} 
  </div> 
@endforeach
  
@endif
 </div>
</div>
<form action="{{route('Slide.update', $clients->id)}}" method="POST" enctype="multipart/form-data" 
class="needs-validation user-add" novalidate="">
  @csrf  
  @method('put')
  <h4>Editer </h4>
    <div class="form-group row">
      <div class="col-xl-3 col-md-4">
        <label for="validationCustom0" ><span></span> Nom</label>
      </div>
      <div class="col-xl-8 col-md-7">
        <input name="nom" class="form-control " id="validationCustom0" type="text" 
        required value="{{$clients->nom}}">  
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xl-3 col-md-4">
          <label for="validationCustom1" ><span></span> message1</label>
      </div>
      <div class="col-xl-8 col-md-7">
        <input name="message1" form-control id="validationCustom1" type="text" 
        required value="{{$clients->message1}}">  
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xl-3 col-md-4">
          <label for="validationCustom1" ><span></span> message2</label>
      </div>
      <div class="col-xl-8 col-md-7">
        <input name="message2" form-control id="validationCustom1" type="text" 
        required value="{{$clients->message2}}">  
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xl-3 col-md-4">
        <label for="validationCustom2" ><span></span> Url1</label>
      </div>
      <div class="col-xl-8 col-md-7">
        <input name="url1" class="form-control " id="validationCustom2" type="text" 
        required value="{{$clients->url1}}">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xl-3 col-md-4">
        <label for="validationCustom2" ><span></span> url2</label>
      </div>
      <div class="col-xl-8 col-md-7">
        <input name="url2" class="form-control " id="validationCustom2" type="text" 
        required value="{{$clients->url1}}">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xl-3 col-md-4">
          <label for="validationCustom1"><span>*</span>IMAGE</label>
      </div>
      <div class="col-xl-8 col-md-7">
          <input class="form-control" id="vali3" type="file"  name="image" 
              required=""value="{{("uploads/Slide/" . $clients->image)}}">
      </div>
  </div>
 
    <div class="pull-right">
      <button class="btn btn-primary" type="submit">editer</button>
  </div>

</form>
@endsection