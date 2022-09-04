<!doctype html>
<html lang="en">

<head>

    @include('layout.admin.head')
    @yield('css')

</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow bg-night-sky header-text-light">

        @include('layout.admin.nav')

    </div>

    <div class="ui-theme-settings">

        @include('layout.admin.theme_setting')

    </div>

    <div class="app-main">
        <div class="app-sidebar sidebar-shadow bg-night-sky sidebar-text-light">


            @include('layout.admin.sidebar')

        </div>

        <div class="app-main__outer">
            <div class="app-main__inner">

                @yield('content')

            </div>

            {{--footer start--}}
            <div class="app-wrapper-footer"></div>
            {{--footer end--}}

        </div>

    </div>
</div>

{{--script--}}
@yield('modal')
@include('layout.admin.script')
@yield('script')

{{--end script--}}

</body>
</html>
