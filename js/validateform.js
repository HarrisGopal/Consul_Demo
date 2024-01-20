function Invalidname(textbox) {
  
  if (textbox.value === '') {
      textbox.setCustomValidity
            ('Entering an name is necessary!');
  } else if (textbox.value>='0' && textbox.value<='9') {
      textbox.setCustomValidity
            ('name contain alphabets which is valid!');
  } 
  
  else {
      textbox.setCustomValidity('');
  }

  return true;
}
function Invalidpack(textbox) {
  
  if (textbox.value === '') {
      textbox.setCustomValidity
            ('Entering an value is necessary!');
  } else if ((textbox.value>='A' && textbox.value<='Z')||(textbox.value>='a' && textbox.value<='z')) {
      textbox.setCustomValidity
            ('pack no contain only digit!');
  } else {
      textbox.setCustomValidity('');
  }

  return true;
}
function Invalidname1(textbox) {
  
  if (textbox.value === ' ') {
      textbox.setCustomValidity
            ('Entering an name is necessary!');
  } else if ((textbox.value>='0' && textbox.value<='9')) {
      textbox.setCustomValidity
            ('name contain only alphabets which is valid!');
    }
  else {
      textbox.setCustomValidity('');
  }

  return true;
}
function Invalidemail(textbox) {
  
  if (textbox.value === '') {
      textbox.setCustomValidity
            ('Entering an email-id is necessary!');
  } else if (textbox.validity.typeMismatch) {
      textbox.setCustomValidity
            ('Please enter an email address which is valid!');
  } else {
      textbox.setCustomValidity('');
  }

  return true;
}
function Invalidcontact(textbox) {
  
  if (textbox.value === '') {
      textbox.setCustomValidity
            ('Entering an phone number is necessary!');

  }
  else if ((textbox.value>='A' && textbox.value<='Z')||(textbox.value>='a' && textbox.value<='z')) {
    textbox.setCustomValidity
          ('phone number contain only digit!');
} 
   else if (textbox.value.length !=10) 
  {
      textbox.setCustomValidity
            ('Please enter 10 digits only which is valid!');
  } 
  else {
      textbox.setCustomValidity('');
  }

  return true;
}

function expiredate(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate()+1;
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
     day = '0' + day.toString();
    var maxDate = year + '-' + month + '-' + day;
    $('#expiredate').attr('min', maxDate);
}
