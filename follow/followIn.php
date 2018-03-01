<?php

if(isset($_GET['href'])){
    $url=$_GET['href'];
    $urlInfo=parse_url($url);
    $host=$urlInfo['host'];
    $host=htmlspecialchars(strip_tags($host));
    $url=htmlspecialchars(strip_tags($url));
    file_put_contents('followHost.txt',$host."\r\n",FILE_APPEND);
    file_put_contents('followUrl.txt',$url."\r\n",FILE_APPEND);
}
?>

<script>
     window.close();
</script>
