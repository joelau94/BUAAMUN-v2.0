//go to enroll
$(document).ready(function(){
	var note = $('#note'),
		ts = new Date(2016, 3, 25),
		newYear = true;
	
	if((new Date()) > ts){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		ts = (new Date()).getTime() + 10*24*60*60*1000;
		newYear = false;
	}
		
	$('#countdown').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
			
			if(newYear){
				message += "left until the new year!";
			}
			else {
				message += "left to 10 days from now!";
			}
			
			note.html(message);
		}
	});

	$('#enroll_button').click(function(event){
		event.preventDefault();
		$('#office_panel').hide().load('office/enroll.html',function(){
			$(this).fadeIn();
		});
	});	
	$('#conference_button').click(function(event){
		event.preventDefault();
		//$('#office_panel').hide().load('office/conference.html',function(){       
		//	$(this).fadeIn();
		//});
        window.location.href='http://munbuaa.sinaapp.com/conference.php';
	});
	$('#default_button').click(function(event){
		event.preventDefault();
		$('#office_panel').hide().load('office/default.html',function(){
			$(this).fadeIn();
		});
	});
});
/*
//go to conference
$(document).ready(function(){
	
});

//back to default
$(document).ready(function(){
	
});

*/