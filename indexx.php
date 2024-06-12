
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIYOAM</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

</head>


<body>
    <header>
    <a href="#" class="logo"><img src="images/logo1.png" alt="Car Rental Logo" /></a>
    <div class="navigation1">
    <div class="X-image">
        <img src="/images/close.jpg" alt="x-image"  onclick="closeham()">
    </div>

<div class="ham-list">
   <ul>
  <li onclick="closeham()"><a href="#home">Home</a></li>
  <li onclick="closeham()"><a href="list.php">Car List</a></li>
  <li onclick="closeham()"><a href="#about">About</a></li>
  <li onclick="closeham()"><a href="#contact">Contact</a></li>
</ul>
</div>
</div>
        <nav>
                <div  class="nav-menu-btn" onclick="openham()">
                    <svg onclick="openham()" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3 7C3 6.44772 3.44772 6 4 6H20C20.5523 6 21 6.44772 21 7C21 7.55228 20.5523 8 20 8H4C3.44772 8 3 7.55228 3 7ZM3 12C3 11.4477 3.44772 11 4 11L20 11C20.5523 11 21 11.4477 21 12C21 12.5523 20.5523 13 20 13L4 13C3.44772 13 3 12.5523 3 12ZM4 16C3.44772 16 3 16.4477 3 17C3 17.5523 3.44772 18 4 18H20C20.5523 18 21 17.5523 21 17C21 16.4477 20.5523 16 20 16H4Z" fill="#6070FF"/>
                        </svg>
                </div>
   <ul class="nav-bar">
<li><a href="#home">Home</a></li>
<li><a href="list.php">Car List</a></li>
<li><a href="#about">About</a></li><data value=""></data>
<li><a href="#contact">Contact</a></li>

   </ul>
</nav>
<div id="login-btn">
    <a href="login.php" class="btnLog">Login</a>
</div>
    </header>




    <section class="home" id="home">
        <div class="homet">
        <div class="mob"><img class="mobi" src="images/black.jpeg" alt=""></div>
        <div class="home-content">
            <h1>Welcome to XYZ <br> Car Rental</h1>
            <p>Experience the freedom of the open road <br> with our premium car rental services.</p>
 
        </div>
    </div>
    </section> 
    <section class="hidden-cars">
    <section class="car-list" id="car-list">
        <div class="service">
        <span>Best services</span>
        <h1>Explore Out Top Deals<br> From Top Rated Dealers</h1>
        </div>
        <div class="service-container">
            <div class="box">
                <div class="box-img">
                    <img src="images/toyotaCorolla.png" alt="imgs">
                </div>
                <div>
                    <h3>Toyota Corolla</h3>
                    <p>Model year: <span>2023 Model</span></p>
                    <p>Fuel Type : <span>Petrol</span></p>
                    <p>Transmission : <span>Automatic</span></p>
                    <p>Seating Capacity : <span>5</span></p>
                    <p>Cylinder : <span>4</span></p>
                    <p>Body Type: <span>Sedan</span></p>
                    <h2> $ 58500 <span>/day</span></h2>
                    <a href="#" class="btn">Rent Now</a>
                </div>
            </div>
        
            <div class="box">
                <div class="box-img">
                    <img src="images/Honda.png" alt="imgs">
                </div>
                <div>
                    <h3>Honda Civic</h3>
                    <p>Model year: <span>2016 Model</span></p>
                    <p>Fuel Type : <span>Diesel</span></p>
                    <p>Transmission : <span>Manual</span></p>
                    <p>Seating Capacity : <span>5</span></p>
                    <p>Cylinder : <span>4</span></p>
                    <p>Body Type: <span>Sedan</span></p>
                    <h2> $ 58500 <span>/day</span></h2>
                    <a href="#" class="btn">Rent Now</a>
                </div>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="images/bmw_z4" alt="imgs">
                </div>
                <div>
                    <h3>BMW Z4</h3>
                    <p>Model year: <span>2023 Model</span></p>
                    <p>Fuel Type : <span>Petrol</span></p>
                    <p>Transmission : <span>Automatic</span></p>
                    <p>Seating Capacity : <span>2</span></p>
                    <p>Cylinder : <span>6</span></p>
                    <p>Body Type: <span>Convertible</span></p>
                    <h2> $ 58500 <span>/day</span></h2>
                    <a href="#" class="btn">Rent Now</a>
                </div>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="images/bmw_x5" alt="imgs">
                </div>
                <div>
                    <h3>BMW X5</h3>
                    <p>Model year: <span>2023 Model</span></p>
                    <p>Fuel Type : <span>Diesel</span></p>
                    <p>Transmission : <span>Automatic</span></p>
                    <p>Seating Capacity : <span>5</span></p>
                    <p>Cylinder : <span>6</span></p>
                    <p>Body Type: <span>SUV</span></p>
                    <h2> $ 58500 <span>/day</span></h2>
                    <a href="#" class="btn">Rent Now</a>
                </div>
            </div>
        
            <div class="box">
                <div class="box-img">
                    <img src="images/isuzu_dmax.png" alt="imgs">
                </div>
                <div>
                    <h3>Isuzu D-Max</h3>
                    <p>Model year: <span>2023 Model</span></p>
                    <p>Fuel Type : <span>Diesel</span></p>
                    <p>Transmission : <span>Manual</span></p>
                    <p>Seating Capacity : <span>5</span></p>
                    <p>Cylinder : <span>4</span></p>
                    <p>Body Type: <span>Pickup Truck</span></p>
                    <h2> $ 58500 <span>/day</span></h2>
                    <a href="#" class="btn">Rent Now</a>
                </div>
            </div>
            <div class="box">
                <div class="box-img">
                    <img src="images/isuzuS-CabZ.png" alt="imgs">
                </div>
                <div>
                    <h3>Isuzu S-CAB Z</h3>
                    <p>Model year: <span>2023 Model</span></p>
                    <p>Fuel Type : <span>Diesel</span></p>
                    <p>Transmission : <span>Manual</span></p>
                    <p>Seating Capacity : <span>5</span></p>
                    <p>Cylinder : <span>4</span></p>
                    <p>Body Type: <span>SUV</span></p>
                    <h2> $ 58500 <span>/day</span></h2>
                    <a href="#" class="btn">Rent Now</a>
                </div>
            </div>
          
        
          
        
              
               
        </div>
        <div class="seeA">
            <button type="button" class="see" onclick="window.location.href='./list.php';">See All</button>
        </div>
        </section>
    </section>
 
