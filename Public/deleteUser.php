<?php
// Load all application files and configurations
require($_SERVER[ 'DOCUMENT_ROOT' ] . '/../includes/application_includes.php');
// Include the HTML layout class
require_once(FS_TEMPLATES . 'Layout.php');
require_once(FS_TEMPLATES . 'News.php');
// Generate the HTML for the top of the page
Layout::pageTop('CSC206 Project');
?>
<div class="container top25">
    <div class="col-md-8">
        <section class="content">
            <H1>Hello<?php echo $_SESSION['user']['firstName'];?></H1>
            <?php
            if (isset($_SESSION['user'])) {
                if ($_SESSION['user']['role_id'] == '1') {
                    if ($requestType == 'GET') {
                        $sql = 'select * from users where id = ' . $_GET['id'];
                        $result = $db->query($sql);
                        $row = $result->fetch();
                        $id = $row['id'];
                        $email = $row['email'];
                        $firstName = $row['firstName'];
                        $lastName = $row['lastName'];


                        echo <<<userform
				
                    <form id="deleteUserForm" action='deleteUser.php' method="POST" class="form-horizontal">
                        <fieldset>
						<p>Are you sure you want to DELETE this user?</p>
                        <input type="hidden" name="id" value="$id">
                            <!-- Form Name -->
                            <legend>Delete User</legend>
                            <!-- Button (Double) -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="submit"></label>
                                <div class="col-md-8">
                                    <button id="submit" name="submit" value="Submit" class="editButton">Delete</button>
                                   <a class="deleteButton" href="tablePage.php">Cancel</a>
                                </div>
                            </div>
                        </fieldset>
                    </form>
userform;
                    } elseif ($requestType == 'POST') {
                        //Validate data
                        $id = $_POST['id'];
                        //$title = htmlspecialchars($_POST['title'], ENT_QUOTES);
                        //$content = htmlspecialchars($_POST['content'], ENT_QUOTES);
                        // Save data
                        $sql = "delete from users where id=$id";
                        $result = $db->query($sql);
                        echo 'This user was deleted successfully';
                    }
                }
                else{
                    echo '<h1>You have no access to deleting this User.</h1>';
                }
            }
                    ?>
         </section>
        </div>
    </div>
<?php
// Generate the page footer
Layout::pageBottom();
?>