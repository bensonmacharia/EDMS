
<style type="text/css">
#primary_nav_wrap
{
	margin-left:10px;
	padding-top:5px;
	
}
#primary_nav_wrap ul
{
	list-style:none;
	position:relative;
	float:left;
	margin:0;
	padding:0;
	background-color:#ddd;
}

#primary_nav_wrap ul a
{
	display:block;
	color:#333;
	text-decoration:none;
	font-weight: bold;
	font-size:12px;
	line-height:32px;
	padding:0 15px;
	font-family:"HelveticaNeue","Helvetica Neue",Helvetica,Arial,sans-serif
}

#primary_nav_wrap ul li
{
	position:relative;
	float:left;
	margin:0;
	padding:0;
}

#primary_nav_wrap ul li.current-menu-item
{
	background: #bbb;
}

#primary_nav_wrap ul li:hover
{
	background:#f6f6f6;
}

#primary_nav_wrap ul ul
{
	display:none;
	position:absolute;
	top:100%;
	left:0;
	background:#fff;
	padding:0
}

#primary_nav_wrap ul ul li
{
	float:none;
	width:200px;
}

#primary_nav_wrap ul ul a
{
	line-height:120%;
	padding:10px 15px
}

#primary_nav_wrap ul ul ul
{
	top:0;
	left:100%
}

#primary_nav_wrap ul li:hover > ul
{
	display:block;
}

</style>

<nav id="primary_nav_wrap">
<ul>
  <li class="current-menu-item"><a href="home.php">Home</a></li>
  <li><a href="files.php">Files</a></li>
  <li><a href="training.php">Training</a></li>
  <li><a href="edms_admin.php">Admin</a></li>
  <li><a href="about.php">Why EDMS</a></li>
  <li><a href="faqs.php">FAQs</a></li>
  <li><a href="contact.php">Contact Us</a></li>
</ul>
</nav>