@extends('layout')

@section('content')
    
<div class="container">
    <div class="row" style="margin: 32px;">
        <div class="col-12 text-end d-xl-flex justify-content-xl-center align-items-xl-center"><i class="fab fa-whatsapp text-light" style="font-size: 64px;margin-right: 16px;"></i>
            <h1 class="text-start text-light d-xl-flex justify-content-xl-start align-items-xl-center" style="margin: 0px;">ChatApp</h1>
        </div>
    </div>
    @yield('content-auth')
</div>

@endsection