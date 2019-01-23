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
  body {
    background-color: #222;
    color: #EEE;
  }
  #form {
    width: 40%;
  }
  #matrix {
    
    border-collapse: collapse;
    width:60%;
  }
 
  table, th, td {
    border: 1px solid #EEE;
    border-radius: 10px;
  }
  td {
    min-width: 25px;
    min-height: 25px;
    text-align: right;
  }
  .clearfix:after {
    content=" ";
    clear: both;
    display:block;
    
   }
  #matrix,
  #form {
    float: left;
    box-sizing: border-box;
    padding:2em;

  }
  label {
  margin: 1em;
  }
  #x,
  #y{
  display:block;
  border: 1px solid #999;
  border-radius: 2em;
   margin: 1em ;
    
  }
  #z{
    color: #EEE;
    padding: 1em;
    background-color: #095;
    margin: 2em;
    border-radius: 2em;
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
<div class="clearfix">
<form id="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <p><label for="x">Broj stupaca:
        <input type="number" id="x" name="x">
    </label></p>
    <p><label for="y">Broj redova:
        <input type="number" id="y" name="y">
    </label></p>
    <input id="z" type="submit" value="Prikaži matricu">
</form>
<table id="matrix">
<?php
// declare number of rows and columns
$x=(int)htmlspecialchars($_POST['x']);
$y=(int)htmlspecialchars($_POST['y']);

if ($x && $y){
    $n=$x*$y;
}
//function returns an array of elements supposed to form the table
$order=function(int $n): array
{
    $arr=[];
    for( $i=0; $i<$n; $i++) {
        $arr[]=$i+1;
    }
    return $arr;
};
//echo print_r($order($n));
?>
</table>
</div>
</body>
</html>
