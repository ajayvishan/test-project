<!-- <footer> -->
<!-- Large modal -->


<div class="modal fade " id="subjects-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Subject </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASE_URL; ?>webservice/subject/create" method="POST" class="form-submit">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 p-5">
                                <div class="mb-3">
                                    <label for="subject_title" class="form-label">Subject Title</label>
                                    <input type="text" name="subject_title" class="form-control" id="subject_title">
                                </div>
                                <div class="mb-3">
                                    <label for="subject_name" class="form-label">Subject Name</label>
                                    <input type="text" name="subject_name" class="form-control" id="subject_name">

                                </div>

                                <div class="mb-3">
                                    <label for="subject_description" class="form-label">Description</label>
                                    <input type="text" name="subject_description" class="form-control" id="subject_description">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Create Subject</button>

                </div>
                <input type="hidden" name="user_id" value="<?= $userId; ?>">
            </form>
        </div>
    </div>
</div>


<!-- subject details -->
<div class="modal fade" id="subject-details" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Subject Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-striped" id="subject-details-table">
                <tbody>

                </tbody>
            </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- </footer> -->



<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="<?= VENDORS_URL; ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?= VENDORS_URL; ?>sweetalert2/sweetalert2.js"></script>
<!-- <script src="<?= VENDORS_URL; ?>jquery/jquery-3.6.0.js"></script> -->

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>


<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script>


<script src="<?= ASSETS_ADMIN_URL; ?>js/scripts.js"></script>

<script>
    $(document).on("click", "a.subject-details-button", function(){
        let id = $(this).attr("data-id");
        
        $.ajax({
            url:"<?= BASE_URL; ?>webservice/get-result/subject-detail",
            dataType:"json",
            cache:false,
            method:"post",
            data: {id},
            success:function(res){
                // console.log(res);
                if(res.type = "success"){
                    $(`#subject-details table#subject-details-table tbody`).html(res.result);

                    $(`#subject-details`).modal("show");
                }
            },
            error:function(err){
                // console.log(err);
            }
        });
    });
</script>
</body>

</html>