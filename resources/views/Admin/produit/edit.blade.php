@extends('Admin.index')
@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5> MODIFIER UN PRODUIT </h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active show" id="account-tab" data-bs-toggle="tab"
                                href="#account" role="tab" aria-controls="account" aria-selected="true"
                                data-original-title="" title="">produit</a></li>
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
                            <form class="needs-validation user-add" novalidate="" action="{{ route ('produit.update', $clients->id) }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                @method('put')
                                <input type="" name="" value="">
                                <h4>produit Details</h4>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom0" type="hidden"
                                            required="" name="id" value="{{$clients->id}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom1"><span>*</span>REFERERENCES</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="references" type="text"
                                            required="" name="references" value="{{$clients->references}}">
                                    </div>
                                    </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom1"><span>*</span>NOM PRODUIT</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="nomProduit" type="text"
                                            required="" name="nomProduit" value="{{$clients->nomProduit}}">
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom2"><span>*</span> CATEGORIE</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <select name="categorie" id="categorie" class="form-select">
                                            <option value="{{$clients->id}}"> {{$nomparent}}</option>
                                            @foreach ($clientsTout as $cats )
                                            <option value="{{$cats->nom_produit}}"></option>
                                            @endforeach
                                            <option value="0"></option>

                                        </select>
                                       
                                    </div>
                                </div> --}}
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom1"><span>*</span>QUANTITE</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="qte" type="number"
                                            required="" name="qte" value="{{$clients->qte}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom1"><span>*</span>PRIX UNITAIRE</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="pu" type="number"
                                            required="" name="pu" value="{{$clients->pu}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom1"><span>*</span>DESCRIPTION</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="description" type="text"
                                            required="" name="description" value="{{$clients->description}}">
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