function DisplayForm(){
    var form = document.querySelector('form[name="add-product"');
    form.style.display = "block";
}
function HideForm(){
    var form = document.querySelector('form[name="add-product"');
    form.style.display = "none";
}
function EditData(id){
    window.location.href = "function/c.php?id=" + id;
}
function Delete(id){
    var display = document.querySelector(".display");
    $.ajax({
        url: "function/d.php?id=" + id,
        success: function(result){
            display.innerHTML = result;
        }
    });
}

window.onload = function(){
    var display = document.querySelector(".display");
    $.ajax({
        url: "function/a.php",
        success: function(result){
            display.innerHTML = result;
        }
    });
}
