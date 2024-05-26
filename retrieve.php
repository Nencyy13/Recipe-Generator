<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #526D82;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            animation: slideIn 0.5s ease-out; /* Slide in animation */
        }
        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        form {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 300px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .recipe-results {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            animation: fadeIn 0.5s ease-out; /* Fade in animation */
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .recipe {
            width: 95%;
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s; /* Smooth transition */
        }
        .recipe:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .recipe h2 {
            margin-top: 0;
            color: #333;
        }
        .recipe p {
            margin-bottom: 10px;
            color: #666;
        }
        .recipe a {
            color: #4CAF50;
            text-decoration: none;
            transition: color 0.3s;
        }
        .recipe a:hover {
            color: #45a049;
        }
        
        .three-containers {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap; 
            margin-top: 20px;
        }
        .small-container {
            width: 140px; 
            height: 120px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 20px; 
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .small-container img {
            width:95%; 
            height: 80%;
           
           
        }


    </style>
</head>
<body>
    <div class="container">
        <h1 style="color:white;">Recipe Search</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="search_recipe" placeholder="Enter a recipe name">
            <input type="submit" value="Search">
        </form>
        <div class="recipe-results">
          
        </div>
       
       


<body>
   
        
    <?php
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "howdoimake";

   
    $conn = new mysqli($servername, $username, $password, $database);

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        function sanitize_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

      
        $search_term = sanitize_input($_POST["search_recipe"]);

       
        $search_term = strtolower($search_term);

        
        $sql = "SELECT * FROM recipes WHERE LOWER(title) LIKE '%$search_term%' OR LOWER(ingredients) LIKE '%$search_term%' OR LOWER(instructions) LIKE '%$search_term%'";

        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                echo "<div class='recipe'>";
                echo  "<h2>". $row["title"]."</h2>" ;
                echo "<p><strong>Ingredients:</strong> " . $row["ingredients"] . "</p>";
                echo "<p><strong>Instructions:</strong></p>";
               
                $instructions = explode(".", $row["instructions"]);
                
                echo "<ol>";
                foreach ($instructions as $instruction) {
                   
                    $instruction = trim($instruction);
                    
                    if (!empty($instruction)) {
                        echo "<li>" . $instruction . ".</li>";
                    }
                }
                echo "</ol>";
                echo "</div>";
               
                break;
            }
        } else {
           
            $api_endpoint = "https://api.edamam.com/search?q=" . urlencode($search_term) . "&app_id=45af2cb2&app_key=b210b82531daf94950f67a6cf835c6cb";

            $api_response = file_get_contents($api_endpoint);
            $recipes = json_decode($api_response, true);

            if (isset($recipes['hits']) && count($recipes['hits']) > 0) {
               
                $recipe = $recipes['hits'][0]['recipe'];
                echo "<div class='recipe'>";
                echo "<h2>" . $recipe["label"] . "</h2>";
                echo "<p><strong>Ingredients:</strong> " . implode(", ", $recipe["ingredientLines"]) . "</p>";
                echo "<p><strong>Instructions:</strong></p>";
               
                $instructions = $recipe["ingredientLines"];
               
                echo "<ol>";
                foreach ($instructions as $instruction) {
                    echo "<li>" . $instruction . ".</li>";
                }
                echo "</ol>";
                echo "</div>";
            } else {
                echo "<div class='recipe'>";
                echo "No recipes found.";
                echo "</div>";
            }
        }
    }

    
    $conn->close();
?>
<div class="container" style="background-color:#DDE6ED">
   
    <div class="three-containers">
        <div class="small-container">
            
            <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8ZGVsaWNpb3VzJTIwZm9vZHxlbnwwfHwwfHx8MA%3D%3D" alt="Image 1">
            <br><a href="https://www.youtube.com/watch?v=JD3BT8rUGIg" target="_blank" style="text-decoration:none;">Click Here</a>
        </div>
        <div class="small-container">
            
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRaXdQXBbJ9RTvHeTm3fSi1A8SgvnLBTZyM7QkglXmeSw&s" alt="Image 2">
            <br><a href="https://www.youtube.com/watch?v=qE5ycgqswGY" target="_blank"style="text-decoration:none;">Click Here </a>
        </div>
        <div class="small-container">
           
            <img src="https://preppykitchen.com/wp-content/uploads/2023/10/Waffle-Recipe-Feature.jpg" alt="Image 3">
            <br><a href="https://www.youtube.com/watch?v=eVzpbmS_jfI" target="_blank"style="text-decoration:none;">Click Here </a>
        </div>
    </div>
</div>

    </div>
</div>


        </div>
    </div>
    
</body>
</html>
