<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>成績判定システム</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            border-bottom: 3px solid #0066cc;
            padding-bottom: 10px;
        }
        h2 {
            color: #0066cc;
            margin-top: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #0066cc;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .stats {
            background-color: #f0f8ff;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .stats p {
            margin: 10px 0;
            font-size: 18px;
        }
        .grade-A { color: #28a745; font-weight: bold; }
        .grade-B { color: #17a2b8; font-weight: bold; }
        .grade-C { color: #ffc107; font-weight: bold; }
        .grade-D { color: #fd7e14; font-weight: bold; }
        .grade-F { color: #dc3545; font-weight: bold; }
    </style>
</head>

<body>
     <div class="container">
        <h1>成績判定システム</h1>


        <?php
        $students = [
            ["name" => "田中太郎", "score" => 85],
            ["name" => "佐藤花子", "score" => 92],
            ["name" => "鈴木一郎", "score" => 78],
            ["name" => "高橋美咲", "score" => 65],
            ["name" => "伊藤健太", "score" => 58],
        ];

   // 成績判定関数
        function getGrade($score) {
            if ($score >= 90) {
                return ["grade" => "A", "status" => "優秀"];
            } elseif ($score >= 80) {
                return ["grade" => "B", "status" => "良好"];
            } elseif ($score >= 70) {
                return ["grade" => "C", "status" => "普通"];
            } elseif ($score >= 60) {
                return ["grade" => "D", "status" => "要努力"];
            } else {
                return ["grade" => "F", "status" => "不合格"];
            }
        }

        // 統計情報の初期化
        $pass_count = 0;
        $fail_count = 0;
        $total_score = 0;

        // 個別成績の表示
        echo "<h2>【個別成績】</h2>";
        echo "<table>";
        echo "<tr><th>名前</th><th>点数</th><th>評価</th><th>判定</th></tr>";

        foreach ($students as $student) {
            $name = $student["name"];
            $score = $student["score"];
            $result = getGrade($score);
            $grade = $result["grade"];
            $status = $result["status"];

            // 統計情報の集計
            $total_score += $score;
            if ($score >= 60) {
                $pass_count++;
            } else {
                $fail_count++;
            }

            // テーブル行の表示
            echo "<tr>";
            echo "<td>{$name}</td>";
            echo "<td>{$score}点</td>";
            echo "<td class='grade-{$grade}'>{$grade}</td>";
            echo "<td>{$status}</td>";
            echo "</tr>";
        }

        echo "</table>";

        // 平均点の計算
        $average = $total_score / count($students);

        // 統計情報の表示
        echo "<h2>【統計情報】</h2>";
        echo "<div class='stats'>";
        echo "<p>合格者数: <strong>{$pass_count}人</strong></p>";
        echo "<p>不合格者数: <strong>{$fail_count}人</strong></p>";
        echo "<p>平均点: <strong>" . number_format($average, 1) . "点</strong></p>";
        echo "</div>";
        ?>
    </div>
</body>
</html>
