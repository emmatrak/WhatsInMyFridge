const ingres = [];

function addItem() {
    const value = document.getElementById("item").value;
    if (value) {
        ingres.push(value);
        document.getElementById("item").value = ""; // Clear the input
        console.log("Added: " + value);
        console.log("Current ingredients:", ingres);
    }
}


function arrayToString(array){
    let results = "";
    for (let i = 0; i < array.length; i++){
        results = results + "," + array[i].trim().toLowerCase();
    }
    return results.substring(1);
}

async function fetchRecipes() {
    try {
        let id = await fetchIngre();
        let apiUrl = "https://api.spoonacular.com/recipes/" + id + "/analyzedInstructions?apiKey=71cc84906854468a9b7e6a3be4ffd347";
        let infoUrl = "https://api.spoonacular.com/recipes/" + id + "/information?apiKey=71cc84906854468a9b7e6a3be4ffd347";

        let [response, infoResponse] = await Promise.all([
            fetch(apiUrl),
            fetch(infoUrl)
        ]);

        let stepsData = await response.json();
        let infoData = await infoResponse.json();

        // Get the container on the page
        const outputDiv = document.getElementById("recipeOutput");
        outputDiv.innerHTML = ""; // Clear previous content

        // Create and insert recipe title
        const title = document.createElement("h2");
        title.textContent = infoData.title;
        outputDiv.appendChild(title);

        // If instructions are available, display them
        if (stepsData.length > 0 && stepsData[0].steps.length > 0) {
            const ol = document.createElement("ol");
            stepsData[0].steps.forEach(step => {
                const li = document.createElement("li");
                li.textContent = step.step;
                ol.appendChild(li);
            });
            outputDiv.appendChild(ol);
        } else {
            outputDiv.innerHTML += "<p>No instructions found.</p>";
        }

    } catch (error) {
        console.log(error);
        document.getElementById("recipeOutput").innerHTML = "<p>Error loading recipe.</p>";
    }
}

async function fetchIngre() {

    try {
        let ingreUrl = "https://api.spoonacular.com/recipes/findByIngredients" +
            "?apiKey=71cc84906854468a9b7e6a3be4ffd347&ingredients=" + arrayToString(ingres) + "&number=1";
        let response = await fetch(ingreUrl);
        let data = await response.json();
        return data[0].id;
    } catch (error) {
        console.log(error);
    }

}


