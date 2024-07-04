<div class="modal fade" id="kt_modal_pilih_perumahan" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content rounded">
                        <!--begin::Modal header-->
                        <div class="modal-header pb-10 border-0 justify-content-end">
                        </div>
                        <!--begin::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                <!--begin:Form-->
                                <form id="kt_modal_pilih_perumahan_form" class="form" action="#">
                                        <!--begin::Heading-->
                                        <div class="mb-13 text-center">
                                                <!--begin::Title-->
                                                <h1 class="mb-3">Pilih Properti</h1>
                                                <!--end::Title-->
                                                <!--begin::Description-->
                                                <div class="text-muted fw-semibold fs-5">Data Properti Yang Ingin Ditampilkan
                                                </div>
                                                <!--end::Description-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-15" data-kt-buttons="true">
                                                <!--begin::Option-->
                                                @foreach(Helper::getPerumahan() as $perumahan)
                                                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6 mb-6">
                                                        <!--begin::Input-->
                                                        <input class="btn-check" type="radio" checked="checked" name="offer_type" value="{{ $perumahan->id }}" />
                                                        <!--end::Input-->
                                                        <!--begin::Label-->
                                                        <span class="d-flex">
                                                                <!--begin::Icon-->
                                                                <span class="svg-icon svg-icon-3hx">
                                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                                                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                                                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
                                                                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
                                                                        </svg>
                                                                </span>
                                                                <!--end::Icon-->
                                                                <!--begin::Info-->
                                                                <span class="ms-4">
                                                                        <span class="fs-3 fw-bold text-gray-900 mb-2 d-block">{{ $perumahan->nama_perumahan }}</span>
                                                                        <span class="fw-semibold fs-4 text-muted">{{ $perumahan->alamat }}</span>
                                                                </span>
                                                                <!--end::Info-->
                                                        </span>
                                                        <!--end::Label-->
                                                </label>
                                                @endforeach
                                                <!--end::Option-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Actions-->
                                        <div class="text-center">
                                                <button type="submit" id="kt_modal_pilih_perumahan_submit" class="btn btn-primary">
                                                        <span class="indicator-label">Submit</span>
                                                        <span class="indicator-progress">Please wait...
                                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                </button>
                                        </div>
                                        <!--end::Actions-->
                                </form>
                                <!--end:Form-->
                        </div>
                        <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
</div>