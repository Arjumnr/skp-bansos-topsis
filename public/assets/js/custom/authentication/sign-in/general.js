"use strict";
var KTSigninGeneral = (function () {
    var e, t, i;
    return {
        init: function () {
            (e = document.querySelector("#kt_sign_in_form")),
                (t = document.querySelector("#kt_sign_in_submit")),
                (i = FormValidation.formValidation(e, {
                    fields: {
                        username: {
                            validators: {
                                notEmpty: {
                                    message: "username  is required",
                                },
                            },
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: "The password is required",
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
                })),
                t.addEventListener("click", function (n) {
                    n.preventDefault(),
                        i.validate().then(function (i) {
                            "Valid" == i
                                ? (t.setAttribute("data-kt-indicator", "on"),
                                  (t.disabled = !0),
                                  setTimeout(function () {
                                      t.removeAttribute("data-kt-indicator"),
                                          (t.disabled = !1),
                                          $.ajax({
                                              url: "auth/login",
                                              type: "POST",
                                              data: $(e).serialize(),
                                          })
                                              .done(function (data) {
                                                console.log(data)
                                                  if (data.code <= 200) {
                                                      Swal.fire({
                                                          text: "You have successfully logged in!",
                                                          icon: "success",
                                                          buttonsStyling: !1,
                                                          confirmButtonText:
                                                              "Ok, got it!",
                                                          customClass: {
                                                              confirmButton:
                                                                  "btn btn-primary",
                                                          },
                                                      }).then(function (e) {
                                                          e.isConfirmed &&
                                                              (window.location.href =
                                                                  "/admin");
                                                      });
                                                  } else
                                                      Swal.fire({
                                                          text: "Sorry, looks like there are some errors detected, please try again.",
                                                          icon: "error",
                                                          buttonsStyling: !1,
                                                          confirmButtonText:
                                                              "Ok, got it!",
                                                          customClass: {
                                                              confirmButton:
                                                                  "btn btn-primary",
                                                          },
                                                      });
                                              })
                                              .fail(function (data) {
                                                  Swal.fire({
                                                      text: "username or password is incorrect. Please try again.",
                                                      icon: "error",
                                                      buttonsStyling: !1,
                                                      confirmButtonText:
                                                          "Ok, got it!",
                                                      customClass: {
                                                          confirmButton:
                                                              "btn btn-primary",
                                                      },
                                                  });
                                              });
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
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});