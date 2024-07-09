"use strict";

var KTSigninGeneral = (function() {
    var e, t, i;

    return {
        init: function() {
            e = document.querySelector("#kt_sign_in_form");
            t = document.querySelector("#kt_sign_in_submit");
            i = FormValidation.formValidation(e, {
                fields: {
                    username: {
                        validators: {
                            notEmpty: {
                                message: "Username is required"
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "The password is required"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            });

            t.addEventListener("click", function(n) {
                n.preventDefault();
                i.validate().then(function(i) {
                    if (i == "Valid") {
                        t.setAttribute("data-kt-indicator", "on");
                        t.disabled = true;

                        // Send AJAX request to server
                        var formData = new FormData(e);

                        fetch(e.action, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                            },
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            t.removeAttribute("data-kt-indicator");
                            t.disabled = false;
                            console.log(response);

                            if (data.success) {
                                Swal.fire({
                                    text: "You have successfully logged in!",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(function(t) {
                                    if (t.isConfirmed) {
                                        e.querySelector('[name="username"]').value = "";
                                        e.querySelector('[name="password"]').value = "";
                                        if (data.redirect_url) {
                                            location.href = data.redirect_url;
                                        }
                                    }
                                });
                            } else {
                                console.log(data);
                                Swal.fire({
                                    text: "Sorry, looks like there are some errors detected, please try again.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            }
                        })
                        .catch(error => {
                            t.removeAttribute("data-kt-indicator");
                            t.disabled = false;
                            Swal.fire({
                                text: "An error occurred. Please try again.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        });
                    } else {
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            });
        }
    };
})();

KTUtil.onDOMContentLoaded(function() {
    KTSigninGeneral.init();
});
