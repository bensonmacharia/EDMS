<?php

$connection = mysqli_connect('localhost', 'bmacharia', '12qwaszxasqw12', 'edms');
if (mysqli_connect_error()) {
    echo "failed to connect:" . mysqli_connect_error();
}
