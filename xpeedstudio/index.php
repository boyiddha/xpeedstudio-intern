<?php
	include 'db_connection.php';
	include 'form_validator.php';
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<div class="form-container">
	<div class="form-top">
		<span>Form Validation</span>
		<a href="report.php"> <button type="submit" class="report-btn" >see report!</button> </a>
	
	</div>
	
    <form action="" method="POST">
        <div class="form-row">
            <div class="form-group">
                <label for="first_name">Buyer Name:</label>
                <input type="text" name="name" id="name" value="" required>
                <span class="error"><?php echo $buyerNameErr ?? ''; ?></span>
            </div>
            <div class="form-group">
                <label for="last_name">Buyer Email:</label>
                <input type="email" name="email" id="email" value="" required>
                <span class="error"><?php echo $buyerEmailErr ?? ''; ?></span>
            </div>
        </div>
 
        <div class="form-row">
            <div class="form-group">
                <label for="email">Buyer City:</label>
                <input type="text" name="city" id="city" value="" required>
                <span class="error"><?php echo $cityErr ?? ''; ?></span>
            </div>
            <div class="form-group">
                <label for="username">Buyer Phone:</label>
                <input type="tel" name="phone" id="phone" value="" required>
                <span class="error"><?php echo $phoneErr ?? ''; ?></span>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="password">Items:</label>
                <input type="text" name="items" id="items" value="" required>
                <span class="error"><?php echo $itemsErr ?? ''; ?></span>
            </div>
            <div class="form-group">
                <label for="confirm_password">Amount:</label>
                <input type="number" name="amount" id="amount" value="" required>
                <span class="error"><?php echo $amountErr ?? ''; ?></span>
            </div>
        </div>
		

        <div class="form-row">
            <div class="form-group">
                <label for="password">Entry by:</label>
                <input type="number" name="entryby" id="entryby" value="" required>
                <span class="error"><?php echo $entryByErr ?? ''; ?></span>
            </div>
            <div class="form-group">
                <label for="confirm_password">Receipt Id:</label>
                <input type="text" name="receipt_id" id="receipt_id" value="" required>
                <span class="error"><?php echo $receiptIdErr ?? ''; ?></span>
            </div>
        </div>
		<div class="form-group">
            <label for="username">Note:</label>
            <textarea type="text" name="note" id="note" value="" rows="4" cols="40"></textarea>
            <span class="error"><?php echo $noteErr ?? ''; ?></span>
        </div> 

        <button type="submit" class="submit-btn" name="save">Save</button>
    </form>
</div>

</body>
</html>
