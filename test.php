<?php
// ミュウのデータを取得するAPIのURL
$api_url = "https://pokeapi.co/api/v2/pokemon/151/";

// APIからデータを取得
$response = file_get_contents($api_url);

// データが取得できたか確認
if ($response === FALSE) {
    echo "データの取得に失敗しました";
    exit;
}

// JSONデータを配列に変換
$pokemon_data = json_decode($response, true);

// ミュウの情報を取得
$name = $pokemon_data['name']; // 名前
$types = $pokemon_data['types']; // タイプ
$abilities = $pokemon_data['abilities']; // 能力
$weight = $pokemon_data['weight']; // 体重
$height = $pokemon_data['height']; // 身長

// 結果を表示
echo "<h1>$name の情報</h1>";
echo "<p><strong>名前:</strong> $name</p>";
echo "<p><strong>身長:</strong> " . $height / 10 . " メートル</p>";  // APIの身長はcm単位なので10で割る
echo "<p><strong>体重:</strong> " . $weight / 10 . " キログラム</p>";  // APIの体重はhg単位なので10で割る

// ミュウのタイプを表示
echo "<p><strong>タイプ:</strong><br>";
foreach ($types as $type) {
    echo $type['type']['name'] . "<br>";
}
echo "</p>";

// ミュウの能力を表示
echo "<p><strong>能力:</strong><br>";
foreach ($abilities as $ability) {
    echo $ability['ability']['name'] . "<br>";
}
echo "</p>";
?>
