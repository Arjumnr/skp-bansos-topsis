"use strict";
var KTUsersList = (function () {
    var e,
    t,
    n,
    r,
    o = document.getElementById("kt_table_data_penerima"),
    c = () => { // Add a comma here to correctly declare c
        o.querySelectorAll(
            '[data-kt-users-table-filter="delete_row"]'
        ).forEach((t) => {
            t.addEventListener("click", function (t) {
                t.preventDefault();
                const n = t.target.closest("tr"),
                    r = n
                        .querySelectorAll("td")[1]
                        .querySelectorAll("a")[1].innerText;
                Swal.fire({
                    text: "Are you sure you want to delete " + r + "?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton:
                            "btn fw-bold btn-active-light-primary",
                    },
                }).then(function (t) {
                    t.value
                        ? Swal.fire({
                              text: "You have deleted " + r + "!.",
                              icon: "success",
                              buttonsStyling: !1,
                              confirmButtonText: "Ok, got it!",
                              customClass: {
                                  confirmButton: "btn fw-bold btn-primary",
                              },
                          })
                              .then(function () {
                                  e.row($(n)).remove().draw();
                              })
                              .then(function () {
                                  a();
                              })
                        : "cancel" === t.dismiss &&
                          Swal.fire({
                              text: r + " was not deleted.", // Fix: use the variable 'r' instead of 'customerName'
                              icon: "error",
                              buttonsStyling: !1,
                              confirmButtonText: "Ok, got it!",
                              customClass: {
                                  confirmButton: "btn fw-bold btn-primary",
                              },
                          });
                });
            });
        });
    };

})();
KTUtil.onDOMContentLoaded(function () {
    KTUsersList.init();
});
