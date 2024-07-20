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
            <div class="badge badge-light fw-bold">{{ $v['kepala_keluarga'] }}</div>
        </td>
        <!--end::Nama Kriteria=-->

        <!--begin::Pernyataan=-->
        <td>
            <!--begin::Pernyataan -->
            <div class="d-flex flex-column text-center text-center">
                <div class="text-gray-800 text-hover-primary mb-1">{{ $v['bobot_pp'] }}</div>
            </div>
            <!--begin::Pernyataan -->
        </td>
        <!--end::Pernyataan=-->

        <!--begin::Pernyataan=-->
        <td>
            <!--begin::Pernyataan -->
            <div class="d-flex flex-column text-center">
                <div class="text-gray-800 text-hover-primary mb-1">{{ $v['bobot_jak'] }}</div>
            </div>
            <!--begin::Pernyataan -->
        </td>
        <!--end::Pernyataan=-->

        <!--begin::Pernyataan=-->
        <td>
            <!--begin::Pernyataan -->
            <div class="d-flex flex-column text-center">
                <div class="text-gray-800 text-hover-primary mb-1">{{ $v['bobot_p'] }}</div>
            </div>
            <!--begin::Pernyataan -->
        </td>
        <!--end::Pernyataan=-->

        <!--begin::Pernyataan=-->
        <td>
            <!--begin::Pernyataan -->
            <div class="d-flex flex-column text-center">
                <div class="text-gray-800 text-hover-primary mb-1">{{ $v['bobot_jl'] }}</div>
            </div>
            <!--begin::Pernyataan -->
        </td>
        <!--end::Pernyataan=-->

        <!--begin::Pernyataan=-->
        <td>
            <!--begin::Pernyataan -->
            <div class="d-flex flex-column text-center">
                <div class="text-gray-800 text-hover-primary mb-1">{{ $v['bobot_jd'] }}</div>
            </div>
            <!--begin::Pernyataan -->
        </td>
        <!--end::Pernyataan=-->

    </tr>
    <!--end::Table row-->
@empty
    <tr>
        <td colspan="6" class="d-flex align-items-center">No data available</td>
    </tr>
@endforelse
