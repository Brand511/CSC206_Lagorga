<?php
// Load all application files and configurations
require($_SERVER[ 'DOCUMENT_ROOT' ] . '/../includes/application_includes.php');
// Include the HTML layout class
require_once(FS_TEMPLATES . 'Layout.php');
require_once(FS_TEMPLATES . 'News.php');
Layout::pageTop('CSC206 Project');
?>
    <div class="container top25">
    <div class="col-md-8">
        <section class="content">

            <?php
            if ( $requestType == 'GET' ) {
                // Display the form
                showForm();
            } elseif ( $requestType == 'POST' ) {
                    $input = $_POST;
                    //echo '<h1>Process login Form</h1>';
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $sql = "select * from users where email = '" . $input['email'] . "'";
                    //echo $sql; echo '<br>';
                    $result = $db->query($sql);
                    if (! $result->size()== 0){
                        $user = $result->fetch();
                        // We have a user so let's compare the password
                        if (password_verify($input['password'], $user['password'])){
                            echo '<h1>we are logged in</h1>';

                            $_SESSION['user'] = $user;

                        }else {
                            echo '<h1>Invalid password</h1>';
                        }
                    } else {
                        echo '<h1>User not found</h1>';
                    }



            }
            ?>


        </section>
    </div>
<?php
// Generate the page footer
Layout::pageBottom();
/**
 * Functions that support the createPost page
 */
$fields = [
    'email'     => ['required', 'string'],
    'password'   => ['required', 'string'],
];
function validateInput($formData)
{
    // use the global $fields list
    global $fields;
    $message = '';
    // Assume everything will be valid
    $validData = true;
    // Loop through the whitelist to ensure required data is provided and the data
    // is of the correct type
//    foreach ($fields as $name => $field){
//        $isRequired = ($field[0] == 'required') ? true : false;
//
//        $inArray = array_key_exists($name, $formData);
//
//
//
//        // Check for proper type of data
//        // if ()
//
//
//    }
    return true;
}
/**
 * Show the form
 */
function showForm($data = null)
{
    echo <<<postform
    <form id="Login" action='Login.php' method="POST" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Login user</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="" class="form-control input-md" required="">
    
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
  <label class="col-md-4 control-label" for="loginbutton"></label>
  <div class="col-md-4">
    <button id="loginbutton" name="loginbutton" class="btn btn-primary">login</button>
  </div>
</div>

</fieldset>
</form>

postform;


}