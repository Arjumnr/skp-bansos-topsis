<div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header" id="kt_modal_add_customers_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold"><span class="form-title-modal"></span> Customer</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                        <span class="svg-icon svg-icon-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                        </div>
                        <!--end::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form id="form-create-edit" class="form" action="POST">
                                        @csrf
                                        <input type="hidden" name="id" id="input-id" />
                                        <!--begin::Scroll-->
                                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">NIK</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="number" name="nik" id="input-nik" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="NIK" />
                                                        <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="name" id="input-name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" />
                                                        <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">Email</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="email" name="email" id="input-email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" />
                                                        <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">Tempat Lahir</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="tempat_lahir" id="input-tempat-lahir" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Makassar" />
                                                        <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">Tanggal Lahir</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="date" name="tanggal_lahir" id="input-tanggal-lahir" class="form-control form-control-solid mb-3 mb-lg-0" />
                                                        <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Select Option-->
                                                <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">Jenis Kelamin</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <select name="jenis_kelamin" id="input-jenis-kelamin" class="form-select form-select-solid mb-3 mb-lg-0">
                                                                <option value="">Select</option>
                                                                <option value="L">Laki-laki</option>
                                                                <option value="P">Perempuan</option>
                                                        </select>
                                                        <!--end::Input-->
                                                </div>
                                                <!--end::Select Option-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">Telepon</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="telepon" id="input-telepon" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="081234567890" />
                                                        <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">Alamat</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="alamat" id="input-alamat" class="form-control form-control-solid mb-3 mb-lg-0" />
                                                        <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-semibold fs-6 mb-2">Pekerjaan</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" name="pekerjaan" id="input-pekerjaan" class="form-control form-control-solid mb-3 mb-lg-0" />
                                                        <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input File-->
                                                <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="required fw-bold fs-6 mb-2">KTP</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="file" name="ktp" id="input-ktp" class="form-control form-control-solid mb-3 mb-lg-0" />
                                                        <!--end::Input-->
                                                </div>
                                                <!--end::Input File-->
                                        </div>
                                        <!--end::Scroll-->
                                        <!--begin::Actions-->
                                        <div class="text-center pt-15">
                                                <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                                        <span class="indicator-label">Submit</span>
                                                        <span class="indicator-progress">Please wait...
                                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                </button>
                                        </div>
                                        <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                        </div>
                        <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
</div>