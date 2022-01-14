// Sección Menú
$("#btn-chifa").click(function(){
    $("header").css({
        "background-image": "url(img/chifa.jpg)"
    });
    $("#chifa").show(250);
    $("#btn-chifa").css({
        "border": "1px solid var(--blanco)", 
        "background-color": "var(--rojo)",
        "color": "var(--blanco)"
    })
    $("#burguer").hide();
    $("#btn-burguer").css({
        "background-color": "var(--blanco)",
        "color": "var(--rojo)"
    })
    $("#bebidas").hide();
    $("#btn-bebidas").css({
        "background-color": "var(--blanco)",
        "color": "var(--rojo)"
    })
});

// Sección burguer
$("#btn-burguer").click(function(){
    $("header").css({
        "background-image": "url(img/burguer.jpg)"
    });
    $("#burguer").show(250);
    $("#btn-burguer").css({
        "border": "1px solid var(--blanco)", 
        "background-color": "var(--rojo)",
        "color": "var(--blanco)"
    })
    $("#chifa").hide();
    $("#btn-chifa").css({
        "background-color": "var(--blanco)",
        "color": "var(--rojo)"
    })
    $("#bebidas").hide();
    $("#btn-bebidas").css({
        "background-color": "var(--blanco)",
        "color": "var(--rojo)"
    })
});

// Sección bebidas
$("#btn-bebidas").click(function(){
    $("header").css({
        "background-image": "url(img/bebidas.jpg)"
    });
    $("#bebidas").show(250);
    $("#btn-bebidas").css({
        "border": "1px solid var(--blanco)", 
        "background-color": "var(--rojo)",
        "color": "var(--blanco)"
    })
    $("#chifa").hide(250);
    $("#btn-chifa").css({
        "background-color": "var(--blanco)",
        "color": "var(--rojo)"
    })
    $("#burguer").hide(250);
    $("#btn-burguer").css({
        "background-color": "var(--blanco)",
        "color": "var(--rojo)"
    })
});