<!--begin::Content container-->
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
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="height: inherit;">
                                                                    <path d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z" fill="#e0c6a0" class="color000000 svgShape"></path>
                                                            </svg>
                                                    </div>
                                                    <!--end::Image-->
                                                    <!--begin::Section-->
                                                    <div class="text-start">
                                                            <span class="d-block fw-bold fs-1 text-gray-800">{{ $data['criteria'] }} </span>
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
                                                            <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" style="height: inherit;">
                                                                    <path d="M22.96423,13.82263a.94762.94762,0,0,0-.02819-.17419L20.63135,7.51135A2.99558,2.99558,0,0,0,22,5a1,1,0,0,0-2,0,1.00037,1.00037,0,0,1-1.88184.47266A2.8934,2.8934,0,0,0,15.54,4H13V3a1,1,0,0,0-2,0V4H8.46A2.8934,2.8934,0,0,0,5.88184,5.47266,1.00037,1.00037,0,0,1,4,5,1,1,0,0,0,2,5,2.99558,2.99558,0,0,0,3.36865,7.51135L1.064,13.64844a.94762.94762,0,0,0-.02819.17419A.94855.94855,0,0,0,1,14c0,.00928.00269.01782.00275.0271.0003.01318.003.02533.0039.03845a3.99379,3.99379,0,0,0,7.9867,0c.00085-.01312.0036-.02527.0039-.03845C8.99731,14.01782,9,14.00928,9,14a.94855.94855,0,0,0-.03577-.17737.94762.94762,0,0,0-.02819-.17419L6.62866,7.50421A2.98961,2.98961,0,0,0,7.64258,6.41992.917.917,0,0,1,8.46,6H11V20H8a1,1,0,0,0,0,2h8a1,1,0,0,0,0-2H13V6h2.54a.917.917,0,0,1,.81738.41992,2.98961,2.98961,0,0,0,1.01392,1.08429L15.064,13.64844a.94762.94762,0,0,0-.02819.17419A.94855.94855,0,0,0,15,14c0,.00928.00269.01782.00275.0271.0003.01318.003.02533.0039.03845a3.99379,3.99379,0,0,0,7.9867,0c.00085-.01312.0036-.02527.0039-.03845C22.99731,14.01782,23,14.00928,23,14A.94855.94855,0,0,0,22.96423,13.82263ZM5,8.85553,6.5564,13H3.4436ZM6.72266,15A2.02306,2.02306,0,0,1,5,16a2.00023,2.00023,0,0,1-1.73145-1ZM19,8.85553,20.5564,13H17.4436ZM19,16a2.00023,2.00023,0,0,1-1.73145-1h3.45411A2.02306,2.02306,0,0,1,19,16Z" fill="#ebc3e5" class="color000000 svgShape"></path>
                                                            </svg>
                                                    </div>
                                                    <!--end::Image-->
                                                    <!--begin::Section-->
                                                    <div class="text-start">
                                                            <span class="d-block fw-bold fs-1 text-gray-800">{{ $data['transaction'] }} Transaksi</span>
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
                                                            <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" style="height: inherit;">
                                                                    <path d="M8.5,19A1.5,1.5,0,1,0,10,20.5,1.5,1.5,0,0,0,8.5,19ZM19,16H7a1,1,0,0,1,0-2h8.49121A3.0132,3.0132,0,0,0,18.376,11.82422L19.96143,6.2749A1.00009,1.00009,0,0,0,19,5H6.73907A3.00666,3.00666,0,0,0,3.92139,3H3A1,1,0,0,0,3,5h.92139a1.00459,1.00459,0,0,1,.96142.7251l.15552.54474.00024.00506L6.6792,12.01709A3.00006,3.00006,0,0,0,7,18H19a1,1,0,0,0,0-2ZM17.67432,7l-1.2212,4.27441A1.00458,1.00458,0,0,1,15.49121,12H8.75439l-.25494-.89221L7.32642,7ZM16.5,19A1.5,1.5,0,1,0,18,20.5,1.5,1.5,0,0,0,16.5,19Z" fill="#b2ced3" class="color000000 svgShape"></path>
                                                            </svg>
                                                    </div>
                                                    <!--end::Image-->
                                                    <!--begin::Section-->
                                                    <div class="text-start">
                                                            <span class="d-block fw-bold fs-1 text-gray-800">{{ $data['marketing'] }} Orang</span>
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
            <!--begin::Col-->
            <div class="col-xxl-12 mb-5 mb-xl-10">
                    <!--begin::Chart widget 8-->
                    <div class="card card-flush h-xl-100">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold text-dark">Performance Overview</span>
                                            <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span>
                                    </h3>
                                    <!--end::Title-->
                                    <!--begin::Toolbar-->
                                    <div class="card-toolbar">
                                            <ul class="nav" id="kt_chart_widget_8_tabs">
                                                    <li class="nav-item">
                                                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1" data-bs-toggle="tab" id="kt_chart_widget_8_week_toggle" href="#kt_chart_widget_8_week_tab">Month</a>
                                                    </li>
                                                    <li class="nav-item">
                                                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1 active" data-bs-toggle="tab" id="kt_chart_widget_8_month_toggle" href="#kt_chart_widget_8_month_tab">Week</a>
                                                    </li>
                                            </ul>
                                    </div>
                                    <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-6">
                                    <!--begin::Tab content-->
                                    <div class="tab-content">
                                            <!--begin::Tab pane-->
                                            <div class="tab-pane fade" id="kt_chart_widget_8_week_tab" role="tabpanel">
                                                    <!--begin::Statistics-->
                                                    <div class="mb-5">
                                                            <!--begin::Statistics-->
                                                            <div class="d-flex align-items-center mb-2">
                                                                    <span class="fs-1 fw-semibold text-gray-400 me-1 mt-n1">$</span>
                                                                    <span class="fs-3x fw-bold text-gray-800 me-2 lh-1 ls-n2">18,89</span>
                                                                    <span class="badge badge-light-success fs-base">
                                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                                            <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                                                            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                                                    </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->4,8%</span>
                                                            </div>
                                                            <!--end::Statistics-->
                                                            <!--begin::Description-->
                                                            <span class="fs-6 fw-semibold text-gray-400">Avarage cost per
                                                                    interaction</span>
                                                            <!--end::Description-->
                                                    </div>
                                                    <!--end::Statistics-->
                                                    <!--begin::Chart-->
                                                    <div id="kt_chart_widget_8_week_chart" class="ms-n5 min-h-auto" style="height: 275px"></div>
                                                    <!--end::Chart-->
                                                    <!--begin::Items-->
                                                    <div class="d-flex flex-wrap pt-5">
                                                            <!--begin::Item-->
                                                            <div class="d-flex flex-column me-7 me-lg-16 pt-sm-3 pt-6">
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex align-items-center mb-3 mb-sm-6">
                                                                            <!--begin::Bullet-->
                                                                            <span class="bullet bullet-dot bg-primary me-2 h-10px w-10px"></span>
                                                                            <!--end::Bullet-->
                                                                            <!--begin::Label-->
                                                                            <span class="fw-bold text-gray-600 fs-6">Social Campaigns</span>
                                                                            <!--end::Label-->
                                                                    </div>
                                                                    <!--ed::Item-->
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex align-items-center">
                                                                            <!--begin::Bullet-->
                                                                            <span class="bullet bullet-dot bg-danger me-2 h-10px w-10px"></span>
                                                                            <!--end::Bullet-->
                                                                            <!--begin::Label-->
                                                                            <span class="fw-bold text-&lt;gray-600 fs-6">Google Ads</span>
                                                                            <!--end::Label-->
                                                                    </div>
                                                                    <!--ed::Item-->
                                                            </div>
                                                            <!--ed::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex flex-column me-7 me-lg-16 pt-sm-3 pt-6">
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex align-items-center mb-3 mb-sm-6">
                                                                            <!--begin::Bullet-->
                                                                            <span class="bullet bullet-dot bg-success me-2 h-10px w-10px"></span>
                                                                            <!--end::Bullet-->
                                                                            <!--begin::Label-->
                                                                            <span class="fw-bold text-gray-600 fs-6">Email Newsletter</span>
                                                                            <!--end::Label-->
                                                                    </div>
                                                                    <!--ed::Item-->
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex align-items-center">
                                                                            <!--begin::Bullet-->
                                                                            <span class="bullet bullet-dot bg-warning me-2 h-10px w-10px"></span>
                                                                            <!--end::Bullet-->
                                                                            <!--begin::Label-->
                                                                            <span class="fw-bold text-gray-600 fs-6">Courses</span>
                                                                            <!--end::Label-->
                                                                    </div>
                                                                    <!--ed::Item-->
                                                            </div>
                                                            <!--ed::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex flex-column pt-sm-3 pt-6">
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex align-items-center mb-3 mb-sm-6">
                                                                            <!--begin::Bullet-->
                                                                            <span class="bullet bullet-dot bg-info me-2 h-10px w-10px"></span>
                                                                            <!--end::Bullet-->
                                                                            <!--begin::Label-->
                                                                            <span class="fw-bold text-gray-600 fs-6">TV Campaign</span>
                                                                            <!--end::Label-->
                                                                    </div>
                                                                    <!--ed::Item-->
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex align-items-center">
                                                                            <!--begin::Bullet-->
                                                                            <span class="bullet bullet-dot bg-success me-2 h-10px w-10px"></span>
                                                                            <!--end::Bullet-->
                                                                            <!--begin::Label-->
                                                                            <span class="fw-bold text-gray-600 fs-6">Radio</span>
                                                                            <!--end::Label-->
                                                                    </div>
                                                                    <!--ed::Item-->
                                                            </div>
                                                            <!--ed::Item-->
                                                    </div>
                                                    <!--ed::Items-->
                                            </div>
                                            <!--end::Tab pane-->
                                            <!--begin::Tab pane-->
                                            <div class="tab-pane fade active show" id="kt_chart_widget_8_month_tab" role="tabpanel">
                                                    <!--begin::Statistics-->
                                                    <div class="mb-5">
                                                            <!--begin::Statistics-->
                                                            <div class="d-flex align-items-center mb-2">
                                                                    <span class="fs-1 fw-semibold text-gray-400 me-1 mt-n1">$</span>
                                                                    <span class="fs-3x fw-bold text-gray-800 me-2 lh-1 ls-n2">8,55</span>
                                                                    <span class="badge badge-light-success fs-base">
                                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                                            <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                                                            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                                                    </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->2.2%</span>
                                                            </div>
                                                            <!--end::Statistics-->
                                                            <!--begin::Description-->
                                                            <span class="fs-6 fw-semibold text-gray-400">Avarage cost per
                                                                    interaction</span>
                                                            <!--end::Description-->
                                                    </div>
                                                    <!--end::Statistics-->
                                                    <!--begin::Chart-->
                                                    <div id="kt_chart_widget_8_month_chart" class="ms-n5 min-h-auto" style="height: 275px"></div>
                                                    <!--end::Chart-->
                                                    <!--begin::Items-->
                                                    <div class="d-flex flex-wrap pt-5">
                                                            <!--begin::Item-->
                                                            <div class="d-flex flex-column me-7 me-lg-16 pt-sm-3 pt-6">
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex align-items-center mb-3 mb-sm-6">
                                                                            <!--begin::Bullet-->
                                                                            <span class="bullet bullet-dot bg-primary me-2 h-10px w-10px"></span>
                                                                            <!--end::Bullet-->
                                                                            <!--begin::Label-->
                                                                            <span class="fw-bold text-gray-600 fs-6">Social Campaigns</span>
                                                                            <!--end::Label-->
                                                                    </div>
                                                                    <!--ed::Item-->
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex align-items-center">
                                                                            <!--begin::Bullet-->
                                                                            <span class="bullet bullet-dot bg-danger me-2 h-10px w-10px"></span>
                                                                            <!--end::Bullet-->
                                                                            <!--begin::Label-->
                                                                            <span class="fw-bold text-gray-600 fs-6">Google Ads</span>
                                                                            <!--end::Label-->
                                                                    </div>
                                                                    <!--ed::Item-->
                                                            </div>
                                                            <!--ed::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex flex-column me-7 me-lg-16 pt-sm-3 pt-6">
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex align-items-center mb-3 mb-sm-6">
                                                                            <!--begin::Bullet-->
                                                                            <span class="bullet bullet-dot bg-success me-2 h-10px w-10px"></span>
                                                                            <!--end::Bullet-->
                                                                            <!--begin::Label-->
                                                                            <span class="fw-bold text-gray-600 fs-6">Email Newsletter</span>
                                                                            <!--end::Label-->
                                                                    </div>
                                                                    <!--ed::Item-->
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex align-items-center">
                                                                            <!--begin::Bullet-->
                                                                            <span class="bullet bullet-dot bg-warning me-2 h-10px w-10px"></span>
                                                                            <!--end::Bullet-->
                                                                            <!--begin::Label-->
                                                                            <span class="fw-bold text-gray-600 fs-6">Courses</span>
                                                                            <!--end::Label-->
                                                                    </div>
                                                                    <!--ed::Item-->
                                                            </div>
                                                            <!--ed::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex flex-column pt-sm-3 pt-6">
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex align-items-center mb-3 mb-sm-6">
                                                                            <!--begin::Bullet-->
                                                                            <span class="bullet bullet-dot bg-info me-2 h-10px w-10px"></span>
                                                                            <!--end::Bullet-->
                                                                            <!--begin::Label-->
                                                                            <span class="fw-bold text-gray-600 fs-6">TV Campaign</span>
                                                                            <!--end::Label-->
                                                                    </div>
                                                                    <!--ed::Item-->
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex align-items-center">
                                                                            <!--begin::Bullet-->
                                                                            <span class="bullet bullet-dot bg-success me-2 h-10px w-10px"></span>
                                                                            <!--end::Bullet-->
                                                                            <!--begin::Label-->
                                                                            <span class="fw-bold text-gray-600 fs-6">Radio</span>
                                                                            <!--end::Label-->
                                                                    </div>
                                                                    <!--ed::Item-->
                                                            </div>
                                                            <!--ed::Item-->
                                                    </div>
                                                    <!--ed::Items-->
                                            </div>
                                            <!--end::Tab pane-->
                                    </div>
                                    <!--end::Tab content-->
                            </div>
                            <!--end::Body-->
                    </div>
                    <!--end::Chart widget 8-->
            </div>
            <!--end::Col-->
    </div>
    <!--end::Row-->
</div>
<!--end::Content container-->