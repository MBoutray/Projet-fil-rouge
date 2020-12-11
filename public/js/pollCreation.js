$(document).ready(function () {
    //Initiate the first radio input as checked
    $("input:radio:first").prop('checked', true);   

    //Ajax on the fly validation
    $("input[id$='-input']").on('blur', function() {
        $inputValue = $(this).val();
        // $inputName = RemoveStringEnding($(this).attr('id'), "-input");
        $inputName = $(this).attr('name');
        $inputID = $(this).attr('id');
        ValidateInput($inputName, $inputValue, $inputID);
    });

    //Poll submitting
    $("form").submit(function (e) {
        e.preventDefault();

        //Get all the input values
        $question = $("#poll-question-input").val();
        $deadline = $("#deadline-input").val();
        $category = $("#category-input").val();
        answers = new Array();
        $("[name^='answers']").each((i, answer) => {  
            answers.push([answer.value, answer.id.replace('-input', '')]);
        });
        $isCorrect = $("input:radio:checked").val();

        // -- Verify all values are correct --
        $AreValidInputValues = [];
        //Question
        $AreValidInputValues.push($question != '');
        //Deadline
        $dateDifference = new Date($deadline) - Date.now();
        $AreValidInputValues.push($dateDifference > 0);
        //Answers
        answers.forEach((elem) => {
            $AreValidInputValues.push(elem[0] != null && elem[0] != '');
        });

        //Creation of poll
        $areAllTrue = AreAllTrue($AreValidInputValues);
        if($areAllTrue) {
            let formData = new FormData(document.getElementById('poll-creation-form'));
            formData.append('action', 'new-poll');

            //get the answers in the right formatting
            let questions = [];
            answers.forEach((element) => {
                let questionTemp = { title: element[0] };
                questionTemp.isCorrect = ($isCorrect == String(element[1]).substring(String(element[1]).length - 1));

                questions.push(questionTemp);
            });
            formData.append('answers', JSON.stringify(questions));

            $.ajax({
                url: "./index.php",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function() {
                    $('#creation-success-label').html('Sondage créé !');
                }
            });
        }
    })
});