
@forelse($data as $v)

    <!--begin::Table row-->
    <tr>
        <!--begin::Nomor-->
        <td>
            <span class="text-gray-800">{{ ++$i }}</span>
        </td>
        <!--end::Nomor-->

        <!--begin::Nama Kriteria=-->
        <td>
            <div class="badge badge-light fw-bold">
                {{ Helper::getData('warga')->where('id', $v['kepala_keluarga_id'])->first()->kepala_keluarga }}
            </div>
        </td>
        <!--end::Nama Kriteria=-->

        <!--begin::Pernyataan=-->
        <td>
            <!--begin::Pernyataan -->
            <div class="d-flex flex-column">
                <div class="text-gray-800 text-hover-primary mb-1">{{ $v['kriteria_id'] }}</div>
            </div>
            <!--begin::Pernyataan -->
        </td>
        <!--end::Pernyataan=-->

        <!--begin::Tipe=-->
        <td>
            <!--begin::Tipe-->
            <div class="d-flex flex-column">
                <div class="text-gray-800 text-hover-primary mb-1">{{ $v['bobot_kriteria'] }}</div>
            </div>
            <!--begin::Tipe-->
        </td>
        <!--end::Tipe=-->

        <!--begin::Bobot=-->
        <td>
            <!--begin::Bobot -->
            <div class="d-flex flex-column">
                <div class="text-gray-800 text-hover-primary mb-1">{{ $v['bobot_jawaban'] }}</div>
            </div>
            <!--begin::Bobot -->
        </td>
        <!--end::Bobot=-->


        <!--begin::Action=-->
        <td class="text-end">
            <a href="javascript:void(0)" data-id="{{ $v['kepala_keluarga_id'] }}" data-toggle="tooltip"
                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="btn-delete">
                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                <span class="svg-icon svg-icon-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                            fill="currentColor" />
                        <path opacity="0.5"
                            d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                            fill="currentColor" />
                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </a>
        </td>
        <!--end::Action=-->
    </tr>
    <!--end::Table row-->
@empty
    <tr>
        <td colspan="6" class="d-flex align-items-center">No data available</td>
    </tr>
@endforelse
