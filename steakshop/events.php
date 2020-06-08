<?php ?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>SteakShop Restaurant</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css">
	<link rel="stylesheet" href="vendors/animate-css/animate.css">
	<!-- main css -->
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<!--================ Start Header Menu Area =================-->
	<div class="menu-trigger">
		<span></span>
		<span></span>
		<span></span>
	</div>
	<header class="fixed-menu">
		<span class="menu-close"><i class="fa fa-times"></i></span>
		<div class="menu-header">
			<div class="logo d-flex justify-content-center">
				<img src="img/logo.png" alt="">
			</div>
		</div>
		<div class="nav-wraper">
			<div class="navbar">
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link active" href="index.php"><img src="img/header/nav-icon1.png" alt=""> home</a></li>
					<li class="nav-item"><a class="nav-link" href="about-us.html"><img src="img/header/nav-icon2.png" alt="">about</a></li>
					<li class="nav-item submenu dropdown">
						<a class="nav-link dropdown-toggle active" href="#" data-toggle="dropdown" role="button" aria-haspopup="true"
						 aria-expanded="false"><img src="img/header/nav-icon3.png" alt="">menu</a>
						<ul class="dropdown-menu">
							<li class="nav-item"><a class="nav-link active" href="events.php">events</a></li>
						</ul>
					</li>
					
					<li class="nav-item"><a class="nav-link" href="book-table.html"><img src="img/header/nav-icon4.png" alt="">Book
							Table</a></li>
					<li class="nav-item"><a class="nav-link" href="Chefs.html"><img src="img/header/nav-icon5.png" alt="">Chefs</a></li>
					<li class="nav-item submenu dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true"
						 aria-expanded="false"><img src="img/header/nav-icon6.png" alt="">Pages</a>
						<ul class="dropdown-menu">
							<li class="nav-item"><a class="nav-link" href="elements.html">element</a></li>
						</ul>
					</li>
					<li class="nav-item submenu dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
						 aria-expanded="false"><img src="img/header/nav-icon7.png" alt="">Blog</a>
						<ul class="dropdown-menu">
							<li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
							<li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
						</ul>
					</li>
					<li class="nav-item"><a class="nav-link" href="contact.html"><img src="img/header/nav-icon8.png" alt="">contact</a></li>
				</ul>
			</div>
		</div>
	</header>
	<!--================ End Header Menu Area =================-->
 <?php

      try
    {
      $servername = "localhost";
      $DBusername = "root";
      $DBpassword = "";
        $db = new PDO("mysql:host=$servername;port=3308;dbname=yessine", $DBusername, $DBpassword);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Connected successfully"; 

    }
      catch(Exception $e)
    {
       echo "Connection failed: " . $e->getMessage();
    }
            $nom_event = '';
            $remise = '';
            $date_debut = '';
            $date_fin = '';
            $result = $db->prepare('SELECT * FROM event');
            $result->execute();
            ?>
	<div class="site-main">
		<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" class="active" style="cursor: default;">Events</a>
    </li>
    <?php 
       while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?> 
    <li class="nav-item">
      <a class="nav-link" href="?id=<?php echo $row['event_id']?>"> <?php echo $row['nom_event'];?> </a>
    </li>
<?php endwhile?>
    
  </ul>
</nav>


		<!--================ Start Home Banner Area =================-->
		
		<!-- Start banner bottom -->
		<?php if(isset($_GET['id'])):

$id = $_GET['id'];
 $result = $db->prepare('SELECT * FROM event_discount where event_id = :id AND event_category_discount!=0 ');
  $result->bindParam(':id',$id);
            $result->execute();
           
?>
	
<section class="menu_area section_gap">
			<div class="container">
				<div class="row menu_inner">
					<div class="col-lg-5">
						<div class="menu_list">
							<?php
								if ($result->rowcount()==0)
								{
									?>
								
									<h2>Event coming soon</h2>
									<?php
								}
								 else{
								 ?>
							<h1>Discount on these dishes</h1>
							<ul class="list">
								<?php
								while ($row = $result->fetch(PDO::FETCH_ASSOC)):?>
								<li>
									<h4 style="padding-right: 50px; padding-left: 10px;"><?php echo $row['nom_produit'];?>
										<span><?php echo ($row['prix_produit']*(1-$row['event_category_discount'])) ;?>dt  </span>
										<span style="text-decoration-line: line-through; color: red;"> <?php echo $row['prix_produit'] ;?>dt</span>
										
									</h4>
									<p>(French bread baguette, cooked ham, potato salad)</p>
								</li>
		
	<?php endwhile?>

</ul>
<?php }?>
</div>
</div>
</div>
</div>
</section>
<?php endif?>

		<!-- End banner bottom -->
		<!--================ End Home Banner Area =================-->

		<!--================ Start Breakfast Area =================-->
		
		<!--================ Start Footer Area =================-->
		
		</br>
		</br>
		</br>
		</br><footer class="footer-area overlay">

			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-4 col-sm-6">
						<div class="single-footer-widget">
							<h6>Top Products</h6>
							<div class="row">
								<div class="col">
									<ul class="list">
										<li><a href="#">Managed Website</a></li>
										<li><a href="#">Manage Reputation</a></li>
										<li><a href="#">Power Tools</a></li>
										<li><a href="#">Marketing Service</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-6">
						<div class="single-footer-widget">
							<h6>Quick Links</h6>
							<div class="row">
								<div class="col">
									<ul class="list">
										<li><a href="#">Jobs</a></li>
										<li><a href="#">Brand Assets</a></li>
										<li><a href="#">Investor Relations</a></li>
										<li><a href="#">Terms of Service</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-6">
						<div class="single-footer-widget">
							<h6>Features</h6>
							<div class="row">
								<div class="col">
									<ul class="list">
										<li><a href="#">Jobs</a></li>
										<li><a href="#">Brand Assets</a></li>
										<li><a href="#">Investor Relations</a></li>
										<li><a href="#">Terms of Service</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-6">
						<div class="single-footer-widget">
							<h6>Resources</h6>
							<div class="row">
								<div class="col">
									<ul class="list">
										<li><a href="#">Guides</a></li>
										<li><a href="#">Research</a></li>
										<li><a href="#">Experts</a></li>
										<li><a href="#">Agencies</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-8">
						<div class="single-footer-widget">
							<h6>Newsletter</h6>
							<p>Stay update with our latest</p>
							<div class="" id="mc_embed_signup">
								<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
								 method="get" class="form-inline">
									<div class="d-flex flex-row">
										<input class="form-control" name="EMAIL" placeholder="Your email address" onfocus="this.placeholder = 'Your email address'" onblur="this.placeholder = 'Your email address'"
										 required="" type="email">
										<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
										<div style="position: absolute; left: -5000px;">
											<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
										</div>
									</div>
									<div class="info"></div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row footer-bottom justify-content-between">
					<div class="col-lg-6">
						<p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
					</div>
					<div class="col-lg-2">
						<div class="social-icons">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>

			</div>
		</footer>
		<!--================ Start Footer Area =================-->
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="vendors/lightbox/simpleLightbox.min.js"></script>
	<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="vendors/jquery-ui/jquery-ui.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="vendors/counter-up/jquery.waypoints.min.js"></script>
	<script src="vendors/counter-up/jquery.counterup.js"></script>
	<script src="js/mail-script.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/theme.js"></script>
</body>

</html>