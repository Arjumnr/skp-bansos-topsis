$(document).ready(function () {
    var url_name = "topsis";

    // Pagination config
    var defaultOpts = {
        totalPages: 1,
        hideOnlyOnePage: false,
        prev: '<i class="previous"></i>',
        next: '<i class="next"></i>',
        paginationClass: "pagination",
        pageClass: "paginate_button page-item",
        nextClass: "next",
        prevClass: "previous",
    };

    function setupPagination(paginationId, loadFunction) {
        var $pagination = $(paginationId);
        $pagination.twbsPagination(defaultOpts);

        return function(page = 1, search = "", length = 5) {
            $.ajax({
                url: url_name + loadFunction.url,
                method: "GET",
                data: { page, search, length },
                dataType: "json",
                success: function(data) {
                    var total_page = data.total_page;
                    var current_page = $pagination.twbsPagination("getCurrentPage");
                    $pagination.twbsPagination("destroy");
                    $pagination.twbsPagination($.extend({}, defaultOpts, {
                        startPage: current_page,
                        totalPages: total_page,
                        visiblePages: 4,
                        initiateStartPageClick: false,
                        onPageClick: function (event, page) {
                            loadFunction.fn(page, search);
                        },
                    }));
                    $(loadFunction.container).html(data.html);
                }
            });
        }
    }

    // Initialize pagination functions
    var load_data = setupPagination("#kt_table_paginate", {
        url: "/data-penerima",
        fn: function (page, search) { load_data(page, search); },
        container: ".data-ajax-table"
    });

    var load_data2 = setupPagination("#kt_table_paginate_2", {
        url: "/data-keputusan-ternormalisasi",
        fn: function (page, search) { load_data2(page, search); },
        container: ".data-ajax-table_2"
    });

    var load_data3 = setupPagination("#kt_table_paginate_3", {
        url: "/data-matriks-ternormalisasi-terbobot",
        fn: function (page, search) { load_data3(page, search); },
        container: ".data-ajax-table_3"
    });

    var load_data4 = setupPagination("#kt_table_paginate_4", {
        url: "/data-solusi-ideal",
        fn: function (page, search) { load_data4(page, search); },
        container: ".data-ajax-table_4"
    });

    var load_data5 = setupPagination("#kt_table_paginate_5", {
        url: "/data-jarak-solusi-ideal",
        fn: function (page, search) { load_data5(page, search); },
        container: ".data-ajax-table_5"
    });

    // Search
    $("#kt_table_search").on("keyup change", function () {
        var search = $(this).val();
        load_data(1, search);
        load_data2(1, search);
        load_data3(1, search);
        load_data4(1, search);
        load_data5(1, search);
    });

    // Initial data load
    load_data();
    load_data2();
    load_data3();
    load_data4();
    load_data5();
});
