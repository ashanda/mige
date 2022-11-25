<?php
include_once '../Config/Connection.php';
include_once '../includes/Functions.php';
 $partsCount = $_REQUEST['partsCount'];
 $partType = $_REQUEST['partType'];

$get_all_categories = get_all_categories();
$get_location_list = get_location_list();
$get_all_insructors = get_all_insructors();
?>
 <div class="col-12">
<div class="card no-b">
    <div class="card-header white pb-0">
        <div class="d-flex justify-content-between">
            <div class="align-self-center">
                <ul class="nav nav-pills mb-3" role="tablist">
                    <?php for ($i=1; $i <=$partsCount ; $i++) { 
                        // code...
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if($i==1){echo 'active';} ?> show r-20" id="w3--tab<?=$i?>" data-toggle="tab" href="#w3-tab<?=$i?>" role="tab" aria-controls="tab<?=$i?>" aria-expanded="true" aria-selected="true">Part <?=$i?></a>
                    </li>
                    <?php } ?>
                   
                </ul>
            </div>
         

        </div>
    </div>
    <div class="card-body no-p">
        <div class="tab-content">
              <?php for ($i=1; $i <=$partsCount ; $i++) { 
                        // code...
                    ?>
            <div class="tab-pane fade show <?php if($i==1){echo 'active';} ?>" id="w3-tab<?=$i?>" role="tabpanel" aria-labelledby="w3-tab<?=$i?>">
                
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group m-0">
                        <label for="category_id" class="col-form-label s-12">Instructor</label>
                        <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" name="instructor_id[]" id="instructor_id" >
                            <option value="" >Select Instructor</option>
                            <?php foreach ($get_all_insructors as $key) 
                            {
                                ?>
                                <option value="<?php echo $key['instructor_id'];?>"><?php echo $key['username'];?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group m-0">
                        <label for="Flexible_payment" class="col-form-label s-12">Flexible Payment</label>
                        <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" name="flexible_payment[]"  required>
                            <option value="">Select flexible payment</option>
                            <option value="0">One-to-one</option>
                            <option  value="1">Together</option>
                        </select>
                    </div>
                </div>
             
            </div>
             <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group m-0">
                        <label for="course_date" class="col-form-label s-12">Start Date</label>
                        <input name="course_date[]" placeholder="Enter Course Date" class="form-control r-0 light s-12 date" type="text" id="datepicker-part<?=$i?>-1" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group m-0">
                        <label for="course_date" class="col-form-label s-12">End Date</label>
                        <input name="course_end_date[]" placeholder="Enter Course Date" class="form-control r-0 light s-12 date" type="text" id="datepicker-part<?=$i?>-2" autocomplete="off" required>
                       <span style="color: red;" id="error"><?php if(isset($error1)) { echo $error1;}?></span>
                    </div>
                </div>
            </div>
             <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group m-0">
                    <label for="category_id" class="col-form-label s-12">Weekly Day</label>
                  <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" name="weekly_day[]"  required>
                   <option value="">Choose weekly day.</option>
                   <option  value="1">Monday</option>
                   <option  value="2">Tuesday</option>
                   <option  value="3">Wednesday</option>
                   <option  value="4">Thrusday</option>
                   <option  value="5">Friday</option>
                   <option  value="6">Saturday</option>
                   <option  value="7">Sunday</option>
                </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group m-0">
                    <label for="category_id" class="col-form-label s-12">Select Week or month</label>
                  <select class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" name="week_differ[]"  required>
                   <option value="">Choose week or month.</option>
                   <option  value="1">Every week</option>
                   <option  value="2">Every 2nd week</option>
                   <option  value="3">Every 3rd week </option>
                   <option  value="4">Once a Month</option>
                  
                  </select>
                    </div>
                </div>
            </div>
          
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group m-0">
                        <label for="course_time" class="col-form-label s-12">Course Start Time</label>
                        <input name="course_time[]" placeholder="Enter Course Time" class="form-control r-0 light s-12 " type="time" required autocomplete="off">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group m-0">
                        <label for="course_end_time" class="col-form-label s-12">Course End Time</label>
                        <input name="course_end_time[]" placeholder="Enter Course End Time" class="form-control r-0 light s-12 " type="time" required autocomplete="off">
                    </div>
                </div>
            </div>
             <div class="form-row">
                 <div class="col-md-6">
                    <div class="form-group m-0">
                       <label for="course_title_eng" class="col-form-label s-12">Course Title(In English)</label>
                       <input name="course_title_eng[]" placeholder="Course Title(In English)" class="form-control r-0 light s-12" type="text" id="course_title_eng" autocomplete="off" required>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group m-0">
                       <label for="course_title_ger" class="col-form-label s-12">Course Title(In German)</label>
                       <input name="course_title_ger[]" placeholder="Course Title(In German)" class="form-control r-0 light s-12" type="text" id="course_title_ger" autocomplete="off" required>
                    </div>
                </div>
             </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group m-0">
                        <label for="price" class="col-form-label s-12">Price</label>
                        <input name="price[]" placeholder="Enter Price Here" class="form-control r-0 light s-12 " type="text" required autocomplete="off">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group m-0">
                        <label for="slots" class="col-form-label s-12">Slots</label>
                        <input name="slots[]" placeholder="Enter Slots Here" class="form-control r-0 light s-12 " type="text" required>
                        <span class="error" style="color: red"><?php if($slot_error){echo $slot_error;}?></span>
                    </div>
                </div>
            </div> 
            <div class="form-row">
                <?php if($partType==2){ ?>
                <div class="col-md-6" id="sub_parts">
                    <div class="form-group m-0">
                        <label for="part" class="col-form-label s-12">Parts</label>
                        <input type="text" name="sub_part_no[]" id='sub_part_no' value="<?=$i?>" >
                    </div>
                </div>
                <?php }else{ ?>
                <div class="col-md-6" id="parts">
                    <div class="form-group m-0">
                        <label for="part" class="col-form-label s-12">Part</label>
                        <input type="text" name="part[]" name="part" id='part' value="<?=$i?>">
                    </div>
                </div>
                <?php } ?>
                
            </div>
            </div>
            <?php } ?>
        </div>

    </div>
</div>
</div>

<?php for ($i=1; $i <=$partsCount ; $i++) {  ?>

<script type="text/javascript">
        /*$(function () {
            $("#datepicker-part<?=$i?>-1").datepicker({
                // numberOfMonths: 2,
                dateFormat: 'mm-dd-yy',
                 minDate: "+0", firstDay: 1,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() + 1);
                    $("#datepicker-part<?=$i?>-2").datepicker("option", "minDate", dt);
                }
            });
            $("#datepicker-part<?=$i?>-2").datepicker({
                // numberOfMonths: 2,
                dateFormat: 'mm-dd-yy',
                  minDate: "+0", firstDay: 1,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() - 1);
                    $("#datepicker-part<?=$i?>-1").datepicker("option", "maxDate", dt);
                }
            });
        });
*/

$(function () {
      var dateToday = $('#datepicker-part<?=$i?>-1').val();
      var dates = $("#datepicker-part<?=$i?>-1,#datepicker-part<?=$i?>-2").datepicker({
        dateFormat: 'dd-mm-yy',
        minDate: dateToday,
        changeMonth: true,
        firstDay: 1,
        changeYear: true,
        onSelect: function(selectedDate) {
            var option = this.id == "datepicker-part<?=$i?>-1" ? "minDate" : "maxDate",
                instance = $(this).data("datepicker"),
                date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
                            if(option == "minDate"){
                                //var selectedDate = new Date(date);
                                var msecsInADay = 86400000;
                                 date = new Date(date.getTime() + msecsInADay);
                            }
            dates.not(this).datepicker("option", option, date);
        }
     });

});
</script>

<?php } ?>