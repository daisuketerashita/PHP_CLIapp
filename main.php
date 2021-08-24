<?php
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');
require_once('./classes/Fighter.php');
require_once('./classes/Sage.php');

//インスタンス化
//味方
$members = array();
$members[] = new Brave('レック');
$members[] = new Fighter('ハッサン');
$members[] = new Sage('ミレーユ');


//モンスター
$enemies = array();
$enemies[] = new Enemy('スライム',10);
$enemies[] = new Enemy('ゴーレム',20);
$enemies[] = new Enemy('キラーマシン',35);

$turn = 1;

$isFinishFlg = false;

//どちらかが0になるまで繰り返す
while(!$isFinishFlg){
    //ターン数の表示
    echo "★★★ $turn ターン目 ★★★\n";

    foreach($members as $member){
        //味方のHPの表示
        echo $member->getName()."　：　".$member->getHitPoint()."/".$member::MAX_HITPOINT."\n";
    }
    echo "\n";
    foreach($enemies as $enemy){
        //敵のHPを表示
        echo $enemy->getName()."　：　".$enemy->getHitPoint()."/".$enemy::MAX_HITPOINT."\n";
    }
    echo "\n";

    //味方側の攻撃
    foreach($members as $member){
        $enemyIndex = rand(0, count($enemies) - 1);
        $enemy = $enemies[$enemyIndex];
        if(get_class($member) == 'Sage'){
            //賢者の場合は、味方のオブジェクトも渡す
            $member->doAttackHoimi($enemy, $member);
        }else{
            $member->doAttack($enemy);
        }
        echo "\n";
    }
    echo "\n";

    //敵側の攻撃
    foreach ($enemies as $enemy) {
        $memberIndex = rand(0, count($members) - 1);
        $member = $members[$memberIndex];
        $enemy->doAttack($member);
        echo "\n";
    }

    // 仲間の全滅チェック
    $deathCnt = 0; // HPが0以下の仲間の数
    foreach($members as $member){
        if($member->getHitPoint() > 0){
            $isFinishFlg = false;
            break;
        }
        $deathCnt++;
    }
    if($deathCnt === count($members)){
        $isFinishFlg = true;
        echo "GAME OVER ....\n\n";
        break;
    }

    // 敵の全滅チェック
    $deathCnt = 0; // HPが0以下の敵の数
    foreach ($enemies as $enemy) {
        if ($enemy->getHitPoint() > 0) {
            $isFinishFlg = false;
            break;
        }
        $deathCnt++;
    }
    if ($deathCnt === count($enemies)) {
        $isFinishFlg = true;
        echo "♪♪♪勝利しました♪♪♪\n\n";
        break;
    }

    //ターン数の追加
    $turn++;
}

echo "★★★ 戦闘終了 ★★★\n";
foreach ($members as $member) {
    echo $member->getName() . "　：　" . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\n";
}
echo "\n";
foreach ($enemies as $enemy) {
    echo $enemy->getName() . "　：　" . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT . "\n";
}

?>