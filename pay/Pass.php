<?php

/*密匙管理*/

class Pass
{
    private $pass = [
        'admin' => '@#@~@#$%@#^$%^a34RT',
        'sd' => 'a$#%#DG$%@$#SGSD',/**/
        'yd' => 'a$#%#@$#^$%^#$%&',/**/
    ];
    private $domain = [
        'sd' => 'www.ejshendeng.com',/**/
        'yd' => 'www.ejiayuding.com',/**/
    ];

    public function checkSign($from = '', $sign = '', $data = [])
    {
        try {
            $this->checkFrom($from);
            $this->verifySign($sign, $this->pass[$from], $data);
        } catch (PassException $e) {
            //TODO: 记录异常
            return false;
        }
        return true;
    }

    /**
     * @param $sign
     * @param $pass
     * @param $data
     * @throws PassException
     */
    private function verifySign($sign, $pass, $data)
    {
        if ($sign !== md5($pass . join($data))) {
            throw new PassException("签名验证失败" . $sign);
        }

    }

    /**
     * @param $from
     * @throws PassException
     */
    private function checkFrom($from)
    {
        if (!isset($this->pass[$from])) {
            throw new PassException("非法来源" . $from);
        }

    }
}