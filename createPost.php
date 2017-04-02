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
                if (isset($SESSION['user'])) {

                    if ($requestType == 'GET') {
                        // Display the form
                        showForm();
                    } elseif ($requestType == 'POST') {
                        if (validateInput($_POST)) {
                            // Data is valid so save it to the database
                            // pull the fields from the POST array.
                            $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
                            $content = htmlspecialchars($_POST['content'], ENT_QUOTES);
                            $startDate = date('Y:m:d H:i:s', strtotime($_POST['startDate']));
                            $endDate = date('Y:m:d H:i:s', strtotime($_POST['endDate']));
                            // This SQL uses double quotes for the query string.  If a field is not a number (it's a string or a date) it needs
                            // to be enclosed in single quotes.  Note that right after values is a ( and a single quote.  Taht single quote comes right
                            // before the value of $title.  Note also that at the end of $title is a ', ' inside of double quotes.  What this will all render
                            // That will generate this piece of SQL:   values ('title text here', 'content text here', '2017-02-01 00:00:00'  and so
                            // on until the end of the sql command.
                            $sql = "insert into posts (title, content, startDate, endDate, userId) values ('" . $title . "', '" . $content . "', '" . $startDate . "', '" . $endDate . "', 1);";
                            $db->query($sql);
                        } else {
                            // This is an error so show the form again
                            showForm($_POST);
                        }
                    }
                }
                else if (!$SESSION['user']){
                    echo
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
    'title'     => ['required', 'string'],
    'content'   => ['required', 'string'],
    'startDate' => ['required', 'date'],
    'endDate'   => ['required', 'date'],
    'image'     => ['optional', 'string']
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
    $title = $data['title'];
    $content = $data['content'];
    $startDate = $data['startDate'];
    $endDate = $data['endDate'];
    // $image = $data['image'];
    echo <<<postform
    <form id="createPostForm" action='createPost.php' method="POST" class="form-horizontal">
        <fieldset>
    
            <!-- Form Name -->
            <legend>Create Post</legend>
    
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="title">Title</label>
                <div class="col-md-8">
                    <input id="title" name="title" type="text" placeholder="post title" value="$title" class="form-control input-md" required="">                    
                </div>
            </div>
    
            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="content">Content</label>
                <div class="col-md-8">
                    <textarea class="form-control" id="content" name="content">$content</textarea>
                </div>
            </div>
    
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="startDate">Effective Date</label>
                <div class="col-md-8">
                    <input id="startDate" name="startDate" type="text" placeholder="effective date" value="$startDate" class="form-control input-md" required="">
                </div>
            </div>
    
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="endDate">End Date</label>
                <div class="col-md-8">
                    <input id="endDate" name="endDate" type="text" placeholder="end date" value="$endDate" class="form-control input-md">
                </div>
            </div>
    
            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="submit"></label>
                <div class="col-md-8">
                    <button id="submit" name="submit" value="Submit" class="btn btn-success">Submit</button>
                    <button id="cancel" name="cancel" value="Cancel" class="btn btn-info">Cancel</button>
                </div>
            </div>
    
        </fieldset>
    </form>
postform;


}
