    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Video Game Base</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-left">
					<li><a href="index.php">Home</a></li>
					<li><a href="browse.php">Browse</a></li>
					<li><a href="addgame.php">Add Game</a></li>
					<li><a href="searchInteractive.php">Search</a></li>
          </ul>
				<ul class="nav navbar-nav navbar-right">
					<?php //php segment changing the display bar depending on if logged in or not
						if (!isset($_SESSION["User"])){ 
							echo "<li><a href='signup.php'>Sign Up</a></li>
							<li><a href='login.php'>Log In</a></li>";
						}
						else {
							echo "<li><a href='#'> Hello, ". $_SESSION["User"] ."! </a></li>";
							echo "<li><a href='logout.php'>Logout </a></li>";
							echo "<li><a href= \"watchlist.php\">Wishlist </a></li>";
						}
					?> 
					<li><a href="help.php">Help</a></li>
				</ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <br><br><br>