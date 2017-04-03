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
                if ($requestType == 'GET') {
                    $sql = 'select * from users where id = ' . $_GET['id'];
                    $result = $db->query($sql);
                    $row = $result->fetch();
                    $id = $row['id'];
                    $email = $row['email'];
                    $firstName = $row['firstName'];
                    $lastName = $row['lastName'];

                    echo <<<post
				
                    <h2>$email</h2>
					<div class ="BlockText">
					<p></p>
					</div>
					<p>$firstName $lastName</p>
					
post;


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
                ?>
                </section>
                </div>
                </div>

<?php
// Generate the page footer
Layout::pageBottom();
?>