<section class="about" id="about">
    <div class="about-container">
        <div class="about-image">
            <img class="mobi2" src="images/yellow.jpeg"About Image">
        </div>
        <div class="about-content">
            <h2>About Our Car Rental Service</h2>
            <p>Welcome to our premier car rental service, where we strive to provide you with an unparalleled driving
                experience. With a vast fleet of well-maintained vehicles and a team of dedicated professionals, we are
                committed to making your transportation needs a seamless and enjoyable journey.</p>
            <p>Our company was founded on the principle of delivering exceptional customer service, and we take great
                pride in our ability to cater to the diverse needs of our clients. Whether you're planning a vacation, a
                business trip, or simply need a reliable means of transportation, we have the perfect car for you.</p>
           
        </div>
    </div>
</section>
<section class="contact" id="contact">
    <div class="contact-container">
        <div class="contact-info">
            <h2>Contact Us</h2>
            <p>Have a question or need assistance? Get in touch with our friendly team.</p>
            <ul>
                <li><i class="fas fa-map-marker-alt"></i>
                    <div> <h4>Address</h4><p>Ethiopia, Addis Abeba</p></div>
                </li>
                <li> <i class="fas fa-phone-alt"></i>
                    <div><h4>Phone</h4> <p>+2519763453</p></div>
                </li>
                <li>
                    <i class="fas fa-envelope"></i>
                    <div> <h4>Email</h4> <p>info@carrentalsystem.com</p> </div>
                </li>
            </ul>
        </div>
        <div class="media">
            <h1>Socials</h1>
            <div class="buttonSo">
        <div class="icon"><i class="fab fa-facebook-f"></i></div>
        <span>Facebook</span>
            </div>
        
            <div class="buttonSo">
                <div class="icon"><i class="fab fa-twitter"></i></div>
                <span>Twitter</span>
            </div>
        
            <div class="buttonSo">
                <div class="icon"><i class="fab fa-instagram"></i></div>
                <span>Instagram</span>
            </div>
        
            <div class="buttonSo">
                <div class="icon"><i class="fab fa-youtube"></i></div>
                <span>Youtube</span>
            </div>
          </div>
    </div>
</section>
<script>
    const form = document.getElementById('contacts');
    const emailInput = document.getElementById('email');
    const errorMessage = document.getElementById('error-message');
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        const email = emailInput.value;
        if (email === email.toLowerCase()) {
            form.submit();
        } else {
            errorMessage.textContent = 'Please enter your email in lowercase.';
        }
    });
</script>
    <script src="index.js"></script>
</body>
</html>