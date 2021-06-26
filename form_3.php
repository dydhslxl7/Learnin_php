<!-- 폼 오류 메시지 표시 -->
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //validate_form()이 오류 메시지 배열을 반환하면 show_form()에 전달한다.
        if($form_errors = validate_form()) {
            show_form($form_errors);
        } else {
            process_form();
        }
    } else {
        show_form();
    }

    // 폼을 제출하면 수행하는 함수
    function process_form() {
        print $_POST['my_name']. "님 안녕하세요.";
    }

    // 폼을 표시하는 함수
    function show_form($errors = array()) {
        // 오류 메시지를 전달받으면 출력한다.
        if($errors) {
            print '다음 항목을 수정해주세요. : <ul><li>';
            print implode('</li><li>', $errors);
            print '</li><ul>';
        }
        print <<<_HTML_
            <form method="POST" action="$_SERVER[PHP_SELF]">
            이름 : <input type="text" name="my_name">
            <br />
            <input type="submit" value="인사">
            </form>
        _HTML_;
    }

    // 폼 데이터 검사
    function validate_form() {
        // 오류 메시지를 담을 빈 배열 생성
        $errors = array();

        // 이름이 너무 짧으면 오류 메시지 추가
        if(strlen($_POST['my_name']) < 3) {
            $errors[] = '이름은 3글자 이상 입력해주세요.';
        }

        // (빈 배열일 수도 있는) 오류 메시지 배열 반환
        return $errors;
    }
?>


<!-- 수정된 입력 데이터로 배열 생성하기 -->
<?php    
    function validate_form2() {
        $errors = array();
        $input = array();

        $input['age'] = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
        if(is_null($input['age']) || ($input['age'] === false)) {
            $errors[] = '나이를 정확하게 입력해주세요.';
        }

        $input['price'] = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        if(is_null($input['price']) || ($input['price'] === false)) {
            $errors[] = '가격을 정확하게 입력해주세요.';
        }

        // $_POST['name']가 설정되지 않았을 경우를 대비해 널 병합 연산자를 사용한다.
        $input['name'] = trim($_POST['name'] ?? '');
        if(strlen($input['name'] == 0)) {
            $errors[] = "이름을 입력해주세요.";
        }
        return array($errors, $input);
    }
?>

<!-- 
    1. filter_input : 검증한 입력 요소가 유효하면 입력값을 반환, 입력 요소를 찾지 못하면 null을 반환
    2. FILTER_VALIDATE_INT : 정수 필터링
    3. FILTER_VALIDATE_FLOAT : 부동소수점 필터링

    ex_
    filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT)
    : 제출된 폼 데이터(INPUT_POST)에서 age라는 폼 항목을 찾고 정수 검증 필터(FILTER_VALIDATE_INT)로 검사
 -->


<!-- 수정된 입력 데이터와 오류 처리하기 -->
<?php
    // 요청 메서드에 따라 실행할 함수를 결정하는 로직
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // validate_form()이 오류 메시지 배열을 반환하면 show_form()에 전달한다.
        list($form_errors, $input) = validate_form2();
        if($form_errors) {
            show_form($form_errors);
        } else {
            process_form($input);
        }
    } else {
        show_form();
    }
?>

<!-- 
    list() : 배열처럼 변수에 할당
-->


