<?php
// Initialize variables
$ForenamesErr = $SurnameErr = $DateOfBirthErr = $PlaceOfBirthErr = $NationalityErr = $ColourOfEyesErr = $DateOfExpiryErr = $PlaceOfApplicationErr = $GenderErr = $IDNumberErr = "";
$Forenames = $Surname = $DateOfBirth = $PlaceOfBirth = $Nationality = $ColourOfEyes = $DateOfExpiry = $PlaceOfApplication = $Gender = $IDNumber = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate each field
    // Example: Forenames validation
    if (empty($_POST["Forenames"])) {
        $ForenamesErr = "Forenames are required";
    } else {
        $Forenames = test_input($_POST["Forenames"]);
    }

    // Validate other fields similarly

    // Validate ID Number
    if (empty($_POST["IDNumber"])) {
        $IDNumberErr = "IDNumber is required";
    } else {
        $IDNumber = test_input($_POST["IDNumber"]);
        if (strlen($IDNumber) != 9 || ($Gender == "Male" && $IDNumber[0] != "0") || ($Gender == "Female" && $IDNumber[0] != "9")) {
            $IDNumberErr = "Please enter a valid ID number.";
        }
    }
}

// Function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Display confirmation page with submitted data or display errors
if (empty($ForenamesErr) && empty($SurnameErr) && /* Check other fields */ empty($IDNumberErr)) {
    // Display confirmation page with submitted data
    echo "Thank you for submitting the form. Here is your submitted data:<br>";
    echo "Forenames: " . $Forenames . "<br>";
    echo "Surname: " . $Surname . "<br>";
    echo "DateOfBirth: " . $DateOfBirth . "<br>";
    echo "PlaceOfBirth: " . $PlaceOfBirth . "<br>";
    echo "Nationality: " . $Nationality . "<br>";
    echo "ColourOfEyes: " . $ColourOfEyes . "<br>";
    echo "DateOfExpiry: " . $DateOfExpiry . "<br>";
    echo "PlaceOfApplication: " . $PlaceOfApplication . "<br>";
    echo "Gender: " . $Gender . "<br>";
    echo "IDNumber: " . $IDNumber . "<br>";
} else {
    // Display errors
    // You can display them next to respective form fields
}
?>
