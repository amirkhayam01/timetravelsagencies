@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Admin Dashboard')])

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Admins</h4>
                <p class="card-category"> Here you can manage admins</p>



              </div>
          </div>
      </div>
    </div>
</div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush














{{-- Admin Controller Code Multi login --}}

@php

    // public function login(Request $request)
    // {

    //     if($request->isMethod('post'))
    //     {
    //         $data = $request->all();
    //         if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
    //             return redirect('admin/dashboard');
    //         }
    //         else {
    //             return redirect()->back();
    //         }
    //     }
    //     return view('auth.admin-login');
    // }

@endphp