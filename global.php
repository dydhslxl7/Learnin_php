<?php

//조건 표현식 내부에서 함수 호출과 할당을 동시에 하기
function complete_bill($meal, $tax, $tip, $cash_on_hand) {
    $tax_amount = $meal * ($tax / 100);
    $tip_amount = $meal * ($tip / 100);

    $total_amount = $meal + $tax_amount + $tip_amount;
    if($total_amount > $cash_on_hand) {
        //계산 금액이 가진돈보다 많음
        return false;
    }else {
        //이정도는 낼 수 있음
        return $total_amount;
    }
}
if($total = complete_bill(15.22, 8.25, 15, 20)) {
    print "$total 정도면 딱 좋지";
}else {
    print "제가 돈이 없어서 그러는데, 대신 접시라도 닦으면 안될까요?";
}

//변수 영역
$dinner = '갑오징어 카레';

function vegetarian_dinner() {
    print "저녁 메뉴는 $dinner, 또는 ";
    $dinner = '완두싹 볶음';
    print $dinner;
    print "입니다.<br>";
}
function kosher_dinner() {
    print "저녁 메뉴는 $dinner, 또는 ";
    $dinner = '궁보계정';
    print $dinner;
    print "입니다.<br>";
}
print "채식주의식 ";
vegetarian_dinner();
print "유태인식 ";
kosher_dinner();
print "일반 저녁 메뉴는 $dinner 입니다.<br><br>";


// $GLOBALS 변수
function macrobiotic_dinner() {
    $dinner = "모듬 채소";
    print "저녁 메뉴는 $dinner 입니다.";
    //해산물의 유혹에 굴복하고 말았음
    print "하지만 저는 ";
    print $GLOBALS['dinner'];
    print "를 먹겠어요.<br>";
}
macrobiotic_dinner();
print "일반 저녁 메뉴 : $dinner<br><br>";


//$GLOBALS를 이용한 변수 수정
function hungry_dinner() {
    $GLOBALS['dinner'] .= ' 그리고 바싹 익힌 토란';
}
print "일반 저녁 메뉴는 $dinner 입니다.";
print "<br>";
hungry_dinner();
print "저녁 특선 메뉴는 $dinner 입니다.<br><br>";


//global 키워드
$dinner = '갑오징어 카레';

function vegetarian_dinner2() {
    global $dinner;
    print "저녁 메뉴는 $dinner 였습니다만, 지금은 ";
    $dinner = '완두싹 볶음';
    print $dinner;
    print "입니다.<br>";
}
print "일반 저녁 메뉴는 $dinner 입니다.<br>";
vegetarian_dinner2();
print "일반 저녁 메뉴는 $dinner 입니다.";


//global 키워드 한번에 여러 변수 지정하기
global $dinner, $lunch, $breakfast;

?>