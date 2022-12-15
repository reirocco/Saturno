<?php

for($i=0; $i<3;$i++){ 
  creaDisposizione();
}

function creaDisposizione(){
  $creata = false;
  while(!$creata){
    $positions = makeSequence();
    $number = array(0,0,0,0,0,0,0,0,0);
    foreach($positions as $x){
      if($x == 1){
        $number[0] ++;;
      }else if($x == 2){
        $number[1]++;
      }else if($x == 3){
        $number[2] ++;;
      }else if($x == 4){
        $number[3] ++;;
      }else if($x == 5){
        $number[4] ++;;
      }else if($x == 6){
        $number[5] ++;;
      }else if($x == 7){
        $number[6] ++;;
      }else if($x == 8){
        $number[7] ++;;
      }else if($x == 9){
        $number[8] ++;;
      }
    }
    if($number[0] == 9 && $number[1] == 10 && $number[2] == 10 && $number[3] == 10 && $number[4] == 10 && $number[5] == 10 && $number[6] == 10 && $number[7] == 10 && $number[8] == 11){
      echo "casella creata";
      echo "<br>";
      $creata = true;
    }else {
      //echo "creazione fallita";
    }
  }
}


//la funzione ritorna un vettore con un elenco di numeri da 1 a 9 con ripetizioni.
function makeSequence(){
  $positions = array();
  $tmpPosition = array();

  for($j = 0; $j < 18; $j++){
    $i = 0;
    while($i < 5){
      $tmp = random_int(1,9);
      $trovato = cercaDoppio($tmpPosition,$tmp);
      if(!$trovato){
        $tmpPosition[$i] = $tmp;
        $i++;
      } 
    }
    //showVettore($tmpPosition);
    $positions = concatenaArray($positions,$tmpPosition);
  }
  //showVettore($positions);
  //showVettore($positions);
  return $positions;
}



  function concatenaArray($arr1,$arr2){
    foreach($arr2 as $x){
      $arr1[count($arr1)+1] = $x;
    }
    return $arr1;
  }


  function cercaDoppio($vett,$val){
    $trovato = false;
    $i = 0;
    while(!$trovato && $i < count($vett)){
      $trovato = $vett[$i] == $val;
      $i++;
    }
    return $trovato;
  }


  function showVettore($vett){
    echo "<br>";
    foreach($vett as $x){
      echo $x;
    }
    echo "<br>";
  }
  /*for ($row = 0; $row < 4; $row++) {
  echo "<p><b>Row number $row</b></p>";
  echo "<ul>";
  for ($col = 0; $col < 3; $col++) {
    echo "<li>".$cars[$row][$col]."</li>";
  }
  echo "</ul>";
  }*/


?>