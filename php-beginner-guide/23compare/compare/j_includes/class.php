<?php
// Our main class
if(!class_exists('Joomba')){
	class Joomba {
		
		var $tcategories = 'j_categories';
		var $tcatrelationships = 'j_cat_relationships';
		var $tcomparisons = 'j_comparisons';
		var $tlocations = 'j_locations';
		var $tmerchants = 'j_merchants';
		var $tproducts = 'j_products';
		var $tusers = 'j_users';
				
		function addMedia() {
			global $jdb;
			
			//See if we have data to process
			if ( empty($_POST) ) {
				return;
			}
			
			//Check to make sure the form submission is coming from our script
			//The full URL of our submission page
			$current = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

			//The full URL of the page the form was submitted from
			$referrer = $_SERVER['HTTP_REFERER'];
			$parts = parse_url($referrer);
			$referrer = $parts['scheme'].'://'.$parts['host'].$parts['path'];
			
			//Kill if the form wasn't submitted from our script
			if ( $current != $referrer ) {
				return '<p class="error">Your form submission did not come from the correct page. Please check with the site administrator.</p>';
			}
			
			//Check our nonce to double-check the form submission
			$nonce = $_POST['nonce'];
			$nonceCheck = $this->j_nonce('add-media', $_POST['date']);
			
			if ( $nonce != $nonceCheck ) {
				return '<p class="error">Your form submission did not pass authentication. Please check with the site administrator.</p>';
			}
			
			//Get our uploaded file info array
			$file = $_FILES['imagefile'];
			
			//Check the file extension
			$accExts = array('jpg', 'jpeg', 'gif', 'png');
			$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
			
			if ( !in_array($ext, $accExts) ) {				
				return '<p class="error">Invalid file type.</p>' ;
			}
			
			//Check file size
			if ( $file['size'] > 5242880 ) {				
				return '<p class="error">File is too large</p>';
			}
			
			//Check to make sure uploads folder exists, and if not, create it
			$uploadsdir = ABSPATH . 'j_admin/uploads/products/';
			
			if ( !is_dir($uploadsdir) ) {
				mkdir( $uploadsdir, 0777, true );
			}
			
			//Create our upload file path
			$uploadpath = $uploadsdir . basename($file['name']);
			
			//Move our file to the target path
			if(move_uploaded_file($file['tmp_name'], $uploadpath)) {
				$results .= JURL . 'j_admin/uploads/products/' . $file['name'];
				
				return $results;
			} else{				
				return '<p class="error">There was an error uploading the file, please try again!</p>';
			}
		}
		
		function addLocation($redirect) {
			global $jdb;
			
			//Check to see if data was even submitted
			if ( empty ( $_POST ) ) {
				return;
			}
			
			//Check to make sure the form submission is coming from our script
			//The full URL of our submission page
			$current = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

			//The full URL of the page the form was submitted from
			$referrer = $_SERVER['HTTP_REFERER'];
			$parts = parse_url($referrer);
			$referrer = $parts['scheme'].'://'.$parts['host'].$parts['path'];
			
			//Kill if the form wasn't submitted from our script
			if ( $current != $referrer ) {
				die('Your form submission did not come from the correct page. Please check with the site administrator.');
			}
			
			//Check our nonce to double-check the form submission
			$nonce = $_POST['nonce'];
			$nonceCheck = $this->j_nonce('add-location', $_POST['date']);
			
			if ( $nonce != $nonceCheck ) {
				die('Your form submission did not pass authentication. Please check with the site administrator.');
			}
			
			//Set up the variables we'll need to pass to our insert method
			
			//These are the fields in that table that we want to insert data into
			$fields = array('merchant_id', 'address', 'address_two', 'city', 'state', 'zip');
			
			//These are the values from our form... cleaned using our clean method
			$values = $jdb->clean($_POST);
			
			//Remove data we're not storing
			unset($values['date']);
			unset($values['nonce']);
			
			//Add any non-user-submitted data here. Be sure you have the fields in your DB to support these
			
			//Check to see if we're updating or inserting
			$queryType = $_POST['type'];
			
			//If we're updating
			if ( $queryType == 'edit' ) {
				$location_id = $_POST['id'];
				
				//Unset what we don't need
				unset($values['type']);
				unset($values['id']);
				
				//Run the update
				$update = $jdb->update($link, $this->tlocations, $fields, $values, $location_id);			
				
				//Build our redirect
				$redirect = JURL . $redirect . '?location_id=' . $location_id;
				
				//Run our redirect
				header("Location: $redirect&add=true");
				exit;
			}

			//If we're inserting our data
			$insert = $jdb->insert($link, $this->tlocations, $fields, $values);
			
			if ( $insert == TRUE ) {
				//Get the ID of the record we just created
				$sql = "SELECT ID FROM $this->tlocations ORDER BY ID DESC LIMIT 1";
				$resource = $jdb->select($sql);
				$last = mysql_fetch_assoc( $resource );
				
				//Build our redirect
				$redirect = JURL . $redirect;
				
				//Run our redirect
				header("Location: $redirect?location_id=" . $last['ID'] . "&add=true");
				exit;
			}
		}
		
		function addMerchant($redirect) {
			global $jdb;
			
			//Check to see if data was even submitted
			if ( empty ( $_POST ) ) {
				return;
			}
			
			//Check to make sure the form submission is coming from our script
			//The full URL of our submission page
			$current = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

			//The full URL of the page the form was submitted from
			$referrer = $_SERVER['HTTP_REFERER'];
			$parts = parse_url($referrer);
			$referrer = $parts['scheme'].'://'.$parts['host'].$parts['path'];
			
			//Kill if the form wasn't submitted from our script
			if ( $current != $referrer ) {
				die('Your form submission did not come from the correct page. Please check with the site administrator.');
			}
			
			//Check our nonce to double-check the form submission
			$nonce = $_POST['nonce'];
			$nonceCheck = $this->j_nonce('add-merchant', $_POST['date']);
			
			if ( $nonce != $nonceCheck ) {
				die('Your form submission did not pass authentication. Please check with the site administrator.');
			}
			
			//Set up the variables we'll need to pass to our insert method			
			//These are the fields in that table that we want to insert data into
			$fields = array('merchant_name', 'merchant_contact', 'merchant_phone', 'merchant_image');
			
			//These are the values from our form... cleaned using our clean method
			$values = $jdb->clean($_POST);
			
			//Remove data we're not storing
			unset($values['date']);
			unset($values['nonce']);
			
			//Reformat any data here
						
			//Add any non-user-submitted data here. Be sure you have the fields in your DB to support these
			
			//Check to see if we're updating or inserting
			$queryType = $_POST['type'];
			
			//If we're updating
			if ( $queryType == 'edit' ) {
				$merchant_id = $_POST['id'];
				
				//Unset what we don't need
				unset($values['type']);
				unset($values['id']);
				
				//Run the product table update
				$update = $jdb->update($link, $this->tmerchants, $fields, $values, $merchant_id);			
				
				$redirect = JURL . $redirect . '?merchant_id=' . $merchant_id;
			
				header("Location: $redirect&add=true");
				exit;
			}
			
			//If we're inserting our data
			$insert = $jdb->insert($link, $this->tmerchants, $fields, $values);
			
			if ( $insert == TRUE ) {
				//Get the ID of the category record we just created
				$sql = "SELECT ID FROM $this->tmerchants ORDER BY ID DESC LIMIT 1";
				$resource = $jdb->select($sql);
				$last = mysql_fetch_assoc( $resource );
				
				$redirect = JURL . $redirect;
				
				header("Location: $redirect?merchant_id=" . $last['ID'] . "&add=true");
				exit;
			}
		}
	
		function addCategory($redirect) {
			global $jdb;
			
			//Check to see if data was even submitted
			if ( empty ( $_POST ) ) {
				return;
			}
			
			//Check to make sure the form submission is coming from our script
			//The full URL of our submission page
			$current = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

			//The full URL of the page the form was submitted from
			$referrer = $_SERVER['HTTP_REFERER'];
			$parts = parse_url($referrer);
			$referrer = $parts['scheme'].'://'.$parts['host'].$parts['path'];
			
			//Kill if the form wasn't submitted from our script
			if ( $current != $referrer ) {
				die('Your form submission did not come from the correct page. Please check with the site administrator.');
			}
			
			//Check our nonce to double-check the form submission
			$nonce = $_POST['nonce'];
			$nonceCheck = $this->j_nonce('add-category', $_POST['date']);
			
			if ( $nonce != $nonceCheck ) {
				die('Your form submission did not pass authentication. Please check with the site administrator.');
			}
			
			//Set up the variables we'll need to pass to our insert method		
			//These are the fields in that table that we want to insert data into
			$fields = array('category_name', 'category_slug', 'category_description');
			
			//These are the values from our form... cleaned using our clean method
			$values = $jdb->clean($_POST);
			
			//Remove data we're not storing
			unset($values['date']);
			unset($values['nonce']);
			
			//Add any non-user-submitted data here. Be sure you have the fields in your DB to support these
			
			//Reformat any data here
			if ( empty ($values['category_slug']) ) {
				$values['category_slug'] = strtolower(str_replace(' ', '-', $values['category_name']));
			}
			
			//Check to see if we're updating or inserting
			$queryType = $_POST['type'];
			
			//If we're updating
			if ( $queryType == 'edit' ) {
				$cat_id = $_POST['id'];
				
				//Unset what we don't need
				unset($values['type']);
				unset($values['id']);
				
				//Run the product table update
				$update = $jdb->update($link, $this->tcategories, $fields, $values, $cat_id);			
				
				$redirect = JURL . $redirect . '?category_id=' . $cat_id;
			
				header("Location: $redirect&add=true");
				exit;
			}

			//And, we insert our data
			$insert = $jdb->insert($link, $this->tcategories, $fields, $values);
			
			if ( $insert == TRUE ) {
				//Get the ID of the category record we just created
				$sql = "SELECT ID FROM $this->tcategories ORDER BY ID DESC LIMIT 1";
				$resource = $jdb->select($sql);
				$last = mysql_fetch_assoc( $resource );
			
				$redirect = JURL . $redirect;
				
				header("Location: $redirect?category_id=" . $last['ID'] . "&add=true");
				exit;
			}
		}
	
		function addProduct($redirect) {
			global $jdb;
			
			//Check to see if data was even submitted
			if ( empty ( $_POST ) ) {
				return;
			}
			
			//Check to make sure the form submission is coming from our script
			//The full URL of our submission page
			$current = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

			//The full URL of the page the form was submitted from
			$referrer = $_SERVER['HTTP_REFERER'];
			$parts = parse_url($referrer);
			$referrer = $parts['scheme'].'://'.$parts['host'].$parts['path'];
			
			//Kill if the form wasn't submitted from our script
			if ( $current != $referrer ) {
				die('Your form submission did not come from the correct page. Please check with the site administrator.');
			}
			
			//Check our nonce to double-check the form submission
			$nonce = $_POST['nonce'];
			$nonceCheck = $this->j_nonce('add-product', $_POST['date']);
			
			if ( $nonce != $nonceCheck ) {
				die('Your form submission did not pass authentication. Please check with the site administrator.');
			}
			
			//Set up the variables we'll need to pass to our insert method
			//This is the name of the table we want to insert data into
			$table = $this->tproducts;
			
			//These are the fields in that table that we want to insert data into
			$fields = array('product_name', 'product_description', 'product_category', 'product_image', 'product_type');
			
			//These are the values from our registration form... cleaned using our clean method
			$values = $jdb->clean($_POST);
			
			//Grab our pricing info before unsetting
			foreach ( $values as $k=>$v ) {
				$check = strpos($k, 'merchant_pricing');
				
				if ( $check !== false ) {
					$id = str_replace('merchant_pricing_', '', $k);
					$prices[] = array('ID' => $id, 'price' => $v);
				}
			}		
			
			//Pre-process before storing
			$values = array( $values['product_name'], $values['product_description'], $values['product_category'], $values['product_image'], '' );
			
			//Add any non-user-submitted data here. Be sure you have the fields in your DB to support these
			
			//Check to see if we're updating or inserting
			$queryType = $_POST['type'];
			
			//If we're updating
			if ( $queryType == 'edit' ) {
				$product_id = $_POST['id'];
				
				//Run the product table update
				$update = $jdb->update($link, $this->tproducts, $fields, $values, $product_id);
				
				if ( $update ) {
				
					//If updating the product able was successful, let's now update the comparisons table
					foreach ($prices as $price) {
						$comparison_id  = $this->getComparisonID($product_id, $price['ID']);
						$nfields = array('product_id', 'merchant_id', 'price');
						$nvalues = array( $product_id, $price['ID'], $price['price'] );
						$insert = $jdb->update($link, $this->tcomparisons, $nfields, $nvalues, $comparison_id);
					}
				
					$redirect = JURL . $redirect . '?product_id=' . $product_id;
					print_r(insert);
					header("Location: $redirect&add=true");
					exit;
				}
			}

			//If we're inserting data
			$insert = $jdb->insert($link, $this->tproducts, $fields, $values);
			
			if ( $insert == TRUE ) {
				//Get the ID of the product record we just created
				$sql = "SELECT ID FROM $table ORDER BY ID DESC LIMIT 1";
				$resource = $jdb->select($sql);
				$last = mysql_fetch_assoc( $resource );
				
				//Insert our pricing information into the comparison table
				$table = 'j_comparisons';
				
				foreach ($prices as $price) {
					$fields = array('product_id', 'merchant_id', 'price');
					$values = array( $last['ID'], $price['ID'], $price['price'] );
					$insert = $jdb->insert($link, $this->tcomparisons, $fields, $values);
				}
				
				$redirect = JURL . $redirect;
				
				header("Location: $redirect?product_id=" . $last['ID'] . "&add=true");
				exit;
			}
		}
		
		function register($redirect) {
			global $jdb;
		
			//Check to make sure the form submission is coming from our script
			//The full URL of our registration page
			$current = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

			//The full URL of the page the form was submitted from
			$referrer = $_SERVER['HTTP_REFERER'];
			$parts = parse_url($referrer);
			$referrer = $parts['scheme'].'://'.$parts['host'].$parts['path'];

			/*
			 * Check to see if the $_POST array has date (i.e. our form was submitted) and if so,
			 * process the form data.
			 */
			if ( !empty ( $_POST ) ) {

				/* 
				 * Here we actually run the check to see if the form was submitted from our
				 * site. Since our registration from submits to itself, this is pretty easy. If
				 * the form submission didn't come from the register.php page on our server,
				 * we don't allow the data through.
				 */
				if ( $referrer == $current ) {
				
					//Require our database class
					require_once('db.php');
						
					//Set up the variables we'll need to pass to our insert method
					//This is the name of the table we want to insert data into
					$table = 'j_users';
					
					//These are the fields in that table that we want to insert data into
					$fields = array('user_name', 'user_login', 'user_pass', 'user_email', 'user_registered');
					
					//These are the values from our registration form... cleaned using our clean method
					$values = $jdb->clean($_POST);
					
					//Now, we're breaking apart our $_POST array, so we can storely our password securely
					$username = $_POST['name'];
					$userlogin = $_POST['username'];
					$userpass = $_POST['password'];
					$useremail = $_POST['email'];
					$userreg = $_POST['date'];
					
					//We create a NONCE using the action, username, timestamp, and the NONCE SALT
					$nonce = md5('registration-' . $userlogin . $userreg . NONCE_SALT);
					
					//We hash our password
					$userpass = $jdb->hash_password($userpass, $nonce);
					
					//Recompile our $value array to insert into the database
					$values = array(
								'name' => $username,
								'username' => $userlogin,
								'password' => $userpass,
								'email' => $useremail,
								'date' => $userreg
							);
					
					//And, we insert our data
					$insert = $jdb->insert($link, $table, $fields, $values);
					
					if ( $insert == TRUE ) {
						$redirect = JURL . $redirect;
						
						header("Location: $redirect?reg=true");
						exit;
					}
				} else {
					die('Your form submission did not come from the correct page. Please check with the site administrator.');
				}
			}
		}
		
		function login($redirect) {
			global $jdb;
		
			if ( !empty ( $_POST ) ) {
				//Check to make sure the form submission is coming from our script
				//The full URL of our submission page
				$current = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

				//The full URL of the page the form was submitted from
				$referrer = $_SERVER['HTTP_REFERER'];
				$parts = parse_url($referrer);
				$referrer = $parts['scheme'].'://'.$parts['host'].$parts['path'];
				
				//Kill if the form wasn't submitted from our script
				if ( $current != $referrer ) {
					return '<p class="error">Your form submission did not come from the correct page. Please check with the site administrator.</p>';
				}
				
				//Clean our form data
				$values = $jdb->clean($_POST);

				//The username and password submitted by the user
				$subname = $values['username'];
				$subpass = $values['password'];

				//The name of the table we want to select data from
				$table = 'j_users';

				/*
				 * Run our query to get all data from the users table where the user 
				 * login matches the submitted login.
				 */
				$sql = "SELECT * FROM $table WHERE user_login = '" . $subname . "'";
				$results = $jdb->select($sql);

				//Kill the script if the submitted username doesn't exit
				if (!$results) {
					die('Sorry, that username does not exist!');
				}

				//Fetch our results into an associative array
				$results = mysql_fetch_assoc( $results );
				
				//The registration date of the stored matching user
				$storeg = $results['user_registered'];

				//The hashed password of the stored matching user
				$stopass = $results['user_pass'];

				//Recreate our NONCE used at registration
				$nonce = md5('registration-' . $subname . $storeg . NONCE_SALT);

				//Rehash the submitted password to see if it matches the stored hash
				$subpass = $jdb->hash_password($subpass, $nonce);

				//Check to see if the submitted password matches the stored password
				if ( $subpass == $stopass ) {
					
					//If there's a match, we rehash password to store in a cookie
					$authnonce = md5('cookie-' . $subname . $storeg . AUTH_SALT);
					$authID = $jdb->hash_password($subpass, $authnonce);
					
					//Set our authorization cookie
					setcookie('joombologauth[user]', $subname, 0, '', '', '', true);
					setcookie('joombologauth[authID]', $authID, 0, '', '', '', true);
					
					//Build our redirect
					$redirect = JURL . $redirect;
					
					//Redirect to the home page
					header("Location: $redirect");
					exit;	
				} else {
					return 'invalid';
				}
			} else {
				return 'empty';
			}
		}
		
		function logout() {
			//Expire our auth coookie to log the user out
			$idout = setcookie('joombologauth[authID]', '', -3600, '', '', '', true);
			$userout = setcookie('joombologauth[user]', '', -3600, '', '', '', true);
			
			if ( $idout == true && $userout == true ) {
				return true;
			} else {
				return false;
			}
		}
		
		function checkLogin() {
			global $jdb;
		
			//Grab our authorization cookie array
			$cookie = $_COOKIE['joombologauth'];
			
			//Set our user and authID variables
			$user = $cookie['user'];
			$authID = $cookie['authID'];
			
			/*
			 * If the cookie values are empty, we redirect to login right away;
			 * otherwise, we run the login check.
			 */
			if ( !empty ( $cookie ) ) {
				
				//Query the database for the selected user
				$table = 'j_users';
				$sql = "SELECT * FROM $table WHERE user_login = '" . $user . "'";
				$results = $jdb->select($sql);

				//Kill the script if the submitted username doesn't exit
				if (!$results) {
					die('Sorry, that username does not exist!');
				}

				//Fetch our results into an associative array
				$results = mysql_fetch_assoc( $results );
				
		
				//The registration date of the stored matching user
				$storeg = $results['user_registered'];

				//The hashed password of the stored matching user
				$stopass = $results['user_pass'];

				//Rehash password to see if it matches the value stored in the cookie
				$authnonce = md5('cookie-' . $user . $storeg . AUTH_SALT);
				$stopass = $jdb->hash_password($stopass, $authnonce);
				
				if ( $stopass == $authID ) {
					unset($results['user_pass']);
					return $results;
				} else {
					header('Location: ' . J_LOGIN_URL . '?msg=login');
					exit;
				}
			} else {			
				//Redirect to the login page
				header('Location: ' . J_LOGIN_URL . '?msg=login');
				exit;
			}
		}
		
		function getUsers() {
			global $jdb;
			
			//Grab our locations array
			$sql = "SELECT * FROM $this->tusers ORDER BY user_login ASC"; 
			$results = $jdb->get($sql);
			
			return $results;
		}
		
		function getUser($user_id) {
			global $jdb;
			
			//Grab our location array
			$sql = "SELECT * FROM $this->tusers WHERE ID = '" . $user_id . "'"; 
			$results = $jdb->get($sql);
			$results = $results[0];
			
			return $results;
		}
		
		function getLocations() {
			global $jdb;
			
			//Grab our locations array
			$sql = "SELECT * FROM $this->tlocations ORDER BY merchant_id ASC"; 
			$results = $jdb->get($sql);
			
			return $results;
		}
		
		function getLocation($location_id) {
			global $jdb;
			
			//Grab our location array
			$sql = "SELECT * FROM $this->tlocations WHERE ID = '" . $location_id . "'"; 
			$results = $jdb->get($sql);
			$results = $results[0];
			
			return $results;
		}
		
		function getComparisons() {
			
		}
		
		function getComparison($comparison_id) {
			global $jdb;
			
			//Grab our existing merchants array
			$sql = "SELECT * FROM $this->tcomparisons WHERE ID = '" . $comparison_id . "'"; 
			$results = $jdb->get($sql);
			$results = $results[0];
			
			return $results;
		}
		
		function getComparisonID($product_id, $merchant_id) {
			global $jdb;
			
			//Grab our existing merchants array
			$sql = "SELECT ID FROM $this->tcomparisons WHERE merchant_id = '" . $merchant_id . "' AND product_id = '" . $product_id . "'"; 
			$results = $jdb->get($sql);
			$results = $results[0]['ID'];
			
			return $results;
		}
		
		function getMerchants() {
			global $jdb;
			
			//Grab our existing merchants array
			$sql = "SELECT * FROM $this->tmerchants ORDER BY ID ASC"; 
			$results = $jdb->get($sql);
			
			return $results;
		}
		
		function getMerchant($merchant_id) {
			global $jdb;
			
			//Grab our existing merchants array
			$sql = "SELECT * FROM $this->tmerchants WHERE ID = '" . $merchant_id . "'"; 
			$results = $jdb->get($sql);
			$results = $results[0];
			
			return $results;
		}
		
		function getCategories() {
			global $jdb;
			
			//Grab our categories array
			$sql = "SELECT * FROM $this->tcategories ORDER BY category_slug"; 
			$results = $jdb->get($sql);
			
			return $results;
		}
		
		function getCategoryBySlug($cat_slug) {
			global $jdb;
			
			//Setup our query
			$sql = "SELECT * FROM $this->tcategories WHERE category_slug = '" . $cat_slug . "'";

			$results = $jdb->get($sql);
			$results = $results[0];
			
			return $results;
		}
		
		function getCategory($cat_id) {
			global $jdb;
			
			//Grab our categories array
			$sql = "SELECT * FROM $this->tcategories WHERE ID = " . $cat_id;
			$results = $jdb->get($sql);
			$results = $results[0];
			
			return $results;
		}
		
		function getProducts() {
			global $jdb;
			
			//Grab our existing products array
			$sql = "SELECT * FROM $this->tproducts ORDER BY ID ASC"; 
			$results = $jdb->get($sql);
			
			return $results;
		}
		
		function getProduct($product_id) {
			global $jdb;
			
			//Grab our existing products array
			$table = 'j_products';
			$sql = "SELECT * FROM $this->tproducts WHERE ID = '" . $product_id . "'"; 
			$results = $jdb->get($sql);
			$results = $results[0];
			
			return $results;
		}
		
		function j_nonce($action, $time) {
			$secureHash = hash_hmac('sha512', $action . $time, SITE_KEY);
			
			return $secureHash;
		}
	}
}

//Instantiate our database class
$j = new Joomba;
?>