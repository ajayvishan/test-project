<?php

$sr = 1;


foreach ($res as $data) { ?>

    <tr>
        <td><?= $sr++ ?></td>
        <td><?= $data->subject_title ?></td>
        <td><?= $data->subject_name ?></td>
        <td><?= $data->subject_description ?></td>
        <td>
            <a href="javascript:void(0);" class="btn btn-sm btn-info subject-details-button" data-id="<?= $data->id ?>">Details</a>
            <a href="<?= BASE_URL; ?>admin/subject-update/<?= $data->id ?>" class="btn btn-sm btn-primary " >Edit</a>
            <a href="<?= BASE_URL; ?>webservice/subject/delete/<?= $data->id ?>" data-url="<?= BASE_URL; ?>webservice/subject/delete/<?= $data->id ?>" class="btn btn-sm btn-danger delete">Delete</a>
        </td>
    </tr>



<?php


}


