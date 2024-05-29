@extends('Admin.index')
@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5> </h5>
                    </div>
                    <div class="card-body">

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="account" role="tabpanel"
                                aria-labelledby="account-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        @if (@session()->has('message'))
                                            <div class="alert alert-icon alert-success">
                                                {{ session('message') }}
                                            </div>
                                        @endif
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <div class="alert alert-icon alert-danger">
                                                    {{ $error }}
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <form action="{{ route('categorie.update', $categorie->id) }}" method="POST"
                                    enctype="multipart/form-data" class="needs-validation user-add">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="id" value="{{ $categorie->id }}">



                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom0"><span>*</span> NOM CATEGORIE</label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control " name="nom_categorie"
                                                value="{{ $categorie->nom_categorie }}" id="validationCustom0"
                                                type="text" required="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom0"><span>*</span> PARENT</label>

                                            <select name="parent" id="validationCustom0" class="form-select">
                                                <option value="{{ $categorie->id }}">{{ $nom_parents }}</option>
                                                @foreach ($categories as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->nom_categorie }}</option>
                                                @endforeach
                                                <option value="0"></option>
                                            </select>
                                        </div>

                                        <div class="pull-left">
                                            <button type="submit" class="btn btn-primary">editer</button>
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
