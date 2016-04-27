		<div class="nav">
			<!--Container class is in bootstrap to make things look pretty-->
			<div class="container">
				<ul class="pull-left">
					<li><a href="index.php">Home</a></li>
					<li><a href="browse.php">Browse</a></li>
					<li><a href="addgame.php">Add a Game!</a></li>
					<li>
						<form id="searchbox" action="searchInteractive.php" method="POST">
							<input id="search" type="text" name="SearchText" placeholder="Type in query here" maxlength="25">
							<input id="submit" type="submit" value="Search">
						</form>
					</li>
				</ul>
				<ul class="pull-right">
					<?php 
						if(isset($_SESSION["User"])) {
							echo "<li>Hello " . $_SESSION['User'] . "!</li>";
							echo "<li><a href=\"logout.php\">Log Out</a></li>";
							echo "<li><a href=\"watchlist.php\">Wishlist</a></li>";
						} else {
							echo "<script type='text/javascript'>alert('Please login first!');</script>";
							$URL="./index.php";
							echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';
							echo "<script type ='text/javascript'>document.location.href='{$URL}';</script>";
							echo '<li><a href="signup.php">Sign Up</a></li>
							<li><a href="login.php">Log In</a></li>';
						}
					?>
					<li><a href="help.php">Help</a></li>
				</ul>
			</div>
		</div>