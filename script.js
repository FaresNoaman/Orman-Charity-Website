//The Javascript for the home page

function messageForm(){

  let x= document.forms["message"]["firstName"].value;
  if(x==""){
    alert("Name must be filled out");
    return false;
  }

  let l= document.forms["message"]["lastName"].value;
  if(l==""){
    alert("Last Name must be filled out");
    return false;
  }

  let pn= document.forms["message"]["phoneNumber"].value;
  if(pn==""){
    alert("Phone Number must be filled out");
    return false;
  }

  if (isNaN(pn)) {
      alert("Please enter a valid number (Numbers only)");
      value = "";
      return false;
    }

  let ea= document.forms["message"]["emailAdress"].value;
  if(ea==""){
    alert("Email Address must be filled out");
    return false;
  }

  let m= document.forms["message"]["sendMessage"].value;
  if(m==""){
    alert("Message must be filled out");
    return false;
  }
}







//The Javascript for the donation page


function donationForm(){


  let x= document.forms["donation"]["firstName"].value;
  if(x==""){
    alert("First Name must be filled out");
    return false;
  }

  let l= document.forms["donation"]["lastName"].value;
  if(l==""){
    alert("Last Name must be filled out");
    return false;
  }

  let ea= document.forms["donation"]["emailAdress"].value;
  if(ea==""){
    alert("Email Address must be filled out");
    return false;
  }

  let pn= document.forms["donation"]["phoneNumber"].value;
  if(pn==""){
    alert("Phone Number must be filled out");
    return false;
  }

  if (isNaN(pn)) {
    alert("Please enter a valid number (Numbers only)");
    value = "";
    return false;
  }

  let Ad= document.forms["donation"]["address"].value;
  if(Ad==""){
    alert("Address must be filled out");
    return false;
  }
  let f = document.forms["donation"]["fileToUpload"].value;
  if (f == "") {
    alert("Please select a file to upload");
    return false;
  }
  
  let p= document.forms["donation"]["password"].value;
  if(p==""){
    alert("Password must be filled out");
    return false;
  }

  let pc= document.forms["donation"]["confirmPass"].value;
  if(pc==""){
    alert("You must confirm your Password");
    return false;
  }
  
  if(p.length<8){
    alert("The Password you have entered is to short (Please enter at least 8 characters)");
    return false;
  }

  
  var cardNumber = document.getElementById("card-number").value;
  if (cardNumber.length !== 16 || !cardNumber.startsWith("4")) {
      alert("Please enter a valid Visa card number");
      document.getElementById("card-number").value = "";
      return false;
  }

  let da= document.forms["donation"]["cardtype"].value;
  if(da==""){
    alert("Please put a Card Type");
    return false;
  }

  let my= document.forms["donation"]["myyear"].value;
  if(my==""){
    alert("Please put the visa card expiration year");
    return false;
  }

  let at= document.forms["donation"]["activityType"].value;
  if(at==""){
    alert("Please choose an activity type");
    return false;
  }

  if(p != pc){
    alert("Password doesn't match");
    return false;
  }

}

