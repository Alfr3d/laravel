import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

var hiddenAnswerBlock = $( "#createAnswerBlock" );
var addAnswer = $("#addAnswer");

$(addAnswer).on( "click", function( event ) {
    $(addAnswer).toggleClass('showForm');
    if($(addAnswer).hasClass('showForm')){
        $(addAnswer).text('Close Answer Form');
    } else {
        $(addAnswer).text('Add Answer')
    }
    hiddenAnswerBlock.toggle();
});

$(".editAnswer").on("click", function(event) {
    var answerId = $(this).val()
    $(this).hide();
    var oldValue = $("#answerDescription-"+answerId).html();
    var input = '<input type="text" name="description" value="'+oldValue+'"> <input type="submit">';
    $("#answerDescription-"+answerId)
        .replaceWith('<form method="POST" action="/answers/'+ answerId +'/update">' + input +'</form>')
});
