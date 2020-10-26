@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Admin Dashboard')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" enctype="multipart/form-data" action="{{route('users.store')}}" autocomplete="off" class="form-horizontal">
                    @csrf
                    <div class="card ">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">person</i>
                            </div>
                            <h4 class="card-title">Add Admin</h4>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{route('users.index')}}" class="btn btn-sm btn-rose">Back to list</a>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Profile photo</label>
                                <div class="col-sm-7">
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail img-circle">
                                            <img src="{{asset('/storage/images/placeholder.jpg')}}" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                        <div>
                                            <span class="btn btn-rose btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="image" id="input-picture">
                                            </span>
                                            <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-7">
                                    <div class="form-group bmd-form-group">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder="Name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-7">
                                    <div class="form-group bmd-form-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}" placeholder="Email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">CNIC</label>
                                <div class="col-sm-7">
                                    <div class="form-group bmd-form-group">
                                        <input type="text" class="form-control @error('cnic') is-invalid @enderror" placeholder="CNIC" name="cnic" value="{{old('cnic')}}" />
                                        @error('cnic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror                                    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-7">
                                    <div class="form-group bmd-form-group">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" name="phone" value="{{old('phone')}}" />
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror                                    
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row">
                                <label class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <div class="dropdown bootstrap-select col-sm-12 pl-0 pr-0">
                                            <select class="selectpicker col-sm-12 pl-0 pr-0" name="role_id" data-style="select-with-transition" title="" data-size="100" tabindex="-98">
                                                @foreach($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>                                            
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <div class="dropdown bootstrap-select col-sm-12 pl-0 pr-0">
                                            <select class="selectpicker col-sm-12 pl-0 pr-0" name="gender" data-style="select-with-transition" title="" data-size="100" tabindex="-98">
                                                <option value="">Choose Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>                                            
                                        </div>
                                        <span class="text-danger" role="alert">
                                            <small>{{$errors->first('gender')}}</small>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label" for="input-password"> Password</label>
                                <div class="col-sm-7">
                                    <div class="form-group bmd-form-group">
                                        <input class="form-control @error('password') is-invalid @enderror" input="" type="password" name="password" id="input-password" placeholder="Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label" for="input-password-confirmation">Confirm Password</label>
                                <div class="col-sm-7">
                                    <div class="form-group bmd-form-group">
                                        <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="Confirm Password">
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

