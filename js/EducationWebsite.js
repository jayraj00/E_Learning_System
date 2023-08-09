// // $( "#BtnContinue" ).click(function() {
// //     // alert( "Handler for .click() called." );
// //     window.location()
// //   });

//   function login()
// 	{		
// 		location.href = '~/education-website/student.html';
// 		return false
// 	}

// $(document).ready(function() { 
// });

$("#BtnContinue").on('click',function() {
	// alert( "Handler for .click() called." );
	var url = "E:\DE E-learing\code\education-website\student.html"; 
	$(location).attr('href',url); 
    // window.location()
  });