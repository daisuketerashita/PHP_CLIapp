<?php
//勇者クラスの作成
class Brave extends Human{

    //勇者のプロバティ
    const MAX_HITPOINT = 120; //最大HPの定義　定数
    private $hitPoint = self::MAX_HITPOINT; //現在のHP
    private $attackPoint = 30; //攻撃力

    //名前をセットするコンストラクタ
    public function __construct($name){
        parent::__construct($name,$this->hitPoint,$this->attackPoint);
    }

    public function doAttack($enemies){
        //自身のHPが0か確かめる
        if($this->hitPoint <= 0){
            return false;
        }

        $enemyIndex = rand(0, count($enemies) - 1);
        $enemy = $enemies[$enemyIndex];

        //乱数の発生
        if(rand(1,3) == 1){
            //特技の攻撃力
            $specialSkill = $this->attackPoint * 1.5;
            //特技の発動
            echo "『".$this->getName()."』の特技が発動した！\n";
            echo "『アルテマソード』！！\n";
            echo $enemy->getName()."に".$specialSkill."のダメージ！\n";
            $enemy->tookDamage($specialSkill);
        }else{
            parent::doAttack($enemies);
        }
        return true;
    }
}
?>