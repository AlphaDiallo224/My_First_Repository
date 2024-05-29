@extends('Admin.index')
@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5> AJOUTER UN PRODUIT </h5>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                            <li class="nav-item"><a class="nav-link active show" id="account-tab" data-bs-toggle="tab"
                                    href="#account" role="tab" aria-controls="account" aria-selected="true"
                                    data-original-title="" title="">PRODUIT</a></li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="account" role="tabpanel"
                                aria-labelledby="account-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        @if (session()->has('message'))
                                            <div class=" alert alert-success">{{ session('message') }}</div>
                                        @endif

                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <div class="alert alert-icon alert-danger">{{ $error }}</div>
                                            @endforeach
                                        @endif
                                    </div>

                                </div>
                                <form class="needs-validation user-add" novalidate="" action="{{ route('produit.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <h4>Produit Details</h4>
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom0"><span>*</span> REFERERENCES</label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control " id="validationCustom0" type="text"
                                                required="" name="references">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom3"><span>*</span>NOM PRODUIT </label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control " id="validationCustom3" type="text"
                                                required="" name="nomProduit">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom4"><span>*</span> QUANTITE</label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control " id="validationCustom4" type="number"
                                                required="" name="qte">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom4"><span>*</span> PRIX UNITAIRE</label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control " id="validationCustom4" type="number"
                                                required="" name="pu">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom4"><span>*</span> DESCRIPTION</label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control " id="validationCustom4" type="text"
                                                required="" name="description">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom4"><span>*</span> IMAGES</label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control" id="validationCustom4" type="file" accept="image/*" required name="images">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom4"><span>*</span> SEUIL</label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control " id="validationCustom4" type="number"
                                                required="" name="seuil">
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom1"><span>*</span> L'UTILISATEUR CONNECTE</label>
                                        </div>
                                    <div class="col-xl-8 col-md-7">
                                        <select name="user_id" id="validationCustom0">
                                            <option value="0"></option>
                                            @foreach ($produits as $user)
                                                <option value="{{ $user->id }}">{{ $user->email }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom1"><span>*</span> CATEGORIE DU PRODUIT</label>
                                        </div>
                                    <div class="col-xl-8 col-md-7">
                                        <select name="categorie" id="validationCustom0">
                                            <option value="0"></option>
                                            @foreach ($products as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->nom_categorie }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary">Ajouter</button>
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
