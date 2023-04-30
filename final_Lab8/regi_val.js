function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
  
    if (name == "") {
      alert("Name must be filled out");
      return false;
    }
  
    if (email == "") {
      alert("Email must be filled out");
      return false;
    } else {
      var pattern = /^[^]+@[^]+\.[a-z]{2,3}$/;
      if (!email.match(pattern)) {
        alert("Invalid email address");
        return false;
      }
    }
  
    if (password.length < 8) {
      alert("Password must be at least 8 characters long");
      return false;
    }
  
    alert("Form submitted successfully!");
  }
  