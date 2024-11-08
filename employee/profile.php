<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<style>
* {
  margin: 0;
  padding-left: 250;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background: linear-gradient(135deg, #e0f7ff, #003d73);
  color: #333;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
}

.dashboard {
  display: flex;
  width: 90%;
  max-width: 1200px;
  height: 80vh;
  background: #fff;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.sidebar {
  width: 20%;
  background: #003d73;
  color: #fff;
  padding: 20px;
}

.sidebar .profile {
  text-align: center;
  margin-bottom: 30px;
}

.sidebar .profile img {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  margin-bottom: 10px;
}

.sidebar h2 {
  font-size: 1.2em;
  font-weight: normal;
}

.sidebar .nav a {
  display: block;
  padding: 10px;
  color: #fff;
  text-decoration: none;
  margin-bottom: 5px;
  transition: background 0.3s;
}

.sidebar .nav a:hover {
  background: #00509e;
  border-radius: 5px;
}

.content {
  width: 80%;
  padding: 20px;
  overflow-y: auto;
}

header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

header h1 {
  font-size: 1.5em;
}

.main-info {
  display: flex;
  gap: 20px;
  margin-top: 20px;
}

.profile-info, .basic-info {
  background: #f3f3f3;
  padding: 15px;
  border-radius: 10px;
  width: 50%;
}

.profile-info h2 {
  margin-bottom: 10px;
  font-size: 1.3em;
}

.events {
  margin-top: 20px;
  background: #f3f3f3;
  padding: 15px;
  border-radius: 10px;
}

.events h3 {
  margin-bottom: 10px;
}
</style>
</head>
<body>
    <?php require_once "sidebar.php"; ?>

    <div class="container" style="padding-left:250px; padding-top:100px;">
     <div class="profile">
      <main class="content">
       <header>
        <h1>Profile</h1>
        <p>July 24, 2020, 4:30 PM</p>
       </header>
       <section class="main-info">
        <!-- Profile Info -->
        <div class="profile-info">
          <img src="profile.jpg" alt="Profile Picture">
          <h2>Helen Voizhicki</h2>
          <p>Role: User | Position: Head of HR Department</p>
          <p>Email: helen.voizhicki@gmail.com</p>
          <p>Phone: +1 707 255 843</p>
        </div>
        <!-- Basic Information -->
        <div class="basic-info">
          <h3>Basic Information</h3>
          <p>Hire Date: August 26, 2019</p>
          <p>Worked for: 3 Years, 1 Month</p>
          <p>Employee ID: #956</p>
          <p>SSN: XXX-XX-5861</p>
        </div>
      </section>
      <!-- Upcoming Events -->
      <section class="events">
        <h3>Upcoming Events</h3>
        <p>Design Review - 9:00 AM - 10:00 AM</p>
      </section>
    </main>
  </div>

        <?php require_once "../footer.php"; ?>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
  const dateElement = document.querySelector("header p");

  function updateTime() {
    const now = new Date();
    dateElement.textContent = now.toLocaleString();
  }

  setInterval(updateTime, 1000);
});
</script>
</html>

