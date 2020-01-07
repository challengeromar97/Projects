<!DOCTYPE html>
<html>
<head>
	<title>Four Square </title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <link rel="icon" href="FourSquare/Img/Icons/Website-Icon2.png" />

<style>

th,td{ padding:5px;}
p.blue {color:blue;}.red{text-align: center;}
h1, a,h2 {color:green;} 
#div1 { width: 350px; height:40px;padding: 10px; border: 1px solid #aaaaaa;}


</style>


<script language="JavaScript">

function setVisibility(id, visibility) {
document.getElementById(id).style.display = visibility;}
function MyDate() {
document.getElementById("demo").innerHTML = Date();}

function ShowMyDetails(Family){
var FamilyType = Family.getAttribute("data-family-type");
alert( Family.innerHTML + " Is " + FamilyType + "."); }

function allowDrop(ev) {ev.preventDefault();}
function drag(ev) {ev.dataTransfer.setData("Text", ev.target.id);}
function drop(ev) {var data = ev.dataTransfer.getData("Text");
ev.target.appendChild(document.getElementById(data));
ev.preventDefault();}

function displayResult() {
document.getElementById("myHeader").innerHTML = "Have a nice day!";
}



</script>
</head>
<body background="FourSquare\Img\Background\BackGround1.jpg" style="color: #ffffff"  >



<script> 
function Text1()	{
document.getElementById("Text1").innerHTML="This IS First Paragraph With Javascript ."
}
</script>




<p id="Text1" onmouseenter="Text1()" >HaaaA :D _P_</p>






<script>
function Text2(){document.getElementById("Text2").innerHTML = "You have Pressed Here Now only Touch This Word "}
function Text3(){document.getElementById("Text3").innerHTML = "You have touched Here Now only double Click in This Word "}
function Text4(){document.getElementById("Text4").innerHTML = "Thank You For Advanced Me "}
</script>
<p id="Text2" onmousedown="Text2()" ondblclick="Text4()" onmouseover="Text3()">Press Here ! </p>

















</br></br></br>
	<center>
<button type="button" onclick="MyDate();">Date</button><p id="demo"></p></center>
<p class="blue"> lazm ykon loon 2zr2 :D </p>
<p class="blue red"> lazm ykon loon 2zr2 :D </p>
<p class="red"> lazm ykon loon 2zr2 :D </p>
<h1 contenteditable="true"> Hahaha</h1>
<h2> Hehehe </h2>
<a> HOhohoho </a>
<p hidden> Oh Hidden </p>




<ul>
  <li onclick="showDetails(this)"  data-animal-type="bird">Owl</li>
  <li onclick="showDetails(this)" id="salmon" data-animal-type="fish">Salmon</li>  
  <li onclick="showDetails(this)" id="tarantula" data-animal-type="spider">Tarantula</li>  
</ul>



<ul>
	<li onclick="ShowMyDetails(this)"  data-family-type="My larg Sister">Fatima</li>
	<li onclick="ShowMyDetails(this)"  data-family-type="My Sister">Hafssah</li>
	<li onclick="ShowMyDetails(this)"  data-family-type="My Doughter">Aly</li>
</ul>



<p dir="ltr">Write this text right-to-left!</p>
<p dir="rtl">Write this text right-to-left!</p>
<p dir="auto">Write this text right-to-left!</p>



<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
<br>
<p id="drag1" draggable="true" ondragstart="drag(event)"> Drag Me Into rectangle</p>

<h1 id="myHeader">Hello World!</h1>
<button onclick="displayResult()">Change text</button>

<input type="text" name="fname" spellcheck="true" />

</br>
<a href="#" tabindex="2">ahmed This Is Number 2 press Tap</a></br>
<a href="#" tabindex="1">ahmed This Is Number 1 </a></br>
<a href="#" tabindex="3">ahmed This Is Number 3 </a></br>

<p> This IS Abbr tittle <abbr title="World Health Organization">WHO</abbr> is the famous</p>


<p><b>This text is bold</b></p>
<p><strong>This text is strong</strong></p>
<p><i>This text is italic</i></p>
<p><em>This text is emphasized</em></p>
<p><code>This is computer output</code></p>
<p>This is<sub> subscript</sub> and <sup>superscript</sup></p>

<pre>
for i = 1 to 10
     print i
next i
</pre>
<code>Computer code</code>
<br>
<kbd>Keyboard input</kbd>
<br>
<samp>Sample text</samp>
<br>
<var>Computer variable</var>
<br>



<address>
Written by W3Schools.com<br>
<a href="mailto:us@example.org">Email us</a><br>
Address: Box 564, Disneyland<br>
Phone: +12 34 56 78
</address>

<bdo dir="rtl">
Here is some Hebrew text
</bdo>

<del>blue</del> 
<mark>milk</mark>


This is another mailto link:
<a href="mailto:someone@example.com?cc=someoneelse@example.com&bcc=andsomeoneelse@example.com&subject=Summer%20Party&body=You%20are%20invited%20to%20a%20big%20summer%20party!" target="_top">Send mail!</a>

























</body>
</html>