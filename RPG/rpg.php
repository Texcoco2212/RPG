<?php
//RPG作る
//http://localhost/RPG/rpg.php
$msg = ' ' ;
$isFinish = False ;
$isLast = False ;
if(isset($_POST["lv"])) {
  $lv = $_POST["lv"] ;
}else{
  $lv = 1 ;
}
if(isset($_POST["mhp"])){
  $mhp = $_POST["mhp"] ;
}else{
  $mhp = 5 ;
  $msg.= 'モンスターがあらわれた<br>' ;
}
if(isset($_POST["isLast"])){
  $isLast = $_POST["isLast"] ;
}
    if(isset($_POST["next"])){
    $mhp = 5 ;
    $msg.= 'モンスターがあらわれた<br>' ;
  }
  if(isset($_POST["battle"])){
  $mhp-- ;
  $msg.= 'モンスターに１のダメージ<br>' ;
}
if(isset($_POST["last"]) && $isLsat == False){
  $mhp = 10 ;
  $msg = 'ボスがあらわれた<br>' ;
  $isLast = True ;
 }elseif(isset($_POST["last"])){
   $mhp-- ;
   $msg.= 'モンスターに１のダメージ<br>' ;
 }
if($mhp <= 0) {
  $mhp = 0 ;
  $lv ++ ;
  $isFinish = True ;
  $msg = 'モンスターを倒した<br>' ;
  if($isLast == True){
    echo 'ボスを倒した<br>' ;
    echo'世界に平和が戻った<br> ' ;
    exit ;
  }
}
echo '<form method = "post">' ."\n";
echo '<input type = "hidden" name = "mhp" value ="' .$mhp. '">' ."\n" ;
echo '<input type = "hidden" name = "lv" value ="' .$lv. '">'. "\n" ;
echo '<input type = "hidden" name = "isLast" value ="' .$isLast. '">'. "\n" ;
if($isFinish == True){
  echo '<input type = "submit" name = "next" value ="次のモンスターを探す">' ."\n" ;
}
if($isLast == False){
echo '<input type = "submit" name = "battle" value ="モンスターと戦う">' ."\n" ;
}
if($lv>=3){
  echo '<input type = "submit" name = "battle" value ="ボスと戦う">' ."\n" ;
}
echo '</form><br>'."\n" ;
echo 'あたなのレベル'  .$lv. '<br>' . "\n" ;
echo 'モンスターのHP' .$mhp. '<br>' . "\n" ;
echo $msg. "\n" ;
?>