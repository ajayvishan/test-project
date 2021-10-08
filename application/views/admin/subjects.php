<?php include $head; ?>
<?php include $header;

?>


<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 p-5">

            <?php

            $res = $this->db->select("id, subject_title, subject_name, subject_description")->where("id", $id)->get("subjects")->result()[0];
            if ($this->db->affected_rows() > 0) {

                // print_r($res);
            }

            ?>
            <form action="<?= BASE_URL; ?>webservice/subject/update/<?= $res->id; ?>" method="POST" class="form-submit">
                <div class="row">
                    <div class="col-md-12 p-5">
                        <h4>Update Subject</h4>

                        <div class="mb-3">
                            <label for="subject_title" class="form-label">Subject Title</label>
                            <input type="text" name="subject_title" value="<?= $res->subject_title; ?>" class="form-control" id="subject_title">
                        </div>
                        <div class="mb-3">
                            <label for="subject_name" class="form-label">Subject Name</label>
                            <input type="text" name="subject_name" value="<?= $res->subject_name; ?>" class="form-control" id="subject_name">

                        </div>

                        <div class="mb-3">
                            <label for="subject_description" class="form-label">Description</label>
                            <input type="text" name="subject_description" value="<?= $res->subject_description; ?>" class="form-control" id="subject_description">

                        </div>
                        <button type="submit" class="btn btn-success">Update Subject</button>
                        <input type="hidden" name="user_id" value="<?= $userId; ?>">
                        <input type="hidden" name="id" value="<?= $res->id; ?>">
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>


<?php include $scripts; ?>

<script>

</script>