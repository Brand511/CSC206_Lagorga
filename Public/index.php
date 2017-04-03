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
Layout::pageTop('CSC206 Project');
?>
<div class="container top25">
    <div class="col-md-6">
        <section class="content">

            <H1>Hello<?php echo $_SESSION['user']['firstName'];?></H1>

            <h1>Recent Posts</h1>
            <?php
            // Loop through the posts and display them
            while ($post = $posts->fetch()) {
                // Call the method to create the layout for a post
                News::story($post);
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
Layout::mainMenu();
    Layout::pageBottom();
    ?>

