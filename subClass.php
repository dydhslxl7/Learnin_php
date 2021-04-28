<?php

//네임스페이스에 속한 클래스 정의
namespace Tiny;
//namespace Tiny\Eating;

Class Fruit {
    public static function munch($bite) {
        print "$bite 한 입 드셔보세요.";
    }
}

\Tiny\Fruit::munch("바나나");
//\Tiny\Eating\Fruit::munch("바나나");

//use 키워드 사용하기
use Tiny\Eating\Fruit as Snack;

use Tiny\Fruit;

// \Tiny\Eating\Fruit::munch(); 호출
Snack::munch("딸기");

//Tiny\Fruit::munch(); 호출
Fruit::munch("오렌지");


//하위클래스에 생성자 추가하기
Class ComboMeal extends Entree {

    public function __construct($name, $entrees) {
        parent::__construct($name, $entrees);
        foreach($entrees as $entree) {
            if(!$entree instanceof Entree) {
                throw new Exception('$entrees의 원소는 객체여야 합니다.');
            }
        }
    }

    public function hasIngredient($ingredient) {
        foreach($this->$ingredients as $entree) {
            if($entree->hasIngredient($ingredient)) {
                return true;
            }
        }
        return false;
    }
}

//속성의 가시성 변경
Class Entree {
    private $name;
    protected $ingredients = array();

    /* $name이 private이므로 접근 수단이 필요하다. */
    public function getName() {
        return $this->name;
    }

    public function __construct($name, $ingredients) {
        if(!is_array($ingredients)) {
            throw new Exception('$ingredients가 배열이 아닙니다.');
        }
        $this->name = $name;
        $this->hasIngredients = $ingredients;
    }

    public function hasIngredient($ingredient) {
        return in_array($ingredient, $this->ingredients);
    }
}


?>