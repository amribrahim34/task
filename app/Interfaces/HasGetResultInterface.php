<?php 

namespace App\Interfaces;

interface HasGetResultInterface {
    function get_result($secret , $guess);
}