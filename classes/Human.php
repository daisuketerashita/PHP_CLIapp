<?php
//味方クラスの作成
class Human{
    //プロバティ
    const MAX_HITPOINT = 100; //最大HPの定義　定数
    public $name; //名前
    public $hitPoint = 100; //現在のHP
    public $attackPoint = 20; //攻撃力

    //味方側の攻撃メソッド
    public function doAttack($enemy){
        echo "『".$this->name."』の攻撃！<br>";
        echo "【".$enemy->name."】に".$this->attackPoint."のダメージ！<br>";
        $enemy->tookDamage($this->attackPoint);
    }

    //味方側のダメージメソッド
    public function tookDamage($damage){
        $this->hitPoint -= $damage;
        //HPが0未満にならないための処理
        if($this->hitPoint < 0){
            $this->hitPoint = 0;
        }
    }
}