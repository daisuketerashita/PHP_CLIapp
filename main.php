<?php
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');

//インスタンス化
$rec = new Brave();
$slime = new Enemy();

$rec->name = 'レック';
$slime->name = 'スライム';

$turn = 1;

//どちらかが0になるまで繰り返す
while($rec->hitPoint > 0 && $slime->hitPoint > 0){
    //ターン数の表示
    echo "★★★ $turn ターン目 ★★★\n";

    //現在のHPの表示
    echo $rec->name."　：　".$rec->hitPoint."/".$rec::MAX_HITPOINT."\n";
    echo $slime->name."　：　".$slime->hitPoint."/".$slime::MAX_HITPOINT."\n\n";

    //攻撃
    $rec->doAttack($slime);
    echo "\n";
    $slime->doAttack($rec);
    echo "\n";

    //ターン数の追加
    $turn++;
}

echo "★★★ 戦闘終了 ★★★\n";
echo $rec->name."　：　".$rec->hitPoint."/".$rec::MAX_HITPOINT."\n";
echo $slime->name."　：　".$slime->hitPoint."/".$slime::MAX_HITPOINT."\n\n";

?>