<?php
// echo "Helper Text";
function show($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function getfy()
{
    $year = date('Y');
    $month = date('m');
    ($month < 4) ? $year - 1 : $year;
    $start_date = date('d/m/Y', strtotime(($year) . '-04-01'));
    $end_date = date('d/m/Y', strtotime(($year + 1) . '-03-31'));
    $response = array('start_date' => $start_date, 'end_date' => $end_date);
    return $response;
}
