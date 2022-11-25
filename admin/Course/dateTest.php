<?php 
// $weekday="MONDAY";
// $dateFromString="Y-m-d";
// $dateToString="2021-4-2";
// $a=getWeekDayInRange($weekday, $dateFromString, $dateToString, $format = 'Y-m-d');
// echo $a;
//    function getWeekDayInRange($weekday, $dateFromString, $dateToString, $format = 'Y-m-d')
//     {
//         $dateFrom = new \DateTime($dateFromString);
//         $dateTo = new \DateTime($dateToString);
//         $dates = [];

//         if ($dateFrom > $dateTo) {
//             return $dates;
//         }

//         if (date('N', strtotime($weekday)) != $dateFrom->format('N')) {
//             $dateFrom->modify("next $weekday");
//         }

//         while ($dateFrom <= $dateTo) {
//             $dates[] = $dateFrom->format($format);
//             $dateFrom->modify('+1 week');
//         }

//         return $dates;
//     }


   function displayDates($date1, $date2, $format = 'd-m-Y ' ) {
      $dates = array();
      $current = strtotime($date1);
      $date2 = strtotime($date2);
      $stepVal = '+1 day';
      while( $current <= $date2 ) {
         $dates[] = date($format, $current);
         $current = strtotime($stepVal, $current);
      }
      return $dates;
   }
   $date = displayDates('2021-3-10', '2021-4-4');
   // var_dump($date);
   $a=array();
   foreach ($date as $key => $value) {
 $day=strtotime($value);
 $date = date('l', $day);
 // var_dump($date);
 if($date=='Wednesday'){
 	$a[]=$value;
// array_push($a, $value);
 }
   }

  echo"xxxxxxxxxxxxxx";
   var_dump($a);
// $date = strtotime($date);
// $date = date('l', $date);
// var_dump($date)
?>