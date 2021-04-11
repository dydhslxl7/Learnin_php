<?php
    if($_POST['user']) {
        print "Hello, ";
        print $_POST['user'];
        print "!";
    }else {
        print <<<_HTML_
    
    <form method="POST" action="$_SERVER[PHP_SELF]">
        이름 : <input type="text" name="user" />
        <br/>
        <button type="submit">인사</button>
    </form>
_HTML_;
}
?>

<?php
// here 문서에 변수 넣기
$page_title = '메뉴';
$meat = '돼지고기';
$vegetable = '숙주나물';

print <<<MENU
<html>
<head><title>$page_title</title></head>
<body>
<ul>
<li>$meat 바베큐</li>
<li>$meat 조림과 $vegetable</li>
<li>저민 $meat</li>
<ul>
</body>
</html>
<br><br>
MENU;

//문자열 사이 중괄호
$preparation = '삶';
print "야채를 곁들인 {$preparation}은 $meat";
?>