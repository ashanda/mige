<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Multipl jQuery UI Datepicker in a HTML page</title>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
  <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
 
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../assets/css/datepickernew.css"> 


</head>
<body>

<div class="input-group date form-group" >
    <input type="text" class="form-control" id="datepicker" name="Dates" placeholder="Select days" required />
    <span class="input-group-addon"><span class="count"></span></span>
</div>
</body>
</html>
  <script type="text/javascript">
$(document).ready(function() {
    $('#datepicker').datepicker({
        startDate: new Date(),
        multidate: true,
        format: "dd/mm/yyyy",
        daysOfWeekHighlighted: "5,6",
        language: 'en'
    }).on('changeDate', function(e) {
      
        // `e` here contains the extra attributes
       // $(this).find('.input-group-addon .count').text(' ' + e.dates.length);
    });
});

  </script>