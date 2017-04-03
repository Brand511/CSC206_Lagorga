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
            if (isset($_SESSION['user'])) {

                session_destroy();
                echo '<h1>You are logged out now!</h1>';
            }
            else{
                echo '<h1>You are not logged in!</h1>';
            }
        ?>
        </section>
    </div>
</div>
<?php
// Generate the page footer
Layout::pageBottom();
?>