<?php
// Load all application files and configurations
require($_SERVER[ 'DOCUMENT_ROOT' ] . '/../includes/application_includes.php');
// Include the HTML layout class
require_once(FS_TEMPLATES . 'Layout.php');
require_once(FS_TEMPLATES . 'News.php');
// Connect to the database
$host = 'Localhost';
$user ='Brand511';
$pass = 'Lagorga17';
$db = 'database';
// Initialize variables
$requestType = $_SERVER[ 'REQUEST_METHOD' ];
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
                // Process data that was submitted
                echo '<h2>This is the data that was entered</h2>';
                echo '<pre>';
                print_r($_POST);
                echo '</pre>';
                // pull the fields from the POST array.
                $title = $_POST['title'];
                $content = $_POST['content'];
                $startDate  = $_POST['startDate'];
                $endDate  = $_POST['endDate'];
                // This SQL uses double quotes for the query string.  If a field is not a number (it's a string or a date) it needs
                // to be enclosed in single quotes.  Note that right after values is a ( and a single quote.  Taht single quote comes right
                // before the value of $title.  Note also that at the end of $title is a ', ' inside of double quotes.  What this will all render
                // That will generate this piece of SQL:   values ('title text here', 'content text here', '2017-02-01 00:00:00'  and so
                // on until the end of the sql command.
                $sql = "insert into posts (title, content, startDate, endDate) values ('" . $title . "', '" . $content . "', '" . $startDate . "', '" . $endDate . "');";
                $db->query($sql);
            }
            ?>

        </section>
    </div>

    <div class="col-md-8">
        <section class="content">
            <h1>Posts List</h1>
            <p>Current and active posts.</p>

        </section>
    </div>
</div>

<?php

$fields = [
    'title'     => ['required', 'string'],
    'content'   => ['required', 'string'],
    'startDate' => ['required', 'date'],
    'endDate'   => ['required', 'date'],
    'image'     => ['date']
];
/**
 * Show the form
 */
function showForm($data = null)
{
    $title = $data['title'];
    $content = $data['content'];
    $startDate = $data['startDate'];
    $endDate = $data['endDate'];
    $image = $data['image'];
}
    echo <<<postform
    <form class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Create Post</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="nameInput">Name</label>
            <div class="col-md-4">
                <input id="nameInput" name="nameInput" type="text" placeholder="Name" class="form-control input-md" required="">
                <span class="help-block">input your name or username</span>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="endDate">End Date</label>
            <div class="col-md-4">
                <input id="endDate" name="endDate" type="text" placeholder="month/day/year" class="form-control input-md" required="">
                <span class="help-block">input the date</span>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="startDate">Start Date</label>
            <div class="col-md-4">
                <input id="startDate" name="startDate" type="text" placeholder="month/day/year" class="form-control input-md" required="">
                <span class="help-block">input the date</span>
            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="contentBox">Content</label>
            <div class="col-md-4">
                <textarea class="form-control" id="contentBox" name="contentBox">input here for new post</textarea>
            </div>
        </div>

        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="addPost"></label>
            <div class="col-md-8">
                <button id="addPost" name="addPost" class="btn btn-primary">Add</button>
                <button id="cancelPost" name="cancelPost" class="btn btn-warning">Cancel</button>
            </div>
        </div>

    </fieldset>
</form>
postform;

Layout::pageBottom();
?>

}