<!-- 날짜 범위 확인 -->
<?php
    // 6개월 전을 나타내는 DateTime 객체 생성
    $range_start = new DateTime('6 months ago');
    // 현재를 나타내는 DateTime 객체 생성
    $range_end = new DateTime();

    // $_POST['year']가 1900부터 2100 사이의 연도인지 검사한다.
    // $_POST['month']가 1부터 12 사이의 월인지 검사한다.
    // $_POST['day']가 1부터 13 사이의 일인지 검사한다.
    $input['year'] = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT,
                                array('option' => array('min_range' => 1990,
                                                        'max_range' => 2100)));
    $input['month'] = filter_input(INPUT_POST, 'month', FILTER_VALIDATE_INT,
                                array('option' => array('min_range' => 1,
                                                        'max_range' => 12)));
    $input['day'] = filter_input(INPUT_POST, 'day', FILTER_VALIDATE_INT,
                                array('option' => array('min_range' => 1,
                                                        'max_range' => 31)));

    // 연도, 월, 일은 0이 될 수 없으므로 항등 연산자(===)를 사용할 필요가 없다.
    // 특정 월에 해당하는 일자가 올바른지 확인하고자 checkdate() 함수를 사용한다.
    if($input['year'] && $input['month'] && $input['day']
        && checkdate($input['month'], $input['day'], $input['year'])) {
            $submitted_date = new DateTime(strtotime($input['year'] . '-' .
                                                    $input['month'] . '-' .
                                                    $input['day']));
            if(($range_start > $submitted_date || $range_end < $submitted_date)) {
                $errors[] = '지난 6개월 사이에 속하는 날짜를 입력해주세요.';
            }
    } else {
        // 이 부분은 연도, 월, 일 폼 매개변수 중 하나라도 누락했거나
        // 2월 31일처럼 올바르지 않은 날짜를 입력했을 때 수행된다.
        $errors[] = '올바른 날짜를 입력해주세요.';
    }

    // 이메일 주소 문법 검사
    $input['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if(! $input['email']) {
        $errors[] = '올바른 이메일 주소를 입력해주세요.';
    }
?>

<!-- <select> 메뉴 표시 -->
<?php
    $sweets = array('참깨 퍼프', '코코넛 우유 젤리', '흑설탕 케이크', '찹쌀 경단');

    function generate_options($options) {
        $html = '';
        foreach($options as $option) {
            $html .= "<option>$option</option>\n";
        }
        return $html;
    }

    // 폼을 표시하는 함수
    function show_form3() {
        $sweets = generate_options($GLOBALS['sweets']);
        print <<<_HTML_
            <form method="POST" action="$_SERVER[PHP_SELF]">
            메뉴 선택 : <select name="order">
            $sweets
            </select>
            <br />
            <input type="submit" value="주문">
            </form>
        _HTML_;
    }
?>

<!-- option의 value 속성값과 표시 메뉴명이 다른 <select> 메뉴 -->
<?php
    $sweets2 = array('puff' => '참깨 퍼프', 
                    'square' => '코코넛 우유 젤리', 
                    'cake' => '흑설탕 케이크', 
                    'ricemeat' => '찹쌀 경단');

    function generate_options_with_value($options) {
        $html = '';
        foreach($options as $value => $option) {
            $html .= "<option value=\"$value\">$option</option>\n";
        }
        return $html;
    }

    // 폼을 표시하는 함수
    function show_form4() {
        $sweets2 = generate_options_with_value($GLOBALS['sweets2']);
        print <<<_HTML_
            <form method="POST" action="$_SERVER[PHP_SELF]">
            메뉴 선택 : <select name="order">
            $sweets2
            </select>
            <br />
            <input type="submit" value="주문">
            </form>
        _HTML_;
    }
?>

<!-- 문자열에서 HTML 태그 제거하기 -->
<?php
    // 댓글에서 HTML 제거하기
    $comments = strip_tags($_POST['comments']);

    // 이제 안전하게 $comments를 출력할 수 있음
    print $comments;
?>
    <!-- 
        $_POST['comments']
        : 입가심으로는
        <b>찹쌀 경단</b>에 <div
        class="fancy">차 한 잔</div>이
        좋겠어.

        출력
        : 입가심으로는 찹쌀 경단에 차 한 잔이 좋겠어.

        안좋은 예
        : 부등식 2<3은 참인가
        결과
        : 부동식 2
    -->

<!-- 문자열의 HTML 요소 인코딩 -->
<?php
    $comments = htmlentities($_POST['comments']);

    // 이제 안전하게 $comments를 출력할 수 있음
    print $comments;
?>
    <!-- 
        $_POST['comments']
        : 입가심으로는
        <b>찹쌀 경단</b>에 <div
        class="fancy">차 한 잔</div>이
        좋겠어.

        출력
        : 입가심으로는 &lt;b&gt;찹쌀 경단&lt;/b&gt;에 ~~~

        웹 브라우저 출력
        : 입가심으로는
        <b>찹쌀 경단</b>에 <div
        class="fancy">차 한 잔</div>이
        좋겠어.
    -->