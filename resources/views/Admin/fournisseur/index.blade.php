@extends('Admin.index')
@section('container')
    <div class="page-body">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Liste Des Fournisseurs
                                <small></small>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">fournisseur</li>
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
                                <th>PRENOM</th>
                                <th>EMAIL</th>
        
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($fournisseurs as $fournisseur)
                                <tr>
                                                <!--
                                        <td>
                                            <div class="d-flex vendor-list">
                                                <img src="../assets/images/team/2.jpg" alt="" class="img-fluid img-40 rounded-circle blur-up lazyloaded">
                                                <span>Petey Cruiser</span>
                                            </div>
                                        </td>
                                        -->
                                    <td>{{ $fournisseur->id }}</td>
                                    <td>{{ $fournisseur->nom }}</td>
                                    <td>{{ $fournisseur->prenom }}</td>
                                    <td>{{ $fournisseur->email }}</td>
                                  
                                    <td>
                                        @if ($fournisseur-> etat == 0)
                                            <a href="{{ route('fournisseur.activer', $fournisseur->id) }}" title="Activer le fournisseur"> 
                                                <i class="fa fa-thumbs-down"></i>
    
                                            </a>
                                                
                                                @else
                                                    <a href="{{ route('fournisseur.activer', $fournisseur->id) }}" title="desactiver le fournisseur"> 
                                                    <i class="fa fa-thumbs-up"></i>
                                                    
                                                @endif
                                        <a href="{{ route('fournisseur.edit', $fournisseur->id) }}"> <i class="fa fa-edit"></i> </a>
                                        <a href="{{ route('fournisseur.show', $fournisseur->id) }}"> <i class="fa fa-eye"></i> </a>

                                        <form action="{{ route('fournisseur.destroy', $fournisseur->id) }}" id="destroy{{ $fournisseur->id }}" method="POST" style="display: inline-block;">
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
