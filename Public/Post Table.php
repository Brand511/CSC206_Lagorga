<?php
// Load all application files and configurations
require($_SERVER[ 'DOCUMENT_ROOT' ] . '/../includes/application_includes.php');
require_once(FS_TEMPLATES . 'Layout.php');
require_once(FS_TEMPLATES . 'postlist.php');
require_once(FS_TEMPLATES . 'News.php');
// Generate the HTML for the top of the page
Layout::pageTop('CSC206 Project');
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Get the stories for column 1 from the database
$sql = 'select * from posts';
$posts = $db->query($sql);
// Run a simple query that will be rendered in column 2 below
$sql = 'select id, name, description from pages';
$res = $db->query($sql);
// echo '<pre>'; print_r($posts); echo '</pre>'; die();
// Page content goes here
?>
    <div class="container top25">
        <div class="col-md-8">
            <section class="content">
<?php
postlist::makeTable('Csc206 Project');
// Loop through the posts and display them

while ($post = $posts->fetch()) {
    // Call the method to create the layout for a post
    postlist::story($post);

}
foreach ($posts as $post)			{
    $post['content'] = substr($post['content'], 0, 35) . '...';

}
postlist::endTable('Csc206 Project');
layout::pageBottom('Csc206 Project');
?>