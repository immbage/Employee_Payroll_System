<?php

$time_pay = $_POST['time_pay'];
$idr = $_POST['salary_amount'];
$hour = $_POST['hour'];
$days = $_POST['days'];
$holidays = $_POST['holidays'];


if ($time_pay == 'hour') {
    $week = 7;
    $hourly = $idr; // Hourly   
    $daily = $idr * $hour / $days;
    $weekly = $hourly * $hour;
    $bi_weekly = 2 * $weekly;
    $monthly = $weekly * 4;
    $annual = $monthly * 12;
    // Vacation calculation    
    $hol = ($idr * 1 / 100) * $holidays; // 1% remove from total IDR everytime user take holidays
    $idr_vac = $idr - $hol;
    $hol_hourly = $idr_vac; //vac_hourly
    $hol_daily =  $idr_vac * $hour / $days; // vac_daily
    $hol_weekly = $hol_hourly * $hour;
    $hol_bWeekly = $hol_weekly * 2;
    $hol_monthly = $hol_weekly * 4;
    $hol_annual = $hol_monthly * 12;
    // Vacation calculator
} else if ($time_pay == 'day') {
    $week = 7;
    $x = $hour / $days; // SATUAN JAM
    $hourly = $idr / $x;
    $daily = $idr;
    $weekly = $daily * $days;
    $bi_weekly = 2 * $weekly;
    $monthly = 4 * $weekly;
    $annual = $monthly * 12;
    // Vacation Calculator
    $hol = ($idr * 1 / 100) * $holidays; // holidays incentive
    $idr_vac = $idr - $hol;
    $hol_hourly = $idr_vac / $x;
    $hol_daily = $idr_vac;
    $hol_weekly = $hol_daily * $days;
    $hol_bWeekly = 2 * $hol_weekly;
    $hol_monthly = 4 * $hol_weekly;
    $hol_annual = 12 * $hol_monthly;
}