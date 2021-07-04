
var checkPasswd = function() {
  if (document.getElementById('pass').value ==
    document.getElementById('confirm').value&&document.getElementById('pass').value!=""&&document.getElementById('confirm').value!="") {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Matching';
    document.getElementById('submit').disabled=false;
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Not matching';
    document.getElementById('submit').disabled=true;
  }

  if(document.getElementById('pass').value==""||document.getElementById('confirm').value=="")
   document.getElementById('message').innerHTML = '';
}