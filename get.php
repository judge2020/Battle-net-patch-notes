<?php
if (!isset($_GET['url'])) {
    echo "bad";
    return;
}
$urls = $_GET['url'];

$options = array(
    'http'=>array(
        'method'=>"GET",
        'header'=>
            "User-Agent: Battle.net/1.0.6.4217\r\n"
    )
);

$context = stream_context_create($options);
$file = file_get_contents($urls, false, $context);
$first_step = explode( '<div class="patch-notes-interior">' , $file );
$second_step = explode("</div>" , $first_step[1] );

echo $second_step[0];
?>