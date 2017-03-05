<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 2/9/2017
 * Time: 6:59 PM
 */

class layout
{
    public static function pageTop($title)
    {
        echo <<<pagetop
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title$title</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="/assets/css/Styles.css">
    </head>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Swtor</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#about">ABOUT</a></li>
                    <li><a href="#services">SERVICES</a></li>
                    <li><a href="#portfolio">PORTFOLIO</a></li>
                    <li><a href="#contact">CONTACT</a></li>
                    <li><a href="createPost.php">CreatePost</a></li>
                    <li><a href="Post Table.php">Post table</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class ="jumbotron">
        <div class="jumbotron text-center">
            <h1>The Golden Age Gaming Community</h1>
            <p>We hope to help everyone in our Community</p>
            <p>by showing them our Golden gate for this Game.</p>
            <form class="form-inline">
                <div class="input-group">
                    <input type="email" class="form-control" size="50" placeholder="Email Address" required>
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-danger">Subscribe</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
pagetop;

    }

    /**
     *
     */
    public static function pageBottom()
    {
        echo <<<pagebottom
<footer class="container-fluid text-center">
    <a href="#myPage" title="To Top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a>
    <p>This website was made by <a href="https://www.facebook.com/brandon.lagorga.144" title="Brandon Lagorga">Brandon Lagorga</a></p>
    <p>and is sponser by <a href="https://www.facebook.com/groups/145898328817623/" title="Brandon Lagorga">The Golden Age gaming community</a></p>
</footer>
</html>
pagebottom;
    }


    /**
     * This method will take a 2-dimensional array and create a table.
     * The header columns are derived from the keys of the row data
     *
     * @param $data
     * @return string
     */

    public function buildTable($data)
    {
        // Start building the table
        $table = '<table class="table table-hover">';
        // Create the table header row
        $header = '<tr>';
        foreach ($data[0] as $key => $cell) {
            $header .= '<th>' . $key . '</th>';
        }
        $header .= '</tr>';
        // Add the header to the table
        $table .= $header;
        // Build the table rows
        $rowHTML = '';
        // Loop through each row of data and build a row
        foreach ($data as $row) {
            $rowHTML .= '<tr>';
            // Loop through each cell and create the cells
            foreach ($row as $cell) {
                $rowHTML .= '<td>' . $cell . '</td>';
            }
            $rowHTML .= '</tr>';
        }
        // Add the rows to the table
        $table .= $rowHTML;
        // Close out the table
        $table .= '</table>';
        return $table;
    }

    public static function news($title, $author, $date, $content)
    {
        echo <<<blogpost
                            <div class="blog">
                                <h4><small>RECENT POSTS</small></h4>
                                <hr>
                                <h2>$title<h2>
                                <h5><span class="glyphicon glyphicon-time"></span> Post by $author, $date.</h5>
                                <h5><span class="label label-danger">Class</span> <span class="label label-primary">Ipsum</span></h5><br>
                                <p>$content</p>
                                <br><br>
blogpost;

    }
    public static function mainMenu()
    {
        echo <<<mainMenu
<div id="about" class="container-fluid bg-white">
    <div class="row">
        <div class="col-sm-8">
            <h2>About Company Page</h2>
            <h4>Lorem ipsum..</h4>
            <p>Lorem ipsum..</p>
            <button class="btn btn-default btn-lg">Get in Touch</button>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-signal logo"></span>
        </div>
    </div>
</div>

<div id="services" class="container-fluid bg-gold">
    <div class="row">
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-globe logo"></span>
        </div>
        <div class="col-sm-8">
            <h2>Our Values</h2>
            <h4><strong>MISSION:</strong> Our mission lorem ipsum..</h4>
            <p><strong>VISION:</strong> Our vision Lorem ipsum..</p>
        </div>
    </div>
    <div class="container-fluid text-center">
        <h2>SERVICES</h2>
        <h4>What we offer</h4>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-off"></span>
                <h4>Class info</h4>
                <p>Lorem ipsum dolor sit amet..</p>
            </div>
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-heart"></span>
                <h4>in-game updates</h4>
                <p>Lorem ipsum dolor sit amet..</p>
            </div>
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-lock"></span>
                <h4>guild info</h4>
                <p>Lorem ipsum dolor sit amet..</p>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-leaf"></span>
                <h4>Rules in the guild</h4>
                <p>Lorem ipsum dolor sit amet..</p>
            </div>
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-certificate"></span>
                <h4>a community</h4>
                <p>Lorem ipsum dolor sit amet..</p>
            </div>
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-wrench"></span>
                <h4>guild events</h4>
                <p>Lorem ipsum dolor sit amet..</p>
            </div>
        </div>
    </div>
</div>
<div id="portfolio" class="container-fluid text-center bg-grey">
    <h2>Portfolio</h2>
    <h4>What we have in store</h4>
    <div class="row text-center">
        <div class="col-sm-4">
            <div class="thumbnail">
                <img src="/assets/img/Pvp.jpeg" alt="pvp">
                <p><strong>Player vs player</strong></p>
                <p>Yes, we enjoy pvp from both sides</p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="thumbnail">
                <img src="/assets/img/Rp.jpeg" alt="Rp">
                <p><strong>Role playing</strong></p>
                <p>enjoy the stories created from other players</p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="thumbnail">
                <img src="/assets/img/combat.jpeg" alt="combat">
                <p><strong>PvE</strong></p>
                <p>Enjoy the end game content of Operations,</p>
                <p>Flashpoints, and many more</p>
            </div>
        </div>
    </div>
</div>
<div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <h2>What our customers say</h2>
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <h4>"This company is the best. I am so happy with the result!"<br><span style="font-style:normal;">Michael Roe, Vice President, Comment Box</span></h4>
        </div>
        <div class="item">
            <h4>"One word... WOW!!"<br><span style="font-style:normal;">John Doe, Salesman, Rep Inc</span></h4>
        </div>
        <div class="item">
            <h4>"Could I... BE any more happy with this company?"<br><span style="font-style:normal;">Chandler Bing, Actor, FriendsAlot</span></h4>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div id="contact" class="container-fluid bg-grey">
    <h2 class="text-center">CONTACT</h2>
    <div class="row">
        <div class="col-sm-5">
            <p>Contact us and we'll get back to you within 24 hours.</p>
            <p><span class="glyphicon glyphicon-map-marker"></span> Chicago, US</p>
            <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
            <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
        </div>
        <div class="col-sm-7">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                </div>
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                </div>
            </div>
            <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <button class="btn btn-default pull-right" type="submit">Send</button>
                </div>
            </div>
        </div>
    </div>
</div>
mainMenu;

    }
}