$(document).ready(function() {

    var counter = 0;

    function sizzle(status) {
        if (status == 'success') {
            var adjectif = 'bonnes';
            var sujet = 'réponses';
	    congrat = 'Vous pouvez sans doute  <a onclick="location.reload();">faire mieux</a>.';
	    blink = 1600;
            colours = [ "#ABB1FB", "Transparent" ];
            coloursTxt = [  "#fff", "#aabb1fb" ];
            $("#success").get(0).play();
        }
        else if (status == 'failure') {
            var adjectif = 'bonne';
            var sujet = 'réponse';
	    congrat = 'Incroyable ! Lisez les bonnes réponses et <a onclick="location.reload();">recommencez</a>.';
	    blink = 600;
            colours = [ "#f66", "Transparent" ];
            coloursTxt = [  "#fff", "#f66" ];
	    $("#error").get(0).play();
        }
        else {
            var adjectif = 'bonnes';
            var sujet = 'réponses';
	    congrat = 'Bravo !';
	    blink = 1200;
            colours = [ "#6f6", "Transparent" ];
            coloursTxt = [  "#fff", "#6f6" ];
            $("#success").get(0).play();
        }
        $('#jquizremarks').fadeIn('slow');
        $('#jquiztotal').html(count+' '+adjectif+' '+sujet+' sur '+howmanyquestions+' ! '+congrat);

        // alert(status + '/' + colours + '/' + coloursTxt + '/' + blink);
        var refreshId
	    = setInterval(function(){
		$("div#quiz").animate({ backgroundColor: colours[counter] }, blink );
		$("div#quiz div.explanation").animate({ backgroundColor: colours[counter] }, blink*2 );
		$("#jquiztotal").animate({ color: coloursTxt[counter] }, blink/2 );
		counter++;
		if(counter == colours.length) {
                    counter = 0;
		}
            }, blink);
    }

    var count = 0;      
    var howmanyquestions = $("#jquiz > li").length;
    
    //the function for a clicked item
    $("#jquiz li ul li").click(function(){
        
        if (!($(this).parent("ul").hasClass("answered"))) {
            
            // removes unanswered class and adds answered class so they cannot change answer
            $(this).parent("ul").addClass("answered");
            
            // runs if they clicked the incorrect answer
            if (!($(this).hasClass("correct"))) {
                // puts strike-through wrong answer and makes their answer red for incorrect
                $(this).addClass("wronganswer");
                $(this).siblings(".correct").addClass("realanswer");
                // animate explanation & add styling depending on answer
                $(this).parent().parent().children("div").prepend('<p>INCORRECT</p>');
                $(this).parent().parent().children("div").addClass("wrongbox");
                $(this).parent().parent().children("div").fadeTo(500, 1);
            }
            
            // runs if they clicked the correct answer
            if ($(this).hasClass("correct")) {
                //adds one to quiz total correct tally
                count++;
                // makes correct answer green
                $(this).addClass("correctanswer");
                // animate explanation & add styling depending on answer
                $(this).parent().parent().children("div").prepend('<p>CORRECT</p>');
                $(this).parent().parent().children("div").addClass("rightbox");
                $(this).parent().parent().children("div").fadeTo(750, 1);
            }
            
            if ($('ul.answered').length == howmanyquestions) {
                if (count == 0) {
                    sizzle('failure');
                } else if (count === howmanyquestions) {
                    sizzle('royal');
		}
                else {
                    sizzle('success');
                }
            }
        }
    });

});