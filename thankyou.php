<?php
include 'header.php';
include 'Functions.php';

?> 
 <div class="container-fluid back-img-design">
    <div class="row">
       
        <div class="d-flex justify-content-center align-items-center w-100">
            <div class="w-75 d-flex">
                <div class="w-25 m-20 text-center p-3 back-design d-flex justify-content-center align-items-center">
                    <div>
                        <div class="position-gif"><img class="img-fluid max-20" alt="gif" id="gif" src="images/source.gif"></div>
                    
                        <h1 id="message"><?php echo $translation['_Thank_You_']?></h1>
                    </div>
                </div>
               
                <div class="w-75 p-4  design2 connection-break text-center" id="connection-break">
                <h1 class="SSE" id="error_heading"></h1>
                    <img class="img-fluid max-51" alt="gif" id="error_image">
                <p class="EEP" id="error_text"></p>
                 <form action="<?=$config['base_url']?>/book">
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
                    <div class="text-center float-right">
                    <button type="button" class="proceed-page" id="button1" onclick="openNewTabUrl()" style="display: none; background: black;">Pay with <img class="twint-img" src="images/twint_logo_q.svg" style="height: 35px;margin-left: 2px;"></button>
                     </div>
                </div>

            </div>
        </div>
    </div>
<input type="hidden" name="billing_id" id="billing_id">
<input type="hidden" id="transaction_id_value">
</div>
<?php include 'footer-new.php';?>   
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/anim.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        
        // $('#billing_id').val('0');
        $('#billing_id').val(sessionStorage.getItem("billing_id"));
        sessionStorage.removeItem('billing_id');
        sessionStorage.removeItem('final_course_id');

        var billing_id = $('#billing_id').val(); 
        if(sessionStorage.getItem("user_id"))
        {
            if(billing_id)
            {
                if(billing_id=='0')
                {
                    $('#message').text('Sorry');
                    $('#error_heading').text('Transaction Failed');
                    $('#error_text').text('Your transaction is failed. Please try again.');
                    $('#gif').attr('src','images/down.png');
                    $('#error_image').attr('src','images/transaction_fail.png');
                    $('#connection-break').removeClass('connection-break');
                    $('#table-data').addClass('connection-break');
                }
                else
                {
                    var url = 'GetPhpData.php';
                    $.ajax({
                        url : url,
                        type: "POST",
                        data: {billing_id:billing_id,type:'order_detail'},
                        dataType: "JSON",
                        success: function(data)
                        {
                            if(data.status==1)
                            {
                                $('#transaction_id').text(data.transaction_id);
                                $('#transaction_id_value').val(data.transaction_id);
                                $('tbody#course_detail').html('');
                                $('td#total_amount, td#subtotal').html('');
                            
                                $("td#subtotal").append('CHF '+data.total_price);
                                $("td#total_amount").append('<b>CHF '+data.total_price+'</b>');
                                $('#total_price').val(data.total_price);
                                $.each(data.data, function(key, value) {
                                    $('#course_detail').append('<tr><td>'+value.course_title+' | '+value.c_date+' @ '+value.c_time+'-'+value.c_end_time+' | '+value.place+'  × 1</td><td>CHF '+value.price+'</td></tr>');
                                });
                                if (data.payment_type=='twint') {
                                    $('#button1').show();
                                }
                          //       alert('dfdf');
                          //       var url='https://pay.datatrans.com/v1/start/'+data.transaction_id;
                          // window.open(url, '_blank');
                          
                            }
                            else
                            {
                                $('tbody#course_detail').html('');
                                $('td#total_amount, td#subtotal').html('');
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                          window.location.href = '/book';
                        }
                    });
                }
            }
            else
            {
                $('#message').text('<?php echo $translation['_sorry_']?>');
                $('#error_heading').text('<?php echo $translation['_session_timeout_']?>');
                $('#error_text').text('<?php echo $translation['_your_session_']?>');
                $('#gif').attr('src','images/down.png');
                $('#error_image').attr('src','images/L1.png');
                $('#connection-break').removeClass('connection-break');
                $('#table-data').addClass('connection-break');
            }
        }
        else
        {
            window.location.href = '/book';
        }
    });
</script>
<script>
   function openNewTabUrl() {
   var id= $('#transaction_id_value').val();
     var url='https://pay.datatrans.com/v1/start/'+id;
                          window.open(url, '_blank');
   }
</script>
</body>
</html>