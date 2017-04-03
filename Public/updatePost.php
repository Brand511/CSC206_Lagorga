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
                    $sql = 'select * from posts where id = ' . $_GET['id'];
                    $result = $db->query($sql);
                    $row = $result->fetch();
                    $id = $row['id'];
                    $title = $row['title'];
                    $content = $row['content'];
                    $startDate = $row['startDate'];
                    $endDate = $row['endDate'];
                    echo <<<postform
                    <form id="createPostForm" action='updatePost.php' method="POST" class="form-horizontal">
                        <fieldset>
                        <input type="hidden" name="id" value="$id">
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
                } elseif ($requestType == 'POST') {
                    //Validate data
                    $id = $_POST['id'];
                    $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
                    $content = htmlspecialchars($_POST['content'], ENT_QUOTES);
                    // Save data
                    $sql = "update posts set title = '$title', content= '$content'  where id=$id;";
                    $result = $db->query($sql);
                    echo 'It worked';
                }
            }
            ?>

            <div class="col-md-4">
                <section class="content">
                    <h1>Posts List</h1>
                    <p>Current and active posts.</p>

                </section>
            </div>
        </div>

<?php
Layout::pageBottom();
?>
