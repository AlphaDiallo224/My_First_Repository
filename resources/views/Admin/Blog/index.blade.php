@extends('Admin.index')
@section('container')
    <div class="page-body">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="page-header-left">
                            <h3>Liste Des BLOG
                                <small></small>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">blog</li>
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
                                    <th>NOM</th>
                                    <th>TITRE</th>
                                    <th>DETAIL</th>
                                    <th>IMAGES</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produits as $produit)
                                    <tr>
                                        <td>{{ $produit->id }}</td>
                                        <td>{{ $produit->titre }}</td>
                                        <td>{{ $produit->detail }}</td>
                                        <td><img src="{{ asset('uploads/Blog/' . $produit->image) }}" alt=""
                                                width="170" height="100"></td>
                                        <td>
                                            @if ($produit->etat == 0)
                                                <a href="{{ route('blog.activer', $produit->id) }}"
                                                    title="Activer">
                                                    <i class="fa fa-thumbs-down"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('blog.activer', $produit->id) }}"
                                                    title="Desactiver">
                                                    <i class="fa fa-thumbs-up"></i>
                                                </a>
                                            @endif
                                            <a href="{{ route('blog.edit', $produit->id) }}"> <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('blog.show', $produit->id) }}"> <i class="fa fa-eye"></i>
                                            </a>
                                            <form action="{{ route('blog.destroy', $produit->id) }}"
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
