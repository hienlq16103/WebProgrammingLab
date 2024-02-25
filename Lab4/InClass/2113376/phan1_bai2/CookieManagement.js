var output = document.getElementById("output");

function SetCookie(){
    var nameInput = document.querySelector('input[name="name"]');
    var valueInput = document.querySelector('input[name="value"]');
    var expirationDaysInput = document.querySelector('input[name="expirationDays"]');
    if (nameInput.value == ""){
        nameInput.focus();
        window.alert("Cookie name is empty");
        return;
    }
    if (valueInput.value == ""){
        valueInput.focus();
        window.alert("Cookie value is empty");
        return;
    }
    if (expirationDaysInput.value == ""){
        expirationDaysInput.focus();
        window.alert("Expiration days is empty");
        return;
    }
    const targetDate = new Date();
    targetDate.setTime(targetDate.getTime() + (expirationDaysInput.value*24*60*60*1000));
    let expires = "expires=" + targetDate.toUTCString();
    document.cookie = nameInput.value + "=" + valueInput.value + ";" + expires + ";path=/";
    window.alert("Successfully set a cookie\n");
    nameInput.value = "";
    valueInput.value = "";
    expirationDaysInput.value = "";
}
function RemoveCookie(){
    var removingNameInput = document.querySelector('input[name="removingName"]');
    if (removingNameInput.value == ""){
        removingNameInput.focus();
        window.alert("Cookie name is empty");
    }
    if (document.cookie.search(removingNameInput.value + "=") == -1){
        removingNameInput.focus();
        window.alert("Cookie name does not exist");
        return;
    }
    document.cookie = removingNameInput.value + "=;expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
    removingNameInput.value = ""; 
    DisplayAllCookie();     
}
function DisplayAllCookie(){
    if (document.cookie == ""){
        output.innerHTML = document.cookie;
        return;
    }
    let cookieList = document.cookie.split(";");
    let displayResult = "";
    for (let cookie of cookieList){
        displayResult += cookie + "<br>";
    }
    output.innerHTML = displayResult;
}
function ClearAllCookie(){
    let cookieList = document.cookie.split(";");
    for (let cookie of cookieList){
        document.cookie = cookie + "=;expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
    }
    output.innerHTML = document.cookie;
}