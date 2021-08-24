<?php
$money = 1;
if (isset($_POST['button1']) || isset($_POST['button2'])) {
    $money = $_POST['money'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="prac05.css">
</head>

<body>
    <div class="title">
        <p>賓果賓果猜大小</p>
    </div>
    <div class="text">
        <p>玩法說明：<br>每注25元，玩家僅需預測每期自1至80號所開出的20個號碼中結果會是「大」或「小」，猜中者即為中獎，當開出13個（含）以上41至80的獎號時就屬於「大」，開出13個（含）以上1至40的獎號則屬於「小」。<br>玩家可以單獨投注「猜大小」，並可加倍投注或多期投注，猜中獎金為投注金額的6倍。</p>
    </div>
    <form action="prac05.php" id="form1" name="form1" method="post">
        <div class="title2">
            <p>請選擇：</p>
        </div>
        <div class="money">
            <p>
                下注數(一注25元)：<input type="number" id="money" name="money" value="<?php echo $money; ?>">
            </p>
        </div>
        <p><input type="submit" name="button1" id="button1" value="猜大">
            <input type="submit" name="button2" id="button2" value="猜小">
        </p>
    </form>
    <hr>

    <?php
    $result = array();
    $end = array();
    $count = 0;
    //按下猜大按鈕
    if (isset($_POST['button1'])) {
        $append = true;
        for ($i = 0; $i < 20; $i++) {
            $chkData = rand(1, 80);             //抽取20個號碼
            for ($j = 0; $j < $i; $j++) {
                if ($result[$j] == $chkData) {  //檢查重複
                    $i--;
                    $append = false;
                    break;
                }
            }
            if ($append) {                      //存入抽到20個不重複數字
                if ($chkData < 10) {
                    $chkData = "0" + $chkData;
                }
                $result[] = $chkData;
                if ($result[$i] >= 41)          //計算大於等於41的數字個數
                    $count++;
            }
            $append = true;
        }
    ?>
        <div class="text">
            結果：
            <div class="result">
                <?php
                if ($count >= 13) {             //輸出中獎結果
                    $end[0] = "恭喜中獎!!! 獲得6倍獎金";
                    echo "<span class='result1'>" . $end[0] . $money * 6 * 25, "元!!! (41~80的數字有", $count, "個>=13個)</span>";
                } else {
                    $end[0] = "可惜沒中!!!";
                    echo "<span class='result2'>" . $end[0], " (41~80的數字有", $count, "個<13個)</span>";
                }
                ?></div>

            <br>選中號碼：<br><?php for ($i = 0; $i < 20; $i++) {       //列出抽到的20個號碼
                                if ($result[$i] > 40)
                                    echo "<span class='cir'>" . $result[$i] . "</span>，";
                                else
                                    echo $result[$i] . "，";
                            } ?>
            <br>由小到大：<br><?php
                            sort($result);
                            for ($i = 0; $i < 20; $i++) {
                                if ($result[$i] > 40)
                                    echo "<span class='cir'>" . $result[$i] . "</span>，";
                                else
                                    echo $result[$i] . "，";
                            } ?>
        </div>
    <?php
        $count = 0;
    }
    ?>
    <?php
    //按下猜小按鈕
    if (isset($_POST['button2'])) {
        $append = true;
        for ($i = 0; $i < 20; $i++) {
            $chkData = rand(1, 80);             //抽取20個號碼
            for ($j = 0; $j < $i; $j++) {
                if ($result[$j] == $chkData) {  //檢查重複
                    $i--;
                    $append = false;
                    break;
                }
            }
            if ($append) {                      //存入抽到20個不重複數字
                if ($chkData < 10) {
                    $chkData = "0" + $chkData;
                }
                $result[] = $chkData;
                if ($result[$i] < 41)           //計算小於41的數字個數
                    $count++;
            }
            $append = true;
        }
    ?>
        <div class="text">
            結果：
            <div class="result">
                <?php
                if ($count >= 13) {             //輸出中獎結果
                    $end[0] = "恭喜中獎!!! 獲得6倍獎金";
                    echo "<span class='result1'>" . $end[0] . $money * 6 * 25, "元!!! (01~40的數字有", $count, "個>=13個)</span>";
                } else {
                    $end[0] = "可惜沒中!!!";
                    echo "<span class='result2'>" . $end[0], " (01~40的數字有", $count, "個<13個)</span>";
                } ?></div>

            <br>選中號碼：<br><?php for ($i = 0; $i < 20; $i++) {       //列出抽到的20個號碼
                                if ($result[$i] < 41)
                                    echo "<span class='cir'>" . $result[$i] . "</span>，";
                                else
                                    echo $result[$i] . "，";
                            } ?>
            <br>由小到大：<br><?php
                            sort($result);
                            for ($i = 0; $i < 20; $i++) {
                                if ($result[$i] < 41)
                                    echo "<span class='cir'>" . $result[$i] . "</span>，";
                                else
                                    echo $result[$i] . "，";
                            } ?>
        </div>

    <?php
        $count = 0;
    }
    ?>
</body>

</html>