$(document).ready(function () {
    var url_name = "kusioner";

    // Initiate modal
    var form_modal = $("#form-create-edit");
    var modal = $("#kt_modal_add_kusioner");
    var modal_title = $("#kt_modal_add_kusioner .form-title-modal");
    var modal_submit = modal.find('[data-kt-users-modal-action="submit"]');
    var modal_cancel = modal.find('[data-kt-users-modal-action="cancel"]');
    var modal_close = modal.find('[data-kt-users-modal-action="close"]');

    // Modal Close
    modal_close.on("click", function (e) {
        e.preventDefault();
        Swal.fire({
            text: "Are you sure you would like to cancel?",
            icon: "warning",
            showCancelButton: !0,
            buttonsStyling: !1,
            confirmButtonText: "Yes, cancel it!",
            cancelButtonText: "No, return",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-active-light",
            },
        }).then(function (t) {
            t.value
                ? (modal.modal("hide"), form_modal.trigger("reset"))
                : "cancel" === t.dismiss &&
                  Swal.fire({
                      text: "Your form has not been cancelled!.",
                      icon: "error",
                      buttonsStyling: !1,
                      confirmButtonText: "Ok, got it!",
                      customClass: {
                          confirmButton: "btn btn-primary",
                      },
                  });
        });
    });

    // Modal Cancel
    modal_cancel.on("click", function (e) {
        e.preventDefault();
        Swal.fire({
            text: "Are you sure you would like to cancel?",
            icon: "warning",
            showCancelButton: !0,
            buttonsStyling: !1,
            confirmButtonText: "Yes, cancel it!",
            cancelButtonText: "No, return",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-active-light",
            },
        }).then(function (t) {
            t.value
                ? (modal.modal("hide"), form_modal.trigger("reset"))
                : "cancel" === t.dismiss &&
                  Swal.fire({
                      text: "Your form has not been cancelled!.",
                      icon: "error",
                      buttonsStyling: !1,
                      confirmButtonText: "Ok, got it!",
                      customClass: {
                          confirmButton: "btn btn-primary",
                      },
                  });
        });
    });

    // Validation
    var validation_form = FormValidation.formValidation(form_modal[0], {
        fields: {
            kepala_keluarga_id: {
                validators: {
                    notEmpty: { message: "Warga is required" },
                },
            },
            'kriteria_*': {
                validators: {
                    notEmpty: {
                        message: "Kriteria is required",

                    },
                },
            },
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: ".fv-row",
                eleInvalidClass: "",
                eleValidClass: "",
            }),
        },
    });

    // Show modal
    modal.on("show.bs.modal", function (e) {
        console.log(e)

            $.ajax({
                url: url_name + "/" + 'data',
                method: "GET",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    data = data.data;
                    // $("#input-id").val(data.id);
                    // $("#input-nama-kriteria").val(data.nama_kriteria);
                    // $("#input-pernyataan").val(data.pernyataan);
                    // $("#input-tipe").val(data.tipe);
                    // $("#input-bobot").val(data.bobot);
                   
                },
                error: function (data) {
                    var errorsString = "";
                    $.each(data.responseJSON.message, function (key, value) {
                        errorsString += value + "<br>";
                    });
                    Swal.fire({
                        title: "Error!",
                        html: errorsString,
                        icon: "error",
                        confirmButtonText: "Ok",
                    });
                },
            });
        // }
    });

    // Modal Submit
    modal_submit.on("click", function (e) {
        e.preventDefault();
        validation_form &&
            validation_form.validate().then(function (e) {
                "Valid" == e
                    ? (modal_submit.attr("data-kt-indicator", "on"),
                      (modal_submit.disabled = !0),
                      setTimeout(function () {
                          modal_submit.removeAttr("data-kt-indicator"),
                              (modal_submit.disabled = !1),
                              create_edit();
                      }, 2e3))
                    : Swal.fire({
                          text: "Sorry, looks like there are some errors detected, please try again.",
                          icon: "error",
                          buttonsStyling: !1,
                          confirmButtonText: "Ok, got it!",
                          customClass: {
                              confirmButton: "btn btn-primary",
                          },
                      });
            });
    });

    // Create and Edit
    function create_edit() {
        var cek_method = form_modal.attr("action");
        let formData = new FormData(form_modal[0]);
        // formData.append("ktp", $("#input-ktp").prop("files")[0]);
        // formData.append("perumahan", localStorage.getItem("perumahan"));

        if (cek_method == "post" || cek_method == "POST") {
            formData.append("_method", "POST");
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: url_name,
                method: "POST",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log(data)
                    if (data.code >= 200) {
                        Swal.fire({
                            title: "Success!",
                            text: data.message,
                            icon: "success",
                            confirmButtonText: "Ok",
                        }).then((result) => {
                            modal.modal("hide");
                            //to dashboard
                            window.location.href = "/rekapitulasi";
                            // load_data();
                        });
                    }
                },
                error: function (data) {
                    Swal.fire({
                        title: "Error!",
                        html: data.responseJSON.message,
                        icon: "error",
                        confirmButtonText: "Ok",
                    });
                },
            });
        } else if (cek_method == "put" || cek_method == "PUT") {
            var id = $("#input-id").val();
            formData.append("_method", "PUT");
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: url_name + "/" + id,
                method: "POST",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log(data);
                    if (data.code >= 200) {
                        Swal.fire({
                            title: "Success!",
                            text: data.message,
                            icon: "success",
                            confirmButtonText: "Ok",
                        }).then((result) => {
                            modal.modal("hide");
                            load_data();
                        });
                    }
                },
                error: function (data) {
                    Swal.fire({
                        title: "Error!",
                        html: data.responseJSON.message,
                        icon: "error",
                        confirmButtonText: "Ok",
                    });
                },
            });
        } else {
            Swal.fire({
                title: "Error!",
                text: "Method not found",
                icon: "error",
                confirmButtonText: "Ok",
            });
        }
    }

    // Delete
    $("body").on("click", "#btn-delete", function (e) {
        var id = $(this).data("id");
        Swal.fire({
            title: "Are you sure?",
            text: "You will delete this data!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: url_name + "/" + id,
                    method: "DELETE",
                    data: {
                        _token: $('input[name="_token"]').val(),
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data.code >= 200) {
                            Swal.fire({
                                title: "Success!",
                                text: data.message,
                                icon: "success",
                                confirmButtonText: "Ok",
                            }).then((result) => {
                                load_data();
                            });
                        }
                    },
                    error: function (data) {
                        var errorsString = "";
                        $.each(
                            data.responseJSON.message,
                            function (key, value) {
                                errorsString += value + "<br>";
                            }
                        );
                        Swal.fire({
                            title: "Error!",
                            html: errorsString,
                            icon: "error",
                            confirmButtonText: "Ok",
                        });
                    },
                });
            }
        });
    });
});
