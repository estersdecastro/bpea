// Test case 1: Valid email and password
$_POST['email'] = 'test@example.com';
$_POST['password'] = 'password123';
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'password');
// Assert that the email is valid
assert($email === 'test@example.com');
// Assert that the password is set
assert($senha === 'password123');

// Test case 2: Invalid email
$_POST['email'] = 'invalid_email';
$_POST['password'] = 'password123';
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'password');
// Assert that the email is invalid
assert($email === false);
// Assert that the password is set
assert($senha === 'password123');

// Test case 3: Missing password
$_POST['email'] = 'test@example.com';
$_POST['password'] = '';
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'password');
// Assert that the email is valid
assert($email === 'test@example.com');
// Assert that the password is empty
assert($senha === '');

// Test case 4: Missing email and password
$_POST['email'] = '';
$_POST['password'] = '';
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'password');
// Assert that the email is empty
assert($email === '');
// Assert that the password is empty
assert($senha === '');