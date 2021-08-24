<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>陣列排序程式</title>
    <link rel="stylesheet" type="text/css" href="homework1.css" />
</head>
<body>
    <form action="homework1.php" name="form1" id="form1" method="post">
        <p><h1 class="title">陣列排序程式</h1></p>
        <p><h3 class="title2">亂數產生5000陣列：</h3></p>
        <p><h2 class="title3">設定排序方式
            <label><input type="radio" name="RadioGroup1" value="1" id="RadioGroup1_0" checked="checked">由小到大排序</label>
            <label><input type="radio" name="RadioGroup1" value="2" id="RadioGroup1_1">由大到小排序</label>
</h2></p>
        <p><input type="hidden" name="MM_form" value="form1"></p>
        <p><input type="submit" name="button" id="button" value="開始排序"></p>
    </form>
    <?php
        if(isset($_POST['MM_form']) and $_POST['MM_form'] == 'form1'){
            
            for($i = 0; $i < 5000; $i++){
                $data[$i] = rand(1, 100000);
            }
            echo "<p><span id='order1'>排序前內容：</span><br>";
            print_r($data);
            echo "</p>";
                       
            $start = microtime(1);
            $new = quick_sort($data, $_POST['RadioGroup1']);
            $time = microtime(1) - $start;

            echo "<p><span id='order1'>排序完成內容：</span><br>";
            print_r($new);
            echo "</p>";
            echo "<p><span class='time'>所需時間：".($time * 1000)."ms</span></p>";
        } 
        function quick_sort($arr, $mod = 1){
            $size = count($arr);
            if($size <= 1) return $arr; //判斷是否需要繼續進行
            $baseNum = $arr[0];     //選擇第一個元素作為基準
            $leftArray = array();   //小於基準
            $rightArray = array();  //大於基準
            for($i = 1; $i < $size; $i++){
                if($mod == 1){    
                    if($baseNum > $arr[$i]){          
                        $leftArray[] = $arr[$i];
                    } 
                    else{
                        $rightArray[] = $arr[$i];
                    }
                }
                else{
                    if($baseNum < $arr[$i]){
                        $leftArray[] = $arr[$i];
                    }
                    else{
                        $rightArray[] = $arr[$i];
                    }
                }
            }
            //分別對左和右陣列進行相同的排序處理方式
            $leftArray = quick_sort($leftArray, $mod);
            $rightArray = quick_sort($rightArray, $mod);
            return array_merge($leftArray, array($baseNum), $rightArray);
        }
        
    ?>
</body>
</html>