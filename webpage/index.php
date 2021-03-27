<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
    <?php
    $name = '';
    $email = '';
    $username = '';
    $password = '';
    $confirm_password = '';
    $date_of_birth = '';
    $gender = '';
    $marital_status = '';
    $address = '';
    $city = '';
    $postal_code = '';
    $home_phone = '';
    $mobile_phone = '';
    $credit_card_number = '';
    $credit_card_expiry_date = '';
    $salary = '';
    $url = '';
    $gpa = '';

    $name_is_valid = true;
    $email_is_valid = true;
    $username_is_valid = true;
    $password_is_valid = true;
    $confirm_password_is_valid = true;
    $date_of_birth_is_valid = true;
    $gender_is_valid = true;
    $marital_status_is_valid = true;
    $address_is_valid = true;
    $city_is_valid = true;
    $postal_code_is_valid = true;
    $home_phone_is_valid = true;
    $mobile_phone_is_valid = true;
    $credit_card_number_is_valid = true;
    $credit_card_expiry_date_is_valid = true;
    $salary_is_valid = true;
    $url_is_valid = true;
    $gpa_is_valid = true;

    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $confirm_password = $_REQUEST['confirm_password'];
        $date_of_birth = $_REQUEST['date_of_birth'];
        $gender = $_REQUEST['gender'];
        $marital_status = $_REQUEST['marital_status'];
        $address = $_REQUEST['address'];
        $city = $_REQUEST['city'];
        $postal_code = $_REQUEST['postal_code'];
        $home_phone = $_REQUEST['home_phone'];
        $mobile_phone = $_REQUEST['mobile_phone'];
        $credit_card_number = $_REQUEST['credit_card_number'];
        $credit_card_expiry_date = $_REQUEST['credit_card_expiry_date'];
        $salary = $_REQUEST['salary'];
        $url = $_REQUEST['url'];
        $gpa = $_REQUEST['gpa'];

        $name_is_valid = preg_match("/^[a-z][a-z \-]*[a-z]$/i", $name);
        $username_is_valid = strlen($username) >= 5;
        $email_is_valid = preg_match("/(.*)(@)(.*)[.](.*)/", $email);
        $password_is_valid = strlen($password) >= 8;
        $confirm_password_is_valid = $password == $confirm_password;
        $date_of_birth_is_valid = preg_match('/[0-3][0-9][.][0-1][1-9][.][0-9][0-9][0-9][0-9]/', $date_of_birth);
        $gender_is_valid =  $gender == 'Male' ||  $gender == 'Female';
        $marital_status_is_valid = $marital_status == 'Single' || $marital_status == 'Married' || $marital_status == 'Divorced' || $marital_status == 'Widowed';
        $address_is_valid = preg_match('/[0-9a-zA-Z \-\,\.](.*)/', $address);
        $city_is_valid = preg_match('/[a-zA-Z \-](.*)/', $city);
        $postal_code_is_valid = preg_match('/[0-9]{6}/', $postal_code);
        $home_phone_is_valid = preg_match('/[0-9][0-9][ ][0-9]{7}/', $home_phone);
        $mobile_phone_is_valid = preg_match('/[0-9][0-9][ ][0-9]{7}/', $mobile_phone);
        $credit_card_number_is_valid = preg_match('/[0-9]{4}[ ][0-9]{4}[ ][0-9]{4}[ ][0-9]{4}/', $credit_card_number);
        $credit_card_expiry_date_is_valid = preg_match('/[0-3][0-9][.][0-1][1-9][.][0-9][0-9][0-9][0-9]/', $credit_card_expiry_date);
        $salary_is_valid = preg_match('/(UZS)( )[0-9]*[,][0-9]{3}[.][0-9][0-9]$/i', $salary);
        $url_is_valid = preg_match('/(http:\/\/)(.*)/', $url);
        $gpa_is_valid = preg_match('/[0-4][.][0-9]/', $gpa);

        if($gpa > 4.5)
            $gpa_is_valid = false;

        if(!$name_is_valid)
            $name = '';
        if(!$username_is_valid)
            $username = '';
        if(!$email_is_valid)
            $email = '';
        if(!$password_is_valid)
            $password = '';
        if(!$confirm_password_is_valid)
            $confirm_password = '';
        if(!$date_of_birth_is_valid)
            $date_of_birth = '';
        if(!$gender_is_valid)
            $gender = '';
        if(!$marital_status_is_valid)
            $marital_status = '';
        if(!$address_is_valid)
            $address = '';
        if(!$city_is_valid)
            $city = '';
        if(!$postal_code_is_valid)
            $postal_code = '';
        if(!$home_phone_is_valid)
            $home_phone = '';
        if(!$mobile_phone_is_valid)
            $mobile_phone = '';
        if(!$credit_card_number_is_valid)
            $credit_card_number = '';
        if(!$credit_card_expiry_date_is_valid)
            $credit_card_expiry_date = '';
        if(!$salary_is_valid)
            $salary = '';
        if(!$url_is_valid)
            $url = '';
        if(!$gpa_is_valid)
            $gpa = '';

        $isValid = $name_is_valid && $username_is_valid && $email_is_valid && $password_is_valid && $confirm_password_is_valid
                && $date_of_birth_is_valid && $gender_is_valid && $marital_status_is_valid && $address_is_valid && $city_is_valid
                && $postal_code_is_valid && $home_phone_is_valid && $mobile_phone_is_valid && $credit_card_number_is_valid
                && $credit_card_expiry_date_is_valid && $salary_is_valid && $url_is_valid && $gpa_is_valid;

        if($isValid) {
            header("Location: ThankYou.html", TRUE, 301);
        }
    }

    ?>
		<h1>Registration Form</h1>
		
		<hr />
		
		<h2>Please, fill below fields correctly</h2>

        <form action="index.php" method="POST">
            <dl>
                <dt>Name</dt>
                <dd>
                    <input type="text" name="name" value="<?= $name ?>">
                </dd>
                <dd class="<?= $name_is_valid ? '' : 'not' ?>valid">
                    This field is required. It has to contain at least 2 chars. It should not contain any number.
                </dd>
    
                <dt>Email</dt>
                <dd>
                    <input type="text" name="email" value="<?= $email ?>">
                </dd>
                <dd class="<?= $email_is_valid ? '' : 'not' ?>valid">
                    This field is required. It should correspond to email format.
                </dd>
    
                <dt>Username</dt>
                <dd>
                    <input type="text" name="username" value="<?= $username ?>">
                </dd>
                <dd class="<?= $username_is_valid ? '' : 'not' ?>valid">
                    This field is required. It has to contain at least 5 chars.
                </dd>
    
                <dt>Password</dt>
                <dd>
                    <input type="password" name="password" value="<?= $password ?>">
                </dd>
                <dd class="<?= $password_is_valid ? '' : 'not' ?>valid">
                    This field is required. It has to contain at least 8 chars.
                </dd>
    
                <dt>Confirm Password</dt>
                <dd>
                    <input type="password" name="confirm_password" value="<?= $confirm_password ?>">
                </dd>
                <dd class="<?= $confirm_password_is_valid ? '' : 'not' ?>valid">
                    This field is required. It has to be equal to Password field.
                </dd>
    
                <dt>Date of Birth</dt>
                <dd>
                    <input type="text" name="date_of_birth" value="<?= $date_of_birth ?>">
                </dd>
                <dd class="<?= $date_of_birth_is_valid ? '' : 'not' ?>valid">
                    Date should be written in dd.MM.yyyy format. For ex, 07.03.2019
                </dd>
    
                <dt>Gender</dt>
                <dd>
                    <input type="text" name="gender" value="<?= $gender ?>">
                </dd>
                <dd class="<?= $gender_is_valid ? '' : 'not' ?>valid">
                    Only 2 options accepted: Male, Female.
                </dd>
    
                <dt>Marital Status</dt>
                <dd>
                    <input type="text" name="marital_status" value="<?= $marital_status ?>">
                </dd>
                <dd class="<?= $marital_status_is_valid ? '' : 'not' ?>valid">
                    Only 4 options accepted: Single, Married, Divorced, Widowed
                </dd>
    
                <dt>Address</dt>
                <dd>
                    <input type="text" name="address" value="<?= $address ?>">
                </dd>
                <dd class="<?= $address_is_valid ? '' : 'not' ?>valid">
                    This is required field.
                </dd>
    
                <dt>City</dt>
                <dd>
                    <input type="text" name="city" value="<?= $city ?>">
                </dd>
                <dd class="<?= $city_is_valid ? '' : 'not' ?>valid">
                    This is required field.
                </dd>
    
                <dt>Postal Code</dt>
                <dd>
                    <input type="text" name="postal_code" value="<?= $postal_code ?>">
                </dd>
                <dd class="<?= $postal_code_is_valid ? '' : 'not' ?>valid">
                    This is required field. It should follow 6 digit format. For ex, 100011
                </dd>
    
                <dt>Home Phone</dt>
                <dd>
                    <input type="text" name="home_phone" value="<?= $home_phone ?>">
                </dd>
                <dd class="<?= $home_phone_is_valid ? '' : 'not' ?>valid">
                    This is required field. It should follow 9 digit format. For ex, 97 1234567
                </dd>
    
                <dt>Mobile Phone</dt>
                <dd>
                    <input type="text" name="mobile_phone" value="<?= $mobile_phone ?>">
                </dd>
                <dd class="<?= $mobile_phone_is_valid ? '' : 'not' ?>valid">
                    This is required field. It should follow 9 digit format. For ex, 97 1234567
                </dd>
    
                <dt>Credit Card Number</dt>
                <dd>
                    <input type="text" name="credit_card_number" value="<?= $credit_card_number ?>">
                </dd>
                <dd class="<?= $credit_card_number_is_valid ? '' : 'not' ?>valid">
                    This is required field. It should follow 16 digit format. For ex, 1234 1234 1234 1234
                </dd>
    
                <dt>Credit Card Expiry Date</dt>
                <dd>
                    <input type="text" name="credit_card_expiry_date" value="<?= $credit_card_expiry_date ?>">
                </dd>
                <dd class="<?= $credit_card_expiry_date_is_valid ? '' : 'not' ?>valid">
                    This is required field. Date should be written in dd.MM.yyyy format. For ex, 07.03.2019
                </dd>
    
                <dt>Monthly Salary</dt>
                <dd>
                    <input type="text" name="salary" value="<?= $salary ?>">
                </dd>
                <dd class="<?= $salary_is_valid ? '' : 'not' ?>valid">
                    This is required field. It should be written in following format UZS 200,000.00
                </dd>
    
                <dt>Web Site URL</dt>
                <dd>
                    <input type="text" name="url" value="<?= $url ?>">
                </dd>
                <dd class="<?= $url_is_valid ? '' : 'not' ?>valid">
                    This is required field. It should match URL format. For ex, http://github.com
                </dd>
    
                <dt>Overall GPA</dt>
                <dd>
                    <input type="text" name="gpa" value="<?= $gpa ?>">
                </dd>
                <dd class="<?= $gpa_is_valid ? '' : 'not' ?>valid">
                    This is required field. It should be a floating point number less than or equal 4.5
                </dd>

                <dt>
                    <input type="submit" value="Register">
                </dt>
            </dl>
        </form>
	</body>
</html>