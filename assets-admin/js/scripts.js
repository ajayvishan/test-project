$(document).on("submit", ".form-submit", function(e) {
    e.preventDefault();
    let form = $(this);
    let formData = new FormData($(form)[0]);
    let url = $(this).attr("action");
    let method = $(this).attr("method");

    // console.log(url);
    $.ajax({
        type: method,
        url,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        data: formData,
        success: function(result) {
            console.log(result);
            if (result.type === "success") {
                console.log(result);
                if (result.swal) {
                    Swal.fire(result.swal);
                }
                $("form")[0].reset();
                window.location = result.url;
            } else {
                if (result.type === "error") {
                    if (result.swal) {
                        Swal.fire(result.swal);
                    }
                }
            }
        },
        error: function(err) {
            console.log(err);
        },
    });
});



//  edit
// $(document).on("click", ".form-submit", function(e) {
//     e.preventDefault();
//     let form = $(this);
//     let formData = new FormData($(form)[0]);
//     let url = $(this).attr("action");
//     let method = $(this).attr("method");
//     // console.log(url);
//     $.ajax({
//         type: method,
//         url,
//         cache: false,
//         dataType: "json",
//         processData: false,
//         contentType: false,
//         data: formData,
//         success: function(result) {
//             console.log(result);
//             if (result.type === "success") {
//                 console.log(result);
//                 if (result.swal) {
//                     Swal.fire(result.swal);
//                 }
//                 $("form")[0].reset();
//                 window.location = result.url;
//             } else {
//                 if (result.type === "error") {
//                     if (result.swal) {
//                         Swal.fire(result.swal);
//                     }
//                 }
//             }
//         },
//         error: function(err) {
//             console.log(err);
//         },
//     });
// });
//  edit//

//get_result
function get_results(url, table) {
    console.log(url + table);
    $.ajax({
        url,
        dataType: "json",
        cache: false,
        success: function(data) {
            // console.log(data);
            $(`${table} tbody`).html(data.msg);
        },
        error: function(data) {
            // console.log(data);
        },
    });
}


//delete registration
$(document).on("click", ".delete", function(e) {
    e.preventDefault()
    let del_btn = $(this);
    url = $(this).data("url");
    console.log(url);
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url,
                dataType: "json",
                type: "post",
                success: function(data) {
                    console.log(data);
                    if (data.swal) {
                        swal.fire(data.swal);
                    }
                    if (data.type === "success") {

                        window.location = data.url;
                        // $(del_btn).parent().parent().remove();
                        // table_sr(data.table, data.col);
                    }
                },
                error: function(err) {
                    console.log(err);
                },
            });
        }
    });
});

function table_sr(table_id, col) {
    let rows = $(table_id).children().length;
    for (let i = 1; i <= rows; i++) {
        $(table_id + ` tr:nth-child(${i}) td:nth-child(${col})`).html(i);
    }
}