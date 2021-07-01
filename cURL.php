<!-- 1. GET으로 URL 가져오기 -->

<!-- cURL로 URL 가져오기 -->
<?php

    $c = crul_init('http://numbersapi.com/09/27');
    // cURL이 응답을 가져와 바로 출력하지 않고
    // 문자열로 가져오도록 설정한다.
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    // 요청 실행
    $fact = curl_exec($c);

?>


<!-- cURL을 이용해 문자열 매개변수와 헤더 설정하기 -->
<?php

    // 쿼리 데이터를 키와 값으로 설정하고 자동 변환한다.
    $params = array('api_key' => NDB_API_KEY,
                    'q' => 'black pepper');
    $url = "http://api.nal.usda.gov/ndb/search?" . http_build_query($params);

    $c = curl_init();
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    print curl_exec($c);

?>
<!-- 
    http_build_query()
    : 키=값(key=value) 형태로 변환하고
    &로 연결한 뒤
    URL 인코딩까지 거친 문자열을 반환한다.
-->


<!--  cURL 오류 처리 -->
<?php

    // 존재하지 않은 API를 임의로 설정
    $c = curl_init('http://api.example.com');
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($c);
    // 성공 여부에 관계없이 접속 정보를 모두 가져오기
    $info = curl_getinfo($c);

    // 접속에 문제가 있을 때
    if($result === false)
    {
        print "오류 #" . curl_errno($c) . "\n";
        print "이런! cURL 오류입니다: " . curl_error($c) . "\n";
    }

    // 400번대와 500번대 오류 코드는 HTTP 응답 오류다.
    else if($info['http_code'] >= 400) {
        print "서버가 HTTP 오류를 반환했습니다 {$info['http_code']}.]n";
    }
    else {
        print "접속에 성공했습니다!\n";
    }

    // 요청 정보 중에는 소요 시간도 있다.
    print "접속에 소요된 시간은 {$info['total_time']} 초 입니다.\n";

?>



<!-- 2. POST으로 URL 가져오기 -->

<!-- cURL로 POST 요청 생성하기 -->
<?php

    $url = 'http://php7.example.com/post-sever.php';

    // POST로 전달할 두 변수
    $form_data = array('name' => 'black pepper',
                        'smell' => 'good');
    
    $c = curl_init($url);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    // 요청을 POST로 설정한다.
    curl_setopt($c, CURLOPT_POST, true);
    // 전송할 데이터를 지정한다.
    curl_setopt($c, CURLOPT_POSTFIELDS, $form_data);

    print curl_exec($c);

?>
<!-- 
    Content-Type 헤더를 설정하거나 전송할 데이터를 형식에 맞게 가공하지 않는다.
    이러한 작업은 cURL이 알아서 하므로 직접 처리할 필요가 없다.
-->

<!-- cURL을 이용해 JSON을 POST로 전송하기 -->
<?php

    $url = 'http://php7.example.com/post-server.php';

    // POST로 전달할 두 변수
    $form_data = array('name' => 'black pepper',
                        'smell' => 'good');
    
    $c = curl_init($url);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    // 요청을 POST로 설정한다.
    curl_setopt($c, CURLOPT_POST, true);
    // 요청을 JSON으로 전달하는 헤더 설정
    curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    // 전송할 데이터를 알맞은 형식으로 가공하기
    curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($form_data));
?>
<!-- 
    CURLOPT_HTTPHEADER
    : 일반적인 폼 데이터 이외의 내용을 전송하려면 추가적인 처리를 해야 한다.
    CURLOPT_HTTPHEADER 설정은 요청 본문이 일반적인 폼 데이터가 아니라
    JSON임을 서버에 알린다.
-->