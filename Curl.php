<?php

class Util_Curl
{
    public static function httpGet($baseUri, $params = [], $header = []) 
    {
        $params = http_build_query($params);
        $uri = $baseUri . '?' . $params;

        $curl = curl_init (); // 启动一个CURL会话
        curl_setopt ( $curl, CURLOPT_URL, $uri ); // 要访问的地址
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, FALSE ); // 对认证证书来源的检查
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, FALSE ); // 从证书中检查SSL加密算法是否存在

        curl_setopt ( $curl, CURLOPT_TIMEOUT, 30 );             // 设置超时限制防止死循环
        curl_setopt ( $curl, CURLOPT_HTTPHEADER, $header );     // 设置HTTP头
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );       // 获取的信息以文件流的形式返回
        $result = curl_exec ($curl);
        curl_close ( $curl ); // 关闭CURL会话
        $resData = json_decode($result, true);
        return $resData;
    }

    public static function httpPost($baseUri, $params){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $baseUri);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tmpInfo = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return $tmpInfo;
    }
}