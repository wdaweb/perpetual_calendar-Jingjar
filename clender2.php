<?php

echo date('y-m').'&nbsp;'.date('t',strtotime(date('20-12'))).'&nbsp;'.date('w',strtotime(date('20-12').'1'));
$w=date('w',strtotime(date("21-3-").'1'));
$t=date('t',strtotime(date("21-3-").'1'));
$d=date('y-m');
echo '<table>';
for($i=0;$i<6;$i++){
    echo '<tr>';
    for($j=0;$j<7;$j++){
        echo '<td>';
        if(($i*7)+($j)<$w){

        }elseif(($i*7)+($j+1-$w)>$t){

        }else{
            echo ($i*7)+($j+1-$w);
        }
        echo '</td>';
    }
    echo '</tr>';
}
echo '</table>';