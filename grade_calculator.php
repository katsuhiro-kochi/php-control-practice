<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>成績判定システム</h1>

    <h2>[個別成績]</h2>

    <?php
    $students = [
        ["name" => "田中太郎", "score" => 85],
        ["name" => "佐藤花子", "score" => 92],
        ["name" => "鈴木一郎", "score" => 78],
        ["name" => "高橋美咲", "score" => 65],
        ["name" => "伊藤健太", "score" => 58],
    ];

    //評価判定する
    function evaluation($score)
    {

        if ($score >= 90) {
            return ['grade' => 'A', 'judgement' => '優秀'];
        } elseif ($score >= 80) {
            return ['grade' => 'B', 'judgement' => '良好'];
        } elseif ($score >= 70) {
            return ['grade' => 'C', 'judgement' => '普通'];
        } elseif ($score >= 60) {
            return ['grade' => 'D', 'judgement' => '要努力'];
        } elseif ($score < 60) {
            return ['grade' => 'E', 'judgement' => '不合格'];
        }


    }





    //個別成績を一人ずつ表示
    
    foreach ($students as $student) {

        //evaluation関数から配列を受け取る
        $result = evaluation($student["score"]);

        echo "<p>$student[name] : $student[score]点 $result[grade] ( $result[judgement] )</p>";

    }


    //統計情報を管理する変数
    $passCount = 0;
    $failCount = 0;
    $totalScore = 0;


    //統計情報を計算
    foreach ($students as $student) {
        if ($student["score"] >= 60) {
            $passCount++;
            $totalScore += $student["score"];
        } else {
            $failCount++;
            $totalScore += $student["score"];
        }
    }
    $average = $totalScore / ($passCount + $failCount);



    echo "<h2>[統計情報]</h2>";

    //統計情報を表示
    echo "<p>合格者数（60点以上）$passCount 人</p>";
    echo "<p>不合格者数（60点未満）$failCount 人</p>";
    echo "<p>平均点 $average 点</p>";

    ?>

</body>

</html>