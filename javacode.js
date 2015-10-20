function showResult(id,str,username) {
//get  categoriy id
//var id = document.getElementById("searchselect").value;
  if (str.length==0) { 
    document.getElementById("liketext").innerHTML="";
    document.getElementById("liketext").style.border="0px";
    return;
  }
    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("liketag").innerHTML=xmlhttp.responseText;      
    }
  }
	//send user input and category id 
  xmlhttp.open("GET","rating.php?value=" +str+"&id="+id+"&username="+username,true);
  xmlhttp.send();
}
