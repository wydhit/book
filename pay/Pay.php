<?php

/**
 * 支付
 * Class Pay
 */
class Pay
{

    /**
     * pc网页 H5发起支付
     *
     *  $payFrom="sd";//*业务来源
        $tradeNo = 'sd'+"3534523452345";
        $money = 234;
        $goodsName = "小商品";
        $goodsDescription = "描述";
        $otherData = "";
        $sign="#$%^$#$&#$%#$^#$%";
        $goUrl = "http://baud.com/back.php";
        $noticeUrl = "http://baud.com/back.php";
     *
     */
    public function webPay()
    {
        $data=$_GET;
        /*1.校验传递进来的参数 */  /*所有参数组成字符串加上密码然后md5*/
        $this->checkSign($data);
        /*2.直接调转到支付页面*/

        /*3、跳回公共回转页面*//*检查是否支付成功*/

        /*4、附加参数上跳转到业务页面*/
    }

    /**
     * 扫码支付 返回一个二维码图片
     */
    public function qrCodePay()
    {
        
    }

    private function checkSign($data)
    {
        return (new Pass())->checkSign($data['from'],$data['sign'],$data);
    }

}