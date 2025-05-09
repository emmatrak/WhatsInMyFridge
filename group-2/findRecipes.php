<?php
require_once('config.php');
if (!$db) {
	echo "Database connection error";
}else{
    // Check if 'channels' parameter is set and sanitize
    //Also set all of the arrays with the values passed by the arrays and turn them to integers  
    if (isset($_GET['ingredients']) && is_array($_GET['ingredients'])) {
        $ingredients = $_GET['ingredients']; // Array of selected channels
		$intIngre = array_map('intval', $ingredients);

		// send user selected ingredients into JavaScript
		echo "<script>";
		echo "const userSelectedIngredients = " . json_encode($intIngre) . ";";
		echo "</script>";


		//create a placeholder array full of question marks and write the sql statment
		if (isset($_GET['devices']) && is_array($_GET['devices'])){
			$devices = $_GET['devices'];
			$intDev = array_map('intval', $devices);

			$placeholders = implode(',', array_fill(0, count($intDev), '?'));
			$sql = "SELECT recipeID FROM deviceMatch WHERE deviceID IN ($placeholders)";
			$stmt = $db->prepare($sql);

			foreach ($intDev as $i => $devName){
				$stmt->bindValue($i + 1, $devName, PDO::PARAM_INT);
			}

			//execute the statement
			$stmt->execute();
			$devices = $stmt->fetchAll(PDO::FETCH_COLUMN);
			$stmt->closeCursor();
		}

		//repeat execpt for diet this time not devices
		if (isset($_GET['diet']) && is_array($_GET['diet'])){
			$diet = $_GET['diet'];
			$intDiet = array_map('intval', $diet);

			$placeholders = implode(',', array_fill(0, count($intDiet), '?'));
			$sql = "SELECT recipeID FROM dietMatch WHERE dietID IN ($placeholders)";
			$stmt = $db->prepare($sql);

			foreach ($intDiet as $i => $dietName){
				$stmt->bindValue($i + 1, $dietName, PDO::PARAM_INT);
			}

			$stmt->execute();
			$diet = $stmt->fetchAll(PDO::FETCH_COLUMN);
			$stmt->closeCursor();
		}


		//if both $diet and $devices are set, then this applies both diet and devies filters to the list before we have to add to ingredient filter
		if (isset($diet) && isset($devices)){
			$preList = array_intersect($diet, $devices);
		}



        //repeat for ingredients
        $placeholders = implode(',', array_fill(0, count($intIngre), '?'));
        $sql = "SELECT recipeID FROM recipeMatch WHERE ingredientID IN ($placeholders)";
        $stmt = $db->prepare($sql);

        foreach ($intIngre as $i => $ingreName) {
            $stmt->bindValue($i + 1, $ingreName, PDO::PARAM_INT);
        }

		$stmt->execute();
		$ingredients = $stmt->fetchAll(PDO::FETCH_COLUMN);
		$stmt->closeCursor();

		//if preList is set then compare it to that, otherwise check if devices or diet are set then compare them to that
		if (isset($preList)){
			$results = array_intersect($ingredients, $preList);
		}elseif (isset($diet)){
			$results = array_intersect($ingredients, $diet);
		}elseif (isset($devices)){
			$results = array_intersect($ingredients, $devices);
		}else{
			$results = $ingredients;
		}
		

		// get recipe links AND ingredient names for each recipe
		if (!empty($results)) {
			$results = array_values($results);
		
			// creates placeholders like ? for the sql query
			$placeholders = implode(",", array_fill(0, count($results), '?'));
		
			// joins recipeList with recipeMatch and ingredients to get recipe links and ingredients
			$sql = "SELECT r.recipeLink, i.ingredientName 
					FROM recipeList r 
					JOIN recipeMatch rm 
					ON r.recipeID = rm.recipeID 
					JOIN ingredients i 
					ON rm.ingredientID = i.ingredientID 
					WHERE r.recipeID IN ($placeholders)"; 
			
			$stmt = $db->prepare($sql);
			foreach ($results as $i => $resultID) {
				$stmt->bindValue($i + 1, $resultID, PDO::PARAM_INT);
			}
			
			$stmt->execute();
			$finalData = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
		
			// build two arrays
			$recipeLinks = [];     // clickable recipes
			$allIngredients = [];  // all ingredients needed
		
			foreach ($finalData as $row) {
				if (!in_array($row['recipeLink'], $recipeLinks)) {
					$recipeLinks[] = $row['recipeLink'];
				}
				$allIngredients[] = $row['ingredientName'];
			}
		
			// output recipe links
			echo "<h1>Recipes with selected parameters</h1>";
			echo "<ul>";
			foreach ($recipeLinks as $link) {
				echo "<li><a href='recipes/" . htmlspecialchars($link) . "'>" . htmlspecialchars($link) . "</a></li>";
			}
			echo "</ul>";
		
			// output ingredient list as a JavaScript array
			echo "<script>";
			echo "const recipeIngredients = " . json_encode($allIngredients) . ";";
			echo "</script>";
		}
		

		else {
			echo "<p>No recipes found for the selected ingredients.</p>";
		}
		
	}else{
		echo "No channels selected or 'channels' parameter is missing.";
    }
}
?>

<h2>Missing Ingredients</h2>

<button onclick="checkMissingIngredients()">Check Missing Ingredients</button>

<div id="missingIngredientsOutput"></div>

<script>

function checkMissingIngredients() {
    // Find which ingredients are in the recipe but NOT selected by the user
    const missingIngredients = recipeIngredients.filter(recipeIng => 
        !userSelectedIngredients.includes(recipeIng)
    );

    // Find the output div
    const outputDiv = document.getElementById('missingIngredientsOutput');
    
    if (missingIngredients.length > 0) {
        // If there are missing ingredients, display them
        outputDiv.innerHTML = `
            <h3>Missing Ingredients:</h3>
            <ul>
                ${missingIngredients.map(ingredient => `<li>${ingredient}</li>`).join('')}
            </ul>
            <button onclick="downloadMissing()">Download Missing Ingredients</button>
        `;
    } else {
        // If nothing is missing
        outputDiv.innerHTML = "<h3>You have all the necessary ingredients!</h3>";
    }
}

function downloadMissing() {
    // Gather missing ingredients into a text string
    const missingList = document.querySelectorAll('#missingIngredientsOutput li');
    let text = "Missing Ingredients:\n";
    missingList.forEach(item => {
        text += "- " + item.textContent + "\n";
    });

    // Create a text file download
    const blob = new Blob([text], { type: 'text/plain' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = "missing_ingredients.txt";
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
</script>

