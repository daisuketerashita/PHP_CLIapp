<?php
//敵クラスの作成
class Enemy{
    //プロパティ
    const MAX_HITPOINT = 50; //最大HPの定義　定数
    private $name; //名前
    private $hitPoint = 50; //現在のHP
    private $attackPoint = 10; //攻撃力

    //名前をセットするコンストラクタ
    public function __construct($name,$attackPoint){
        $this->name = $name;
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

    //敵側の攻撃メソッド
    public function doAttack($humans){
        // チェック１：自身のHPが0かどうか
        if ($this->hitPoint <= 0) {
            return false;
        }

        $humanIndex = rand(0, count($humans) - 1); // 添字は0から始まるので、-1する
        $human = $humans[$humanIndex];

        echo "『".$this->getName()."』の攻撃！\n";
        echo "【".$human->getName()."】に".$this->attackPoint."のダメージ！\n";
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