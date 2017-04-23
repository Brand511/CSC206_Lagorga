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

            <?php
            if ( $requestType == 'GET' ) {
                // Display the form
                showForm();
            } elseif ( $requestType == 'POST' ) {
                if (validateInput($_POST)){
                    //echo '<h1>The data here was inputted</h1>';
                    //$print_r($_POST);
                    $input = $_POST;
                    $email = $_POST['email'];
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $sql = "insert into users (email, password, firstName, lastName, role_ID) values ('" . $input['email'] . "', '" . $password . "','" . $input['firstName'] . "', '" . $input['lastName'] . "', 2 );";
                    $db->query($sql);
                    echo '<h1>you are signed in</h1>';
                } else {
                    // This is an error so show the form again
                    echo '<h1>it did not work</h1>';
                    showForm($_POST);
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
    'password'   => ['required', 'varchar(255)'],
    'firstName' => ['required', 'varchar(50)'],
    'lastName' => ['required', 'varchar(50)'],
    'email' => ['required', 'varchar(32)']
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
<form id="signUpForm" action='signUp.php' method="POST" class="form-horizontal">
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

postform;


}
