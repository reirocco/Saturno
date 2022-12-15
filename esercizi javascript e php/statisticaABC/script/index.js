
//==================================================================================================================================

function getLine(){
            $.ajax({
                    url: "./script/getField.php",
                    dataType: "json",
                    success: function(tmp){
                        setLineBox(tmp);
                    },
                    error: function(jqXHR, exception){
                            alert(jqXHR.responseText + "  - " + exception);
                    } 

            });
}




//===================================================================================================================================

function setLineBox(data){
    var i = 0;
    var element;
    while(i < data.length){
        element = data[i];
        $('#linea').append(new Option(element, element));
        i++;
    };
    
}