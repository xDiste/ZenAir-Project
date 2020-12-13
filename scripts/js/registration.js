
var checkPasswd = function() {
  if (document.getElementById('pass').value ==
    document.getElementById('confirm').value&&document.getElementById('pass').value!=""&&document.getElementById('confirm').value!="") {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Not matching';
  }

  if(document.getElementById('pass').value==""||document.getElementById('confirm').value=="")
   document.getElementById('message').innerHTML = '';
}