<?php

$connection = mysqli_connect('localhost', 'user', 'password', 'database');
if (mysqli_connect_error()) {
    echo "failed to connect:" . mysqli_connect_error();
}
