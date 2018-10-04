<?php

class SignalController
{
    protected static $isTerminated = false;

    protected static $mysqli;

    /**
     * SignalController constructor.
     */
    private function __construct()
    {
        // just to keep static
    }

    /**
     * @param $signal
     */
    public static function signalHandler($signal)
    {
        switch ($signal) {
            case SIGTERM:
            case SIGINT:
                self::$isTerminated = true;
                self::log('Terminated');
        }
    }

    /**
     * @return bool
     */
    public static function isTerminated()
    {
        return self::$isTerminated;
    }

    /**
     * @param $str
     */
    public static function log($str)
    {
        if (empty(self::$mysqli)) {
            self::$mysqli = new mysqli('192.168.42.131:32439', 'user123', 'pass123', 'simple');
        }
        self::$mysqli->query('INSERT INTO simple VALUES("' . $str . ': ' . date('c') . '")');
    }
}