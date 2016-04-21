		<div class="nav">
			<!--Container class is in bootstrap to make things look pretty-->
			<div class="container">
				<ul class="pull-left">
					<li><a href="index.php">Home</a></li>
					<li><a href="browse.php">Browse</a></li>
					<li><a href="addgame.php">Add Game</a></li>
					<li>
						<form id="searchbox" action="search.php" method="POST">
							<input id="search" type="text" name="SearchText" placeholder="Type in query here" maxlength="25">
							<input id="submit" type="submit" value="Search">
						</form>
					</li>
				</ul>
				<ul class="pull-right">
					<?php //php segment changing the display bar depending on if logged in or not
						if (!isset($_SESSION["User"])){ 
							echo "<li><a href='signup.php'>Sign Up</a></li>
							<li><a href='login.php'>Log In</a></li>";
						}
						else {
							echo "<li> Hello, ". $_SESSION["User"] ."</li>";
							echo "<li><a href='logout.php'>Logout</a></li>";
						}
					?> 
					<li><a href="help.php">Help</a></li>
				</ul>
			</div>
		</div>