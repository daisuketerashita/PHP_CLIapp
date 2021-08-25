<?php
class Sage extends Human{
    // プロパティ
    const MAX_HITPOINT = 80;
    private $hitPoint = 80;
    private $attackPoint = 10;
    private $intelligence = 30; // 魔法攻撃力

    //名前をセットするコンストラクタ
    public function __construct($name){
        parent::__construct($name,$this->hitPoint,$this->attackPoint);
    }

    public function doAttackHoimi($enemies, $humans)
    {
        // チェック１：自身のHPが0かどうか
        if ($this->hitPoint <= 0) {
            return false;
        }

        $humanIndex = rand(0, count($humans) - 1);
        $human = $humans[$humanIndex];

        if (rand(1, 2) === 1) {
            //ホイミの回復数値
            $hoimi = $this->intelligence * 1.5;

            echo "『" .$this->getName() . "』の呪文を唱えた！\n";
            echo "『ホイミ』！！\n";
            echo $human->getName() . " のHPを " . $hoimi . " 回復！\n";
            $human->recoveryDamage($hoimi, $human);
        } else {
            parent::doAttack($enemies);
        }
        return true;
    }
}
?>