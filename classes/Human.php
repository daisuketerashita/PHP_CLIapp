<?php
//味方クラスの作成
class Human{
    //プロバティ
    const MAX_HITPOINT = 100; //最大HPの定義　定数
    private $name; //名前
    private $hitPoint = 100; //現在のHP
    private $attackPoint = 20; //攻撃力

    //名前をセットするコンストラクタ
    public function __construct($name,$hitPoint = 100,$attackPoint = 20){
        $this->name = $name;
        $this->hitPoint = $hitPoint;
        $this->attackPoint = $attackPoint;
    }

    //名前取得のゲッター
    public function getName(){
        return $this->name;
    }

    //名前登録のセッター
    public function setName($name){
        $this->name = $name;
    }

    //HPのゲッター
    public function getHitPoint(){
        return $this->hitPoint;
    }

    //攻撃力のゲッター
    public function setAttackPoint(){
        return $this->attackPoint;
    }

    //味方側の攻撃メソッド
    public function doAttack($enemies){
        // チェック１：自身のHPが0かどうか
        if ($this->hitPoint <= 0) {
            return false;
        }
        $enemyIndex = rand(0, count($enemies) - 1);
        $enemy = $enemies[$enemyIndex];

        echo "『".$this->getName()."』の攻撃！\n";
        echo "【".$enemy->getName()."】に".$this->attackPoint."のダメージ！\n";
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

    //ホイミの回復メソッド
    public function recoveryDamage($hoimi, $target){
        $this->hitPoint += $hoimi;
        if($this->hitPoint > $target::MAX_HITPOINT){
            $this->hitPoint = $target::MAX_HITPOINT;
        }
    }
}