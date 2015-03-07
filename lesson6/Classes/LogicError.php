<?php

class LogicError extends ErrorException
{
    public static function recordErr($filename, $date, $file, $line, $code, $mess)
    {
        $data = $date . '  ' . $file . '  в строке: ' . $line . ' код ошибки:  ' . $code . '  ' . $mess;
        file_put_contents($filename, $data . "\r\n", FILE_APPEND);
    }

} 