<?php

if (isset($_POST['submit'])) {

if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "video/mp4") || ($_FILES["file"]["type"] == "video/mkv")  && ($_FILES["file"]["size"] < 102400000)//Approx.1000kb files can be uploaded.
)){

if ($_FILES["file"]["error"] > 0) {
echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
} else {

echo "<span>Your File Uploaded Succesfully...!!</span><br/>";
echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";
if (file_exists("upload/" . $_FILES["file"]["name"])) {
echo $_FILES["file"]["name"] . " <b>already exists.</b> ";
} else {
move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
$imgFullpath = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/'. "upload/" . $_FILES["file"]["name"];
echo "<b>Stored in:</b><a href = '$imgFullpath' target='_blank'> " .$imgFullpath.'<a>';

}

}
} else {
echo "<span>***Invalid file Size or Type***<span>";
}
}
?>