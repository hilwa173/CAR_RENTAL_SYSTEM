<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Customer Form</title>
	<link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>

	<div class="container">
		<h1>Customer Form</h1>
		<form class="form">
			<label for="customer-name">Customer Name</label><br>
			<input type="text" name="cust_name" id="cust_name" placeholder="full name" required><br>

            <label for="customer-name">Phone</label><br>
			<input type="text" name="phone" id="phone" placeholder="phone number" required><br>

			<label for="customer-name">Adress</label><br>
			<input type="text" name="adress" id="phone" placeholder="adress" required><br>

			<label for="start-date">Start Date</label><br>
			<input type="date" id="start-date" required><br>

			<label for="end-date">End Date</label><br>
			<input type="date" id="end-date" required><br>

			<button type="submit">Save</button>
		</form>
</div>
</body>
</html>