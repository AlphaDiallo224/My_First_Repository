

@extends('Admin.index')
@section('container')
    <div class="page-body">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Liste Des Slide
                                <small></small>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">slide</li>
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
                                <th>image</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slides as $slide)

                
                                <tr>
        

                                    <td>{{ $slide->id }}</td>
                                    <td>{{ $slide->nom }}</td>
                                    <td><img src="{{ asset('uploads/Slide/' . $slide->image) }}" alt="" width="170" height="100"></td>
                                    
                                    <td>
                                        @if ($slide-> etat == 0)
                                            <a href="{{ route('Slide.activer', $slide->id) }}" title="Activer le slide"> 
                                                <i class="fa fa-thumbs-down"></i>
    
                                            </a>
                                                
                                                @else
                                                    <a href="{{ route('Slide.activer', $slide->id) }}" title="desactiver le slide"> 
                                                    <i class="fa fa-thumbs-up"></i>
                                                    
                                                @endif
                                       
                                        <a href="{{ route('Slide.edit', $slide->id) }}"> <i class="fa fa-edit"></i> </a>
                                        <a href="{{ route('Slide.show', $slide->id) }}"> <i class="fa fa-eye"></i> </a>

                                        <form action="{{ route('Slide.destroy', $slide->id) }}" id="destroy{{ $slide->id }}" method="POST" style="display: inline-block;">
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
