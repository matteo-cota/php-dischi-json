<?php
header('Content-Type: application/json');
$json_file = '../data/dischi.json';
$dischi = file_get_contents($json_file);
echo $dischi;