

@extends('Admin.index')
@section('container')
    <div class="page-body">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Liste Des
                                <small></small>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">produit</li>
                            <li class="breadcrumb-item active">List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h5>Vendor Details</h5>
                </div>
                <div class="card-body vendor-table">
                    <table class="display" id="basic-1">
                        <thead>
                            <tr>
                                
                                <th>ID</th>
                                <th>NOM</th>
                                <th>POSTE</th>
                                <th>ENTREPRISE</th>
                                <th>DETAIL</th>
                                <th>image</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produits as $produit)

                
                                <tr>
        

                                    <td>{{ $produit->id }}</td>
                                    <td>{{ $produit->nom }}</td>
                                    <td>{{ $produit->poste }}</td>
                                    <td>{{ $produit->entreprise }}</td>
                                    <td>{{ $produit->detail }}</td>
                                    <td><img src="{{ asset('uploads/Temoignage/' . $produit->image) }}" alt="" width="170" height="100"></td>
                                    
                                    <td>
                                        @if ($produit-> etat == 0)
                                            <a href="{{ route('temoignage.activer', $produit->id) }}" title="Activer le temoignage"> 
                                                <i class="fa fa-thumbs-down"></i>
    
                                            </a>
                                                
                                                @else
                                                    <a href="{{ route('temoignage.activer', $produit->id) }}" title="desactiver le temoignage"> 
                                                    <i class="fa fa-thumbs-up"></i>
                                                    
                                                @endif
                                       
                                        <a href="{{ route('temoignage.edit', $produit->id) }}"> <i class="fa fa-edit"></i> </a>
                                        <a href="{{ route('temoignage.show', $produit->id) }}"> <i class="fa fa-eye"></i> </a>

                                        <form action="{{ route('temoignage.destroy', $produit->id) }}" id="destroy{{ $produit->id }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method("DELETE")
                                            <a style="cursor: pointer;" onclick="event.preventDefault(),this.closest('form').submit();"> <i class="fa fa-trash font-danger"></i> </a>
                                        </form>
                                    </td>
                        
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

    </div>
@endsection
