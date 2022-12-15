
function getField(){
    getOfficeCity();
    getCustomersCountry();
}



function getCustomersCountry(){
    $.ajax({
        url: "./../script/getCustumersCountry.php",
        dataType: "json",
        success: function(tmp){
            setCostumersBox(tmp);
        },
        error: function(jqXHR, exception){
                alert(jqXHR.responseText + "  - " + exception);
        } 

    });
}

//==================================================================================================================================

function getOfficeCity(){
    $.ajax({
            url: "./../script/getOfficeCity.php",
            dataType: "json",
            success: function(tmp){
                setOfficeBox(tmp);
            },
            error: function(jqXHR, exception){
                    alert(jqXHR.responseText + "  - " + exception);
            } 

    });
}




//===================================================================================================================================

function setCostumersBox(data){
    var i = 0;
    var element;
    while(i < data.length){
        element = data[i];
        $('#stato_cliente').append(new Option(element, element));
        i++;
    };
    
}

function setOfficeBox(data){
    var i = 0;
    var element;
    while(i < data.length){
        element = data[i];
        $('#citta_ufficio').append(new Option(element, element));
        i++;
    }; 
}