

@extends('Admin.index')
@section('container')
    <div class="page-body">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Liste Des page
                                <small></small>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">page</li>
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
                                <th>CONTENUE</th>
                                <th>image</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $page)

                
                                <tr>
                                    <td>{{ $page->id }}</td>
                                    <td>{{ $page->nom }}</td>
                                    <td>{{ $page->contenu }}</td>
                                    <td><img src="{{ asset('uploads/Pages/' . $page->image) }}" alt="" width="170" height="100"></td>
                                    
                                    <td>
                                        @if ($page-> etat == 0)
                                            <a href="{{ route('page.activer', $page->id) }}" title="Activer le page"> 
                                                <i class="fa fa-thumbs-down"></i>
    
                                            </a>
                                                
                                                @else
                                                    <a href="{{ route('page.activer', $page->id) }}" title="desactiver le page"> 
                                                    <i class="fa fa-thumbs-up"></i>
                                                    
                                                @endif
                                       
                                        <a href="{{ route('page.edit', $page->id) }}"> <i class="fa fa-edit"></i> </a>
                                        <a href="{{ route('page.show', $page->id) }}"> <i class="fa fa-eye"></i> </a>

                                        <form action="{{ route('page.destroy', $page->id) }}" id="destroy{{ $page->id }}" method="POST" style="display: inline-block;">
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
