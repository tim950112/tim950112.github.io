<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>尋找質數PHP程式</title>
    <style>
    body{
        color: rgb(90, 21, 0);
        font-weight:550;
        font-family:Helvetica, sans-serif;
        background-image: url(image/123.jpg);
	    background-repeat: repeat; 
        /* opacity: 0.9;        */
    }
    #button {
        color: rgb(90, 21, 0);
        margin: 5px;
        padding: 3px 8px;
        border-radius: 15px;
        border-width: 2.5px;
        background: white;
        border-color: rgb(90, 21, 0);
    }

    #button:hover {
        background: rgb(90, 21, 0);
        color: white;
    }
    #P{
        color:rgb(29, 7, 0);
    }
    </style>
</head>
<body>
<div align="center" id="body">
    <?php
        if(isset($_POST['number01'])){
            $default_val=$_POST['number01'];
        }else{
            $default_val="";
        }
    ?>
    <form action="homework3.php" method="post" name="form1" id="forml">
        <h3>尋找質數PHP程式:</h3>
        <p><label>請輸入要找尋多少個質數:<br><input type="text" name="number01" value="<?php echo $default_val;?>" id="number01"></label></p>
        <input type="hidden" name="MM_form" id="MM_form" value="form1">
        <p><input type="submit" name="button" id="button" value="開始尋找"></p>
    </form>
    <?php
        if(isset($_POST['MM_form'])and $_POST['MM_form']=="form1"){
            $start=microtime(1);
            $number01=$_POST['number01'];
            $gen=3;
            $i=2;
            echo "<p id='P'>尋找到第一個質數:2</p>";
            while($i<=$number01){
                if(chk_prime($gen)){
                    echo "<p id='P'>尋找到第".$i."個質數:".$gen."</p>";
                    $i++;
                    $gen+=2;
                }else{
                    $gen+=2;
                }
            }
            $time = microtime(1) - $start;
            echo "<p>所需時間：".($time * 1000)."ms</p>";
                       
        }
        function chk_prime($intnumber){
            $chkRange=$intnumber;
            for($i=2;$i<=sqrt($chkRange);$i=$i+1){
                if($intnumber%$i==0){
                    return false;
                }
            }
            return true;
        }
    ?>
</div>   
    
</body>
</html>