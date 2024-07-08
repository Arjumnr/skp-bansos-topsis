// $(document).ready(function () {
//     var url_name = "admin";

//     createPageLoader();
//     load_data();
//     function load_data() {
//         $.ajax({
//             url: url_name + "/data",
//             method: "GET",
//             data: {
//                 criteria: 1,
//             },
//             dataType: "json",
//             success: function (data) {
//                 console.log(data);
//                 hidePageLoader();
//             },
//         }).done(function (data) {
//             console.log('done');
//             console.log(data);
//             $("#kt_app_content").html(data.html);
//         });
//     }

//     function createPageLoader() {
//         let loadingEl = document.createElement("div");
//         let page = document.getElementById("kt_app_content");
//         page.classList.add("row");
//         page.classList.add("justify-content-center");
//         page.classList.add("align-items-center");
//         loadingEl.classList.add("loadersss");
//         loadingEl.classList.add("flex-column");
//         loadingEl.classList.add("bg-opacity-25");
//         loadingEl.style.textAlign = "center";
//         loadingEl.style.background = "var(--kt-body-bg)";
//         loadingEl.innerHTML = `
//             <span class="spinner-border text-primary" role="status"></span>
//             <span class="text-gray-800 fs-6 fw-semibold mt-5">Loading...</span>
//         `;
//         page.append(loadingEl);
//     }

//     function hidePageLoader() {
//         let page = document.getElementById("kt_app_content");
//         page.classList.remove("row");
//         page.classList.remove("justify-content-center");
//         page.classList.remove("align-items-center");
//         page.querySelector(".loadersss").remove();
//     }
// });
