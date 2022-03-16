<?php
    $currentdate = new DateTime();
    $startdate = new DateTime('2022-09-22');
    $time = ceil(($currentdate->getTimestamp() - $startdate->getTimestamp()) / (24*60*60*1000));
    echo $time;