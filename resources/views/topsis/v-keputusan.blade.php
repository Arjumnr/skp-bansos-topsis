<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="d-flex justify-content-center card-header border-0 pt-6">
                <!--begin::Card toolbar-->
                <div class=" card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-center" data-kt-user-table-toolbar="base">
                        <h3>Matriks Keputusan</h3>
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none"
                        data-kt-user-table-toolbar="selected">
                        <div class="fw-bold me-5">
                            <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                        </div>
                        <button type="button" class="btn btn-danger"
                            data-kt-user-table-select="delete_selected">Delete Selected</button>
                    </div>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body py-4">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_data_penerima">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th>No</th>
                            <th>Kepala Keluarga</th>
                            <th>Penghasilan Perbulan</th>
                            <th>Bobot PP</th>
                            <th>Jumlah Anggota Keluarga</th>
                            <th>Bobot AK</th>
                            <th>Pekerjaan</th>
                            <th>Bobot P</th>
                            <th>Jenis Lantai</th>
                            <th>Bobot JL</th>
                            <th>Jenis Dinding</th>
                            <th>Bobot JD</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-semibold data-ajax-table">
                        <!--begin::Table row-->

                        <!--end::Table row-->
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
                
                <!--begin::Pagination-->
                <div class="row mb-4">
                    <div
                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                    </div>
                    <div
                        class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="dataTables_paginate paging_simple_numbers">
                            <ul class="pagination" id="kt_table_paginate">
                            </ul>
                        </div>
                    </div>
                </div>
                <!--end::Pagination-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Content container-->
</div>