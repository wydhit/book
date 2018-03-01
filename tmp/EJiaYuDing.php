<?php

require "./yunpian-php-sdk-0.0.1/YunpianAutoload.php";
$test = new EJiaYuDing();
$test->run();

class EJiaYuDing
{

    private $host = "http://www.ejiayuding.com/";
    private $file = "_inc/session.php";

    public function __construct($host = null, $file = null)
    {
        if (!is_null($file)) $this->file = $file;
        if (!is_null($host)) $this->host = $host;
    }

    public function run()
    {
        while (true) {
            $this->test();
            sleep(10);
        }
    }

    public function test()
    {
        $data = file_get_contents($this->host . $this->file);
        if ($data !== 'a') {
            $this->reportError();
        } else {
            file_put_contents('ok.txt', 'ok' . date("Y-m-d H:i:s") . "\r\n", FILE_APPEND);
        }
    }

    public function reportError()
    {
        file_put_contents('error.txt', 'error' . date("Y-m-d H:i:s") . "\r\n", FILE_APPEND);
        $this->sendSms();
    }

    private $sendSmsTime = 0;

    private function sendSms()
    {
        if ((time() - $this->sendSmsTime) > 3600) {
            $smsOperator = new SmsOperator();
            $data['mobile'] = '13821659206';
            $data['text'] = '【e家神灯】呜呜~~主人我是' . date("His") . '，我的机体已经倾斜了，赶快救救我吧';
            $result = $smsOperator->single_send($data);
            file_put_contents('send.txt', date("Y-m-d H:i:s") . var_export($result, true) . var_export($data, true) . "\r\n", FILE_APPEND);
            $this->sendSmsTime = time();
        }

    }

}