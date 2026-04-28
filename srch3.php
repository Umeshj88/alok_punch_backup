<?php
require_once("menu.php");
?>
<html>
<head>
<title>
Search
</title>
</head>
<body>
<div style="height:100%; width:100%;">
<div style="height:20%; width:100%;">
</div></br></br></br>

<div style="height:80%; width:100%; text-align:center;">
<form method="POST" action="mysrch.php">
Schlr No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="form_no" /> </br>
Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="name" /> </br>
Class &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="cls">
 <option>Pre-Nursery</option>
       <option>Nursery</option>
       <option>KG</option>
       <option>Prep</option>
       <option>First</option>
       <option>Second</option>
       <option>Third</option>
       <option>Fifth</option>
       <option>Sixth</option>
       <option>Seventh</option>
       <option>Eight</option>
       <option>Ninth</option>
       <option>Tenth</option>
       <option>Eleventh</option>
       <option>Twelfth</option>
	  </select>


 </br>
</br>
<button type="submit" class="btn btn-info">Search</button>

</form>
</div>
</div>
</body>
</html>