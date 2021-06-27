<!-- file_get_contents() -->
<?php
    // 앞선 예제의 템플릿 파일 불러오기
    $page = file_get_contents('page_template.html');

    // 페이지 제목 삽입
    $page = str_replace('{page_title}', '환영합니다', $page);
    
    // 아침에는 초록색, 오후에는 파란색으로 페이지 배경색 바꾸기
    if(date('H') >= 12) {
        $page = str_replace('{color}', 'blue', $page);
    } else {
        $page = str_replace('{color}', 'green', $page);
    }

    // 이전에 세션변수로 저장된 사용자명 가져오기
    $page = str_replace('{name}', $_SESSION['username'], $page);

    // 결과 출력
    print $page;
?>

<!-- file_put_contents() -->
<?php
    // 앞서 사용된 템플릿 파일 불러오기
    $page = file_get_contents('page-template.html');

    // 페이지 제목 삽입
    $page = str_replace('{page_title}', '환영합니다.', $page);

    // 아침에는 초록색, 오후에는 파란색으로 페이지 배경색 바꾸기
    if(date('H') >= 12) {
        $page = str_replace('{color}', 'blue', $page);
    } else {
        $page = str_replace('{color}', 'green', $page);
    }

    // 이전에 세변변수로 저장된 사용자명 가져오기
    $page = str_replace('{name}', $_SESSION['username'], $page);

    // 결과를 page.html로 저장
    file_put_contents('page.html', $page);
?>

<!-- 
    file_get_contents() / file_put_contents()
    : 파일 내용 전체를 한 번에 다룰 때 사용한다.

    file()
    : 세밀한 작업을 할 때 일부 내용에 접근한다.
    지나치게 많은 줄이 담긴 파일에 사용하면 메모리 사용량도 그만큼 증가한다.
-->


<!-- file() -->
<?php
    foreach(file('people.txt') as $line) {
        $line = trim($line);
        $info = explode('|', $line);
        print '<li><a href="mailto:' . $info[0] . '">' . $info[1] ."</li>\n";   
    }
?>

<!-- 용량이 큰 파일의 경우 -->
<?php
    $fh = fopen('people.txt', 'rb');
    while((! feof($fh) && ($line = fgets($fh)))) {
        $line = trim($line);
        $info = explode('|', $line);
        print '<li><a href="mailto:' . $info[0] . '">' . $info[1] ."</li>\n";
    }
    fclose($fh);
?>

<!-- 
    fopen() : 파일에 접속하고 이후 프로그램에서 사용할 수 있는 파일 접근 변수를 반환한다.
    fgets() : 파일 내용을 한 줄씩 읽고 문자열로 반환한다.
    - PHP 엔진은 파일을 읽어 들일 때, 현재 읽고 있는 위치를 표시해둔다.
    이 위치는 파일의 맨 앞에서부터 시작한다. 따라서 fgets()를 처음 호출하면
    파일의 첫 번재 줄을 읽고 위치 표시를 다음줄의 처음 부분으로 이동시킨다.
    feof() : 위치 표시가 파일의 끝을 지나면 true를 반환한다. (eof는 파일의 끝(end of file)을 의미한다.)
    fclose() : 파일 접속을 닫는다.

    + 위치 표시가 파일의 가장 마지막 지점을 정확히 가리킬 경우, feof($fh)는
    여전히 false를 반환하지만 fgets($fh)는 더는 줄을 읽을 수 없으므로 false를
    반환한다.

    + fopen()의 두 번째 인수는 파일 모드다.
    1. rb   :   읽기        |   처음    |   N   |   경고 발생 후 false 발생
    2. rb+  :   읽기, 쓰기  |   처음    |   N   |   결고 발생 후 false 발생
    3. wb   :   쓰기        |   처음    |   Y   |   새로 생성
    4. wb+  :   읽기, 쓰기  |   처음    |   Y   |   새로 생성
    5. ab   :   쓰기        |   마지막  |   N   |   새로 생성
    6. ab+  :   읽기, 쓰기  |   마지막  |   N   |   새로 생성
    7. xb   :   쓰기        |   처음    |   N   |   새로 생성 시도, 파일이 이미 존재하면 경고 발생 후 false 반환
    8. xb+  :   읽기, 쓰기  |   처음    |   N   |   새로 생성 시도, 파일이 이미 존재하면 경고 발생 후 false 반환
    9. cb   :   쓰기        |   처음    |   N   |   새로 생성
    10. cb+ :   읽기, 쓰기  |   처음    |   N   |   새로 생성
-->


 <!-- fwrite() -->
<?php
    try {
        $db = new PDO('sqlite:/tmp/restaurant.db');
    } catch (Exception $e) {
        print "데이터베이스에 접속할 수 없습니다: " . $e->getMessage();
        exit();
    }

    // dishes.txt 파일을 쓰기 모드로 열기
    $fh = fopen('dishes.txt', 'wb');

    $q = $db->query("SELECT dish_name, price FROM dishes");
    while($row = $q->fetch()) {
        // 각 줄을 dishes.txt에 쓰기
        // (줄 마지막에 개행문자 추가)
        fwrite($fh, "$row[0]의 가격은 $row[1] \n");
    }
    fclose($fh);
?>
