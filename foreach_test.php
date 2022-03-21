<?php

# 확인
$lump = Array(
    array(
            "a1" => "a2",
            "a3" => "a4"
          ),
    "b" => "c",
   );

foreach($lump as $key => $val)
{
    foreach($val as $k => $v)
    {
        echo $v."<br>";
    }
}

# 확인 2
$lump = Array(
			array(
                    "a1" => "a2",
                    "a3" => "a4"
                  ),
			array("b" => "c"),
   		);

foreach($lump as $key => $val)
{
    foreach($val as $k => $v)
    {
		echo $v."<br>";
    }
}

?> 