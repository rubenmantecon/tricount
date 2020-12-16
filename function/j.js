function messageWarning (number,message){
    let numberCodeWarning = number 
    let msgInWarning = message
    if (numberCodeWarning === 1) {
        document.getElementById("warningSpace").innerHTML=('<div style="background-color:#fe2222; width:50%;"><h5>Error:'+ msgInWarning +'</h5></div>')
    }
    if (numberCodeWarning === 2) {
        document.getElementById("warningSpace").innerHTML=('<div style="background-color:#65ea0f; width:50%;"><h5>Succes:'+ msgInWarning +'</h5></div>')
    }    
    else{
        document.getElementById("warningSpace").innerHTML=('<div style="background-color:#ebf81e; width:50%;"><h5>Warning:'+ msgInWarning +'</h5></div>')
    }    
}