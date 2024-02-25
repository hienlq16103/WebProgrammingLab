function UpdateResult(value){
    document.getElementById("result").value += value;
}
function ClearScreen(){
    document.getElementById("result").value = "";
}
function Solve(){
    let display = document.getElementById("result")
    let expression = display.value;
    let result = math.evaluate(expression);
    display.value = result;
}