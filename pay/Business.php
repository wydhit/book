<?php

class Business
{
    /*给业务系统生成一个不重复的业务单号*/
    public function tradeNo()
    {
        $businessType = ['sd', 'yd', 'dd'];
        return uniqid();
    }

    /**
     * 查询交易状态
     * @param $tradeNo
     * @return int    -1 未找到的交易号 0 未支付 1 已支付
     */
    public function tradeStatus($tradeNo)
    {
        return 1;
    }
}
