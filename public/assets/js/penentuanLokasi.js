// $(document).ready(function () {
//     $(".form-tentukan-lokasi").on("submit", function (event) {
//         event.preventDefault();

//         var url = $(this).attr("data-action");
//         $.ajax({
//             url: url,
//             method: "POST",
//             data: new FormData(this),
//             dataType: "JSON",
//             contentType: false,
//             cache: false,
//             processData: false,
//             success: function (response) {
//                 alert(response.message);
//             },
//             error: function (response, err) {
//                 alert(err);
//             },
//         });
//     });
// });

// $(document).ready(function () {
//     $(".form-tentukan-lokasi").submit(function (e) {
//         e.preventDefault();

//         // Mengambil URL dan data form
//         var url = $(this).attr("data-action");
//         var formData = new FormData(this);

//         // Melakukan permintaan AJAX
//         $.ajax({
//             url: url,
//             method: "POST",
//             data: formData,
//             processData: false,
//             contentType: false,
//             success: function (response) {
//                 // Menangani respons sukses
//                 if (response.success) {
//                     alert(response.message); // Tampilkan pesan sukses
//                     location.reload(); // Muat ulang halaman
//                 }
//             },
//             error: function (error) {
//                 console.error("Error:", error);
//             },
//         });
//     });
// });
