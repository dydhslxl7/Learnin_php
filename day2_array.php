<?php

//array 배열 생성
    $vegetables = array('corn' => '노랑',
                        'beet' => '빨강',
                        'carrot' => '주황');
    $dinner = array(0 => '스위트콘과 아스파라거스',
                    1 => '레몬 치킨',
                    2 => '삶은 망태버섯');
    $computers = array('nintendo-64' => '닌텐도',
                    2600 => '아타리',
                    'Saturn' => '세가');

 //단축 배열 문법
    $vegetables = ['corn' => '노랑', 'beet' => '빨강', 'carrot' => '주황'];
    $dinner = [0 => '스위트콘과 아스파라거스',
                1 => '레몬 치킨',
                2 => '삶은 망태버섯'];
    $computers = ['nintendo-64' => '닌텐도', 2600 => '아타리',
                    'Saturn' => '세가'];

//원소 하나씩 추가해 배열 생성
    $vegetables['corn'] = '노랑';
    $vegetables['beet'] = '빨강';
    $vegetables['carrot'] = '주황';
    $dinner[0] = '스위트콘과 아스파라거스';
    $dinner[1] = '레몬 치킨';
    $dinner[2] = '삶은 망태버섯';
    $computers['nintendo-64'] = '닌텐도';
    $computers[2600] = '아타리';
    $computers['Saturn'] = '세가';

//array()로 숫자 키 배열 생성하기
    $dinner = array('스위트콘과 아스파라거스',
                    '레몬 치킨',
                    '삶은 망태버섯');
    print "$dinner[0] 그리고 $dinner[1] 주세요."

//두 개의 원소가 있는 $lunch 배열 생성하기
    //$lunch[0]을 지정한다.
    $lunch[] = '브라운 소스를 곁들인 말린 버섯';
    //$lunch[1]을 지정한다.
    $lunch[] = '파인애플과 버섯';

//세 개의 원소가 있는 $dinner 배열 생성하기
    $dinner = array('스위트콘과 아스파라거스', '레몬 치킨', '삶은 망태버섯');
    //$dinner 배열 마지막에 원소 추가하기
    //$dinner[3]이 지정된다.
    $dinner[] = '양념 치마살';

//배열의 크기 구하기
    $dishes = count($dinner);
    print "총 메뉴 개수 : $dishes";
?>