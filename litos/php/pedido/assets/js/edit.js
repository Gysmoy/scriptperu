function edit(code) {
    var image = document.getElementById("image" + code).src;
    var name = document.getElementById("name" + code).innerHTML;
    var price = document.getElementById("price" + code).innerHTML;
    document.getElementById("code").value = code;
    document.getElementById("image-prev").src = image;
    document.getElementById("image").innerHTML = image;
    document.getElementById("name").innerHTML = name;
    document.getElementById("price").value = price;
    $("#frame-edit").show(250);
}
function cancelEdit() {
    document.getElementById("form-edit").reset();
    $("#frame-edit").hide(250);
}
function efectoToggle(mostrar) {
    switch (mostrar) {
        case "add":
            $("#add").toggle(250);
            $("#chifa").hide(250);
            $("#burguer").hide(250);
            $("#bebidas").hide(250);
            break;
        case "chifa":
            $("#chifa").toggle(250);
            $("#add").hide(250);
            $("#burguer").hide(250);
            $("#bebidas").hide(250);
            break;
        case "burguer":
            $("#burguer").toggle(250);
            $("#add").hide(250);
            $("#chifa").hide(250);
            $("#bebidas").hide(250);
            break;

        case "bebidas":
            $("#bebidas").toggle(250);
            $("#add").hide(250);
            $("#chifa").hide(250);
            $("#burguer").hide(250);
            break;
        default:
            break;
    }
}