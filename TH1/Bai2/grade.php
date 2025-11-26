<?php
$target_file = "uploads/Quiz.txt"; // File quiz có sẵn

if (!file_exists($target_file)) {
    echo "Không tìm thấy file Quiz.txt!";
    exit;
}

$content = file_get_contents($target_file);
$questions = preg_split("/\n\s*\n/", trim($content));

$score = 0;

foreach ($questions as $index => $q) {
    $lines = explode("\n", $q);
    array_shift($lines);          // loại bỏ câu hỏi
    $answer_line = trim(array_pop($lines)); // lấy dòng ANSWER
    $correct = str_replace('ANSWER:', '', strtoupper($answer_line));
    $correct_answers = preg_split('/[, ]+/', trim($correct));

    $user_answer = $_POST["q$index"] ?? [];

    if (!is_array($user_answer)) {
        $user_answer = [$user_answer]; // radio -> thành mảng
    }

    sort($user_answer);
    sort($correct_answers);

    if ($user_answer == $correct_answers) {
        $score++;
    }
}

$total = count($questions);
echo "<h2>Chúc mừng! Bạn đã hoàn thành bài thi.</h2>";
echo "<p>Điểm của bạn: $score / $total</p>";
echo "<form action='index.php' method='get'>";
echo "<button type='submit'>Quay lại</button>";
?>
