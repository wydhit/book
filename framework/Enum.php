<?php
/**
 * Created by PhpStorm.
 * User: wyd
 * Date: 2018-01-22
 * Time: 15:59
 */

class Enum extends SplEnum
{
    const __default = self::USER_STATUS_OFF_LINE;
    const USER_STATUS_ON_LINE = 1;
    const USER_STATUS_OFF_LINE = 0;
}

var_dump(new Enum(Enum::USER_STATUS_OFF_LINE));