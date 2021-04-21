<?php

//for()로 다차원 배열 순회하기
$specials = array( array('체스트넛 번', '호두 번', '땅콩 번'),
                array('체스트넛 샐러드', '호두 샐러드', '땅콩 샐러드'));
// $num_specials은 $specials의 첫번째 차원의 원소의 개수이므로 2다.
for($i = 0, $num_specials = count($specials); $i < $num_specials; $i++) {
    //$num_sub은 각 하위배열의 원소의 개수이므로 3이다.
    for($m = 0, $num_sub = count($specials[$i]); $m < $num_sub; $m++) {
        print "Element [$i][$m]은 ".$specials[$i][$m]."입니다.<br/>";
        print "Element [$i][$m]은 {$specials[$i][$m]}입니다.<br/>";
    }
}
echo "<br>";

function page_header() {
    print '<html><head><title>저의 홈페이지에 오신 것을 환영합니다.</title></head>';
    print '<body bgcolor="#ffffff">';
}

page_header();
print "어서오세요, $ user 님.";
page_footer();

function page_footer() {
    print '<hr>방문해주셔서 감사합니다.';
    print '</body></html>';
}

//선택적 인수가 여러 개인 함수 정의하기
function page_header5($color, $title, $header = '어서오세요') {
    print '<html><head><title>'.$title.'에 오신 것을 환영합니다.</title></head>';
    print '<body bgcolor="#'.$color.'">';
    print "<h1>$header</h1>";
}
//올바른 호출 방법
page_header5('66cc99', '저의 멋진 홈페이지'); //header의 기본값을 사용한다.
page_header5('66cc99', '저의 멋진 홈페이지', '홈페이지 최고에요!'); //기본값을 사용하지 않는다.
echo "<br>";

//선택적 인수가 두 개일때. 마지막 두 인수에 지정해야 한다.
function page_header6($color, $title = '저의 홈페이지', $header = '어서오세요') {
    print '<html><head><title>'.$title.'에 오신 것을 환영합니다.</title></head>';
    print '<body bgcolor="#'.$color.'">';
    print "<h1>$header</h1>";
}
//올바른 호출 방법
page_header6('66cc99');
page_header6('66cc99', '저의 멋진 홈페이지');
page_header6('66cc99', '저의 멋진 홈페이지', '홈페이지 최고에요!');
echo "<br>";

//인수가 모두 선택적일 때
function page_header7($color = '336699', $title = '저의 홈페이지', $header = '어서오세요') {
    print '<html><head><title>'.$title.'에 오신 것을 환영합니다.</title></head>';
    print '<body bgcolor="#'.$color.'">';
    print "<h1>$header</h1>";
}
//올바른 호출 방법
page_header7();
page_header7('66cc99');
page_header7('66cc99', '저의 멋진 홈페이지');
page_header7('66cc99', '저의 멋진 홈페이지', '홈페이지 최고에요!');


//인수값 변경하기
function countdown($top) {
    while ($top > 0) {
        print "$top..";
        $top--;
    }
    print "펑!<br>";
}
$counter = 5;
countdown($counter);
print "counter의 값: $counter";
echo "<br>";

//반환값
function restaurant_check($meal, $tax, $tip) {
    $tax_amount = $meal * ($tax / 100);
    $tip_amount = $meal * ($tip / 100);
    $total_amount = $meal + $tax_amount + $tip_amount;

    return $total_amount;
}

$total = restaurant_check(15.22, 8.25, 15);

print '수중에 현금이 총 $20이니까...';
if($total > 20) {
    print "신용카드로 결제해야 돼.";
}else {
    print "현금으로 낼 수 있어.";
}
echo "<br>";

// 함수로 배열 반환하기
function restaurant_check2($meal, $tax, $tip) {
    $tax_amount = $meal * ($tax / 100);
    $tip_amount = $meal * ($tip / 100);
    $total_notip = $meal + $tax_amount;
    $total_tip = $meal + $tax_amount + $tip_amount;

    return array ($total_notip, $total_tip);
}

$totals = restaurant_check2(15.22, 8.25, 15);

if($totals[0] < 20) {
    print '팁을 제외한 총금액이 $20보다 적음';
    echo "<br>";
}
if($totals[1] < 20) {
    print '팁을 포함한 총금액이 $20보다 적음';
    echo "<br>";
}


//여러 개의 return 구문이 존재하는 함수
function payment_method($cash_on_hand, $amount) {
    if($amount > $cash_on_hand) return '신용카드';
    else return '현금';
}

$method = payment_method(20, $total);
print '결제 방법은 '.$method.'입니다.';
echo "<br>";

//if에서 반환값 사용하기
if( restaurant_check(15.22, 8.25, 15) < 20) {
    print '$20가 안되니, 현금으로 내야지'; echo "<br>";
}else { print '너무 비싼데, 신용카드를 써야겠어'; echo "<br>"; }

//true 또는 false를 반환하는 함수
function can_pay_cash($cash_on_hand, $amount) {
    if($amount > $cash_on_hand) {
        return false;
    }else return true;
}

if(can_pay_cash(20, $total)) { print "현금으로 낼 수 있어"; echo "<br>"; }
else { "신용카드를 써야겠네"; echo "<br>"; }




?>