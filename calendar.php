<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>月曆製作</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url("unnamed.gif") 380px 600px,url("unnamed2.gif") 200px 150px,url("angel-ganev-729-copy.jpg");
            color: white;
            font-family:fantasy;
            font-size: 20px;
            background-repeat:no-repeat ;
        }

        p {
            text-align: center;
        }

        table {
            width: 750px;
            margin: auto;
            box-shadow: 10px 10px 18px 8px #999;
            
        }

        table th {
            border: 3px solid #ccc;
            text-align: center;
            padding: 10px 0;
            width: 70px;
            height: 70px;
            text-align: center;
            position: relative;
            box-shadow: -10px 5px 10px 3px #999 inset,10px -5px 10px 3px #999 inset;
        }

        span{
            
            display:inline-block;
            width: 100%;
            height: 100%;
            background: lightcoral;
            position: absolute;
            bottom: 0;
            left: 0;
            z-index: -1;
        }
        p{
            height: 5px;
        }
        input{
            box-shadow: 5px -5px 18px 3px #999,-5px 5px 18px 3px #999 ;
        }
        button{
            box-shadow: 5px -5px 18px 3px #999,-5px 5px 18px 3px #999 ;
        }
    </style>

</head>

<body>
    <div>


        <?php



        if (isset($_POST['s'])) {
            $m = mb_substr($_POST['s'], 5, 2);
        } else if (isset($_GET['m'])) {
            $m = $_GET['m'];
        } else {
            $m = date('m');
        }
        if (isset($_POST['s'])) {
             $y = mb_substr($_POST['s'], 0, 4);
        }
        else if (isset($_GET['y'])) {
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
        echo "<h1>" . $y . "&nbsp;/&nbsp;" . $m . "</h1>";



        ?>
        <!-- Y是$_GET['y'] m是$_GET['m'] -->
        <div class="d-flex justify-content-between">
            <a class="badge badge-pill py-2 m-1" href="calendar.php?y=<?= $py ?>&m=<?= $pm ?>"><button type="button" class="btn btn-secondary"><<</button></a>
            <form class="form-inline mb-2" action="calendar.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="s" placeholder='yyyy-m'>
            </div>
            <input type="submit" class="btn btn-secondary m-1" value="SEND">
            </form>
            <a class="badge badge-pill py-2 m-1" class="float-right" href="calendar.php?y=<?= $ny ?>&m=<?= $nm ?>"><button type="button" class="btn btn-secondary">>></button></a>
        </div>
        <table>
            <tr>
                <th style="color: #333;">Sun</th>
                <th style="color: #333;">Mon</th>
                <th style="color: #333;">Tue</th>
                <th style="color: #333;">Wed</th>
                <th style="color: #333;">Thu</th>
                <th style="color: #333;">Fri</th>
                <th style="color: #333;">Sat</th>
            </tr>

            <?php
$hd=[  //有放假的節日
    '1-1'=>"<span>元旦</span>",
    '2-28'=>"<span>二二八</span>",
    '4-4'=>"<span>婦幼節</span>",
    '4-5'=>"<span>清明節</span>",
    '5-1'=>"<span>勞動節</span>",
    '10-10'=>"<span>國慶日</span>",
];





            for ($i = 0; $i < 6; $i++) {
                echo "<tr>";
                for ($j = 0; $j < 7; $j++) {
                    $date='';
                    echo "<th>";
                    if($j==0||$j==6){
                        echo '<span></span>';
                    }
                    if ($i == 0 && $j <$w) {
                        echo "&nbsp;";
                    } else if ((($i * 7) + ($j + 1) - $w) > $t) {
                    } else {
                        echo (($i * 7) + ($j + 1) - $w);
                        $date=(($i * 7) + ($j + 1) - $w);
                    }
                    if(!empty($hd[$m.'-'.$date])){
                        echo $hd[$m.'-'.$date];
                    }
                    echo "</th>";
                }
                echo "</tr>";
            }

            ?>
        </table>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>