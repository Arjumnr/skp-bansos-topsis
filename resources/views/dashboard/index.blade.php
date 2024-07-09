@extends('_layouts.index')

@push('css-vendor')
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
@endpush

@push('css-custom')
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('javascript-global')
    <script src="{{ asset('assets/plugins/custom/jquery/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
@endpush

@push('javascript-vendor')
    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
@endpush

@push('javascript-custom')
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/new-target.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/dashboard.js') }}"></script>
@endpush

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <!--begin::Content wrapper-->
            <div class="d-flex flex-column flex-column-fluid">
                <!--begin::Toolbar-->
                <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                    <!--begin::Toolbar container-->
                    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                        <!--begin::Page title-->
                        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                            <!--begin::Title-->
                            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                Dashboard
                            </h1>
                            <!--end::Title-->
                            <!--begin::Breadcrumb-->
                            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                <!--begin::Item-->
                                <li class="breadcrumb-item text-muted">
                                    <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="breadcrumb-item text-muted">Dashboards</li>
                                <!--end::Item-->
                            </ul>
                            <!--end::Breadcrumb-->
                        </div>
                        <!--end::Page title-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Content-->
                <div id="kt_app_content" class="app-content flex-column-fluid"><!--begin::Content container-->
                    <div id="kt_app_content_container" class="app-container container-fluid">
                        <!--begin::Row-->
                        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                            <!--begin::Col-->
                            <div class="col-xxl-12">
                                <!--begin::Row-->
                                <div class="row g-5 g-xl-10">
                                    <!--begin::Col-->
                                    <div class="col-md-4">
                                        <!--begin::Card widget 11-->
                                        <div class="card card-flush h-xl-100" style="background-color: #F6E5CA">
                                            <!--begin::Header-->
                                            <div class="card-header flex-nowrap pt-5">
                                                <!--begin::Title-->
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-bold fs-4 text-gray-800">Kriteria</span>
                                                    <span class="mt-1 fw-semibold fs-7">Jumlah Kriteria</span>
                                                </h3>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div class="card-body text-center pt-5">
                                                <!--begin::Image-->
                                                <div class="h-125px mb-5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        style="height: inherit;">
                                                        <path
                                                            d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z"
                                                            fill="#e0c6a0" class="color000000 svgShape"></path>
                                                    </svg>
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Section-->
                                                <div class="text-start">
                                                    <span
                                                        class="d-block fw-bold fs-1 text-gray-800">{{ $total_criteria }}</span>
                                                </div>
                                                <!--end::Section-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Card widget 11-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    {{-- <div class="col-md-4">
                                            <!--begin::Card widget 11-->
                                            <div class="card card-flush h-xl-100" style="background-color: #F3D6EF">
                                                <!--begin::Header-->
                                                <div class="card-header flex-nowrap pt-5">
                                                    <!--begin::Title-->
                                                    <h3 class="card-title align-items-start flex-column">
                                                        <span class="card-label fw-bold fs-4 text-gray-800">Transaksi</span>
                                                        <span class="mt-1 fw-semibold fs-7">Jumlah Transaksi</span>
                                                    </h3>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Body-->
                                                <div class="card-body text-center pt-5">
                                                    <!--begin::Image-->
                                                    <div class="h-125px mb-5">
                                                        <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                                                            viewBox="0 0 24 24" style="height: inherit;">
                                                            <path
                                                                d="M22.96423,13.82263a.94762.94762,0,0,0-.02819-.17419L20.63135,7.51135A2.99558,2.99558,0,0,0,22,5a1,1,0,0,0-2,0,1.00037,1.00037,0,0,1-1.88184.47266A2.8934,2.8934,0,0,0,15.54,4H13V3a1,1,0,0,0-2,0V4H8.46A2.8934,2.8934,0,0,0,5.88184,5.47266,1.00037,1.00037,0,0,1,4,5,1,1,0,0,0,2,5,2.99558,2.99558,0,0,0,3.36865,7.51135L1.064,13.64844a.94762.94762,0,0,0-.02819.17419A.94855.94855,0,0,0,1,14c0,.00928.00269.01782.00275.0271.0003.01318.003.02533.0039.03845a3.99379,3.99379,0,0,0,7.9867,0c.00085-.01312.0036-.02527.0039-.03845C8.99731,14.01782,9,14.00928,9,14a.94855.94855,0,0,0-.03577-.17737.94762.94762,0,0,0-.02819-.17419L6.62866,7.50421A2.98961,2.98961,0,0,0,7.64258,6.41992.917.917,0,0,1,8.46,6H11V20H8a1,1,0,0,0,0,2h8a1,1,0,0,0,0-2H13V6h2.54a.917.917,0,0,1,.81738.41992,2.98961,2.98961,0,0,0,1.01392,1.08429L15.064,13.64844a.94762.94762,0,0,0-.02819.17419A.94855.94855,0,0,0,15,14c0,.00928.00269.01782.00275.0271.0003.01318.003.02533.0039.03845a3.99379,3.99379,0,0,0,7.9867,0c.00085-.01312.0036-.02527.0039-.03845C22.99731,14.01782,23,14.00928,23,14A.94855.94855,0,0,0,22.96423,13.82263ZM5,8.85553,6.5564,13H3.4436ZM6.72266,15A2.02306,2.02306,0,0,1,5,16a2.00023,2.00023,0,0,1-1.73145-1ZM19,8.85553,20.5564,13H17.4436ZM19,16a2.00023,2.00023,0,0,1-1.73145-1h3.45411A2.02306,2.02306,0,0,1,19,16Z"
                                                                fill="#ebc3e5" class="color000000 svgShape"></path>
                                                        </svg>
                                                    </div>
                                                    <!--end::Image-->
                                                    <!--begin::Section-->
                                                    <div class="text-start">
                                                        <span class="d-block fw-bold fs-1 text-gray-800">49 Transaksi</span>
                                                    </div>
                                                    <!--end::Section-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Card widget 11-->
                                        </div> --}}
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    {{-- <div class="col-md-4">
                                            <!--begin::Card widget 11-->
                                            <div class="card card-flush h-xl-100" style="background-color: #BFDDE3">
                                                <!--begin::Header-->
                                                <div class="card-header flex-nowrap pt-5">
                                                    <!--begin::Title-->
                                                    <h3 class="card-title align-items-start flex-column">
                                                        <span class="card-label fw-bold fs-4 text-gray-800">Marketing</span>
                                                        <span class="mt-1 fw-semibold fs-7">Jumlah Marketing</span>
                                                    </h3>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Body-->
                                                <div class="card-body text-center pt-5">
                                                    <!--begin::Image-->
                                                    <div class="h-125px mb-5">
                                                        <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                                                            viewBox="0 0 24 24" style="height: inherit;">
                                                            <path
                                                                d="M8.5,19A1.5,1.5,0,1,0,10,20.5,1.5,1.5,0,0,0,8.5,19ZM19,16H7a1,1,0,0,1,0-2h8.49121A3.0132,3.0132,0,0,0,18.376,11.82422L19.96143,6.2749A1.00009,1.00009,0,0,0,19,5H6.73907A3.00666,3.00666,0,0,0,3.92139,3H3A1,1,0,0,0,3,5h.92139a1.00459,1.00459,0,0,1,.96142.7251l.15552.54474.00024.00506L6.6792,12.01709A3.00006,3.00006,0,0,0,7,18H19a1,1,0,0,0,0-2ZM17.67432,7l-1.2212,4.27441A1.00458,1.00458,0,0,1,15.49121,12H8.75439l-.25494-.89221L7.32642,7ZM16.5,19A1.5,1.5,0,1,0,18,20.5,1.5,1.5,0,0,0,16.5,19Z"
                                                                fill="#b2ced3" class="color000000 svgShape"></path>
                                                        </svg>
                                                    </div>
                                                    <!--end::Image-->
                                                    <!--begin::Section-->
                                                    <div class="text-start">
                                                        <span class="d-block fw-bold fs-1 text-gray-800">10 Orang</span>
                                                    </div>
                                                    <!--end::Section-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Card widget 11-->
                                        </div> --}}
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->

                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Content container-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Content wrapper-->
        </div>
    </div>
@endsection
