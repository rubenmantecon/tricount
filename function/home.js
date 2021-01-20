document.onload = messageWarning(2,"Has iniciado sesion con exito")
$('.sortCreate').click(function() {
    $('#updateTable').animate({
        opacity: "toggle"
    }, "slow");
    $('#createdTable').animate({
        opacity: "toggle"
    }, "slow");
    $('.sortCreate').attr("disabled", true);
    $('.sortUpdate').attr("disabled", false);

});
$('.sortUpdate').click(function() {
    $('#createdTable').animate({
        opacity: "toggle"
    }, "slow");
    $('#updateTable').animate({
        opacity: "toggle"
    }, "slow");
    $('.sortCreate').attr("disabled", false);
    $('.sortUpdate').attr("disabled", true);
});

$('#addTravel').click(function(){
    console.log("hola")
    $('#addTravel').attr("disabled",true)
    let form = `
    <div class="d-flex">
    <form method="post" class="login-form">
    <label for="travelName">Nombre del viaje</label><br>
    <input type="text" id="travelName" name="travelName"><br>
    <label for="travelDescription">Descripcion</label><br>
    <textarea type="text" id="travelDescription" name="travelDescription"> Añade la descripcion aqui </textarea><br>
    <label for="travelDivisa">Divisa</label> 
    <select name="divisa" id="divisa">
        <option value="eur">Euro</option>
        <option value="dolar">Dolar</option>
        <option value="yen">Yenes</option>
    </select><br>
    <input type="submit" name="addTravel" id="addTravel">   
    </form>
    <a type="button" id="closeForm" class="btn btn-secondary btn-lg style='height: 50px;'>X</a>
    </div>`;
    console.log(form)
    $('#travelForm').append(form);
    
})

