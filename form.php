<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RecipeGen</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
  <nav>
    <div class="menu">
      <div class="logo">
        <a href="#">RecipeGen</a>
      </div>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#about-us">About</a></li>
        <li><a href="#contact-us">Contact</a></li>
        <li ><a href="addrecipe.php" >Add Recipe</a></li>
      </ul>
    </div>
  </nav>
  <div class="img"></div>
  <div class="center">

    <div class="sub_title">HOW DO I MAKE!!</div>
    <div class="btns">
    <form action="retrieve.php" method="post">
    <input type="text" placeholder="Enter a recipe name" name="search_recipe">
    <input type="submit" value="Search" style="margin-top: 10px;">
</form>

    </div>
  </div>
  <section id="about-us">
    <div class="about">
      <div class="text">
        <h3>About Us</h3>
        <p>Welcome to our recipe generator! We are passionate food enthusiasts dedicated to simplifying your culinary journey. Our mission is to inspire and empower both seasoned chefs and kitchen novices alike to explore the endless possibilities of home cooking. With our vast collection of meticulously curated recipes spanning various cuisines and dietary preferences, we aim to spark creativity in your kitchen and transform ordinary meals into extraordinary culinary experiences. Whether you're seeking quick and easy weeknight dinners, indulgent desserts, or healthy plant-based options, our platform is your trusted companion on your gastronomic adventures. Join us on this delicious journey as we celebrate the joy of cooking and sharing delicious meals with loved ones.</p>
      </div>
    </div>
  </section>
  <div id="contact-us">
  <div class="contact-form-wrapper">
    <!-- Heading added here -->
    <form action="process_contact_info.php" class="contact-us" method="post">
        <h1>Contact Us</h1><br>
      <label for="customerName">NAME <em>*</em></label>
      <input type="text" id="customerName" name="customerName" required>

      <label for="customerEmail">EMAIL <em>*</em></label>
      <input type="email" id="customerEmail" name="customerEmail" required>

      <label for="customerPhone">PHONE</label>
      <input type="tel" id="customerPhone" name="customerPhone" >

      <label for="customerNote">YOUR MESSAGE <em>*</em></label>
      <textarea rows="4" id="customerNote" name="customerNote" required></textarea>

      <h3>Please provide all the information about your issue you can.</h3>

     

      <button  type="submit" id="customerOrder" >SUBMIT</button>

    </form>
  </div>
</div>


</body>

</html>
