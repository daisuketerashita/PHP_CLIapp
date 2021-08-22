<?php
//敵クラスの作成
class Enemy{
    //プロパティ
    const MAX_HITPOINT = 50; //最大HPの定義　定数
    public $name; //名前
    public $hitPoint = 50; //現在のHP
    public $attackPoint = 10; //攻撃力

    //敵側の攻撃メソッド
    public function doAttack($human){
        echo "『".$this->name."』の攻撃！\n";
        echo "【".$human->name."】に".$this->attackPoint."のダメージ！\n";
        $human->tookDamage($this->attackPoint);
    }

    //敵側のダメージメソッド
    public function tookDamage($damage){
        $this->hitPoint -= $damage;
        //HPが0未満にならないための処理
        if($this->hitPoint < 0){
            $this->hitPoint = 0;
        }
    }
}