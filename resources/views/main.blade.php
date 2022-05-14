<!DOCTYPE html>
<html lang="en">

<head>
<title>@yield('title')</title>
@include('partials._header')

@yield('stylesheets')

</head>

<body>

    @yield('gnalytics')

	@include('partials._navbar')


	@yield('content')

    @include('partials._footer')

    @include('partials._scripts')

    @yield('dedicatedscripts')

</body>

</html>