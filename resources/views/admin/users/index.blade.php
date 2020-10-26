@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                          <i class="material-icons">group</i>
                        </div>
                        <h4 class="card-title">Admins
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="{{route('users.create')}}" class="btn btn-sm btn-rose">Add Admin</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable no-footer dtr-inline" style="width: 1006px;" role="grid" aria-describedby="datatables_info">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            Photo
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            CNIC
                                        </th>
                                        <th>
                                            Phone
                                        </th>
                                        <th>
                                            Role
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
                                    @foreach ($users as $user)
                                    @foreach ($user->roles as $role)
                                    <tr>
                                        <td tabindex="0" class="sorting_1">
                                            <div class="avatar avatar-sm rounded-circle img-circle" style="width:100px; height:100px;overflow: hidden;">
                                                <img src="/storage/images/{{$user->photo ? $user->photo->name : 'placeholder.jpg'}}" alt="" style="max-width: 100px;">
                                            </div>
                                          </td>
                                        <td>
                                            {{$user->name}}
                                        </td>
                                        <td>
                                            {{$user->email}}
                                        </td>
                                        <td>
                                            {{$user->cnic}}
                                        </td>
                                        <td>
                                            {{$user->phone}}
                                        </td>
                                        <td>
                                            {{$role->name}}
                                        </td>
                                        <td>
                                            {{$user->created_at->format('d-m-Y')}}
                                        </td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" class="btn btn-info btn-link" data-original-title="" title="">
                                              <i class="material-icons">person</i>
                                            <div class="ripple-container"></div></button>
                                            <a type="button" href="{{route('users.edit', $user->id)}}" rel="tooltip" class="btn btn-success btn-link" data-original-title="" title="">
                                              <i class="material-icons">edit</i>
                                            </a>
                                            <button type="button" rel="tooltip" class="btn btn-danger btn-link" data-original-title="" title="">
                                              <i class="material-icons">close</i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
