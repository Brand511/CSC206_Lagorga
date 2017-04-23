<?php
// Load all application files and configurations
require($_SERVER[ 'DOCUMENT_ROOT' ] . '/../includes/application_includes.php');
// Include the HTML layout class
require_once(FS_TEMPLATES . 'Layout.php');
require_once(FS_TEMPLATES . 'postlist.php');
require_once(FS_TEMPLATES . 'News.php');
// Connect to the database
// Get the stories for column 1 from the database
$sql = 'select * from posts';
$posts = $db->query($sql);
// Run a simple query that will be rendered in column 2 below
$sql = 'select id, name, description from pages';
$res = $db->query($sql);
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
    <div class="col-md-6">
        <section class="content">
            <h1>Recent Posts</h1>
            <?php
            // Loop through the posts and display them
            if (isset($_SESSION['user'])){
            while ($post = $posts->fetch()) {
                // Call the method to create the layout for a post
                News::story($post);
                //print_r($_FILES);
            }
            }
            else
            {
                echo "You need to be login in to see post.";
            }
            ?>
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>
    </div>
        </section>
    </div>
</div>
<?php
if (!isset($_SESSION['user'])) {
    Layout::mainMenu();
}
    Layout::pageBottom();
    ?>

