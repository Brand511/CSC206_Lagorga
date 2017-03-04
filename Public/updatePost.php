<?php
$host = 'localhost';
$user='Brand511';
$pass='Lagorga17';
require($_SERVER[ 'DOCUMENT_ROOT'] . '/../includes/application_includes.php');
require_once(FS_TEMPLATES . 'Layout.php');
require_once(FS_TEMPLATES . 'News.php');
$db='database';
$requestType = $_SERVER[ 'REQUEST_METHOD'];
Layout::pageTop('CSC206 Project');
?>
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

<?php
Layout::pageBottom();
?>
