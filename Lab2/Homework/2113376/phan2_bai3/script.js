function Validate(){
    const myForm = document.forms["myForm"];
    var firstName = myForm.elements["FirstName"];
    var lastName = myForm.elements["LastName"];
    var email = myForm.elements["email"];
    var password = myForm.elements["password"];
    var birthDay = myForm.elements["birthDay"];
    var gender = myForm.elements["gender"];
    var nationality = myForm.elements["Country"];
    var about = myForm.elements["about"]

    if (firstName.value == ""){
        firstName.focus();
        window.alert("Please enter your first name");
        return false;
    }
    if (!(2<= firstName.value.length && firstName.value.length <= 30)){
        firstName.focus();
        window.alert("first name must be 2-30 characters");
        return false;
    }
    if (lastName.value == ""){
        lastName.focus();
        window.alert("Please enter your last name");
        return false;
    }
    if (!(2<= lastName.value.length && lastName.value.length <= 30)){
        lastName.focus();
        window.alert("first name must be 2-30 characters");
        return false;
    }
    if (email.value == ""){
        email.focus();
        window.alert("Please enter your email");
        return false;
    }
    var emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (emailFormat.test(email.value) == false){
        email.focus();
        window.alert("Invalid email format");
        return false;
    }
    if (password.value == ""){
        password.focus();
        window.alert("Please enter your password");
        return false;
    }
    if (!(2<= password.value.length && password.value.length <= 30)){
        password.focus();
        window.alert("password must be 2-30 characters");
        return false;
    }
    if (birthDay.value == ""){
        window.alert("Please choose your birthday");
        return false;
    }
    if (gender.value == ""){
        window.alert("Please choose your gender");
        return false;
    }
    window.alert("Complete!");
}