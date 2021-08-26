<?php
class Sage extends Human{
    // プロパティ
    const MAX_HITPOINT = 80;
    private $hitPoint = 80;
    private $attackPoint = 10;
    private $intelligence = 30; // 魔法

    //名前をセットするコンストラクタ
    public function __construct($name){
        parent::__construct($name,$this->hitPoint,$this->attackPoint,$this->intelligence);
    }

    public function doAttackHoimi($enemies, $members)
    {
         // 自分のHPが0以上か、敵のHPが0以上かなどをチェックするメソッドを用意。
         if (!$this->isEnableAttack($enemies)) {
            return false;
         }

        if (rand(1, 2) === 1) {
            // ターゲットの決定
            $member = $this->selectTarget($members);
            //ホイミの回復数値
            $hoimi = $this->intelligence * 1.5;

            echo "『" .$this->getName() . "』の呪文を唱えた！\n";
            echo "『ホイミ』！！\n";
            echo $member->getName() . " のHPを " . $hoimi . " 回復！\n";
            $member->recoveryDamage($hoimi, $member);
        } else {
            // ターゲットの決定
            $enemy = $this->selectTarget($enemies);
            parent::doAttack($enemies);
        }
        return true;
    }
}
?>