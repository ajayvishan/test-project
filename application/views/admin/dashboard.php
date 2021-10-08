<?php include $head; ?>
<?php include $header; ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Subjects</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="subjectsData">
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Subject Title</th>
                            <th>Subject Name</th>
                            <th>Subject Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>

                </table>

            </div>

        </div>
    </div>
</div>



<?php include $scripts; ?>

<script>
    // data table
    $(document).ready(function() {
        get_results('<?= BASE_URL; ?>webservice/get_result/subjects', '#subjectsData');

        setTimeout(function() {
            $("#subjectsData").DataTable({
                processing: true,
                serverSide: false,
                iDisplayLength: 10,
                dom: 'lfBrtip<"actions">',
                buttons: [
                    // {
                    //     extend: 'csv',
                    //     exportOptions: {
                    //         columns: [1, 2, 3]
                    //     }
                    // },
                    {
                        extend: 'pdf',
                        title: 'Subjects',
                        filename: 'Subjects',
                        exportOptions: {
                            columns: [1, 2, 3]
                        }
                    },
                    // 'colvis'
                ],
                language: {
                    url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json",
                    buttons: {
                        colvis: 'Column Visibility',
                        pdf: 'PDF',
                        csv: 'CSV',
                    }
                },
            });


        }, 500)
    });
    // data table//
</script>