<?php

//인수의 형 선언
function countdown(int $top) {
    while($top > 0) {
        print "$top..";
        $top--;
    }
    print "펑!<br>";
}
$counter = 5;
countdown($counter);
print "counter의 값 : $counter<br><br>";

//반환 형 선언
function restaurant_check2($meal, $tax, $tip): float {
    $tax_amount = $meal * ($tax / 100);
    $tip_amount = $meal * ($tip / 100);
    $total_amount = $meal + $tax_amount + $tip_amount;

    return $total_amount;
}

//다른 파일 참조
require 'restaurant-functions.php';

/* 음식가격 $25, 더하기 부가세 8.875%, 더하기 팁 20% */
$total_bill = restaurant_check(25, 8.875, 20);

/* 가진돈 $30 */
$cash = 30;

print "결제 방법은 " . payment_method($cash, $total_bill);



?>