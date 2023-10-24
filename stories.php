<?php
session_start();
if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
    header("location:login.php");
    exit;
}

?>

<html class="hydrated">

<head>
    <title>Dimension by HTML5 UP</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <meta charset="utf-8">
    <style data-styles="">
    ion-icon {
        visibility: hidden
    }

    .hydrated {
        visibility: inherit
    }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <!-- ICON -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="assets/css/main.css">
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>

</head>

<body class="vsc-initialized is-article-visible">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header" style="display: none;">
            <div class="logo">
                <span class="icon fa-gem"></span>
            </div>
            <div class="content">
                <div class="inner">
                    <h1>Dimension</h1>
                    <p>A fully responsive site template designed by <a href="https://html5up.net">HTML5 UP</a> and
                        released<br>
                        for free under the <a href="https://html5up.net/license">Creative Commons</a> license.</p>
                </div>
            </div>
            <nav class="use-middle">
                <ul>
                    <!-- intro -->
                    <li><a href="#stories">Intro</a></li>
                    <li><a href="#work"></a></li>
                    <li class="is-middle"><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <!--<li><a href="#elements">Elements</a></li>-->
                </ul>
            </nav>
        </header>

        <!-- Main -->

        <div id="main" style="">

            <!-- Intro -->
            <!-- <ion-icon name="caret-up-circle-outline" style="height:50px;width:auto"></ion-icon> -->

            <article id="stories" class="active" style="">
                <a href="index.html">
                    <ion-icon name="close-outline" class="close-btn"></ion-icon>
                </a>
                <h1 class="major" style="margin-left:40%;border-bottom: none;"> Posts</h1>

                <?php
                include 'db_connect.php';
                
                $existsSql="SELECT * FROM `bloglist` WHERE `isAllowed`='1' ORDER BY `rank` DESC";
                $res=mysqli_query($conn,$existsSql);
                $num=mysqli_num_rows($res);
                if($num>0){
                    while($row=mysqli_fetch_assoc($res)){
                        ?>
                <!-- <div class=" form">
        </div> -->
                <!-- Displaying Data Read From Database -->
                <?php 
                        
                    $blog_writer = $row['UserId']; 
                    $blog_heading = $row['heading']; 
                    $blog_content =  $row['content'];
                    $blog_img = $row['image-source']; 
                    
                    $blog_id = $row['Blog_id'];
                    $like = $row['likes'];
                    $dislike = $row['dislikes'];
                    $like_dislikeDisplay = ($like-$dislike);
                    $rank = ($row['Time']%100000000)-($like-$dislike); 
                    //   echo $rank;
                    $user_id = $_SESSION['userid'];
                    //   echo $idType;
                    //  echo "<img src='$blog_img' >"; 
                    // echo $blog_id;
                ?>
                <script type="text/javascript">
                $(document).ready(function() {
                    //##### Add record when Record when Like Button is click #########
                    $('#content-like__<?php echo $blog_id; ?>').submit(function(e) {
                        e.preventDefault();
                        // console.log(e.target.id);
                        var myData = 'content_txt=' + '__like__' + e.target.id +
                            '__<?php echo  $user_id ?>'; //build a post data structure
                        // console.log(e.target);
                        jQuery.ajax({
                            type: "POST", // Post / Get method
                            url: "response.php", //Where form data is sent on submission
                            dataType: "text", // Data type, HTML, json etc.
                            data: myData, //Form variables
                            success: function(response) {
                                $(".like_dislike__<?php echo $blog_id; ?>").text(
                                    response)

                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                alert(thrownError);
                            }
                        });
                    });
                });
                $(document).ready(function() {
                    //##### Add record when Record when DisLike Button is click #########
                    $('#content-dislike__<?php echo $blog_id; ?>').submit(function(e) {
                        e.preventDefault();
                        // console.log(e.target.id);
                        var myData = 'content_txt=' + '__dislike__' + e.target.id +
                            '__<?php echo  $user_id ?>' +
                            '__<?php echo  $rank ?>'; //build a post data structure
                        jQuery.ajax({
                            type: "POST", // Post / Get method
                            url: "response.php", //Where form data is sent on submission
                            dataType: "text", // Data type, HTML, json etc.
                            data: myData, //Form variables
                            success: function(response) {
                                $(".like_dislike__<?php echo $blog_id; ?>").text(
                                    response);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                alert(thrownError);

                            }
                        });
                    });
                });
                </script>
                <!-- <h2 id='like-dislike'><h2> -->
                <?php echo " 
                        <div class='story$blog_id'>
                            <div class='grid-div'>
                                <div class=' grid-container-element'>
                                    <div class='grid-child-element purple child1'>
                                        <form id='content-like__$blog_id' class='content-like'>
                                            <button class='upbtn ' id='FormSubmit' class='like__$blog_id' onclick='LikeButton(`content-like__$blog_id`)'>
                                            <ion-icon name='caret-up-outline' class='iconcontent-like__$blog_id up-icon md hydrated' role='img'
                                            aria-label='caret up outline'></ion-icon>
                                            </button>
                                        </form>                  
                                        <span class='like_dislike__$blog_id'>$like_dislikeDisplay</span>
                                        <form id='content-dislike__$blog_id' class='content-dislike'>
                                            <button class='dnbtn btncontent-dislike__$blog_id' id='Formsubmit' class='dislike__$blog_id' onclick='DislikeButton(`content-dislike__$blog_id`)'>
                                                <ion-icon name='caret-down-outline' class='iconcontent-dislike__$blog_id down-icon md hydrated' role='img' aria-label='caret down outline'></ion-icon>
                                            </button>
                                        </form>
                                    </div>
                                    <div class='grid-child-element green child2 '>
                                        <a href='storiesindetail.php?data=$blog_id'><strong>$blog_heading </strong>
                                        <span class='image main'><img src=' $blog_img '></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>"
                    ?>
                <?php 
                                }
                            }
                     ?>

                <?php
                        $existsSql1="SELECT * FROM `user_opinion_on_blogs` where UserId='$user_id'";
                        $res1=mysqli_query($conn,$existsSql1);
                        $num1=mysqli_num_rows($res1);
                        if($num1>0){
                            while($row1=mysqli_fetch_assoc($res1)){
                                
                                $blog_id = $row1['BlogId'];
                               
                if($row1['Liked'] == 1)
                { 
                                    ?>
                <script>
                document.querySelector('.<?php echo "iconcontent-like__$blog_id";?>').classList.add(
                    'btn-clicked');
                // ;
                </script>
                <?php }
                if($row1['Disliked'] == 1)
                                {
                                    ?>

                <script>
                document.querySelector('.<?php echo "iconcontent-dislike__$blog_id";?>').classList.add(
                    'btn-clicked');
                // ;
                </script>
                <?php }

                            }
                        }
                    ?>


                <!-- 
                    <div class="story1">
                        <div class="grid-div">
                            <div class=" grid-container-element">
                                <div class="grid-child-element purple child1">
                                    
                                    <ion-icon name="caret-up-outline" class="up-icon md hydrated" role="img"
                                        aria-label="caret up outline"></ion-icon>
                                    <span>100</span>
                                    <ion-icon name="caret-down-outline" class="down-icon md hydrated" role="img"
                                        aria-label="caret down outline"></ion-icon>
                                </div>
                                <div class="grid-child-element green child2">
                                    <a href="#">
                                        <strong><?php echo $blog_heading ?></strong>

                                        <span class="image main">
                                            <img src="<?php echo $blog_img ?>">

                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                <!-- <div class='upanddown'>
                        <form id='content-like__$blog_id'>
                            <button id='FormSubmit' class='like__$blog_id' onclick='LikeButton()'>
                            <iconify-icon icon='bx:upvote'  style='font-size:25px;'>
                            </iconify-icon></button>
                        </form>                  
                        <h2 id='like-dislike'><h2>
                        <form id='content-dislike__$blog_id'>
                            <button = id='Formsubmit' class='dislike__$blog_id' onclick='DislikeButton()'>
                            <iconify-icon icon='bx:upvote' rotate='180deg' style='font-size:25px;'></iconify-icon>
                            </button>
                        </form>
                    </div> -->

                <!-- <img src="https://th-i.thgim.com/public/incoming/6o3l3o/article65851458.ece/alternates/FREE_1200/05_mn%20Beach%20Cleaning%20%281%29.jpg" alt=""> -->
                <!-- <div class="story2">
                        <div class="grid-div">
                            <div class=" grid-container-element">
                                <div class="grid-child-element purple child1">
                                    <ion-icon name="caret-up-outline" class="up-icon md hydrated" role="img"
                                        aria-label="caret up outline"></ion-icon>
                                    <span>100</span>

                                    <ion-icon name="caret-down-outline" class="down-icon md hydrated" role="img"
                                        aria-label="caret down outline">
                                    </ion-icon>
                                </div>
                                <div class="grid-child-element green child2">
                                    <a href="#">
                                        <strong>Volunteers clean NIT-K Beach in Mangaluru.</strong>

                                        <span class="image main">
                                            <img src="images/pic01.jpg" alt=""></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="close">Close</div> -->
            </article>


            <!-- Work -->
            <!-- <article id="work" style="display: none;"> 
                <h2 class="major">Work</h2>
                <span class="image main"><img src="images/pic02.jpg" alt=""></span>
                <p>Adipiscing magna sed dolor elit. Praesent eleifend dignissim arcu, at eleifend sapien imperdiet
                    ac.
                    Aliquam erat volutpat. Praesent urna nisi, fringila lorem et vehicula lacinia quam. Integer
                    sollicitudin mauris nec lorem luctus ultrices.</p>
                <p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis libero. Mauris aliquet magna
                    magna
                    sed nunc rhoncus pharetra. Pellentesque condimentum sem. In efficitur ligula tate urna. Maecenas
                    laoreet massa vel lacinia pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat
                    tincidunt. Vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus amet feugiat
                    tempus.</p>
                <div class="close">Close</div>
            </article> -->

            <!-- About -->
            <!-- <article id="about" style="display: none;">
                <h2 class="major">About</h2>
                <span class="image main"><img src="images/pic03.jpg" alt=""></span>
                <p>Lorem ipsum dolor sit amet, consectetur et adipiscing elit. Praesent eleifend dignissim arcu, at
                    eleifend sapien imperdiet ac. Aliquam erat volutpat. Praesent urna nisi, fringila lorem et
                    vehicula
                    lacinia quam. Integer sollicitudin mauris nec lorem luctus ultrices. Aliquam libero et malesuada
                    fames ac ante ipsum primis in faucibus. Cras viverra ligula sit amet ex mollis mattis lorem
                    ipsum
                    dolor sit amet.</p>
                <div class="close">Close</div>
            </article> -->

            <!-- Contact -->
            <!-- <article id="contact" style="display: none;">
                <h2 class="major">Contact</h2>
                <form method="post" action="#">
                    <div class="fields">
                        <div class="field half">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name">
                        </div>
                        <div class="field half">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email">
                        </div>
                        <div class="field">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" rows="4"></textarea>
                        </div>
                    </div>
                    <ul class="actions">
                        <li><input type="submit" value="Send Message" class="primary"></li>
                        <li><input type="reset" value="Reset"></li>
                    </ul>
                </form>
                <ul class="icons">
                    <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
                </ul>
                <div class="close">Close</div>
            </article> -->

            <!-- Elements -->
            <!-- <article id="elements" style="display: none;">
                <h2 class="major">Elements</h2>

                <section>
                    <h3 class="major">Text</h3>
                    <p>This is <b>bold</b> and this is <strong>strong</strong>. This is <i>italic</i> and this is
                        <em>emphasized</em>.
                        This is <sup>superscript</sup> text and this is <sub>subscript</sub> text.
                        This is <u>underlined</u> and this is code: <code>for (;;) { ... }</code>. Finally, <a
                            href="#">this is
                            a link</a>.
                    </p>
                    <hr>
                    <h2>Heading Level 2</h2>
                    <h3>Heading Level 3</h3>
                    <h4>Heading Level 4</h4>
                    <h5>Heading Level 5</h5>
                    <h6>Heading Level 6</h6>
                    <hr>
                    <h4>Blockquote</h4>
                    <blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget
                        tempus
                        euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis
                        iaculis volutpat ac adipiscing accumsan faucibus. Vestibulum ante ipsum primis in faucibus
                        lorem
                        ipsum dolor sit amet nullam adipiscing eu felis.</blockquote>
                    <h4>Preformatted</h4>
                    <pre><code>i = 0;

