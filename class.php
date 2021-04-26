<?php

//클래스 정의
Class Entree {
    public $name;
    public $ingredients = array();

    public function hasIngredient($ingredients) {
        return in_array($ingredients, $this -> ingredients);
    }
}

/* 객체 생성과 사용 */
//객체를 생성하고 $soup에 할당
$soup = new Entree;
//$soup 속성 설정
$soup -> $name = '닭고기 수프';
$soup -> ingredients = array('닭고기', '물');

//또 다른 인스턴스를 생성하고 $sandwich에 할당
$sandwich = new Entree;
//$sandwich 속성 설정
$sandwich -> $name = '닭고기 샌드위치';
$sandwich -> ingredients = array('닭고기', '빵');

foreach (['닭고기', '레몬', '빵', '물'] as $ing) {
    if($soup -> hasIngredient($ing)) {
        print "수프의 재료 : $ing.<br>";
    }
    if($sandwich -> hasIngredient($ing)) {
        print "샌드위치의 재료 : $ing.<br>";
    }
}

//정적 메서드 정의
Class Entree2 {
    public $name;
    public $ingredients = array();

    public function hasIngredient($ingredients) {
        return in_array($ingredients, $this -> ingredients);
    }

    public static function getSizes() {
        return array('소', '중', '대');
    }
}
//정적 메서드 호출
$sizes = Entree2::getSizes();
foreach($sizes as $s)
    print $s."<br>";

//생성자를 이용해 객체 초기화하기
Class Entree3 {
    public $name;
    public $ingredients = array();

    public function __construct($name, $ingredients) {
        $this -> name = $name;
        $this -> ingredients = $ingredients;
    }

    public function hasIngredient($ingredients) {
        return in_array($ingredients, $this -> ingredients);
    }
}

//생성자 호출
$soup = new Entree3('닭고기 수프', array('닭고기', '물'));
$sandwich = new Entree3('닭고기 샌드위치', array('닭고기', '물'));

?>