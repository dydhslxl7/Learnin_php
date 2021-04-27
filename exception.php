<?php

// 예외 발생시키기
Class Entree {
    public $name;
    public $ingredients =  array();

    public function __construct($name, $ingredients) {
        if(!is_array($ingredients)) {
            throw new Exception('$ingredients가 배열이 아닙니다.');
        }
        $this -> name = $name;
        $this -> ingredients = $ingredients;
    }

    public function hasIngredient($ingredient) {
        return in_array($ingredient, $this->ingredients);
    }
}
/*
//예외 상황 발생
$drink = new Entree('우유 한 잔', '우유');
if($drink->hasIngredient('우유')) {
    print "맛있어!";
}
*/
//예외 처리
try {
    $drink = new Entree('우유 한 잔', '우유');
    if($drink->hasIngredient('우유')) {
        print "맛있어!";
    }
}catch(Exception $e) {
    print "음료를 준비할 수 없습니다. : ".$e->getMessage()."<br>";
}

//Entree 클래스 확장
Class ComboMeal extends Entree {
    public function hasIngredient($ingredient) {
        foreach($this->ingredients as $entree) {
            if($entree->hasIngredient($ingredient)) {
                return true;
            }
        }
    }
}

//하위클래스 사용
//수프 종류와 재료
$soup = new Entree('닭고기 수프', array('닭고기', '물'));

//샌드위치 종류와 재료
$sandwich = new Entree('닭고기 샌드위치', array('닭고기', '빵'));

//세트 메뉴
$combo = new ComboMeal('수프 + 샌드위치', array($soup, $sandwich));

foreach(['닭고기', '물', '피클'] as $ing) {
    if($combo->hasIngredient($ing)) {
        print "세트 메뉴에 들어가는 재료 : $ing<br>";
    }
}





?>