while (!deck.isInOrder()) {
    print 'Iteration ' + i;
    deck.shuffle();
    i++;
}

print 'It took ' + i + ' iterations to sort the deck.';</code></pre>
                </section>

                <section>
                    <h3 class="major">Lists</h3>

                    <h4>Unordered</h4>
                    <ul>
                        <li>Dolor pulvinar etiam.</li>
                        <li>Sagittis adipiscing.</li>
                        <li>Felis enim feugiat.</li>
                    </ul>

                    <h4>Alternate</h4>
                    <ul class="alt">
                        <li>Dolor pulvinar etiam.</li>
                        <li>Sagittis adipiscing.</li>
                        <li>Felis enim feugiat.</li>
                    </ul>

                    <h4>Ordered</h4>
                    <ol>
                        <li>Dolor pulvinar etiam.</li>
                        <li>Etiam vel felis viverra.</li>
                        <li>Felis enim feugiat.</li>
                        <li>Dolor pulvinar etiam.</li>
                        <li>Etiam vel felis lorem.</li>
                        <li>Felis enim et feugiat.</li>
                    </ol>
                    <h4>Icons</h4>
                    <ul class="icons">
                        <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                        <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a>
                        </li>
                        <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a>
                        </li>
                        <li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
                    </ul>

                    <h4>Actions</h4>
                    <ul class="actions">
                        <li><a href="#" class="button primary">Default</a></li>
                        <li><a href="#" class="button">Default</a></li>
                    </ul>
                    <ul class="actions stacked">
                        <li><a href="#" class="button primary">Default</a></li>
                        <li><a href="#" class="button">Default</a></li>
                    </ul>
                </section>

                <section>
                    <h3 class="major">Table</h3>
                    <h4>Default</h4>
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Item One</td>
                                    <td>Ante turpis integer aliquet porttitor.</td>
                                    <td>29.99</td>
                                </tr>
                                <tr>
                                    <td>Item Two</td>
                                    <td>Vis ac commodo adipiscing arcu aliquet.</td>
                                    <td>19.99</td>
                                </tr>
                                <tr>
                                    <td>Item Three</td>
                                    <td> Morbi faucibus arcu accumsan lorem.</td>
                                    <td>29.99</td>
                                </tr>
                                <tr>
                                    <td>Item Four</td>
                                    <td>Vitae integer tempus condimentum.</td>
                                    <td>19.99</td>
                                </tr>
                                <tr>
                                    <td>Item Five</td>
                                    <td>Ante turpis integer aliquet porttitor.</td>
                                    <td>29.99</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>100.00</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <h4>Alternate</h4>
                    <div class="table-wrapper">
                        <table class="alt">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Item One</td>
                                    <td>Ante turpis integer aliquet porttitor.</td>
                                    <td>29.99</td>
                                </tr>
                                <tr>
                                    <td>Item Two</td>
                                    <td>Vis ac commodo adipiscing arcu aliquet.</td>
                                    <td>19.99</td>
                                </tr>
                                <tr>
                                    <td>Item Three</td>
                                    <td> Morbi faucibus arcu accumsan lorem.</td>
                                    <td>29.99</td>
                                </tr>
                                <tr>
                                    <td>Item Four</td>
                                    <td>Vitae integer tempus condimentum.</td>
                                    <td>19.99</td>
                                </tr>
                                <tr>
                                    <td>Item Five</td>
                                    <td>Ante turpis integer aliquet porttitor.</td>
                                    <td>29.99</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>100.00</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </section>

                <section>
                    <h3 class="major">Buttons</h3>
                    <ul class="actions">
                        <li><a href="#" class="button primary">Primary</a></li>
                        <li><a href="#" class="button">Default</a></li>
                    </ul>
                    <ul class="actions">
                        <li><a href="#" class="button">Default</a></li>
                        <li><a href="#" class="button small">Small</a></li>
                    </ul>
                    <ul class="actions">
                        <li><a href="#" class="button primary icon solid fa-download">Icon</a></li>
                        <li><a href="#" class="button icon solid fa-download">Icon</a></li>
                    </ul>
                    <ul class="actions">
                        <li><span class="button primary disabled">Disabled</span></li>
                        <li><span class="button disabled">Disabled</span></li>
                    </ul>
                </section>

                <section>
                    <h3 class="major">Form</h3>
                    <form method="post" action="#">
                        <div class="fields">
                            <div class="field half">
                                <label for="demo-name">Name</label>
                                <input type="text" name="demo-name" id="demo-name" value="" placeholder="Jane Doe">
                            </div>
                            <div class="field half">
                                <label for="demo-email">Email</label>
                                <input type="email" name="demo-email" id="demo-email" value=""
                                    placeholder="jane@untitled.tld">
                            </div>
                            <div class="field">
                                <label for="demo-category">Category</label>
                                <select name="demo-category" id="demo-category">
                                    <option value="">-</option>
                                    <option value="1">Manufacturing</option>
                                    <option value="1">Shipping</option>
                                    <option value="1">Administration</option>
                                    <option value="1">Human Resources</option>
                                </select>
                            </div>
                            <div class="field half">
                                <input type="radio" id="demo-priority-low" name="demo-priority" checked="">
                                <label for="demo-priority-low">Low</label>
                            </div>
                            <div class="field half">
                                <input type="radio" id="demo-priority-high" name="demo-priority">
                                <label for="demo-priority-high">High</label>
                            </div>
                            <div class="field half">
                                <input type="checkbox" id="demo-copy" name="demo-copy">
                                <label for="demo-copy">Email me a copy</label>
                            </div>
                            <div class="field half">
                                <input type="checkbox" id="demo-human" name="demo-human" checked="">
                                <label for="demo-human">Not a robot</label>
                            </div>
                            <div class="field">
                                <label for="demo-message">Message</label>
                                <textarea name="demo-message" id="demo-message" placeholder="Enter your message"
                                    rows="6"></textarea>
                            </div>
                        </div>
                        <ul class="actions">
                            <li><input type="submit" value="Send Message" class="primary"></li>
                            <li><input type="reset" value="Reset"></li>
                        </ul>
                    </form>
                </section>

                <div class="close">Close</div>
            </article>

        </div> -->

            <!-- Footer -->
            <footer id="footer" style="display: none;">
                <p class="copyright">© Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
            </footer>

        </div> -->

        <!-- BG -->
        <div id="bg"></div>

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/browser.min.js"></script>
        <script src="assets/js/breakpoints.min.js"></script>
        <script src="assets/js/util.js"></script>
        <!-- <script src="assets/js/main.js"></script> -->
        <!-- CURRENT PAGE SCRIPT -->
        <script>
        function LikeButton(args) {
            console.log(args);
            const temparr = args.split('-');
            const elementToBeDeleted = '.icon' + temparr[0] + '-dis' + temparr[1];

            // console.log(elementToBeDeleted);
            const elementToBeSearched = '.icon' + args;
            const element = document.querySelector(elementToBeSearched);
            const element2 = document.querySelector(elementToBeDeleted);
            // console.log(elementToBeDeleted);
            element.classList.toggle('btn-clicked');
            // console.log(element2);
            if (element2.classList.contains('btn-clicked')) {
                element2.classList.remove('btn-clicked');
            }
            // element2.classList.toggle('btn-cliked');
            // ;
        }

        function DislikeButton(args) {
            console.log(args);
            const temparr = args.split('-');
            const elementToBeDeleted = '.icon' + temparr[0] + '-' + temparr[1].substr(3);
            // const temp = temparr[1];

            // console.log(elementToBeDeleted);
            const elementToBeSearched = '.icon' + args;
            const element = document.querySelector(elementToBeSearched);
            const element2 = document.querySelector(elementToBeDeleted);
            // console.log(element2);
            // console.log(elementToBeDeleted);
            element.classList.toggle('btn-clicked');
            if (element2.classList.contains('btn-clicked')) {
                element2.classList.remove('btn-clicked');
            }
            // element2.classList.toggle('btn-clicked');
        }
        </script>



</body>

</html>