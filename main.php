<?php
require_once('./classes/Lives.php');
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');
require_once('./classes/Fighter.php');
require_once('./classes/Message.php');
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

$messageObj = new Message;

// 終了条件の判定
function isFinish($objects)
{
    $deathCnt = 0; // HPが0以下の仲間の数
    foreach ($objects as $object) {
        // １人でもHPが０を超えていたらfalseを返す
        if ($object->getHitPoint() > 0) {
            return false;
        }
        $deathCnt++;
    }
    // 仲間の数が死亡数(HPが０以下の数)と同じであればtrueを返す
    if ($deathCnt === count($objects)) {
        return true;
    }
}

//どちらかが0になるまで繰り返す
while(!$isFinishFlg){
    //ターン数の表示
    echo "★★★ $turn ターン目 ★★★\n";

    // 仲間の表示
    $messageObj->displayStatusMessage($members);
    // 敵の表示
    $messageObj->displayStatusMessage($enemies);

    // 仲間の攻撃
    $messageObj->displayAttackMessage($members, $enemies);
 
    // 敵の攻撃
    $messageObj->displayAttackMessage($enemies, $members);


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

    // 戦闘終了条件のチェック 仲間全員のHPが0 または、敵全員のHPが0
    $isFinishFlg = isFinish($members);
    if ($isFinishFlg) {
        $message = "GAME OVER ....\n\n";
        break;
    }
 
    $isFinishFlg = isFinish($enemies);
    if ($isFinishFlg) {
        $message = "♪♪♪勝利しました♪♪♪\n\n";
        break;
    }

    //ターン数の追加
    $turn++;
}

echo "★★★ 戦闘終了 ★★★\n";

// 仲間の表示
$messageObj->displayStatusMessage($members);
 
// 敵の表示
$messageObj->displayStatusMessage($enemies);

?>