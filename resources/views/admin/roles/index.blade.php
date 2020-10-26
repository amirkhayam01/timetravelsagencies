@extends('layouts.app', ['activePage' => 'role', 'titlePage' => __('Role Management')])

@section('content')
<div class="content">
    <div class="container-fluid">    
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Roles</h4>
                        <p class="card-category"> Here you can manage user roles</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="{{route('roles.create')}}" class="btn btn-sm btn-primary">Add Role</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            @php$i = 1; @endphp     
                            <table class="table" id="datatables">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Description
                                        </th>
                                        <th>
                                            Creation date
                                        </th>
                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                    <tr>
                                        <td>
                                            {{-- {{$i++}} --}}
                                            {{$role->id}}
                                        </td>
                                        <td>
                                            {{$role->name}}
                                        </td>
                                        <td>
                                            {{$role->description}}
                                        </td>
                                        <td>
                                            {{$role->created_at->format('d-m-Y')}}
                                        </td>
                                        <td class="td-actions text-right">
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{route('roles.edit', $role)}}" data-original-title="" title="Edit">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a rel="tooltip" class="btn btn-danger btn-link deletebtn" href="javascript:void(0)" data-toggle="modal" data-target="#myModal10" title="Delete">
                                                <i class="material-icons">close</i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @include('layouts.modals.deletemodal')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
