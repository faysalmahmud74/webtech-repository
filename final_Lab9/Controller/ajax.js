
        function getData() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    var output = ""; 
                    for (var i = 0; i < data.length; i++) { 
                        output += "<p>" + data[i].name + "</p>"; 
                    }
                    document.getElementById("display").innerHTML = output; 
                }
            };
            xhr.open("GET", "profile.php", true); 
            xhr.send(); 
        }
        getData(); 
 