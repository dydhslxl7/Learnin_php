<!-- foreach -->
<?php
    $meal = array('breakfast' => '호두 번',
                'lunch' => '캐슈너트와 양송이버섯',
                'snack' => '말린 오디',
                'dinner' => '칠리 소스 가지 볶음');
    print "<table>\n";
    foreach ($meal as $key => $value) {
        print "<tr><td>$key</td><td>$value</td></tr>\n";
    }
    print '</table>';
?>
<br>

<!-- foreach index -->
<?php
    $row_styles = array('even', 'odd');
    $style_index = 0;
    print "<table>\n";
    foreach ($meal as $key => $value) {
        print '<tr class="'.$row_styles[$style_index].'">';
        print "<tr><td>$key</td><td>$value</td></tr>\n";
        //$style_index 변수에 0과 1을 번갈아 지정한다.
        $style_index = 1 - $style_index;
    }
    print '</table>';
?>
<br>

<!-- foreach로 배열 수정하기 -->
<?php
    $meals = Array('Walnut Bun' => 1,
                'Cashew Nuts and White Mushrooms' => 4.95,
                'Dried Mulberries' => 3.00,
                'Eggplant with Chili Sauce' => 6.50);
    foreach ($meals as $dish => $price) {
        //$price = $price * 2 구문은 효과가 없다.

        //이것도 에러남, 이유는 아직 모르겠음 - 2021.04.15
        //$meal[$dish] = $dish * 2;

        $meals[$dish] = $meals[$dish] * 2;
    }

    //다시 한 번 배열을 순회하며 변경된 값을 출력한다.
    foreach ($meals as $dish => $price) {
        printf("%s 메뉴의 변경된 가격은 \$%.2f입니다.<br>", $dish, $price);
    }
?>
<br>

<!-- foreach에서 숫자 키 배열 사용하기 -->
<?php
    $dinner = Array('스위트콘과 아스파라거스',
                    '레몬 치킨',
                    '삶은 망태버섯');
    foreach ($dinner as $dish) {
        print "주문 가능 메뉴 : $dish<br>"; 
    }
?>
<br>

<!-- for로 숫자 키 배열 순회하기 -->
<?php
    $dinner = array('스위트콘과 아스파라거스',
                    '레몬 치킨',
                    '삶은 망태버섯');
    for ($i = 0, $num_dishes = count($dinner); $i < $num_dishes; $i++) {
        print "메뉴 번호 $i: $dinner[$i]<br>";
    }
?>
<br>

<!-- for로 테이블 행의 클래스명 번갈아 출력하기 -->
<?php
    $row_styles = array('even', 'odd');
    $dinner = array('스위트콘과 아스파라거스',
                    '레몬 치킨',
                    '삶은 망태버섯');
    print "<table>\n";

    for($i = 0, $num_dishes = count($dinner); $i < $num_dishes; $i++) {
        echo $i % 2;
        print '<tr class="'.$row_styles[$i % 2].'">';
        print "<td>원소 $i</td><td>$dinner[$i]</td></tr>\n";
    }
    print '</table>';
?>
<br>

<!-- 배열 원소 순서와 foreach -->
<?php
    $letters[0] = 'A';
    $letters[1] = 'B';
    $letters[3] = 'D';
    $letters[2] = 'C';
    
    //원소를 추가한 순서에 따라 출력된다.
    foreach ($letters as $letter) {
        print $letter;
    }
    echo "<br>";
    foreach ($letters as $key => $value) {
        print $value;
    }
    echo "<br>";
    foreach ($letters as $key => $value) {
        print $letters[$key];
    }
    echo "<br>";

    //숫자 키 순서대로 배열 원소에 접근하려면
    for ($i = 0, $num_letters = count($letters); $i < $num_letters; $i++) {
        print $letters[$i];
    }
?>
<br><br>

<!-- 특정 키가 있는지 확인하기 -->
<?php
    $meals = array('Walnut Bun' => 1,
                'Cashew Nuts and White Mushrooms' => 4.95,
                'Dried Mulberries' => 3.00,
                'Eggplant with Chili Sauce' => 6.50,
                'Shrimp Puffs' => 0); //Shrimp Puffs는 무료!
    $books = array("이용객을 위한 A급 중국어 안내",
                    '중국의 요리 방식과 식사 문화');
    
    // 다음 조건식은 참이다.
    if (array_key_exists('Shrimp Puffs', $meals)) {
        print "네, Shrimp Puffs 메뉴도 가능합니다.";
    }echo "<br>";
    // 다음 조건식은 거짓이다.
    if (array_key_exists('Steak Sandwich', $meals)) {
        print "네, Steak Sandwich 메뉴도 있습니다.";
    }
    // 다음 조건식은 참이다.
    if (array_key_exists(1, $books)) {
        print "1번 원소는 중국의 요리 방식과 식사 문화입니다.";
    }
?><br><br>

<!-- 특정 값이 있는지 확인하기 -->
<?php
    //Dried Mulberries 키의 값이 3.00이므로 이 조건은 참이다.
    if(in_array(3, $meals)) {
        print '가격이 $3인 메뉴가 있습니다.';
    }echo "<br>";
    
    //이 조건도 참이다.
    if(in_array('중국의 요리 방식과 식사 문화', $books)) {
        print '중국의 요리 방식과 식사 문화를 보실 수 있습니다.';
    }echo "<br>";
    
    //in_array()는 대소문자를 구별하므로 이 조건은 거짓이다.
    if(in_array("이용객을 위한 a급 중국어 안내", $books)) {
        print '이용객을 위한 A급 중국어 안내를 보실 수 있습니다.';
    }echo "<br>";  
?>

<!-- 특정 값이 있는지 확인하기 -->
<?php
    $dish = array_search(6.50, $meals);
    if ($dish) {
        print "$dish 메뉴의 가격은 \$6.50입니다.";
    }  
?>