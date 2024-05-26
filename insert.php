<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "howdoimake";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$recipes = array(
    array(
        "title" => "paneerbuttermasala",
        "ingredients" => "Paneer, butter, tomatoes, onions, cream, spices",
        "instructions" => "Heat butter in a pan, add onions and cook until golden brown. Add tomatoes and cook until they turn soft. Add spices and cook for a minute. Add paneer cubes and cream, simmer for 5 minutes. Garnish with coriander leaves and serve hot."
    ),
    array(
        "title" => "aloogobi",
        "ingredients" => "Potatoes, cauliflower, onions, tomatoes, spices",
        "instructions" => "Heat oil in a pan, add cumin seeds and onions, cook until onions turn translucent. Add potatoes and cauliflower florets, cook for 5 minutes. Add tomatoes and spices, cover and cook until vegetables are tender. Garnish with coriander leaves and serve hot with roti or rice."
    ),
    array(
        "title" => "palakpaneer",
        "ingredients" => "Spinach, paneer, onions, tomatoes, spices",
        "instructions" => "Blanch spinach leaves, blend into a smooth puree. Heat oil in a pan, add onions and cook until golden brown. Add tomatoes and cook until they turn soft. Add spinach puree and spices, cook for a few minutes. Add paneer cubes, simmer for 5 minutes. Serve hot with naan or rice."
    ),
    array(
        "title" => "vegetablebiryani",
        "ingredients" => "Basmati rice, mixed vegetables (carrots, peas, beans), onions, tomatoes, spices",
        "instructions" => "Cook basmati rice separately and keep aside. Heat oil in a pan, add onions and cook until golden brown. Add mixed vegetables and cook for 5 minutes. Add tomatoes and spices, cook until vegetables are tender. Layer cooked rice and vegetable mixture in a pan, garnish with fried onions and mint leaves. Cover and cook on low heat for 10 minutes. Serve hot with raita."
    ),
    array(
        "title" => "chanamasala",
        "ingredients" => "Chickpeas, onions, tomatoes, ginger, garlic, spices",
        "instructions" => "Soak chickpeas overnight, cook until soft. Heat oil in a pan, add onions, ginger, and garlic, cook until golden brown. Add tomatoes and spices, cook until they turn soft. Add cooked chickpeas, simmer for 10 minutes. Garnish with coriander leaves and serve hot with rice or roti."
    ),
    array(
        "title" => "pavbhaji",
        "ingredients" => "Potatoes, tomatoes, capsicum, peas, onions, butter, pav bhaji masala, spices",
        "instructions" => "Boil and mash potatoes, cook peas and mash them too. Heat butter in a pan, add onions and cook until soft. Add tomatoes, capsicum, and cook until they turn soft. Add mashed potatoes, peas, pav bhaji masala, and spices, mix well. Cook until the bhaji thickens. Serve hot with buttered pav."
    ),
    array(
        "title" => "panipuri",
        "ingredients" => "Puri (semolina balls), boiled potatoes, tamarind chutney, mint-coriander chutney, spicy water",
        "instructions" => "Make a hole in the puri and stuff it with boiled potatoes. Dip it in spicy water, followed by tamarind and mint-coriander chutney. Serve immediately."
    ),
    array(
        "title" => "khamandhokla",
        "ingredients" => "Gram flour, curd, turmeric, eno, sugar, lemon juice, mustard seeds, curry leaves, green chilies",
        "instructions" => "Mix gram flour, curd, turmeric, and water to make a smooth batter. Add eno and mix well. Steam the batter until cooked. Prepare tadka of mustard seeds, curry leaves, and green chilies. Pour tadka over dhokla. Serve garnished with coriander leaves and sev."
    ),
    array(
        "title" => "idli",
        "ingredients" => "Idli rice, urad dal, fenugreek seeds, salt",
        "instructions" => "Soak idli rice and urad dal separately for 4-6 hours. Grind them separately and then together to make a smooth batter. Add fenugreek seeds and salt. Ferment overnight. Pour batter into idli molds and steam for 10-15 minutes. Serve hot with sambar and chutney."
    ),
    array(
        "title" => "dosa",
        "ingredients" => "Rice, urad dal, fenugreek seeds, salt, oil",
        "instructions" => "Soak rice, urad dal, and fenugreek seeds separately for 4-6 hours. Grind them separately and then together to make a smooth batter. Add salt and ferment overnight. Heat a non-stick pan, pour a ladleful of batter, spread it in a circular motion, drizzle oil, and cook until golden brown. Serve hot with sambar and chutney."
    ),
    array(
        "title" => "undhiyu",
        "ingredients" => "Mixed vegetables (brinjal, potatoes, sweet potatoes, surti papdi, etc.), coconut, spices, oil",
        "instructions" => "Prepare masala with coconut and spices. Stuff the masala into hollowed vegetables. Heat oil in a pan, add stuffed vegetables, remaining masala, and some water. Cook covered until vegetables are tender. Serve hot with puri or roti."
    ),
    array(
        "title" => "aloopuri",
        "ingredients" => "Potatoes, wheat flour, oil, spices",
        "instructions" => "Boil, peel, and mash potatoes. Knead wheat flour into a dough with salt and water. Make small balls of dough, flatten them, stuff with mashed potatoes, and roll into puris. Deep fry until golden brown. Serve hot with aloo ki sabzi and pickle."
    ),
    array(
        "title" => "dahipuri",
        "ingredients" => "Puri, boiled potatoes, chickpeas, yogurt, tamarind chutney, mint-coriander chutney, sev",
        "instructions" => "Make a hole in the puri and stuff it with boiled potatoes and chickpeas. Top with yogurt, tamarind chutney, mint-coriander chutney, and sev. Serve immediately."
    ),
    array(
        "title" => "dhoklinushaak",
        "ingredients" => "Wheat flour, gram flour, yogurt, turmeric, chili powder, mustard seeds, curry leaves, asafoetida, jaggery, salt, oil",
        "instructions" => "Prepare wheat flour dough and roll it out into thin circles (dhokli). Cook dhokli in boiling water until they float. In a separate pan, heat oil and add mustard seeds, curry leaves, and asafoetida. Add yogurt mixed with gram flour, turmeric, chili powder, salt, and jaggery. Add cooked dhokli and simmer until the gravy thickens. Serve hot."
    ),
    array(
        "title" => "handvo",
        "ingredients" => "Rice, lentils, sour yogurt, bottle gourd, carrots, green peas, coriander leaves, ginger, green chilies, baking soda, turmeric, mustard seeds, asafoetida, oil",
        "instructions" => "Soak rice and lentils, grind into a coarse paste. Ferment the batter with sour yogurt overnight. Add grated bottle gourd, carrots, green peas, coriander leaves, ginger, green chilies, baking soda, turmeric, and salt. Mix well. Temper with mustard seeds and asafoetida. Pour the batter into a greased pan and bake until golden brown. Serve hot with chutney."
    ),
    array(
        "title" => "khandvi",
        "ingredients" => "Gram flour, yogurt, turmeric, green chilies, ginger, salt, oil, mustard seeds, sesame seeds, curry leaves, asafoetida, coriander leaves",
        "instructions" => "Mix gram flour, yogurt, turmeric, green chilies, ginger, and salt to make a smooth batter. Cook the batter on low heat until thick. Spread the cooked batter thinly on greased surfaces. Allow it to cool, then roll the sheets into cylindrical rolls. Cut into pieces. Prepare tempering with oil, mustard seeds, sesame seeds, curry leaves, and asafoetida. Pour over the khandvi pieces and garnish with coriander leaves."
    ),
    array(
        "title" => "thepla",
        "ingredients" => "Whole wheat flour, fenugreek leaves, yogurt, turmeric, chili powder, ginger, garlic, sesame seeds, oil, salt",
        "instructions" => "Mix whole wheat flour, chopped fenugreek leaves, yogurt, turmeric, chili powder, ginger-garlic paste, sesame seeds, oil, and salt to make a dough. Divide the dough into balls and roll them into thin discs. Cook on a hot griddle until golden brown spots appear on both sides. Serve hot with pickle or yogurt."
    ),
    array(
        "title" => "patra",
        "ingredients" => "Colocasia leaves, gram flour, tamarind pulp, jaggery, ginger, green chilies, sesame seeds, coconut, oil, salt",
        "instructions" => "Clean and dry colocasia leaves. Prepare a batter with gram flour, tamarind pulp, jaggery, ginger, green chilies, sesame seeds, coconut, oil, and salt. Spread the batter on the back side of colocasia leaves. Roll tightly and steam for 20-25 minutes. Allow it to cool, then slice. Prepare tempering with oil, mustard seeds, sesame seeds, and curry leaves. Pour over the sliced patra pieces."
    ),
    array(
        "title" => "gujaratibhakri",
        "ingredients" => "Whole wheat flour, salt, water",
        "instructions" => "Knead whole wheat flour with salt and water to make a stiff dough. Divide the dough into balls and roll them into thick discs. Cook on a hot griddle until brown spots appear on both sides. Serve hot with ghee or pickle."
    ),
    array(
        "title" => "gujaratifafda",
        "ingredients" => "Gram flour, turmeric, carom seeds, black pepper, salt, oil, water",
        "instructions" => "Mix gram flour, turmeric, carom seeds, black pepper, salt, and oil. Knead into a stiff dough using water. Roll out thin strips and deep fry until crisp and golden brown. Serve hot with chutney or pickles."
    ),
    array(
        "title" => "gujaratisukhdi",
        "ingredients" => "Whole wheat flour, ghee, jaggery",
        "instructions" => "Heat ghee in a pan, add whole wheat flour and roast until golden brown and aromatic. Add jaggery and mix well until melted. Pour the mixture into a greased plate and let it cool. Cut into squares and serve as a sweet snack."
    ),
    array(
        "title" => "gujaratikhichdi",
        "ingredients" => "Rice, split pigeon peas (toor dal), ginger, green chilies, turmeric, ghee, cumin seeds, mustard seeds, asafoetida, curry leaves, salt",
        "instructions" => "Wash rice and toor dal, and soak them for 30 minutes. Heat ghee in a pressure cooker, add cumin seeds, mustard seeds, and asafoetida. Add ginger, green chilies, and curry leaves. Stir in turmeric, rice, and dal. Add water and salt, and pressure cook until done. Serve hot with kadhi or yogurt."
    ),
    array(
        "title" => "gujaratisak",
        "ingredients" => "Semolina (rava), yogurt, ginger, green chilies, mustard seeds, cumin seeds, curry leaves, asafoetida, turmeric powder, salt, sugar, lemon juice, coriander leaves, oil",
        "instructions" => "Heat oil in a pan and add mustard seeds, cumin seeds, curry leaves, and a pinch of asafoetida. Once the seeds splutter, add finely chopped ginger and green chilies. Sauté until fragrant. Add semolina (rava) and roast until light golden brown and fragrant. In a separate bowl, whisk yogurt with water, turmeric powder, salt, and sugar. Pour the yogurt mixture into the pan and stir continuously to avoid lumps. Cook until the mixture thickens. Add lemon juice and chopped coriander leaves. Serve hot."
    )
    
                        
    
);


foreach ($recipes as $recipe) {
    $title = $conn->real_escape_string($recipe['title']);
    $ingredients = $conn->real_escape_string($recipe['ingredients']);
    $instructions = $conn->real_escape_string($recipe['instructions']);

    $sql = "INSERT INTO recipes (title, ingredients, instructions) VALUES ('$title', '$ingredients', '$instructions')";

    if ($conn->query($sql) === TRUE) {
        echo "Recipe '{$recipe['title']}' inserted successfully<br>";
    } else {
        echo "Error inserting recipe '{$recipe['title']}': " . $conn->error . "<br>";
    }
}


$conn->close();
?>
