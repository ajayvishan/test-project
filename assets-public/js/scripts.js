$(document).on('submit', '.form-submit', function (e) {
    e.preventDefault();
    let form = $(this);
    let formData = new FormData($(form)[0]);
    let url = $(this).attr('action');
    let method = $(this).attr('method');
    // console.log(url);
    $.ajax({
        type: method,
        url,
        cache: false,
        dataType: 'json',
        processData: false,
        contentType: false,
        data: formData,
        success: function (result) {
            console.log(result);
            if (result.type === 'success') {
                console.log(result);
                if (result.swal) {
                    Swal.fire(result.swal);
                }
                $('form')[0].reset();
                window.location = result.url;


            } else {
                if (result.type === 'error') {
                    if (result.swal) {
                        Swal.fire(result.swal);
                    }
                }
            }

        },
        error: function (err) {
            console.log(err);
        }

    });


});



// data table
$(document).ready(function () {
    $('#allProducts').DataTable();
});


$(document).ready(function () {
    $('#allProducts').DataTable({
        // "bServerSide": true,
        "iDisplayLength": 25,
        dom: 'Bfrtip',
        buttons: [{
            extend: 'pdf',
            title: 'Customized PDF Title',
            filename: 'customized_pdf_file_name'
        // }, //{
        //     extend: 'excel',
        //     title: 'Customized EXCEL Title',
        //     filename: 'customized_excel_file_name'
        // }, {
        //     extend: 'csv',
        //     filename: 'customized_csv_file_name'
        }],
        paging: false,
        searching: false,
        "bDestroy": true,

    });
});
// data table//