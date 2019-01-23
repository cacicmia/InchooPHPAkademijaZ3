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
   text-align:center;
      
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
        <input type="number" id="x" name="x" value="4">
    </label></p>
    <p><label for="y">Broj redova:
        <input type="number" id="y" name="y" value="4">
    </label></p>
    <input id="z" type="submit" value="Prikaži matricu">
</form>
<table id="matrix">
<?php
// declare number of rows and columns
$x=(int)htmlspecialchars($_POST['x']);
$y=(int)htmlspecialchars($_POST['y']);

//function
   function setElements(int $x,int $y){
       $posX=0;
       $posY=0;
       $lastRow=$y-1;
       $lastCol= $x-1;
       $table=[];
      while($posX<=$lastRow && $posY<=$lastCol){

          for ($i=$posY; $i<=$lastCol; $i++){
              $table[]="{$posX},{$i}";
          }
          $posX++;
          for ($i=$posX; $i<=$lastRow; $i++){
              $table[]="{$i},{$lastCol}";
          }
          $lastCol--;
          if ($posX<=$lastRow){
              for ($i=$lastCol; $i>=$posY; $i--){
                  $table[]="{$lastRow},{$i}";
              }
              $lastRow--;
          }
          if ($posY<=$lastCol){
              for($i=$lastRow; $i>=$posX; $i--){
                  $table[]="{$i},{$posY}";
              }
              $posY++;
          }

      }
      return $table;
   }
$table=setElements($x,$y);
for ($i=0;$i<$x; $i++) {
    echo "<tr>";
    for ($j=0; $j<$y; $j++) {
        $v=array_search("{$i},{$j}",$table)+1;
        echo "<td>{$v}</td>";
    }
    echo "</tr>";
}

?>
</table>
</div>
</body>
</html>
