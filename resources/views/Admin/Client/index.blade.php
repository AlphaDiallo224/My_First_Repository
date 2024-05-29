@extends('Admin.index')
@section('container')
    <div class="page-body">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Liste Des Clients
                                <small></small>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Client</li>
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
                                {{-- <th>TELEPHONE</th> --}}
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                                <!--
                                        <td>
                                            <div class="d-flex vendor-list">
                                                <img src="../assets/images/team/2.jpg" alt="" class="img-fluid img-40 rounded-circle blur-up lazyloaded">
                                                <span>Petey Cruiser</span>
                                            </div>
                                        </td>
                                        -->
                                    <td>{{ $client->id }}</td>
                                    <td>{{ $client->nom }}</td>
                                    <td>{{ $client->prenom }}</td>
                                    <td>{{ $client->email }}</td>
                                    {{-- <td>{{ $client->telephone }}</td> --}}
                                    <td>
                                        @if ($client-> etat == 0)
                                            <a href="{{ route('client.activer', $client->id) }}" title="Activer le client"> 
                                                <i class="fa fa-thumbs-down"></i>
    
                                            </a>
                                                
                                                @else
                                                    <a href="{{ route('client.activer', $client->id) }}" title="desactiver le client"> 
                                                    <i class="fa fa-thumbs-up"></i>
                                                    
                                                @endif
                                       
                                        <a href="{{ route('client.edit', $client->id) }}"> <i class="fa fa-edit"></i> </a>
                                        <a href="{{ route('client.show', $client->id) }}"> <i class="fa fa-eye"></i> </a>

                                        <form action="{{ route('client.destroy', $client->id) }}" id="destroy{{ $client->id }}" method="POST" style="display: inline-block;">
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
