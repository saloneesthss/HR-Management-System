<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f5f7fa;
}

.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
}

.menu {
    align-self: flex-start;
    margin-bottom: 20px;
    font-weight: bold;
    cursor: pointer;
}

.profile {
    display: flex;
    max-width: 800px;
    width: 100%;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    overflow: hidden;
}

.profile-picture {
    flex: 1;
    background-color: #e6e9ef;
    padding: 20px;
    text-align: center;
}

.profile-picture img {
    border-radius: 50%;
    width: 100px;
    height: 100px;
    margin-bottom: 10px;
}

.profile-picture h2 {
    font-size: 18px;
    margin: 10px 0;
}

.profile-picture p {
    font-size: 14px;
    color: #666;
}

.profile-info {
    flex: 2;
    padding: 20px;
}

.profile-info h3 {
    margin-bottom: 10px;
    font-size: 16px;
    color: #333;
    border-bottom: 1px solid #ddd;
    padding-bottom: 5px;
}

.profile-info table {
    width: 100%;
    margin-top: 10px;
}

.profile-info table tr td {
    padding: 8px 0;
    color: #555;
}

.profile-info table tr td:first-child {
    font-weight: bold;
    color: #333;
    width: 40%;
}

.actions {
    display: flex;
    gap: 10px;
    margin-top: 20px;
}

.actions button {
    padding: 10px 15px;
    border: none;
    background-color: #007bff;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

.actions button:hover {
    background-color: #0056b3;
}

</style>
</head>
<body>
    <?php require_once "sidebar.php"; ?>

    <div class="container">
        <p class="text-right">
            Hello;
            <a onclick="return confirm('Are you sure to logout?');" href="../logout.php">Logout</a>
        </p>

        <div class="menu">Menu</div>
        <div class="profile">
            <div class="profile-picture">
                <img src="https://via.placeholder.com/150" alt="Profile Picture">
                <h2>DAVID BECKHAM</h2>
                <p>Email: davidbeckham@gmail.com</p>
                <p>ID no.: 00011</p>
            </div>
            <div class="profile-info">
                <h3>Personal Information</h3>
                <table>
                    <tr><td>Civil Status</td><td>SINGLE</td></tr>
                    <tr><td>Age</td><td>28</td></tr>
                    <tr><td>Height (cm)</td><td>176</td></tr>
                    <tr><td>Weight (pounds)</td><td>124</td></tr>
                    <tr><td>Gender</td><td>MALE</td></tr>
                    <tr><td>Date of Birth</td><td>January 07, 1991</td></tr>
                    <tr><td>Place of Birth</td><td>LONDON, UNITED KINGDOM</td></tr>
                    <tr><td>Home Address</td><td>BRIGHTON, LONDON, UNITED KINGDOM</td></tr>
                    <tr><td>National ID</td><td>000-100101-0121</td></tr>
                </table>
                <h3>Designation</h3>
                <table>
                    <tr><td>Company</td><td>APPLE CORPORATION</td></tr>
                    <tr><td>Department</td><td>EXECUTIVE</td></tr>
                    <tr><td>Position</td><td>CHIEF EXECUTIVE OFFICER</td></tr>
                    <tr><td>Leave Privilege</td><td>VACATION LEAVE, SICK LEAVE, BIRTHDAY LEAVE</td></tr>
                    <tr><td>Employment Type</td><td>Regular</td></tr>
                    <tr><td>Employment Status</td><td>Active</td></tr>
                    <tr><td>Official Start Date</td><td>January 01, 2024</td></tr>
                    <tr><td>Date Regularized</td><td>December 31, 2024</td></tr>
                </table>
            </div>
        </div>
        <div class="actions">
            <button>Quick Access</button>
            <button>Return</button>
        </div>

        <?php require_once "../footer.php"; ?>
    </div>
</body>
</html>