function ValidateLoginInput(){
    let username = document.querySelector('input[name="username"]');
    let password = document.querySelector('input[name="password"]');
    
    if (username.value == ""){
        window.alert("Username is empty!");
        return false;
    }
    if (!(3 <= username.value.length && username.value.length <=100)){
        window.alert("Username must be 3-100 characters");
        return false;
    }
    if (password.value == ""){
        window.alert("Password is empty!");
        return false;
    }
    if (!(8 <= password.value.length && password.value.length <=100)){
        window.alert("Password must be 8-100 characters");
        return false;
    }
    let lowerCaseLetters = /[a-z]/g;
    let upperCaseLetter = /[A-Z]/g;
    let numbers = /[0-9]/g;
    let specialCharacters = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    if (lowerCaseLetters.test(password.value) == false){
        window.alert("Password must contains at least 1 lower case letter");
        return false;
    }
    if (upperCaseLetter.test(password.value) == false){
        window.alert("Password must contains at least 1 upper case letter");
        return false;
    }
    if (numbers.test(password.value) == false){
        window.alert("Password must contains at least a number");
        return false;
    }
    if (specialCharacters.test(password.value) == false){
        window.alert("Password must contains at least 1 special character");
        return false;
    }
    return true;
}