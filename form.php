<!-- 환영인사 보여주기 -->
<?php
    if('POST' == $_SERVER['REQUEST_METHOD']) {
        print $_POST['my_name']. "님 안녕하세요";
    }else {
        print<<<_HTML_
        <form method="post" action="$_SERVER[PHP_SELF]">
        이름: <input type="text" name="my_name">
        <br />
        <input type="submit" value="인사">
        </form>
        _HTML_;
    }
?>

<!-- 
    QUERY_STRING    :   URL에서 물음표 뒤의 매개변수 부분
    PATH_INFO       :   URL에 붙이는 추가 경로 정보
    SERVER_NAME     :   해당 PHP 엔진을 실행하는 웹사이트의 이름
    DOCUMENT_ROOT   :   웹사이트 문서가 위치한 웹 서버 컴퓨터의 디렉터리
    REMOTE_ADDR     :   웹 서버에 요청을 보내는 사용자의 IP 주소
    REMOTE_HOST     :   웹 서버에 요청을 보낸 사용자의 IP 주소를 호스트명으로 전환한 값
    HTTP_REFFERER   :   누군가 링크를 클릭해 현재 URL에 들어왔을 때, 링크가 있던 페이지의 URL이 저장
    HTTP_USER_AGENT :   페이질ㄹ 요청하는 웹 브라우저의 정보
-->

 <!-- 요소가 두 개인 폼 -->
<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
<input type="text" name="product_id">
<select name="category">
<option value="ovenmitt">냄비받침</otion>
<option value="fryingpan">프라이팬</otion>
<option value="torch">주방토치</otion>
</select>
<input type="submit" name="제출">
</form>
제출된 값은 다음과 같습니다:
<br />
product_id: <?php print $_POST['product_id'] ?? '' ?>
<br />
category: <?php print $_POST['category'] ?? '' ?>
<br /><br />

<!-- 
    ??  :   널 병합(null coalesce) 연산자
            값이 있으면 해당값을 그대로 나타내고, 그렇지 않으면 빈 문자열 노출
            PHP 7에 도입
            이전 버전은 isset() 함수
            _ex
            if(isset($_POST['product_id'])) {
                print $_POST['product_id'];
            }
-->

<!-- 다중 값을 지닌 폼 요소 -->
<form method="POST" action="form.php">
<select name="lunch[]" multiple>
<option value="바베큐 돼지고기">바베큐 돼지고기</option>
<option value="닭고기">닭고기 번</option>
<option value="연꽃씨">연꽃씨 번</option>
<option value="단팥">단팥 번</option>
<option value="제비집">제비집 번</option>
</select>
<input type="submit" name="제출">
</form>
원하시는 번을 선택하세요:
<br />
<?php 
    if(isset($_POST['lunch'])) {
        foreach($_POST['lunch'] as $choice) {
            print "$choice 번을 골랐습니다. <br />";
        }
    }
?>

<!-- 
    폼 요소의 이름 끝에 []를 붙이면 한 요소로 복수의 값을 전달할 수 있다.
-->