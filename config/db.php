<?php

$con=new mysqli("localhost","root","","cslab");
if (mysqli_connect_errno()) 
{
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
