<?php
// Load all application files and configurations
require($_SERVER[ 'DOCUMENT_ROOT' ] . '/../includes/application_includes.php');
// Include the HTML layout class
require_once(FS_TEMPLATES . 'Layout.php');
require_once(FS_TEMPLATES . 'News.php');
// Generate the HTML for the top of the page
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['role_id'] == '1') {
        Layout::pageTopAdmin('CSC206 Project');
    }
    else if ($_SESSION['user']['role_id'] == '2') {
        Layout::pageTopUser('CSC206 Project');
    }
}
else
    Layout::pageTop('CSC206 Project');
?>
<div class="container top25">
    <div class="col-md-8">
        <section class="content">
            <H1>Hello<?php echo $_SESSION['user']['firstName'];?></H1>
            <?php
            if ( $requestType == 'GET' ) {
                $sql = 'select * from users where id = ' . $_GET['id'];
                $result = $db->query($sql);
                $row = $result->fetch();
                $id = $row['id'];
                $email = $row['email'];
                $firstName = $row['firstName'];
                $lastName = $row['lastName'];
                echo <<<userform
                    <form id="signUpForm" action='updateUser.php' method="POST" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Sign Up Form</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="firstName">FirstName</label>  
  <div class="col-md-4">
  <input id="firstName" name="firstName" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="lastName">LastName</label>  
  <div class="col-md-4">
  <input id="lastName" name="lastName" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="email@yahoo.com" class="form-control input-md" required="">
  <span class="help-block">any email will work</span>  
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="signUpButton"></label>
  <div class="col-md-4">
    <button id="signUpButton" name="signUpButton" class="btn btn-info">Sign Up</button>
  </div>
</div>

</fieldset>
</form>
userform;
            } elseif ( $requestType == 'POST' ) {
                //Validate data
                $id = $_POST['id'];
                $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
                $firstName = htmlspecialchars($_POST['firstName'], ENT_QUOTES);
                $lastName = htmlspecialchars($_POST['lastName'], ENT_QUOTES);
                // Save data
                $sql = "update users set email = '$email', firstName= '$firstName' , lastName='$lastName' where id=$id;";
                $result = $db->query($sql);
                echo 'It worked';
            }
            ?>
    </div>

<?php
Layout::pageBottom();
?>