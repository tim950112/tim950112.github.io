<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>阿拉伯數字轉成國字</title>
    <link rel="stylesheet" href="homework2.css">
</head>

<body>
    <?php
    if (isset($_POST['number01'])) {
        $default_val = $_POST['number01'];
    } else {
        $default_val = "";
    }
    ?>
    <div class="title">
    <form action="homework2.php" method="post" name="form1" id="form1">
        <p><h1 class="text">阿拉伯數字轉成國字程式</h1></p>
        <p><label><div id="title2">請輸入要轉換的阿拉伯數字:</div><br>
                <input type="text" name="number01" value="<?php echo $default_val; ?>" id="number01"></label>
        </p>
        <input type="hidden" name="MM_form" id="MM_form" value="form1">
        <p><input type="submit" name="button" id="button" value="開始轉換">
        </p>
    </form>
    </div>

    <?php
    if (isset($_POST['MM_form']) and $_POST['MM_form'] == 'form1') {
        $elen = strlen($_POST['number01']);
        $tempstr = "";
        $retstring = "";
        $ctrlprece = $elen;

        for ($i = 0; $i <= $elen - 1; $i++) {
            $tempstr = substr($_POST['number01'], $i, 1);                       //輸入的字串從左邊第一位開始判斷
            switch ($tempstr) {
                case "0":
                    if (substr($_POST['number01'], $i - 1, 1) == 0)             //假如前一位數字已經是0,這一次就不再重複印出第2個零,用來解決中間段重複印出零的問題
                        break;
                    if (substr($_POST['number01'], $i, $elen - $i) == 0)        //若最後幾位皆為0,就不再印零,用來解決末段印出零的問題
                        break;
                    $retstring = $retstring . "零";
                    break;
                case "1":
                    $retstring = $retstring . "壹";
                    break;
                case "2":
                    $retstring = $retstring . "貳";
                    break;
                case "3":
                    $retstring = $retstring . "參";
                    break;
                case "4":
                    $retstring = $retstring . "肆";
                    break;
                case "5":
                    $retstring = $retstring . "伍";
                    break;
                case "6":
                    $retstring = $retstring . "陸";
                    break;
                case "7":
                    $retstring = $retstring . "柒";
                    break;
                case "8":
                    $retstring = $retstring . "捌";
                    break;
                case "9":
                    $retstring = $retstring . "玖";
                    break;
            }
            if (substr($_POST['number01'], $i, 1) != "0") {
                switch ($ctrlprece) {
                    case 2:
                        $retstring = $retstring . "拾";
                        break;
                    case 3:
                        $retstring = $retstring . "佰";
                        break;
                    case 4:
                        $retstring = $retstring . "仟";
                        break;
                    case 5:
                        $retstring = $retstring . "萬";
                        break;
                    case 6:
                        if (substr($_POST['number01'], $i + 1, 1) != 0)         //若下一位數字不為零,也就是萬位數有數字,此次就不印出萬
                            $retstring = $retstring . "拾";
                        else
                            $retstring = $retstring . "拾萬";
                        break;
                    case 7:
                        if (substr($_POST['number01'], $i + 2, 1) != 0 || substr($_POST['number01'], $i + 1, 1) != 0)           //若下下位數字或下一位數字不為零,也就是萬位數或十萬位數有數字,此次就不印出萬
                            $retstring = $retstring . "佰";
                        else
                            $retstring = $retstring . "佰萬";
                        break;
                    case 8:
                        if (substr($_POST['number01'], $i + 3, 1) != 0 || substr($_POST['number01'], $i + 2, 1) != 0 || substr($_POST['number01'], $i + 1, 1) != 0)         //若下下下位數或下下位數字或下一位數字不為零,也就是萬位數或十萬位數獲百萬位數有數字,此次就不印出萬
                            $retstring = $retstring . "仟";
                        else
                            $retstring = $retstring . "仟萬";
                        break;
                    case 9:
                        $retstring = $retstring . "億";
                        break;
                    case 10:
                        if (substr($_POST['number01'], $i + 1, 1) != 0)         //若下一位數字不為零,也就是億位數有數字,此次就不印出億
                            $retstring = $retstring . "拾";
                        else
                            $retstring = $retstring . "拾億";
                        break;
                    case 11:
                        if (substr($_POST['number01'], $i + 2, 1) != 0 || substr($_POST['number01'], $i + 1, 1) != 0)           //若下下位數字或下一位數字不為零,也就是億位數或十億位數有數字,此次就不印出億
                            $retstring = $retstring . "佰";
                        else
                            $retstring = $retstring . "佰億";
                        break;
                    case 12:
                        if (substr($_POST['number01'], $i + 3, 1) != 0 || substr($_POST['number01'], $i + 2, 1) != 0 || substr($_POST['number01'], $i + 1, 1) != 0)         //若下下下位數或下下位數字或下一位數字不為零,也就是億位數或十億位數獲百億位數有數字,此次就不印出億
                            $retstring = $retstring . "仟";
                        else
                            $retstring = $retstring . "仟億";
                        break;
                    case 13:
                        $retstring = $retstring . "兆";
                        break;
                    case 14:
                        if (substr($_POST['number01'], $i + 1, 1) != 0)         //若下一位數字不為零,也就是兆位數有數字,此次就不印出兆
                            $retstring = $retstring . "拾";
                        else
                            $retstring = $retstring . "拾兆";
                        break;
                    case 15:
                        if (substr($_POST['number01'], $i + 2, 1) != 0 || substr($_POST['number01'], $i + 1, 1) != 0)           //若下下位數字或下一位數字不為零,也就是兆位數或十兆位數有數字,此次就不印出兆
                            $retstring = $retstring . "佰";
                        else
                            $retstring = $retstring . "佰兆";
                        break;
                    case 16:
                        if (substr($_POST['number01'], $i + 3, 1) != 0 || substr($_POST['number01'], $i + 2, 1) != 0 || substr($_POST['number01'], $i + 1, 1) != 0)         //若下下下位數或下下位數字或下一位數字不為零,也就是兆位數或十兆位數獲百兆位數有數字,此次就不印出兆
                            $retstring = $retstring . "仟";
                        else
                            $retstring = $retstring . "仟兆";
                        break;
                }
            }
            $ctrlprece--;
        }
        echo "<p><span class='result'>轉換值:" . $_POST['number01'] . "</span></p>";
        echo "<p><span class='result'>轉換結果:" . $retstring . "元整</span></p>";
    }
    ?>

</body>

</html>