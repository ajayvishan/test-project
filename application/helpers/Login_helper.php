<?php

function is_login(){
    $ci = get_instance();
    $ci->load->library('session');

    $userId = $ci->session->userdata('user_id');
    $userName = $ci->session->userdata('user_name');

    if(!empty($userId) && !empty($userName)){
        return true;
    }else{
        redirect(base_url(""));
        exit();
    }
}

?>