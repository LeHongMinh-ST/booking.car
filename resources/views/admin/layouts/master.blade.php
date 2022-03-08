<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.includes.style')
</head>

<body>
<div id="app">
    @include('admin.includes.siderbar')
    <div id="main">
        @include('admin.includes.header')

        @yield('content')

        @include('admin.includes.footer')
    </div>
</div>
@include('admin.includes.script')
</body>

</html>
