@section('content')
    <section class="content">
        @include('admin::partials.alerts')
        @include('admin::partials.exception')

        {!! $content !!}

        @include('admin::partials.toastr')
    </section>
@endsection

@section('app')
    {!! Zx\Admin\Admin::asset()->styleToHtml() !!}

    <div class="content-body" id="app">
        {{-- 页面埋点--}}
        {!! admin_section(Zx\Admin\Admin::SECTION['APP_INNER_BEFORE']) !!}

        @yield('content')

        {{-- 页面埋点--}}
        {!! admin_section(Zx\Admin\Admin::SECTION['APP_INNER_AFTER']) !!}
    </div>

    {!! Zx\Admin\Admin::asset()->scriptToHtml() !!}
    <div class="extra-html">{!! Zx\Admin\Admin::html() !!}</div>
@endsection


@if(!request()->pjax())
    @include('admin::layouts.full-page', ['header' => $header])
@else
    <title>{{ Zx\Admin\Admin::title() }} @if($header) | {{ $header }}@endif</title>

    <script>Zx.wait();</script>

    {!! Zx\Admin\Admin::asset()->cssToHtml() !!}
    {!! Zx\Admin\Admin::asset()->jsToHtml() !!}

    @yield('app')
@endif
