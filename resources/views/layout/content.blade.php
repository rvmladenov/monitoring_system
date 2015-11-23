@include('layout.header')

<div class="container-fluid">
@if(\Illuminate\Support\Facades\Auth::check())
    @include("admin.layout.left-sidebar")
@endif
@yield('content')
</div>

@include('layout.footer')