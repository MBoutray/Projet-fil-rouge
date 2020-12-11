function ValidateInput(inputName, dataContent, inputID) {
    $.ajax({
        url: "./helpers/validatePoll.php",
        method: "post",
        dataType: 'json',
        data: { input: inputName, data: dataContent },
        success: function(data){
            $("#" + RemoveStringEnding(inputID, "-input") + "-error").html(data.result == "error" ? data.errorMessage : '');
        }
    });
}

function AreAllTrue(booleanArray) {
    booleanArray.forEach(element => { if (!element)  return false; });
    return true;
}

function RemoveStringEnding(stringToTruncate, lineEndingToRemove) {
    return stringToTruncate.substring(0, stringToTruncate.length - lineEndingToRemove.length);
}