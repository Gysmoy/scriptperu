
        $('body').on("keydown", function(e) { 
            if (e.ctrlKey && e.shiftKey && e.which === 66) {
               window.open("../php/ventas/imprimir.php", "Diseño Web", "width=800, height=600")  
            }
        });
        $("#button").on("click", function(e) { 
            alert("You clicked button");
        }); 
