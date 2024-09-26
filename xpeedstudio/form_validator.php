<?php
	class FormValidator {
		private $data;
		private $errors = [];
		
		public function __construct($postData) {
			$this->data = $postData;
		}

		public function validateForm() {
			$this->validateBuyerName();
			$this->validateBuyerEmail();
		    $this->validateCity();
			$this->validatePhone();
			$this->validateItems();
			$this->validateAmount();
			$this->validateEntryBy();
			$this->validateReceiptId();
			$this->validateNote(); 
			
			return $this->errors;
		}

		private function validateBuyerName() {
			$buyername = trim($this->data['name']);
			if (!preg_match('/^[a-zA-Z0-9\s]{1,20}$/', $buyername)) {
				$this->errors['buyername'] = 'Invalid! only text, spaces and numbers, not more than 20 characters. ***!';
			}
		}

		private function validateBuyerEmail() {
			$email = trim($this->data['email']);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$this->errors['email'] = 'Invalid email format ***!';
			}
		}
		private function validateCity() {
			$city = trim($this->data['city']);
			if (!preg_match('/^[a-zA-Z\s]+$/', $city)) {
				$this->errors['city'] = 'Invalid! only text and spaces. ***!';
			}
		}
		private function validatePhone() {
			$phone = trim($this->data['phone']);
			if (!preg_match('/^[0-9]+$/', $phone)) {
				$this->errors['phone'] = 'Invalid! only numbers. ***!';
			}
		}

		private function validateItems() {
			$items = trim($this->data['items']);
			if (!preg_match('/^[a-zA-Z]+$/', $items)) {
				$this->errors['items'] = 'Invalid! only text. ***!';
			}
		}

		private function validateAmount() {
			$amount = trim($this->data['amount']);
			if (!preg_match('/^[0-9]+$/', $amount)) {
				$this->errors['amount'] = 'Invalid! only numbers. ***!';
			}
		}
		private function validateEntryBy() {
			$entryby = trim($this->data['entryby']);
			if (!preg_match('/^[0-9]+$/', $entryby)) {
				$this->errors['entryby'] = 'Invalid! only numbers. ***!';
			}
		}

		private function validateReceiptId() {
			$receipt_id = trim($this->data['receipt_id']);
			if (!preg_match('/^[a-zA-Z]+$/', $receipt_id)) {
				$this->errors['receipt_id'] = 'Invalid! only text. ***!';
			}
		}

		private function validateNote() {
			$input_text = trim($this->data['note']);

			// Count the words in the input
			$words = preg_split('/[\s\p{P}]+/u', $input_text, -1, PREG_SPLIT_NO_EMPTY);
    
			// Return the word count
			$cnt= count($words);

			// Check if the word count exceeds 30
			if ($cnt > 30) {
				$this->errors['note'] = 'Invalid! not more than 30 words allowed. ***!';
			} else {
				// echo "Input is valid. ";
			}
		} 
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$obj = new FormValidator($_POST);
		$errors = $obj->validateForm();
		
		if (empty($errors)) {
			
			$db = new Database();
			$conn = $db->connect();
			
			// collect data from the Form
			$name=$_POST['name'];
			$email=$_POST['email'];
			$city=$_POST['city'];
			$phone=$_POST['phone'];
			$items=$_POST['items'];
			$amount=$_POST['amount'];
			$entryby=$_POST['entryby'];
			$receipt_id=$_POST['receipt_id'];
			$note=$_POST['note'];
			
			$date=date("Y-m-d");
			$buyer_ip= $_SERVER['REMOTE_ADDR'];

			
			$result= $db->insert('customer',array($amount,$name,$receipt_id,$items,$email,$buyer_ip,$note,$city,$phone,$date,$entryby));
			
			if($result){
				// insert data into database successfully
				echo "<p class='success'>Form submitted successfully!</p>";
			}
			else{
				// Problem occured during insert data into DB
				echo "<p class='error'>Form submitted Failed!</p>";
			}
		} else {
			$buyerNameErr = isset($errors['buyername'])? $errors['buyername']:'';
			$buyerEmailErr = isset($errors['email'])? $errors['email']:'';
			$cityErr = isset($errors['city'])? $errors['city']:'';
			$phoneErr = isset($errors['phone'])? $errors['phone']:'';
			$itemsErr = isset($errors['items'])? $errors['items']:'';
			$amountErr = isset($errors['amount'])? $errors['amount']:'';
			$entryByErr = isset($errors['entryby'])? $errors['entryby']:'';
			$receiptIdErr = isset($errors['receipt_id'])? $errors['receipt_id']:'';
			$noteErr = isset($errors['note'])? $errors['note']:'';

		}
	} 
?>
