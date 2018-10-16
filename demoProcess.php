<?php

require_once "SignalController.php";
require_once "test.php";

// PHP internal, make signal handling work
declare(ticks=1);

$a = new test();
$a->tester();