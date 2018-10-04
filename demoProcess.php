<?php

require_once "SignalController.php";

// PHP internal, make signal handling work
declare(ticks=1);

pcntl_signal(SIGTERM, [SignalController::class, 'signalHandler']);
pcntl_signal(SIGINT, [SignalController::class, 'signalHandler']);

while (!SignalController::isTerminated()) {
    SignalController::log('breakpoint-1');
    sleep(5);
    SignalController::log('breakpoint-2');
}