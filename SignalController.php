<?php

class SignalController
{
    protected static $isTerminated = false;

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
        file_put_contents('test_proc.log', date('c') . ': ' . $str . PHP_EOL, FILE_APPEND);
    }
}