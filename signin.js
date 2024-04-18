function signUp(){

    let us= document.forms["signup"]["username"].value;
    if(us==""){
      alert("Username must be filled out");
      return false;
    }

    let ea= document.forms["signup"]["emailAdress"].value;
  if(ea==""){
    alert("Email Address must be filled out");
    return false;
  }
  
    let pas= document.forms["signup"]["Password"].value;
    if(pas==""){
      alert("Password must be filled out");
      return false;
    }

    if(pas.length<8){
      alert("The Password you have entered is too short (Please enter at least 8 characters)");
      return false;
    }
  
    let pasc= document.forms["signup"]["confirmPassword"].value;
    if(pasc==""){
      alert("You must confirm your Password");
      return false;
    }
  
    if(pas != pasc){
      alert("Password doesn't match");
      return false;
    }
  
  
  
  }

  function adminLogin(){

    let x = document.forms["admin"]["username"].value;
    if (x == "") {
      alert("Email must be filled out");
      return false;
    } else if (x != "Aymanezzat@gmail.com" && x != "raghdaesam@gmail.com") {
      alert("Wrong Email");
      return false;
    }
    
    let p = document.forms["admin"]["Password"].value;
    if (p == "") {
      alert("Password must be filled out");
      return false;
    } else if (p != "aymanEslsca123" && p != "raghdaEslsca") {
      alert("Wrong password");
      return false;
    }
  
  }
  
  
  function showHide() {
    var x = document.getElementById("Password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  