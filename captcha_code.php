<?php
 
session_start();
$msg = '';
 
// If user has given a captcha!
echo $_SESSION['captcha_text'];
if (isset($_POST['input']) && strlen(trim($_POST['input'])) > 0)
{   
    // If the captcha is valid
    if ($_POST['input'] == $_SESSION['captcha_text']){
        $msg = '<span style="color:green">SUCCESSFUL!!!</span>';
    }
    else{
        $msg = '<span style="color:red">CAPTCHA FAILED!!!</span>';
    }
}
?>
  
<style>
    body{
        display:flex;
        flex-direction:column;
        align-items: center;
        justify-content: center;
        border: 2px solid black;
    }
</style>
  
<body>
    <h1>PROVE THAT YOU ARE NOT A ROBOT!!</h1>
     
    <div style='margin:15px'>
        <img src="captcha.php">
    </div>
     
    <form method="POST" action=
            " <?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="input"/>
        <input type="hidden" name="flag" value="1"/>
        <input type="submit" value="Submit" name="submit"/>
    </form>
    
    <?php echo $msg; ?>
     
    <div>
        Can't read the image? Click
        <a href='<?php echo $_SERVER['PHP_SELF']; ?>'>
            here
        </a>
        to refresh!
    </div>
</body>