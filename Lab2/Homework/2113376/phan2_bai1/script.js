function CreateTable(){
    var display = document.getElementById("display");
    if (display.hasChildNodes()){
        window.alert("Already create a table");
        return;
    }
    var table = document.createElement("table");
    for (let i = 0; i < 2;i++){
        let row = document.createElement("tr");
        for (let j = 0; j < 2; j++){
            let data = document.createElement("td");
            row.appendChild(data);
        }
        table.appendChild(row);
    }
    display.appendChild(table);
}
function AddRow(){
    var table = document.querySelector(".display>table");
    if (table == null){
        window.alert("Create a table first");
        return;
    }
    var row = document.createElement("tr");
    var numberOfColumn = table.rows[0].cells.length;
    for (let i = 0; i < numberOfColumn; i++){
        let data = document.createElement("td");
        row.appendChild(data);
    }
    table.appendChild(row);
}
function AddColumn(){
    var table = document.querySelector(".display>table");
    if (table == null){
        window.alert("Create a table first");
        return;
    }
    for (var row of table.rows){
        row.appendChild(document.createElement("td"));
    }
}
function RemoveRow(){
    var table = document.querySelector(".display>table");
    var inputField = document.getElementById("row-number");
    if (table == null){
        window.alert("Create a table first");
        return;
    }
    if (inputField.value == ""){
        window.alert("Please enter a value");
        return;
    }
    var rowNumber = Number(inputField.value);
    var maxRow = table.rows.length;
    if (!Number.isInteger(rowNumber)){
        window.alert("Please enter a valid number");
        return;
    }
    if (!(0<= rowNumber && rowNumber < maxRow)){
        window.alert("Row number isn't valid");
        return;
    }
    var targetRow = table.rows[rowNumber];
    targetRow.remove();
    inputField.value = "";
}
function RemoveColumn(){
    var table = document.querySelector(".display>table");
    var inputField = document.getElementById("column-number");
    if (table == null){
        window.alert("Create a table first");
        return;
    }
    if (inputField.value == ""){
        window.alert("Please enter a value");
        return;
    }
    var columnNumber = Number(inputField.value);
    var maxColumn = table.rows[0].cells.length;
    if (!Number.isInteger(columnNumber)){
        window.alert("Please enter a valid number");
        return;
    }
    if (!(0<=columnNumber && columnNumber<maxColumn)){
        window.alert("Column number isn't valid");
        return;
    }
    for (row of table.rows){
        row.cells[columnNumber].remove();
    }
    inputField.value = "";
}

function DeleteTable(){
    var table = document.querySelector(".display>table");
    if (table == null){
        window.alert("There is no table to delete");
        return;
    }
    table.remove()
}