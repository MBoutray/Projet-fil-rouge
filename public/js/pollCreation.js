$(document).ready(function () {
    // $("#poll-question-input").on('input', function () {
    //     $.ajax({
    //         url: './helpers/pollCreation.php',
    //         method: 'post',
    //         data: { input: 'question', data: $(this).val() },
    //         dataType: 'html',
    //         success:
    //     })
    // })
    function ValidateInput(inputName, dataContent) {
        let wasValid = true;
        $.post("./helpers/validatePoll.php", { input: inputName, data: dataContent }, function(data) {
            if (data.result == "error") {
                $("#" + inputName + "-error").html(data.errorMessage);
                wasValid = false;
            }
        }, 'json');
        return wasValid;
    }

    //Poll submitting
    $("form").submit(function (e) {
        e.preventDefault();

        let question = $("#poll-question-input").val();
        let deadline = $("#deadline-input").val();
        let category = $("#category-input").val();
        let answers = $("[name^='answers']").map(function() { return $(this).val(); });
        let isCorrect = $("#is-correct").val();

        // $valid = ValidateInput("poll-question", question);
        $valid = ValidateInput("deadline", deadline);
    })
});