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
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                                            <rect fill="#000000" x="8" y="2" width="14" height="2" rx="1"/>
                                                            <path d="M6,6 L18,6 C18.5522847,6 19,6.44771525 19,7 C19,7.55228475 18.5522847,8 18,8 L6,8 C5.44771525,8 5,7.55228475 5,7 C5,6.44771525 5.44771525,6 6,6 Z M8,10 L15,10 C15.5522847,10 16,10.4477153 16,11 C16,11.5522847 15.5522847,12 15,12 L8,12 C7.44771525,12 7,11.5522847 7,11 C7,10.4477153 7.44771525,10 8,10 Z M11,14 L17,14 C17.5522847,14 18,14.4477153 18,15 C18,15.5522847 17.5522847,16 17,16 L11,16 C10.4477153,16 10,15.5522847 10,15 C10,14.4477153 10.4477153,14 11,14 Z M12,18 L15,18 C15.5522847,18 16,18.4477153 16,19 C16,19.5522847 15.5522847,20 15,20 L12,20 C11.4477153,20 11,19.5522847 11,19 C11,18.4477153 11.4477153,18 12,18 Z M11,21 L12,21 C12.5522847,21 13,21.4477153 13,22 C13,22.5522847 12.5522847,23 12,23 L11,23 C10.4477153,23 10,22.5522847 10,22 C10,21.4477153 10.4477153,21 11,21 Z" fill="#000000" opacity="0.3"/>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Section-->
                                                <div class="text-start">
                                                    <span
                                                        class="d-block fw-bold fs-1 text-gray-800">{{ $total_criteria }} Kriteria</span>
                                                </div>
                                                <!--end::Section-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Card widget 11-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4">
                                            <!--begin::Card widget 11-->
                                            <div class="card card-flush h-xl-100" style="background-color: #F3D6EF">
                                                <!--begin::Header-->
                                                <div class="card-header flex-nowrap pt-5">
                                                    <!--begin::Title-->
                                                    <h3 class="card-title align-items-start flex-column">
                                                        <span class="card-label fw-bold fs-4 text-gray-800">Kepala Keluarga</span>
                                                        <span class="mt-1 fw-semibold fs-7">Jumlah Kepala Keluarga</span>
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
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                                <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 L7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3"/>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <!--end::Image-->
                                                    <!--begin::Section-->
                                                    <div class="text-start">
                                                        <span class="d-block fw-bold fs-1 text-gray-800">{{ $total_warga }} Kepala Keluarga</span>
                                                    </div>
                                                    <!--end::Section-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Card widget 11-->
                                        </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4">
                                            <!--begin::Card widget 11-->
                                            <div class="card card-flush h-xl-100" style="background-color: #BFDDE3">
                                                <!--begin::Header-->
                                                <div class="card-header flex-nowrap pt-5">
                                                    <!--begin::Title-->
                                                    <h3 class="card-title align-items-start flex-column">
                                                        <span class="card-label fw-bold fs-4 text-gray-800">Kusioner</span>
                                                        <span class="mt-1 fw-semibold fs-7">Jumlah Kuisoner</span>
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
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M5,9 L19,9 C20.1045695,9 21,9.8954305 21,11 L21,20 C21,21.1045695 20.1045695,22 19,22 L5,22 C3.8954305,22 3,21.1045695 3,20 L3,11 C3,9.8954305 3.8954305,9 5,9 Z M18.1444251,10.8396467 L12,14.1481833 L5.85557487,10.8396467 C5.4908718,10.6432681 5.03602525,10.7797221 4.83964668,11.1444251 C4.6432681,11.5091282 4.77972206,11.9639747 5.14442513,12.1603533 L11.6444251,15.6603533 C11.8664074,15.7798822 12.1335926,15.7798822 12.3555749,15.6603533 L18.8555749,12.1603533 C19.2202779,11.9639747 19.3567319,11.5091282 19.1603533,11.1444251 C18.9639747,10.7797221 18.5091282,10.6432681 18.1444251,10.8396467 Z" fill="#000000"/>
                                                                <path d="M11.1288761,0.733697713 L11.1288761,2.69017121 L9.12120481,2.69017121 C8.84506244,2.69017121 8.62120481,2.91402884 8.62120481,3.19017121 L8.62120481,4.21346991 C8.62120481,4.48961229 8.84506244,4.71346991 9.12120481,4.71346991 L11.1288761,4.71346991 L11.1288761,6.66994341 C11.1288761,6.94608579 11.3527337,7.16994341 11.6288761,7.16994341 C11.7471877,7.16994341 11.8616664,7.12798964 11.951961,7.05154023 L15.4576222,4.08341738 C15.6683723,3.90498251 15.6945689,3.58948575 15.5161341,3.37873564 C15.4982803,3.35764848 15.4787093,3.33807751 15.4576222,3.32022374 L11.951961,0.352100892 C11.7412109,0.173666017 11.4257142,0.199862688 11.2472793,0.410612793 C11.1708299,0.500907473 11.1288761,0.615386087 11.1288761,0.733697713 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(11.959697, 3.661508) rotate(-270.000000) translate(-11.959697, -3.661508) "/>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <!--end::Image-->
                                                    <!--begin::Section-->
                                                    <div class="text-start">
                                                        <span class="d-block fw-bold fs-1 text-gray-800">{{ $total_rekapitulasi/5 }} Data</span>
                                                    </div>
                                                    <!--end::Section-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Card widget 11-->
                                        </div>
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
