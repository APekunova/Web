<?php
$method = $_SERVER['REQUEST_METHOD'];
$dataAsJson = file_get_contents("php://input");
$dataAsArray = json_decode($dataAsJson, true);
var_dump($dataAsArray);

foreach ($dataAsArray as $key => $value) {
  echo "{$key} = {$value} </br>";
}
const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'blog';

function createDBConnection(): mysqli {
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    return $conn;
  }
  
function closeDBConnection(mysqli $conn): void {
    $conn->close();
  }
$conn = createDBConnection();
$sql = "SELECT id FROM post";
$result = $conn->query($sql);
$getId = $result->fetch_all(MYSQLI_ASSOC);  
var_dump(end(end($getId)));
$lastId = end(end($getId));
$lastIdInt = intval($lastId) + 1;
var_dump($lastIdInt);
$lastIdStr = strval($lastIdInt);

saveImage($dataAsArray['image_post_url'], 'image_post_'.$lastIdStr);
saveImage($dataAsArray['image_postcard_url'], 'image_postcard_'.$lastIdStr);
saveImage($dataAsArray['author_url'], 'author_'.$lastIdStr);

function saveFile(string $file, string $data): void {
      $myFile = fopen($file, 'w');
      if ($myFile) {
        $result = fwrite($myFile, $data);
        if ($result) {
          echo 'Данные успешно сохранены в файл';
        } else {
          echo 'Произошла ошибка при сохранении данных в файл';
        }
        fclose($myFile);
      } else {
        echo 'Произошла ошибка при открытии файла';
      }
    }
  
function saveImage(string $imageBase64, string $imageName) {
    $imageBase64Array = explode(';base64,', $imageBase64);
    // $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
    $imageDecoded = base64_decode($imageBase64Array[1]);
    saveFile("images/{$imageName}.jpeg", $imageDecoded);
  }

echo(count($dataAsArray));
if (!(empty($dataAsArray['title']) && empty($dataAsArray['subtitle']) && empty($dataAsArray['content']) && empty($dataAsArray['author']) &&
    empty($dataAsArray['author_url']) && empty($dataAsArray['publish_date']) && empty($dataAsArray['image_post_url']) && empty($dataAsArray['image_postcard_url']) && empty($dataAsArray['featured']))) {
      var_dump('Success!!!');
  $conn = createDBConnection();
  $sql = "INSERT INTO post (
     title, 
     subtitle, 
     content,
     author,
     author_url,
     publish_date,
     image_post_url,
     image_postcard_url,
     featured,
     img_name,
     button
  ) 
  VALUES
                ('{$dataAsArray['title']}', '{$dataAsArray['subtitle']}',
                '{$dataAsArray['content']}', '{$dataAsArray['author']}',
                 'author_{$lastIdStr}.jpeg', '{$dataAsArray['publish_date']}',
                'image_post_{$lastIdStr}.jpeg', 'image_postcard_{$lastIdStr}.jpeg',
                 '{$dataAsArray['featured']}', 'image_{$lastIdStr}',
                  '{$dataAsArray['button']}');";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
  //var_dump($featured_post);
  closeDBConnection($conn);
}

?>