<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restaurant Website</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/logreg.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet" />
</head>

<body id="home">
    <!-- header section -->
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="img/circleimg.png" alt="rotate-img" class="rotation-img" />
                <img src="img/logo.png" alt="logo" class="logo-img" />
                <h1>Foodies</h1>
            </div>
            <div class="mid">
                <span id="typing" class="typing"></span>
                <span id="cursor" class="cursor">|</span>
            </div>

            <nav id="navMenu">
                <a href="#home">Home</a>
                <a href="#about">About Us</a>
                <a href="#menu">Menu</a>
                <a href="#contact">Contact</a>
                <?php if (isset($_SESSION['username'])): ?>
                    <a href="#myorders">My Orders</a>
                    <div class="avatar">
                        <?php $n = strtoupper($_SESSION['username'][0]);
                        echo $n;
                        echo "<script>showUserAvatar($n);</script>"; ?>
                    </div>
                    <form action="logout.php" method="post">
                        <button type="submit" class="logoutbtn">Logout</button>
                    </form>
                    <!-- <a class="logoutbtn" href="logout.php">Logout</a> -->
                <?php else: ?>
                    <button name="login" id="loginBtn" onclick="showLogin()">Login</button>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <!-- hero section -->

    <div id="overlay" class="overlay hidden">
        <div class="auth-container">
            <span class="close-btn" onclick="closeAuth()">×</span>
            <form action="login.php" method="post">
                <!-- LOGIN -->
                <div id="loginBox">
                    <h2>Login</h2>
                    <input type="email" name="email" placeholder="Enter Email" required>
                    <input type="password" name="password" placeholder="Enter password" required>
                    <button type="submit" name="login">Login</button>
                    <p>Don't have an account?
                        <span class="link" onclick="showRegister()">Register</span>
                    </p>
                    <p>Admin Login.
                        <span class="link" onclick="showadmin()">Admin</span>
                    </p>
                </div>
            </form>

            <!-- admin -->
            <form action="auth.php" method="post">
                <div id="adminBox" class="hidden">
                    <h2>Admin</h2>
                    <input type="email" name="ademail" placeholder="Enter Email" required>
                    <input type="password" name="adpassword" placeholder="Enter password" required>
                    <button type="submit" name="adlogin">authenticate</button>
                    <p>show Login:
                        <span class="link" onclick="showLogin()">Login</span>
                    </p>
                </div>
            </form>
            <!-- REGISTER -->
            <form action="register.php" method="post">
                <div id="registerBox" class="hidden">
                    <h2>Register</h2>
                    <input type="text" name="username" placeholder="Enter name" id="name" required>
                    <input type="tel" name="phone" id="phone" placeholder="Enter Mobile no." pattern="[0-9]{10}"
                        required>
                    <input type="text" name="address" id="address" placeholder="State, District, Village - Pincode"
                        required />
                    <input type="email" name="email" id="email" placeholder="Enter email" required />
                    <input type="password" name="registerPassword" id="registerPassword" placeholder="Password"
                        required />
                    <input type="password" name="reenterregisterPassword" id="reenterregisterPassword"
                        placeholder="Re enter Password" required />
                    <button name="register">Register</button>
                    <p>Already have an account?
                        <span class="link" onclick="showLogin()">Login</span>
                    </p>
                </div>
            </form>
        </div>
    </div>
    </div>
    <section class="hero text-center ">

        <ul class="hero-slider" data-hero-slider>

            <li class="slider-item active" data-hero-slider-item>
                <div class="slider-bg">
                    <img src="img\bgimg1.jpg" class="img-cover" alt="">
                </div>

                <p class="label-2 section-subtitle slider-reveal">
                    Tradational & Hygine
                </p>

                <h1 class="display-1 hero-title slider-reveal">
                    For the love of <br> delicious food
                </h1>

                <p class="body-2 hero-text slider-reveal">
                    Come with family & feel the joy of mouthwatering food
                </p>
            </li>

            <li class="slider-item" data-hero-slider-item>
                <div class="slider-bg">
                    <img src="img/bgimg2.jpg" class="img-cover" alt="">
                </div>

                <p class="label-2 section-subtitle slider-reveal">delightful experience</p>

                <h1 class="display-1 hero-title slider-reveal">
                    Flavors Inspired by <br> the Seasons
                </h1>

                <p class="body-2 hero-text slider-reveal">
                    Come with family & feel the joy of mouthwatering food
                </p>
            </li>

            <li class="slider-item" data-hero-slider-item>
                <div class="slider-bg">
                    <img src="img/bgimg3.jpg" class="img-cover" alt="">
                </div>

                <p class="label-2 section-subtitle slider-reveal">
                    amazing & delicious
                </p>

                <h1 class="display-1 hero-title slider-reveal">
                    Where every flavor <br> tells a story
                </h1>

                <p class="body-2 hero-text slider-reveal">
                    Come with family & feel the joy of mouthwatering food
                </p>
            </li>
        </ul>
    </section>


    <!-- menu -->

    <!-- breakfast section -->
    <div class="partition autoshow" id="menu">
        <img src="img\separator.svg" alt="seperator">
        <h1>
            Breakfast
        </h1>
        <img src="img\separator.svg" alt="seperator">

    </div>
    <section class="menu1">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM breakfast");

        while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="card imgrevel">

                <img src="<?php echo $row['image'];
                            $_SESSION['image'] = $row['image']; ?>" />
                <h2>
                    <?php echo $row['item_name']; ?>
                </h2>
                <div id="price" class="price">₹
                    <?php echo $row['price']; ?>
                </div>
                <button type="button"
                    onclick="addToCart(
                '<?= $row['item_name'] ?>',
                <?= $row['price'] ?>
                )">
                    Order Now
                </button>
            </div>
        <?php } ?>
    </section>

    <!-- dinner section -->

    <div class="partition autoshow">
        <img src="img\separator.svg" alt="seperator">
        <h1>Dinner</h1>
        <img src="img\separator.svg" alt="seperator">
    </div>
    <section class="menu1">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM dinner");
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="card imgrevel">
                <img src="<?php echo $row['image'];
                            $_SESSION['image'] = $row['image']; ?>" />
                <h2>
                    <?php echo $row['item_name']; ?>
                </h2>
                <div id="price" class="price">₹
                    <?php echo $row['price']; ?>
                </div>
                <button type="button"
                    onclick="addToCart(
                '<?= $row['item_name'] ?>',
                <?= $row['price'] ?>
                )">
                    Order Now
                </button>
            </div>
        <?php } ?>
    </section>

    <!-- dessort section -->

    <div class="partition autoshow">
        <img src="img\separator.svg" alt="seperator">
        <h1>desserts</h1>
        <img src="img\separator.svg" alt="seperator">
    </div>
    <section class="menu1">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM desserts");
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="card imgrevel">
                <img src="<?php echo $row['image'];
                            $_SESSION['image'] = $row['image']; ?>" />
                <h2>
                    <?php echo $row['item_name']; ?>
                </h2>
                <div id="price" class="price">₹
                    <?php echo $row['price']; ?>
                </div>
                <button type="button"
                    onclick="addToCart(
                    '<?= $row['item_name'] ?>',
                    <?= $row['price'] ?>
                    )">
                    Order Now
                </button>

            </div>
        <?php } ?>
    </section>
    </section>
    <!-- cart card -->
    <form action="order.php" method="post">
        <div id="cart" class="cart hidden">
            <h3>Your Cart</h3>
            <div id="cartItems"></div>
            <div class="total">
                Total: ₹ <span id="cartTotal">0</span>
            </div>
            <input type="hidden" name="cartData" id="cartData">
            <input type="hidden" name="cartTotalValue" id="cartTotalValue">
            <button type="submit" class="order">Buy Now</button>
        </div>
    </form>


    <section class="myorders" id="myorders">

        <h2>My Orders</h2>

        <table border="1" width="90%">
            <tr>
                <th>ID</th>
                <th>Items</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Date</th>
                <th>Delete</th>
            </tr>
            <?php
            if (isset($_SESSION['email'])) {
                $email = $_SESSION['email'];
                $query = "SELECT * FROM orders WHERE email='$email'";
                $result = mysqli_query($conn, $query);
            } else {
                echo "<tr><td colspan='6'>Please login to view your orders.</td></tr>";
            }
            ?>
            <?php if (mysqli_num_rows($result) == 0) { ?>
                <tr>
                    <td colspan="6">No orders found.</td>
                </tr>
            <?php } else ?>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['food_name']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td>₹<?php echo $row['price']; ?></td>
                    <td><?php echo $row['order_date']; ?></td>
                    <td>

                        <!-- $table = $_POST['table_nm'];
                        $col_nm = $_POST['col_nm'];
                        $id = $_POST['id']; -->
                        <form action="delete.php" method="POST">
                            <input type="hidden" name="table_nm" value="orders">
                            <input type="hidden" name="col_nm" value="order_id">
                            <input type="hidden" name="id" value="<?php echo $row['order_id']; ?>">
                            <button name="submit" type="submit"
                                class="delete-btn"
                                onclick="return confirm('Are you sure you want to delete this item?')">
                                ❌ Delete
                            </button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </section>




    <!-- about section -->
    <section class=" chooseus" id="about">
        <p class="autoshow">Why choose us</p>
        <img src="img\separator.svg" alt="separator" class="autoshow">
        <div class="collection imgrevel">
            <div class="uscard imgrevel">
                <img
                    src="https://s3.ap-south-1.amazonaws.com/bs.in-bucket-1/_u/32399/user_post/_p32399_1691585254_img.jpg" />
                <h2>Hygienic Food</h2>
                <h4>
                    crucial for preventing foodborne illnesses like food poisoning by controlling bacteria, viruses.
                </h4>
            </div>
            <div class="uscard imgrevel">
                <img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNuQY6gyi4-yyhtF7wg2V8V--PYa1o3AOSaA&s" />
                <h2>fresh enviroment</h2>
                <h4>
                    Our digital presence is built on the principles of sustainable web design, ensuring that our
                    operations are as kind to the planet as they are efficient for our users.
                </h4>
            </div>
            <div class="uscard imgrevel">
                <img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQiJDGKmEDCY8I4eVpJAEH6NC4_Fi1ASlK1yg&s" />
                <h2>skilled chefs</h2>
                <h4>
                    dynamic and innovative approach to the kitchen. With a foundation built on classic techniques and an
                    eagerness to explore global flavors
                </h4>
            </div>
            <div class="uscard imgrevel">
                <img
                    src="https://soulchef.in/blogs/wp-content/uploads/2025/09/cinematic-happy-people-celebrating-american-independence-day-holiday-scaled.jpg" />
                <h2>Event & party</h2>
                <h4>
                    Attend our annual Summer Gala for dining, entertainment, and dancing. Register now!.
                </h4>
            </div>
        </div>
        </div>
        </div>
    </section>
    <!-- contact section -->

    <footer id="contact">

        <img src="https://media.istockphoto.com/id/1318478175/photo/vegan-raw-vegetables-on-green-wooden-table-background.jpg?s=612x612&w=0&k=20&c=TLk6JMXP1u8Nu9pAvq1LtJ0ae5bCYDIqzK-mPUP-tcc="
            alt="contact background">

        <div class="div1 imgrevel">
            <a href="#home">Home</a>
            <a href="#about">About Us</a>
            <a href="#menu">Menu</a>
            <a href="#contact">Contact</a>
        </div>
        <div class="div2 imgrevel">
            <h1>
                Get in Touch
            </h1>
            <h4>
                <ion-icon name="call-outline"></ion-icon>
                +91 1234567890
            </h4>
            <p><ion-icon name="location"></ion-icon>Foodies resto near willingdon collage,sagli</p>

            <h2>Give Your Feedback</h2>

            <form action="feedback.php" method="POST">

                <select name="rating" class="dropdown" required>
                    <option value="">Select Rating</option>
                    <option value="5">⭐⭐⭐⭐⭐</option>
                    <option value="4">⭐⭐⭐⭐</option>
                    <option value="3">⭐⭐⭐</option>
                    <option value="2">⭐⭐</option>
                    <option value="1">⭐</option>
                </select>
                <br><br>

                Message:<br>
                <textarea name="message" class="textarea" rows="5" cols="40" required></textarea>
                <br><br>

                <button type="submit">Submit Feedback</button>
            </form>
        </div>
        <div class="div3 imgrevel">
            <a href=""><ion-icon name="logo-instagram"></ion-icon></a>
            <a href=""><ion-icon name="logo-facebook"></ion-icon></a>
            <a href=""><ion-icon name="logo-twitter"></ion-icon></a>
            <a href=""><ion-icon name="logo-youtube"></ion-icon></a>
            <a href=""><ion-icon name="locate-outline"></ion-icon></a>
        </div>
    </footer>

    <!-- adding exter scripts -->

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="js/script.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/logreg.js"></script>
</body>

</html>