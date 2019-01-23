<?php
/**
 * Created by PhpStorm.
 * User: mia
 * Date: 23.01.19.
 * Time: 14:30
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);
declare(strict_type=1);
$style=<<<EOT
<style>
table {
    border-collapse: collapse;
  }
  table, th, td {
    border: 1px solid black;
  }
  td{
    min-width: 25px;
    min-height: 25px;
    text-align: right;
  }
  td:empty:after {
    content: ".";
    color: transparent;
    visibility: hidden;
  }
</style> 
EOT;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Z3</title>
    <?php echo $style ?>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <p><label for="x">Broj stupaca:
        <input type="number" id="x" name="x">
    </label></p>
    <p><label for="y">Broj redova:
        <input type="number" id="y" name="y">
    </label></p>
    <input type="submit" value="Prikaži matricu">
</form>
<table>
<?php
// declare number of rows and columns
$x=(int)htmlspecialchars($_POST['x']);
$y=(int)htmlspecialchars($_POST['y']);

if ($x && $y){
    $n=$x*$y;
}
echo "n je ". $n;
//$order=function(int $n): array
//{
//
//}
?>
</table>

</body>
</html>
