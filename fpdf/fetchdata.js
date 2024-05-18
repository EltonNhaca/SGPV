document.getElementById("fetchData").addEventListener("click", function() {
    var username = document.getElementById("username").value;
    var psw = document.getElementById("psw");
    var resultDiv = document.getElementById("result");

    // Use AJAX to send the request to the server
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "fetch_data.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response) {
                username.value = response.nome_func;
                resultDiv.textContent = "Data fetched successfully.";
            } else {
                resultDiv.textContent = "No data found for the username: " + username;
            }
        }
    };

    xhr.send("username=" + username);
});
