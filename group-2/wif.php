<?php 
session_start();
  if (!isset($_SESSION["name"]))
   {
      header("location: login.php");
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Favorite Recipes | WhatsInMyFridge</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    
</head>
<body>
    <header>
        <nav>
            <h1>WhatsInMyFridge</h1>
            <ul>
                <button class="button" onclick="location.href='wif.php'">Home</button>
                <button class="button" onclick="location.href='#how-it-works'">How It Works</button>
                <button class="button" onclick="location.href='#recipes'">Recipes</button>
                <button class="button" onclick="location.href='#contact'">Contact Us</button>
                <button class="button" onclick="location.href='findRecipes.html'">Find Recipes</button>
                <button class="button" onclick="location.href='recipePage.html'">Full Recipes</button>
                <button class="button active" onclick="location.href='favorites.html'">My favorites</button>
                <button class="button" onclick="location.href='scan.php'">Scan My Fridge</button>

            </ul>
        
        </nav>
    </header>

    <section class="favorites">
        <h2>My Favorite Recipes</h2>
        <div id="favorites-list" class="recipe-grid">
            <!-- Favorites will be displayed here -->
            <p id="no-favorites">You haven't saved any favorites yet.</p>
        </div>
    </section>
    
    <section class="hero">
        <div class="hero-content">
            <h2 id="typing-effect"></h2>
            <p>Enter your ingredients, and we’ll find recipes for you!</p>
            <a href="#input" class="btn">Get Started</a>
        </div>
    </section>

    <section id="how-it-works" class="about">
        <h2>How It Works</h2>
        <p>Simply enter the ingredients you have in your fridge, and our smart recipe finder will suggest dishes you can make with them.</p>
    </section>

    <!--Aaryans recipe Cards-->
    <section id="recipes" class="recipes">
        <h2>Popular Recipes</h2>
        <h1>Breakfast</h1>
        <div class="recipe-grid">
            <!-- Breakfast -->
            <div class="recipe-card">
                <h3>Avocado Toast with Poached Egg</h3>
                <p>Toast, Avocado, Egg, Chili Flakes, Lemon Juice</p>
            </div>
            <div class="recipe-card">
                <h3>Vegetable Omelette</h3>
                <p>Eggs, Bell Peppers, Spinach, Mushrooms, Cheese</p>
            </div>
            <div class="recipe-card">
                <h3>Chia Seed Pudding</h3>
                <p>Chia Seeds, Almond Milk, Honey, Fresh Berries</p>
            </div>
            <div class="recipe-card">
                <h3>Banana Pancakes</h3>
                <p>Bananas, Oats, Eggs, Cinnamon</p>
            </div>
            <div class="recipe-card">
                <h3>Smoothie Bowl</h3>
                <p>Frozen Berries, Banana, Yogurt, Granola, Nuts</p>
            </div>
        <h1>Lunch</h1>
        <div class="recipe-grid"></div>
            <!-- Lunch -->
            <div class="recipe-card">
                <h3>Caprese Salad</h3>
                <p>Mozzarella, Tomatoes, Basil, Olive Oil, Balsamic Glaze</p>
            </div>
            <div class="recipe-card">
                <h3>Mediterranean Chickpea Salad</h3>
                <p>Chickpeas, Cucumber, Tomatoes, Red Onion, Feta, Lemon Dressing</p>
            </div>
            <div class="recipe-card">
                <h3>Stuffed Bell Peppers</h3>
                <p>Quinoa, Black Beans, Corn, Cheese, Bell Peppers</p>
            </div>
            <div class="recipe-card">
                <h3>Vegetable Stir-Fry with Tofu</h3>
                <p>Broccoli, Bell Peppers, Carrots, Tofu, Soy-Ginger Sauce</p>
            </div>
            <div class="recipe-card">
                <h3>Mushroom Risotto</h3>
                <p>Arborio Rice, Vegetable Broth, Mushrooms, Onion, Parmesan</p>
            </div>
        <h1>Dinner</h1>
        <div class="recipe-grid"></div>
            <!-- Dinner -->
            <div class="recipe-card">
                <h3>Spinach and Ricotta Stuffed Shells</h3>
                <p>Pasta Shells, Ricotta, Spinach, Herbs, Marinara Sauce</p>
            </div>
            <div class="recipe-card">
                <h3>Vegetable Curry with Rice</h3>
                <p>Potatoes, Carrots, Peas, Chickpeas, Coconut Curry Sauce</p>
            </div>
            <div class="recipe-card">
                <h3>Eggplant Parmesan</h3>
                <p>Breaded Eggplant, Marinara Sauce, Mozzarella</p>
            </div>
            <div class="recipe-card">
                <h3>Vegetarian Chili</h3>
                <p>Kidney Beans, Black Beans, Tomatoes, Bell Peppers, Spices</p>
            </div>
            <div class="recipe-card">
                <h3>Homemade Veggie Burger</h3>
                <p>Black Bean and Quinoa Patty, Bun, Lettuce, Tomato, Avocado</p>
            </div>
    
            <!-- Snacks & Sides -->
        <h1>Snacks & Sides</h1>
        <div class="recipe-grid"></div>
            <div class="recipe-card">
                <h3>Hummus with Pita & Veggies</h3>
                <p>Hummus, Cucumber, Carrots, Pita</p>
            </div>
            <div class="recipe-card">
                <h3>Guacamole with Tortilla Chips</h3>
                <p>Avocados, Tomatoes, Onions, Lime Juice, Cilantro</p>
            </div>
            <div class="recipe-card">
                <h3>Greek Yogurt with Honey & Nuts</h3>
                <p>Greek Yogurt, Honey, Walnuts</p>
            </div>
            <div class="recipe-card">
                <h3>Crispy Roasted Chickpeas</h3>
                <p>Chickpeas, Spices</p>
            </div>
            <div class="recipe-card">
                <h3>Bruschetta</h3>
                <p>Baguette, Tomatoes, Garlic, Basil, Balsamic Drizzle</p>
            </div>
        </div>
    </section>

    <section id="contact" class="contact">
        <h2>Contact</h2>
        <p>Email: <a href="mailto:support@whatsinmyfridge.com">support@whatsinmyfridge.com</a></p>
    </section>

    <footer>
        <p>&copy; 2024 WhatsInMyFridge. All Rights Reserved.</p>
    </footer>

    <script>
        const text = "Welcome to WhatsInMyFridge!";
        const typingEffect = document.getElementById("typing-effect");
        let index = 0;

        function type() {
            if (index < text.length) {
                typingEffect.innerHTML += text.charAt(index);
                index++;
                setTimeout(type, 100);
            }
        }
        type();

        function findRecipes() {
            const input = document.getElementById("ingredient-input").value.toLowerCase();
            const results = document.getElementById("recipe-results");
            results.innerHTML = "<p>Searching for recipes...</p>";

            setTimeout(() => {
                if (input.includes("egg") && input.includes("cheese")) {
                    results.innerHTML = "<p>You can make a Cheesy Omelet!</p>";
                } else if (input.includes("bread") && input.includes("avocado")) {
                    results.innerHTML = "<p>Try making Avocado Toast!</p>";
                } else {
                    results.innerHTML = "<p>No exact matches. Try different ingredients!</p>";
                }
            }, 1000);
        }
    </script>
    <!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>

</script>
<script>
    // Function to handle favorite button clicks
    function toggleFavorite(recipeTitle, recipeIngredients) {
        const recipeId = recipeTitle.toLowerCase().replace(/\s+/g, '-');
        let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
        
        // Check if already favorited
        const existingIndex = favorites.findIndex(recipe => recipe.id === recipeId);
        
        if (existingIndex >= 0) {
            // Remove from favorites
            favorites.splice(existingIndex, 1);
            alert('Removed from favorites!');
        } else {
            // Add to favorites
            favorites.push({
                id: recipeId,
                title: recipeTitle,
                ingredients: recipeIngredients
            });
            alert('Added to favorites!');
        }
        
        localStorage.setItem('favorites', JSON.stringify(favorites));
    }

    // Add favorite buttons to all recipe cards
    document.addEventListener('DOMContentLoaded', function() {
        const recipeCards = document.querySelectorAll('.recipe-card');
        
        recipeCards.forEach(card => {
            const title = card.querySelector('h3').textContent;
            const ingredients = card.querySelector('p').textContent;
            const favoriteBtn = document.createElement('button');
            
            favoriteBtn.className = 'favorite-btn';
            favoriteBtn.innerHTML = '❤️ Save';
            favoriteBtn.onclick = function(e) {
                e.stopPropagation();
                toggleFavorite(title, ingredients);
            };
            
            card.appendChild(favoriteBtn);
        });
    });
</script>
</body>
</html>

