<?php 
$target_file = "uploads/Quiz.txt"; // file quiz có sẵn

if (!file_exists($target_file)) {
    echo "Không tìm thấy file Quiz.txt!";
    exit;
}

$content = file_get_contents($target_file);
$questions = preg_split("/\n\s*\n/", trim($content));

echo "<h2>Bài thi trắc nghiệm</h2>";
echo "<form action='grade.php' method='post'>";

foreach ($questions as $index => $q) {
    $lines = explode("\n", $q);
    $question_text = trim(array_shift($lines)); // lấy câu hỏi
    array_pop($lines); // bỏ dòng ANSWER
    $options = $lines;

    echo "<div style='margin-bottom:20px;'>";
    echo "<p><b>Câu " . ($index+1) . ": $question_text</b></p>";

    if ($index + 1 >= 49 || $index + 1 == 9 || $index + 1 == 25) {
        // Checkbox (nhiều đáp án)
        foreach ($options as $opt) {
            $key = substr(trim($opt), 0, 1);
            echo "<label><input type='checkbox' name='q{$index}[]' value='$key'> $opt</label><br>";
        }
    } else {
        // Radio button (1 đáp án)
        foreach ($options as $opt) {
            $key = substr(trim($opt), 0, 1);
            echo "<label><input type='radio' name='q$index' value='$key'> $opt</label><br>";
        }
    }

    echo "</div>";
}

echo "<button type='submit' name='submit'>Nộp bài</button>";
echo "</form>";
?>
