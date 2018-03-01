<?php
/*管理*/
class Admin
{

    /*支付流水*/
    public function list()
    {
        return [];
    }
    /*某一条交易详情*/
    public function detail($tradeNo)
    {

    }
    /**
     * 手动更改某一条记录详情 安全级别较高
     * @param $tradeNo
     */
    public function changeTrade($tradeNo)
    {
        
    }
    /**
     * 退款
     * @param $tradeNo
     */
    public function backMoneyToUser($tradeNo)
    {

    }



}