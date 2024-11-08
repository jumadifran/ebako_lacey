<!DOCTYPE HTML>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8" />
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <script type="text/javascript" src="easyui/jquery.min.js"></script>
        <script type="text/javascript" src="easyui/jquery.easyui.min.js"></script>
    </head>
    <body>
    <center>
        <div class="lg-container">
            <div style="width: 100%;height: auto;border-radius: 5px;">                
                <table class="tbllogin">
                    <tr height="20%">                        
                        <td width="100%" colspan="2" style="border-bottom: 1px #FFFFFF solid;" align="center">
                            <span style="font-size: 18px;text-shadow: inherit; color:#0000ff; font-weight: bold;font-family: Georgia,'Times New Roman',Times,serif;">PT. EBAKO PRODUCT LIST</span><br/>
                        </td>                        
                    </tr>
                    <tr>
                        <td width="70%" style="vertical-align: middle">
                            <form id="lg-form" name="lg-form" method="post" action="<?php echo site_url('home/login') ?>" onsubmit="return $(this).form('validate')">
                                <table width='95%' border='0'>
                                    <tr>
                                        <td align='right' widh="40%"><label for="username">Username : </label></td>
                                        <td width="60%"><input type="text" tabindex="1" name="username" required="true" size="20"></td>
                                    </tr>
                                    <tr>
                                        <td align='right'><label for="password">Password : </label></td>
                                        <td><input type="password" tabindex="2" name="password" required="true" size="20"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td align="center"><button type="submit" id="login">Login</button></td>
                                    </tr>
                                </table>
                            </form>
                        </td>
<!--                        <td style="vertical-align: middle">
                            <img src="css/key.png" style="border: none" />
                        </td>-->
                    </tr>
                </table>
            </div> 
        </div>
    </center>
</body>
</html>