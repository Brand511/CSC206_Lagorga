<?php
require($_SERVER[ 'DOCUMENT_ROOT' ] . '/../includes/application_includes.php');
// Include the HTML layout class
require_once(FS_TEMPLATES . 'Layout.php');
require_once(FS_TEMPLATES . 'postList.php');
// Connect to the database
$db = new PDO("mysql:host=localhost;dbName=database;","Brand511","Lagorga17");
// Get the stories for column 1 from the database
$sql = 'select * from posts';
$posts = $db->query($sql);
// Run a simple query that will be rendered in column 2 below
$sql = 'select id, name, description from pages';
$res = $db->query($sql);
layout::pageTop('Csc206 Project');
//layout::blogPost('Csc206 Project');
?>

<?php
postList::makeTable('Csc206 Project');
// Loop through the posts and display them
while ($post = $posts->fetch()) {
    // Call the method to create the layout for a post
    postList::story($post);
}
postList::endTable('Csc206 Project');
layout::pageBottom('Csc206 Project')
?>