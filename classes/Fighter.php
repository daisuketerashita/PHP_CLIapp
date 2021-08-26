<?php
class Fighter extends Human
{
    // プロパティ
    const MAX_HITPOINT = 80;
    private $hitPoint = 80;
    private $attackPoint = 10;
    private $intelligence = 30; // 攻撃力

    //名前をセットするコンストラクタ
    public function __construct($name){
        parent::__construct($name,$this->hitPoint,$this->attackPointl, $this->intelligence);
    }

    public function doAttack($enemies){

        // 自分のHPが0以上か、敵のHPが0以上かなどをチェックするメソッドを用意。
        if (!$this->isEnableAttack($enemies)) {
            return false;
        }
        // ターゲットの決定
        $enemy = $this->selectTarget($enemies);

        if(rand(1,2) == 1){
            //特殊の攻撃力
            $SpecialPunch = $this->intelligence * 1.5;

            echo "『" .$this->getName() . "』は腰を深く落とし、真っ直ぐ相手を突いた！\n";
            echo "『正拳突き』！！\n";
            echo $enemy->getName() . " に " . $SpecialPunch . " のダメージ！\n";
            $enemy->tookDamage($SpecialPunch);
        }else {
            parent::doAttack($enemies);
        }
        return true;
    }
}
?>