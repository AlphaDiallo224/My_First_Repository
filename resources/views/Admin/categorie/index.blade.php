@extends('Admin.index')
@section('container')
    <div class="page-body">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>LISTE DES categ
                                <small></small>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">categ</li>
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
                                <th>NOM_categ</th>
                                <th>TYPE_categ</th>
                                <th>PARENT</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorie as $categ)
                                <tr>
                                    <!--
                                                <td>
                                                    <div class="d-flex vendor-list">
                                                        <img src="../assets/images/team/2.jpg" alt="" class="img-fluid img-40 rounded-circle blur-up lazyloaded">
                                                        <span>Petey Cruiser</span>
                                                    </div>
                                                </td>
                                                -->
                                    <td>{{ $categ->id }}</td>
                                    <td>{{ $categ->nom_categorie }}</td>
                                    <td>{{ $categ->type }}</td>
                                    <td>{{ $categ->parent }}</td>

                                    <td>
                                        @if ($categ->etat == 0)
                                            <a href="{{ route('categorie.activer', $categ->id) }}"
                                                title="Activer le categ">
                                                <i class="fa fa-thumbs-down"></i>

                                            </a>
                                        @else
                                            <a href="{{ route('categorie.activer', $categ->id) }}"
                                                title="desactiver le categ">
                                                <i class="fa fa-thumbs-up"></i>
                                        @endif

                                        <a href="{{ route('categorie.edit', $categ->id) }}"> <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('categorie.show', $categ->id) }}"> <i class="fa fa-eye"></i>
                                        </a>

                                        <form  style="display: inline-block;" 
                                           id="destroy{{ $categ->id }}"  action="{{ route('categorie.destroy', $categ->id) }}"   method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a style="cursor: pointer;"
                                                onclick="event.preventDefault(),this.closest('form').submit();"> <i
                                                    class="fa fa-trash font-danger"></i> 
                                                </a>
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
