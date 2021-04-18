<?php

$br = "<br><br>";

// 큰따옴표 문자열 내부에 배열 원소 삽입하기
$meals['breakfast'] = '호두 번';
$meals['lunch'] = '칠리 소스 가지 볶음';
$amounts = array(3, 6);

print "아침 메뉴는 $meals[breakfast],<br>";
print "점심 메뉴는 $meals[lunch]로 할게요.<br>";
print "아침에는 $amounts[0]개, 점심에는 $amounts[1]개 부탁해요.$br";

//중괄호를 이용해 배열 원소 삽입하기
$meals['Walnut Bun'] = '$3.95';
$hosts['www.example.com'] = '웹사이트';

print "호두 번의 가격은 {$meals['Walnut Bun']}입니다.<br>";
print "www.example.com은 {$hosts['www.example.com']}입니다.$br";

//implode()로 배열에서 문자열 생성하기
$dimsum = array('닭고기 번', '오리발 구이', '순무 케이크');
$menu = implode(', ', $dimsum);
print $menu.$br;

//implode 빈 문자열
$letters = array('A', 'B', 'C', 'D');
print implode('', $letters).$br;

//implode 테이블
print '<tr><td>' . implode('</td><td>', $dimsum) . '</td></tr>'.$br;

//explode로 문자열에서 배열 생성하기
$fish = '농어, 잉어, 꼬치고기, 가자미';
$fish_list = explode(',', $fish);
print "두 번째 물고기는 $fish_list[1]입니다.".$br;

//sort를 이용한 정렬
$dinner = array('Sweet Corn and Asparagus',
                'Lemon Chicken',
                'Braised Bamboo Fungus');
$meal = array('breakfast' => 'Walnut Bun',
            'lunch' => 'Cashew Nuts and White Mushrooms',
            'snack' => 'Dried Mulberries',
            'dinner' => 'Eggplant with Chili Sauce');

print "정렬 전: <br>";
foreach ($dinner as $key => $value) {
    print " \$dinner: $key $value<br>";
}
foreach ($meal as $key => $value) {
    print "  \$meal: $key => $value<br>";
}

sort($dinner);
sort($meal);

print "정렬 후:<br>";
foreach ($dinner as $key => $value) {
    print " \$dinner: $key $value<br>"; 
}
foreach ($meal as $key => $value) {
    print "  \$meal: $key => $value<br>";
}
echo "<br>";

//asort 정렬
$meal = array('breakfast' => 'Walnut Bun',
            'lunch' => 'Cashew Nuts and White Mushrooms',
            'snack' => 'Dried Mulberries',
            'dinner' => 'Eggplant with Chili Sauce');

print "정렬 전:<br>";
foreach ($meal as $key => $value) {
    print "  \$meal: $key => $value<br>";
}

asort($meal);

print "정렬 후:<br>";
foreach ($meal as $key => $value) {
    print "  \$meal: $key => $value<br>";
}
echo "<br>";

//ksort 정렬
$meal = array('breakfast' => 'Walnut Bun',
            'lunch' => 'Cashew Nuts and White Mushrooms',
            'snack' => 'Dried Mulberries',
            'dinner' => 'Eggplant with Chili Sauce');

print "정렬 전:<br>";
foreach ($meal as $key => $value) {
    print "  \$meal: $key => $value<br>";
}

ksort($meal);

print "정렬 후:<br>";
foreach ($meal as $key => $value) {
    print "  \$meal: $key => $value<br>";
}
echo "<br>";

//arsort 정렬
$meal = array('breakfast' => 'Walnut Bun',
            'lunch' => 'Cashew Nuts and White Mushrooms',
            'snack' => 'Dried Mulberries',
            'dinner' => 'Eggplant with Chili Sauce');

print "정렬 전:<br>";
foreach ($meal as $key => $value) {
    print "  \$meal: $key => $value<br>";
}

arsort($meal);

print "정렬 후:<br>";
foreach ($meal as $key => $value) {
    print "  \$meal: $key => $value<br>";
}
echo "################".$br;


/*정리
sort : 원소의 값을 기준을 오름차순 정렬, 연관배열의 키는 없어짐
asort : 원소의 값을 기준으로 오름차순 정렬, 연관배열의 키 유지됨
ksort : 원소의 키를 기준으로 오름차순 정렬

rsort : 원소의 값을 기준으로 내림차순 정렬, 연관배열 키 없어짐
arsort : 원소의 값을 기준으로 내림차순 정렬, 연관배열 키 유지됨
krsort : 원소의 키를 기준으로 내림차순 정렬
*/

$meals = array('breakfast' => ['호두 번', '커피'],
                'lunch' => ['캐슈너트', '양송이버섯'],
                'snack' => ['말린 오디', '참깨 게살 무침']);
$lunches = [ ['닭고기','가지','쌀'],
            ['소고기','부추','국수'],
            ['가지','두부'] ];
$flavors = array('Japanese' => array('hot' => '와사비',
                                    'salty' => '간장 소스'),
                'Chinese' => array('hot' => '머스타드',
                                    'pepper-salty' => '허브잎'));

//다차원 배열 원소에 접근하기
print $meals['lunch'][1]."<br>";
print $meals['snack'][0]."<br>";
print $lunches[0][0]."<br>";
print $lunches[2][1]."<br>";
print $flavors['Japanese']['salty']."<br>";
print $flavors['Chinese']['hot']."<br>";

//다차원 배열 조작
$prices['dinner']['Sweet Corn and Asparagus'] = 12.50;
$prices['lunch']['Cashew Nuts and White Mushrooms'] = 4.95;
$prices['dinner']['Braised Bamboo Fungus'] = 8.95;

$prices['dinner']['total'] = $prices['dinner']['Sweet Corn and Asparagus']
                        + $prices['dinner']['Braised Bamboo Fungus'];

$specials[0][0] = '체스트넛 번';
$specials[0][1] = '호두 번';
$specials[0][2] = '땅콩 번';
$specials[1][0] = '체스트넛 샐러드';
$specials[1][1] = '호두 샐러드';

//숫자 키를 생략하면 배열 마지막에 추가됨
//이 구문은 $specials[1][2]에 저장됨
$specials[1][] = '땅콩 샐러드';

//$culture는 키, $culture_flavors는 값(배열)이다.
foreach ($flavors as $culture => $culture_flavors) {
    //flavor는 키, $example은 값이다.
    foreach ($culture_flavors as $flavors => $example) {
        //띄어쓰기 안하면 중괄호해줘야 헷갈려하지 않는다.
        print "$culture $flavors 요리의 재료는 {$example}입니다.<br>";
    }
}

?>