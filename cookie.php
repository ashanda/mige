  <?php
/*include 'header.php';
// include 'index_v2.php';

include 'Config/Connection.php';*/


    

?>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <style>

/* .popup-overlay{
  display:none;
  position:fixed;
  top:0;
  left:0;
  rigth:0;
  bottom:0;
  background-color:#ccc;
  width:100%;
  height:100%;
  text-align:center;
  padding:1rem;
  align-items:center;
  justify-content:center;
  .popup{
    display:inline-block;
    width:400px;
    min-height:200px;
    background-color:white;
    border-radius: 5px;
    display:flex;
    flex-direction: row;
    flex-wrap: wrap;
    align-items:center;
    justify-content:center;
  }
}

p{
  flex: 0 1 100%;
  padding:0 1rem;
  margin:0;
  margin-top:1rem;
  font-family:sans-serif;
}

a.close,
a.submit{
  margin-top:0;
  display:inline-block;
  color:white;
  background-color:#673862;
  border-radius: 5px;
  padding: .25rem 1rem;
  text-decoration: none;
  text-transform: uppercase;
  font-family: sans-serif;
  margin-right:3rem;
  &:last-of-type{
    margin-right:0;
  }
}

.popup-overlay {
    background-color: burlywood;
    z-index: 999999;
    width: 430px;
    border: 1pxsolid;
    padding: 10px 3px 10px 10px;
    height: 200px;
    margin-top: 500px;
    margin-left: 20px;
}

.close {
    float: right;
    font-size: 1.4rem;
    font-weight: 400;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    opacity: .5;
    padding: 6px!important;
}

footer p {
    
    color: #000;
} */

/* new popup */
.new-popup-overlay {
    position: absolute;
    z-index: 9;
    text-align: center;
    line-height: 24px;
    display: flex;
    justify-content: center;
    align-items: flex-end;
    height: 95vh;
}

.new-popup {
    background: #fff;
    border-radius: 5px;
    padding: 40px 20px;
    box-shadow: 0 0 5px 3px #77777726;
    max-width: 450px;
    margin: 0px 10px;
}

.new-popup p {
  margin-bottom: 40px;
}

a.popup-btn-close {
    background: #e90616;
    color: #fff;
    padding: 10px 30px;
    border-radius: 20px;
    margin: 10px;
    text-decoration: none;
}

a.popup-btn-close:hover {
    color: #fff;
    background: #c61623;
    text-decoration: none;
}

a.acceptCookieConsent {
    background: #0072d0;
    color: #fff;
    padding: 10px 30px;
    border-radius: 20px;
    margin: 10px;
    text-decoration: none;
}

a.acceptCookieConsent:hover {
    color: #fff;
    text-decoration: none;
    background: #003f72;
}

element.style {
    display: none;
}
</style>



     <!-- <div class="popup-overlay">
  <div class="popup">
    <p>We use cookies to improve your experience on our site and to show your relevant advertising</p>
    <a href="javascript:;" class="close">Close</a>
    <a href="javascript:;" class="submit">Submit</a>
  </div>
</div> -->

<!-- new popup -->
<div class="new-popup-overlay" id="hideCookie">
  <div class="new-popup" id="cookieNotice" style="display: none;">
    <p><?php echo $translation['cookies_desc']?></p>
    <a href="javascript:;" class="acceptCookieConsent" onclick="acceptCookieConsent();"><?php echo $translation['cookies_submit']?></a>
    <a href="javascript:;" class="popup-btn-close" onclick="hideCookie();"><?php echo $translation['cookies_close']?></a>
    
  </div>
</div>



<script type="text/javascript">
    
// jQuery(document).ready(function($) {
  
  // //check to see if the submited cookie is set, if not check if the popup has been closed, if not then display the popup
  // if(getCookie('popupCookie') != 'submited'){ 
  //   if(getCookie('popupCookie') != 'closed' ){
  //     $('.new-popup-overlay').css("display", "flex").hide().fadeIn();
  //   }
  // }
  
  // $('a.popup-btn-close').click(function(){
  //   $('.new-popup-overlay').fadeOut();
  //   //sets the coookie to one minute if the popup is closed (whole numbers = days)
  //   setCookie( 'popupCookie', 'closed', .00069444444 );
  // });
  
  // $('a.popup-btn-submit').click(function(){
  //   $('.new-popup-overlay').fadeOut();
  //   //sets the coookie to five minutes if the popup is submited (whole numbers = days)
  //   setCookie( 'popupCookie', 'submited', 79900 );
  // });

let cookie_consent = getCookie("FahrschuleStarWebSite");
if(cookie_consent != ""){
    document.getElementById("cookieNotice").style.display = "none";
}else{
    document.getElementById("cookieNotice").style.display = "block";
}

  function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function deleteCookie(cname) {
    const d = new Date();
    d.setTime(d.getTime() + (24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=;" + expires + ";path=/";
}

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
// Set cookie consent
function acceptCookieConsent(){
    // deleteCookie('user_cookie_consent');
    setCookie('FahrschuleStarWebSite', 1, 30);
    document.getElementById("cookieNotice").style.display = "none";
}

function hideCookie(){
    // deleteCookie('user_cookie_consent');

    document.getElementById("hideCookie").style.display = "none";
}

  
// });

</script>