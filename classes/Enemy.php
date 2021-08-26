<?php
//敵クラスの作成
class Enemy extends Lives{
    //プロパティ
    const MAX_HITPOINT = 50; //最大HPの定義　定数

    //名前をセットするコンストラクタ
    public function __construct($name,$attackPoint){
        $hitPoint = 50;
        $intelligence = 0;
        parent::__construct($name, $hitPoint, $attackPoint, $intelligence);
    }
}