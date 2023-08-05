<?php

function cek_login()
{
    $ci = get_instance();

    if (!$ci->session->userdata('admin')) {
        redirect('admin/login');
    } else {
        $admin = $ci->session->userdata('admin');
    }
}
