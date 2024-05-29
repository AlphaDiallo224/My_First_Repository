<style>
    th {
        padding: 6px; /* Ajustez cette valeur selon vos préférences */
    }
</style>

@extends('Admin.index')
@section('container')
    <div class="page-body">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="page-header-left">
                            <h3>Liste Des produits
                                <small></small>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-2">
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
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>REFERENCE</th>
                                    <th>nomProduit</th>
                                    <th>IMAGES</th>
                                    <th>SEUIL</th>
                                    <th>CATEGORIE</th>
                                     {{-- <th>users</th> --}}
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produits as $produit)
                                    <tr>
                                        <td>{{ $produit->id }}</td>
                                        <td>{{ $produit->references }}</td>
                                        <td>{{ $produit->nomProduit }}</td>
                                        <td><img src="{{ asset('uploads/produit/' . $produit->image) }}" alt=""
                                                width="170" height="100"></td>
                                        <td>{{ $produit->seuil }}</td>
                                        <td>{{ $produit->categorie }}</td>
                                        {{-- <td>{{ $produit->user_id }}</td> --}}
                                        <td>
                                            @if ($produit->etat == 0)
                                                <a href="{{ route('produit.activer', $produit->id) }}"
                                                    title="Activer le produit">
                                                    <i class="fa fa-thumbs-down"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('produit.activer', $produit->id) }}"
                                                    title="Desactiver le produit">
                                                    <i class="fa fa-thumbs-up"></i>
                                                </a>
                                            @endif
                                            <a href="{{ route('produit.edit', $produit->id) }}"> <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('produit.show', $produit->id) }}"> <i class="fa fa-eye"></i>
                                            </a>
                                            <form action="{{ route('produit.destroy', $produit->id) }}"
                                                id="destroy{{ $produit->id }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    style="cursor: pointer; background: none; border: none;"><i
                                                        class="fa fa-trash font-danger"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

    </div>
@endsection
