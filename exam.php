﻿<?php
include 'header.php';

include 'Functions.php';
$user_id = $_SESSION['user_id'];

$get_history_details = get_history_details($user_id);




if(isset($_GET['exam_id'])){
	$_SESSION['exam_id']=$_GET['exam_id'];
	header("location:exam.php");
}

$ex_qury=mysqli_query($conn,"SELECT *
FROM lms_exam_details ed
WHERE ed.lms_exam_id='$_SESSION[exam_id]'");
$ex_resalt=mysqli_fetch_assoc($ex_qury);

if(!isset($_SESSION['exam_id'])){
	header("location:exam_list.php");
}
?>


<!DOCTYPE html>
<html lang="en">

	<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, shrink-to-fit=9">
	<meta name="description" content="englishwithera.com">
	<meta name="author" content="englishwithera.com">
	<title>Prüfung | Online Learning Platforms | Studentin Panel</title>

	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="dist/jquery.quiz-min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="dist/jquery.quiz-min.js"></script>
<style type="text/css">
	
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  color: #000000;
}
#quiz-restart-btn {
  display: none !important;
}
/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #000000;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}


.main-div{
		padding: 10px;
		width: 100%;
		display: block;
		background: #EEEEEE;
		border-radius: 5px;
		margin-bottom: 10px;
		white-space: pre-line;
		transition: 0.5s;
		line-height: 15px;
		font-size: 16px;
}

.question{
  color: #007bff;
  width: 100%;
  padding: 5px;
  background-color: #cccccc;
}
	.main-div:hover{
		background-color: rgba(70,130,180,0.2);
	}
	.a-div{
		padding-left: 20px;
	}
	.header-div{
		padding: 10px;
		width: 100%;
		background-color: #000000;
		color: #FFFFFF;
		margin-bottom: 20px;
		text-align: center;
	}
	.Time_dis{
		position: fixed;
		float: right;
		top: 60px;
		right: 0px;
		padding: 10px;
		background-color: darkred;
		color: #FFFFFF;
		font-weight: bold;
		font-size: 16px;
		border-top-left-radius: 50px;
		border-bottom-left-radius: 50px;
		transition: 0.5s;
		text-align: center;
		border-left: 5px solid red;
		z-index: 9999;
		height: 70px;
	}
	.Time_dis p{
		font-size: 11px;
		padding-left: 5px;
	}
	.sub_bt{
		padding: 10px;
		border-radius: 5px;
		outline: none;
		border: none;
		background: green;
		color: white;
		font-weight: bold;
		font-size: 14px;
		text-decoration: none;
		margin-top: 10px;
		margin-bottom: 10px;
		cursor: pointer;
	}

</style>


	
	</head>

<body>
<section class="profile-background" style="background : url(https://webdesign-finder.com/edlane/wp-content/uploads/2019/04/slide01.jpg);">
<div class="container">
<div class="emp-profile">
<div class="col-lg-12 col-md-12">
	<div class="wrapper">
		<div class="sa4d25">
			<div class="container-fluid">			
				<div class="row">
				<div class="col-lg-12">
				<h4 class="item_title">Prüfungsdetails</h4>
					
<div class="Time_dis">
<div id="demo">Time: 0:0:0</div>
<p>Ends automatically</p>
</div>
				</div>
				</div>
				<div class="row mb-4">

<div class="col-sm-12">
<div id="quiz">
  
  <div id="quiz-start-screen">
    <p><a href="#" id="quiz-start-btn" class="quiz-button">Start</a></p>
	
  </div>

</div>
<script>
  $('#quiz').quiz({
    //resultsScreen: '#results-screen',
    counter: true,
    //homeButton: '#custom-home',
	allowIncorrect: false,
    counterFormat: 'Frage %current of %total',
    questions: [
		<?php
			$q_count=0;
			$q_qury=mysqli_query($conn,"SELECT *FROM lms_mcq_questions mcq WHERE mcq.exam_id='$_SESSION[exam_id]'");
			while($q_resalt=mysqli_fetch_assoc($q_qury)){
			$q_count++; ?>
      {
        'q': '<?php echo $q_count; ?>.<?php echo $q_resalt['question']; ?>',
        'options': [
          '<?php echo $q_resalt['ans_1']; ?>',
          '<?php echo $q_resalt['ans_2']; ?>',
          '<?php echo $q_resalt['ans_3']; ?>',
          '<?php echo $q_resalt['ans_4']; ?>'
        ],
        'correctIndex': <?php echo $q_resalt['ans']; ?>,
        'correctResponse': 'Custom correct response.',
        'incorrectResponse': 'Custom incorrect response.'
      },
	  <?php
		}
	  ?>
      
    ],
	
	finishCallback: function(){
		$.ajax({
             type: "POST",
             url: "exam_save.php",
             data: {user_id: '<?php echo $user_id?>',exam_id: '<?php echo $_SESSION['exam_id'];?>',status: '1'},
             success: function(msg){
              if(msg==true){
				console.log('true');
				//print_id(<?php echo $user_id;?>);
			  }else{
			   	print_id(<?php echo $user_id;?>);
			  }
         }
	});
	},

	
  });
  
  
</script>




</div>



			</div>
			</div>
		</div>
		

	</div>
	<!-- Body End -->
	</div>
</div>
</section>	
<?php include 'footer-new.php';?> 
<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php date_default_timezone_set("Asia/Colombo"); echo date("M d, Y H:i:s",time()+60*$ex_resalt['lms_exam_time_duration']); ?>").getTime();

// Aktualisieren the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML ="Time: " + hours + ":"
  + minutes + ":" + seconds;

  // If the count down is finithed, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "Time: 0:0:0";
	  window.location="results.php";
	  //document.getElementById("quiz").submit();
  }
}, 1000);

function answer_mark(paper,q,a){
	console.log(paper+" "+q+" "+a);
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
	//document.getElementById("demo").innerHTML = this.responseText;
	}
	xhttp.open("GET", "ajax_exam_answer_mark.php?paper="+paper+"&q="+q+"&a="+a, true);
	xhttp.send();
}

function print_id(user_id){
	//console.log(paper+" "+q+" "+a);
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
	//document.getElementById("demo").innerHTML = this.responseText;
	}
	xhttp.onreadystatechange = function() { // listen for state changes
		if (xhttp.readyState == 4 && xhttp.status == 200) { // when completed we can move away
			window.location = "exam_list.php";
		}
		}
	xhttp.open("GET", "print_id.php?user_id="+user_id, true);
	xhttp.send();
	
}	

$("#quiz-restart-btn").removeAttr("style").hide();
//$("#quiz-restart-btn").css("display","none")
</script>

</body>
</html>