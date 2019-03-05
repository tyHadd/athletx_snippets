/*
1. Validate Form Fields
*/
function Required(group){
  var errors = 0;
  $("."+group).each(function() {
    if( $(this).val()=="" ){ //if blank then add form danger class
      $(this).addClass("uk-form-danger");
      errors++;
    }
    else { //go through a few more checks
      if($(this).attr("type")=="email"){ //if email type
        if( isValidEmailAddress($(this).val())==true ){ //email address is valid
          $(this).removeClass("uk-form-danger");
        }
        else { //email address is not valid
          $(this).val("");
          $(this).attr("placeholder","Not a valid email address");
          $(this).addClass("uk-form-danger");
          errors++;
        }
      }
      else if( $(this).attr("type")=="password" ){ //if password type
          if( $(this).hasClass("confirm-password") && $(this).val()!=$(".new-password").val() ){ //if password does not match
            $(this).val("");
            $(this).attr("placeholder","Password does not match");
            $(this).addClass("uk-form-danger");
            errors++;
          }
          else {
            $(this).removeClass("uk-form-danger");
          }
      }
      else if( $(this).attr("type")=="checkbox" ){
        var n = $( "."+group+":checked" ).length;
        if(n>0){
          $("."+group+"[type=checkbox]").parent("label").removeClass("uk-form-danger");
        }
        else {
          $("."+group+"[type=checkbox]").parent("label").addClass("uk-form-danger");
          errors++;
        }
      }
      else {
          $(this).removeClass("uk-form-danger");
      }
    };
  });
  return errors;
}

/*
2. Validate email address
*/
function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
}

/*
Using function
*/
$("#form").on('submit',function(event){
    event.preventDefault(); //prevent form submission
    var e = 0;
    e = Required("required-example"); //any field that has this class will be checked
    if(e>0){ //if any errors
      console.log("There were errors. Don't submit the item");
    }
    else { //if zero errors then do some action
      //action
    }
});
