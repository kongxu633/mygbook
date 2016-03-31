<?php
    function p($array){
        dump($array,1,'<pre>',0);
    }

    function timer($t){
        $now=time();
        $dif=$now-$t;
        if($dif<0 || $dif>=604800)
        {
            $time= date('Y-m-d H:i:s',$t);
            return $time;
        }
        if($dif<60)
        {
            $time=$dif;
        return $time."秒前";
        }
        if($dif>=60 && $dif<3600)
        {
            $time= floor($dif/60);
        return $time."分钟前";
       }
       if($dif>=3600 && $dif<86400)
       {
            $time= floor($dif/3600);
        return $time."小时前";
       }
       if($dif>=86400 && $dif<604800)
       {
            $time= floor($dif/86400);
        return $time."天前";
       }
    }

?>
