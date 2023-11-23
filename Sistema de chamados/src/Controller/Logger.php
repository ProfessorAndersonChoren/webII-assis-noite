<?php

namespace QI\SistemaDeChamados\Controller;

class Logger{
    private function __construct(){}

    /**
     * This function create a new log file
     * @param string $log
     * @return void
     */
    public static function writeLog($log){
        $log_dir = dirname(dirname(__DIR__)) . "/logs/";
        if(!is_dir($log_dir)){
            mkdir($log_dir);
        }
        $log_file = $log_dir . date("Y-m-d H-i-s") . ".log";
        $file = fopen($log_file,"w");
        fwrite($file, $log);
        fclose($file);
    }
}