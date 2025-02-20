@extends('Admin.index')
@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5> MODIFIER </h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab" data-bs-toggle="tab"
                                href="#account" role="tab" aria-controls="account" aria-selected="true"
                                data-original-title="" title=""></a></li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="account" role="tabpanel"
                            aria-labelledby="account-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    @if (session()->has("message"))
                                    <div class="alert alert-icon alert-success">{{session('message')}}</div>
                                    @endif

                                    @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-icon alert-danger">{{$error}}</div>
                                    @endforeach
                                    
                                        
                                    @endif
                                </div>
                                
                            </div>    
                            <form class="needs-validation user-add" novalidate="" action="{{ route ('equipe.update', $expertises->id) }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                @method('put')
                                <h4> prenoms</h4>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom0" type="hidden"
                                            required="" name="id" value="{{$expertises->id}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom1"><span>*</span>nom</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom1" type="text"
                                            required="" name="nom" value="{{$expertises->nom}}">
                                    </div>
                                    </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom1"><span>*</span>prenom</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom1" type="text"
                                            required="" name="prenom" value="{{$expertises->prenom}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom1"><span>*</span>IMAGE</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control" id="vali3" type="file"  name="image" 
                                            required=""value="{{("uploads/Expertise/" . $expertises->image)}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom1"><span>*</span>poste</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom1" type="poste"
                                            required="" name="poste" value="{{$expertises->prenom}}">
                                    </div>
                                </div>
                               
                                
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary" > EDITER</button>
                                </div>
                            </form>
                        
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection