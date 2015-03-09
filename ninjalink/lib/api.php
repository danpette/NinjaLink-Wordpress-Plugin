<?php
function do_post_request($url, $data, $optional_headers = null)
{
    $context = stream_context_create(array(
        'http' => array(
            'method'  => 'POST',
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'content' => http_build_query($data),
            'timeout' => 5,
        ),
    ));
    return file_get_contents($url, false, $context);
}