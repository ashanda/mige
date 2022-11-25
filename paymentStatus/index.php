<?php
include '../header.php';
include '../Functions.php';
if($_SESSION['transaction_id']){
    $_SESSION['transaction_id'] = "";
}
?> 
 <div class="container-fluid back-img-design">
    <div class="row">
       
        <div class="d-flex justify-content-center align-items-center w-100">
            <div class="w-75 d-flex">
                <div class="w-25 m-20 text-center p-3 back-design d-flex justify-content-center align-items-center">
                    <div>
                        <div class="position-gif"><img class="img-fluid max-20" alt="gif" id="gif" src="../images/source.gif"></div>
                    
                        <h1 id="message"><?php echo $translation['_Thank_You_']?></h1>
                    </div>
                </div>
               
                <div class="w-75 p-4  design2 connection-break text-center" id="connection-break">
                <h1 class="SSE" id="error_heading"></h1>
                    <img class="img-fluid max-51" alt="gif" id="error_image">
                <p class="EEP" id="error_text"></p>
                <form action="<?=$config['base_url'];?>/book/">
                    <div class="w-100 text-center">
                            <button class="back_FS" ><?php echo $translation['_back_title_']?></button>
                    </div>
                </form>

                </div>
                <div class="w-75 p-4  design2" id="table-data">
                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <h4><?php echo $translation['_Your_order_is_']?></h4>
                        <!-- 1708031724431131 -->
                        <h5><?php echo $translation['_Transaktions_']?><b id="transaction_id"></b></h5></div>
                    <table class="table TTB">
                        <tbody>
                            <tr>
                                <th><?php echo $translation['_Product_']?></th>
                                <th><?php echo $translation['_Total2_']?></th>
                            </tr>
                        </tbody>
                        <tbody id="course_detail">
                            
                        </tbody>
                        <tbody id="total">
                            <tr>
                                <td><b><?php echo $translation['_Subtotal_']?></b></td>
                                <td id="subtotal"></td>
                            </tr>
                            <tr>
                                <td><b><?php echo $translation['_Total2_']?></b></td>
                                <td id="total_amount"></td>
                            </tr>
                        </tbody>
                    </table>
                    <form action="profile.php" class="float-left" style="width: 0">
                        <div class="text-center">
                            <button class="proceed-page"><?php echo $translation['_proceed_to_']?></button>
                        </div>
                    </form>
                   
                </div>

            </div>
        </div>
    </div>
<input type="hidden" name="billing_id" id="billing_id">
<input type="hidden" id="transaction_id_value">
</div>
<?php include '../footer-new.php';?>   
<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/custom.js"></script>
<script type="text/javascript" src="../js/anim.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        
        // $('#billing_id').val('0');
       /* $('#billing_id').val(sessionStorage.getItem("billing_id"));
        sessionStorage.removeItem('billing_id');
        sessionStorage.removeItem('final_course_id');

        var billing_id = $('#billing_id').val(); */
        var transaction_id = "<?=$_REQUEST['datatransTrxId']?>";
       /* sessionStorage.getItem("user_id")*/
      // var user_id = '73';
       /* if(sessionStorage.getItem("user_id"))
        {*/
            if(transaction_id)
            {
                if(transaction_id=='0')
                {
                    $('#message').text('Sorry');
                    $('#error_heading').text('Transaction Failed');
                    $('#error_text').text('Your transaction is failed. Please try again.');
                    $('#gif').attr('src','../images/down.png');
                    $('#error_image').attr('src','../images/transaction_fail.png');
                    $('#connection-break').removeClass('connection-break');
                    $('#table-data').addClass('connection-break');
                }
                else
                {
                    var url = '<?=$config['base_url']?>/GetPhpData.php';
                    $.ajax({
                        url : url,
                        type: "POST",
                        data: {transaction_id:transaction_id,type:'order_detail_twint'},
                        dataType: "JSON",
                        success: function(data)
                        {
                           // console.log(data);
                            if(data.twint_status=='completed' || data.twint_status=='transmitted'  || data.twint_status=='setteled' )
                            {
                                $('#transaction_id').text(data.transaction_id);
                                $('#transaction_id_value').val(data.transaction_id);
                                $('tbody#course_detail').html('');
                                $('td#total_amount, td#subtotal').html('');
                            
                                $("td#subtotal").append('CHF '+data.total_price);
                                $("td#total_amount").append('<b>CHF '+data.total_price+'</b>');
                                $('#total_price').val(data.total_price);
                                $.each(data.data, function(key, value) {
                                    $('#course_detail').append('<tr><td>'+value.course_detail+' <?php echo $translation['_course_part_']?>  '+value.course_no+'  '+value.course_day+'<?php echo $translation['_course2_']?> | '+value.c_date+' @ '+value.c_time+'-'+value.c_end_time+' | '+value.place+'  × 1</td><td>CHF '+value.price+'</td></tr>');
                                });
                               
                          
                            }
                            else if(data.twint_status=='initialized'){
                                $('#message').text('Sorry');
                                $('#error_heading').text('Transaction initialized');
                                $('#error_text').text('Your transaction is initialized. Please go back to previous page in order to complete payment.');
                                $('#gif').attr('src','../images/down.png');
                                $('#error_image').attr('src','../images/transaction_fail.png');
                                $('#connection-break').removeClass('connection-break');
                                $('#table-data').addClass('connection-break');
                            }
                            else if(data.twint_status=='failed'){
                                 $('#message').text('Sorry');
                                $('#error_heading').text('Transaction Failed');
                                $('#error_text').text('Your transaction is failed. Please contact support team.');
                                $('#gif').attr('src','../images/down.png');
                                $('#error_image').attr('src','../images/transaction_fail.png');
                                $('#connection-break').removeClass('connection-break');
                                $('#table-data').addClass('connection-break');
                            }
                            else if(data.twint_status=='canceled'){
                                 $('#message').text('<?php echo $translation['_sorry_']?>');
                                $('#error_heading').text('Transaction time expired.');
                                $('#error_text').text('Your transaction is cancelled. Please contact support team.');
                                $('#gif').attr('src','../images/down.png');
                                $('#error_image').attr('src','../images/transaction_fail.png');
                                $('#connection-break').removeClass('connection-break');
                                $('#table-data').addClass('connection-break');
                            }
                            else
                            {
                                $('#message').text('Sorry');
                                $('#error_heading').text('Transaction initialized');
                                $('#error_text').text('Your transaction is initialized. Please go back to previous page in order to complete payment.');
                                $('#gif').attr('src','../images/down.png');
                                $('#error_image').attr('src','../images/transaction_fail.png');
                                $('#connection-break').removeClass('connection-break');
                                $('#table-data').addClass('connection-break');
                                /*
                                $('tbody#course_detail').html('');
                                $('td#total_amount, td#subtotal').html('');*/
                            }
                        },
                        /*error: function (jqXHR, textStatus, errorThrown)
                        {
                          window.location.href = '<?=$config["base_url"]?>/book/';
                        }*/
                    });
                }
            }
            else
            {
                $('#message').text('<?php echo $translation['_sorry_']?>');
                $('#error_heading').text('<?php echo $translation['_session_timeout_']?>');
                $('#error_text').text('<?php echo $translation['_your_session_']?>');
                $('#gif').attr('src','../images/down.png');
                $('#error_image').attr('src','../images/L1.png');
                $('#connection-break').removeClass('connection-break');
                $('#table-data').addClass('connection-break');
            }
       /* }
        else
        {
            window.location.href = '<?=$config["base_url"]?>/book/';
        }*/
    });
</script>

</body>
</html>