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
            if (isset($_SESSION['user'])) {
                if ($requestType == 'GET') {
                    $sql = 'select * from posts where id = ' . $_GET['id'];
                    $result = $db->query($sql);
                    $row = $result->fetch();

                    $id = $row['id'];
                    $title = $row['title'];
                    $content = $row['content'];
                    $startDate = $row['startDate'];
                    $endDate = $row['endDate'];

                    echo <<<post
				
                    <h2>$title</h2>
					<div class="BlockText">
					<p>$content</p>
					</div>
					<p>$startDate - $endDate</p>
					
post;
                } elseif ($requestType == 'POST') {
                    //Validate data
                    $id = $_POST['id'];
                    $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
                    $content = htmlspecialchars($_POST['content'], ENT_QUOTES);
                    // Save data
                    $sql = "delete from posts where id=$id";
                    $result = $db->query($sql);
                    echo 'This Post was deleted successfully';
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