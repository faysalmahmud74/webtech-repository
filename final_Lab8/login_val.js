function validateLoginForm() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    if (email == "") {
        alert("Please enter your email.");
        return false;
    }

    if (password == "") {
        alert("Please enter your password.");
        return false;
    }
}