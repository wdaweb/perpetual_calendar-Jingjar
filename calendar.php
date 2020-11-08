<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>月曆製作</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        p {
            text-align: center;
        }

        table {
            width: 750px;
            margin: auto;
            border: 1px solid #ccc;
        }

        table td {
            border: 1px solid #ccc;
            text-align: center;
            padding: 10px 0;
            height: 50px;
            text-align: center;
        }

        table td:hover {
            background: yellow;
        }
    </style>

</head>

<body>
    <div>


        <?php



        if (isset($_POST['sm'])) {
            $m = $_POST['sm'];
        } else if (isset($_GET['m'])) {
            $m = $_GET['m'];
        } else {
            $m = date('m');
        }
        if (isset($_POST['sy'])) {
            $y = $_POST['sy'];
        }
        if (isset($_GET['y'])) {
            $y = $_GET['y'];
        } else {
            $y = date('Y');
        }
        if ($m <= 1) {
            $pm = 12;
            $py = $y - 1;
        } else {
            $pm = $m - 1;
            $py = $y;
        }
        if ($m >= 12) {
            $nm = 1;
            $ny = $y + 1;
        } else {
            $ny = $y;
            $nm = $m + 1;
        }
        //"這個月=>".$m;

        $t = date('t', strtotime($y . '-' . $m . '-1'));
        //"這個月天數=>".$t;

        $w = date('w', strtotime($y . '-' . $m . '-1'));
        // "第一天星期=>".$w;
        echo "<p>" . $y . "年" . $m . "月</p>";



        ?>
        <!-- Y是$_GET['y'] m是$_GET['m'] -->
        <a href="calendar.php?y=<?= $py ?>&m=<?= $pm ?>">上個月</a>
        <a class="float-right" href="calendar.php?y=<?= $ny ?>&m=<?= $nm ?>">下個月</a>
        <table>
            <tr>
                <td>日</td>
                <td>一</td>
                <td>二</td>
                <td>三</td>
                <td>四</td>
                <td>五</td>
                <td>六</td>
            </tr>

            <?php

            for ($i = 0; $i < 6; $i++) {
                echo "<tr>";
                for ($j = 0; $j < 7; $j++) {

                    echo "<td>";
                    if ($i == 0 && $j < $w) {
                        echo "&nbsp;";
                    } else if ((($i * 7) + ($j + 1) - $w) > $t) {
                    } else {
                        echo (($i * 7) + ($j + 1) - $w);
                    }

                    echo "</td>";
                }
                echo "</tr>";
            }

            ?>
        </table>
    </div>
    <div>
        <form action="calendar.php" method="post">
            <input type="text" name="sy">
            <input type="submit" value="送出">
            <br>
            <input type="text" name="sm">
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>