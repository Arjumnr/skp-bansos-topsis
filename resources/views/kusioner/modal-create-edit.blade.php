<div class="modal fade" id="kt_modal_add_kusioner" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_kusioner_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold"><span class="form-title-modal"></span> Kriteria</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="currentColor" />
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
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">


                        <!--begin::Select Option-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Warga</label>
                            <!--end::Label-->
                            <!--begin::Select-->
                            <select name="kepala_keluarga_id" id="input-kepala-keluarga" data-control="select2"
                                data-dropdown-parent="#kt_modal_add_kusioner" data-placeholder="Pilih Warga..."
                                class="form-select form-select-solid">
                                <option value="">--- Pilih Warga ---</option>
                                @php
                                    $kusioner = Helper::getData('kusioner');
                                    $warga = Helper::getData('warga');
                                    $wargas = $warga->whereNotIn('id', $kusioner->pluck('kepala_keluarga_id')->toArray());
                                @endphp
                                @foreach ($wargas as $item)
                                    <option value="{{ $item->id }}">{{ $item->kepala_keluarga }}</option>
                                @endforeach
                            </select>
                            <!--begin::Select Option-->
                        </div>
                        <!--end::Select Option-->

                        @foreach (Helper::getData('criteria') as $index => $criteria)
                            <!--begin::Select Option-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">{{ $criteria->pernyataan }}</label>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <select name="kriteria_{{ $criteria->id }}" id="input-kriteria-{{ $criteria->id }}"
                                    data-control="select2" data-dropdown-parent="#kt_modal_add_kusioner"
                                    data-placeholder="Pilih Kriteria {{ $index + 1 }}..."
                                    class="form-select form-select-solid">
                                    <option value=""></option>
                                    @foreach (Helper::getData('options') as $item)
                                        @if ($item->kriteria_id == $criteria->id)
                                            <option value="{{ $item->id }}">{{ $item->opsi }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <!--end::Select-->
                            </div>
                            <!--end::Select Option-->
                        @endforeach
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3"
                            data-kt-users-modal-action="cancel">Discard</button>
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
