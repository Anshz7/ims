<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/homepage.css">
    <title>Cloth Craft - HomePage</title>
</head>

<body>
    <nav>
        <div class="heading">Welcome</div>
        <span class="sideMenuButton" onclick="openNavbar()">
            &#9776
        </span>

        <div class="navbar">
            <ul>
                <li><a href="login.php">Log in</a></li>
            </ul>
        </div>
    </nav>

    <!-- Side navigation bar for 
        responsive website -->
    <div class="sideNavigationBar" id="sideNavigationBar">
        <a href="#" class="closeButton" onclick="closeNavbar()">
            &#x274C
        </a>
        <a href="#">Sign Up</a>
    </div>

    <!-- Content -->
    <div class="line" id="Home">
        <div class="side1">
            <h1>Cloth Craft</h1>
        </div>
        <div class="side2">
            <img src="https://motionarray.imgix.net/preview-543877-bzygPjn9dSYBtyJ5-large.jpg?w=1400&q=60&fit=max&auto=format"
                width="500">
        </div>
    </div>

    <section class="about" id="My Projects">
        <div class="content">
            <div class="title">
                <span>About Us</span>
            </div>
            <div class="boxes">
                <div class="box">
                    <div class="topic">
                        <a href="" target="_blank">
                            First
                        </a>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui harum est assumenda quos quo
                        corrupti ratione laudantium adipisci officia architecto vel ex, hic ducimus eum excepturi sit,
                        iste saepe! Possimus.
                    </p>
                </div>
                <div class="box">

                    <div class="topic">
                        <a href="" target="_blank">
                            Second
                        </a>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex iusto rem reprehenderit dolor
                        voluptates quod blanditiis nisi id facere architecto incidunt ab, earum delectus debitis et
                        laborum at magnam iure.
                    </p>
                </div>

                <div class="box">
                    <div class="topic">
                        <a href="" target="_blank">
                            Third
                        </a>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur voluptates dicta odio omnis
                        molestiae consequuntur nisi optio unde ut modi accusantium suscipit veniam eligendi velit,
                        laboriosam explicabo enim dolor. Veritatis.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer section -->
    <footer>
        <div class="footer">
            <span>
                Created By
                <a href="#repo" target="_blank">
                    Our Team
                </a>
            </span>
        </div>
    </footer>
    <script src="js/homepage.js"></script>
</body>

</html>