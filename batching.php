<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<title>BT Batch Processing</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
}

/* Style the header */
.header {
  background-color: #f1f1f1;
  padding: 20px;
  text-align: center;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Create three unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
}

/* Left and right column */
.column.side {
  width: 25%;
}

/* Middle column */
.column.middle {
  width: 50%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column.side, .column.middle {
    width: 100%;
  }
}

/* Style the footer */
.footer {
  background-color: #f1f1f1;
  padding: 10px;
  text-align: center;
}
</style>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

input[type=submit]:disabled,
input[type=submit][disabled]{
  border: 1px solid #999999;
  background-color: #cccccc;
  color: #666666;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>

<div class="header">
  <h1>Braintree Batch Transaction Processing</h1>
</div>


<div class="topnav">
  <a > </a>

</div>


<div class="row">
 <div class="column side">
 	<p>Download this
	<a href="sample.xlsx" download>Sample</a>
	excel file for the layout and save as .txt before uploading</p>
  </div>

  <div class="column middle">
  	<div>
    <h2>Content:</h2>

	<form method="POST" action="BT_upload.php" enctype="multipart/form-data" id=myForm>
	<label for="fname">Merchant ID</label>
	<input type="text" name="mid" value="5n2krnfw5xz3ww2y" required><br>

	<label for="fname">Public Key</label>
	<input type="text" name="pubkey" value="xrbfv9twr8jbqvxv" required ><br>

	<label for="fname">Private Key</label>
	<input type="text" name="pvtkey" value="0a847d53558e8e286a6e59029bf6fbc5" required ><br>

	<input type="file" name="ufile" accept="text/plain" required><br><br>
	<input type="submit" id="submit_button" name="submit_button">
	</form>
	</div>
  </div>
  
  <div class="column side">
  	<div>
    <h2>Note:</h2>
    <p> - After processing has been completed, the output report will be auto displayed
	<p> - Please allow a few minutes before refreshing the page
	<p> - The credentials are not harcoded and can be replaced with your sandbox account credentials
	<p> - Due to securtiy risks and server limitations, files size greater than 20 rows may cause unexpected behaviour</p>
	</div>
  </div>
</div>


<script>
	$('#myForm').one('submit', function() {
    $(this).find('input[type="submit"]').attr('disabled','disabled');
});
</script>



<div class="footer">
  <p>This is for demo purposes only</p>
  <p>Contact: hjohari@paypal.com</p>
</div>

</body>
</html>
