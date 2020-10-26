@extends('layouts.app', ['activePage' => 'role', 'titlePage' => __('Role Management')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('roles.update', $role->id) }}" autocomplete="off" class="form-horizontal">
                    @method('PUT')
                    @csrf
                    <div class="card ">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">recent_actors</i>
                            </div>
                            <h4 class="card-title">Edit Role</h4>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="https://material-dashboard-pro-laravel.creative-tim.com/role" class="btn btn-sm btn-rose">Back to list</a>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-7">
                                    <div class="form-group bmd-form-group">
                                        <input class="form-control" name="name" id="input-name" type="text" placeholder="Role Name" value="{{$role->name}}" required="true" aria-required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-7">
                                    <div class="form-group bmd-form-group">
                                        <textarea cols="30" rows="10" class="form-control" name="description" id="input-description" type="text" placeholder="Description" required="true" aria-required="true">{{$role->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-rose">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
