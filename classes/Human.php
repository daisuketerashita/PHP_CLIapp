<?php
//味方クラスの作成
class Human extends Lives{
    //プロバティ
    const MAX_HITPOINT = 100; //最大HPの定義　定数

    //名前をセットするコンストラクタ
    public function __construct($name, $hitPoint = 100, $attackPoint = 20, $intelligence = 0 ){
        parent::__construct($name, $hitPoint, $attackPoint, $intelligence);
    }

}