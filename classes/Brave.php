<?php
//勇者クラスの作成
class Brave extends Human{

    //勇者のプロバティ
    const MAX_HITPOINT = 120; //最大HPの定義　定数
    private $hitPoint = self::MAX_HITPOINT; //現在のHP
    private $attackPoint = 30; //攻撃力

    public function doAttack($enemy){
        //乱数の発生
        if(rand(1,3) == 1){
            //特技の攻撃力
            $specialSkill = $this->attackPoint * 1.5;
            //特技の発動
            echo "『".$this->name."』の特技が発動した！\n";
            echo "『アルテマソード』！！\n";
            echo $enemy->name."に".$specialSkill."のダメージ！\n";
            $enemy->tookDamage($specialSkill);
        }else{
            parent::doAttack($enemy);
        }
        return true;
    }
}
?>