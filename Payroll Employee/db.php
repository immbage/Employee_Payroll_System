<?php

$db_connection = new mysqli("localhost", "root", "", "payroll_website");

if (!$db_connection) {
    echo "DB FAILED";
}
