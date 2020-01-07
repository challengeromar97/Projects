<!DOCTYPE html>
<html lang="en-US">
<head><title>Aministrator</title></head>

<style>
	
	
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  src: local('Montserrat-Regular'), url(Font/zhcz-_WihjSQC0oHJ9TCYBsxEYwM7FgeyaSgU71cLG0.woff) format('woff');
}

* {margin: 0; padding: 0;}


html {
	height: 100%;
	background: url('Img/background/gs.png');
	background: 
	linear-gradient(rgba(196, 102, 0, 0.2), rgba(155, 89, 182, 0.2)), 
	url('Img/background/gs.png');
	
}

#form1{
	width:400px;
	margin:50px auto;
	text-align:center;
	position: relative;
	font-family: montserrat, arial, verdana;
	}
#form1 fieldset{
	background-color:white;
	border:0px;
	border-radius:3px;
	box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
	padding:20px 30px;
	width:80%;
	box-sizing: border-box;
	margin: 0 10%;
	position: absolute;
	}
#form1 fieldset:not(:first-of-type){
	display:none;
	}
#form1 input.Text {
	padding: 15px;
	border: 1px solid #ccc;
	border-radius: 3px;
	margin-bottom: 10px;
	width: 100%;
	box-sizing: border-box;
	font-family: montserrat;
	color: #2C3E50;
	font-size:13px;
	}
	
	
	
#form1 .Next, #form1 .Prev,#form1 .Signup{
	width: 100px;
	background: #27AE60;
	font-weight: bold;
	color:white;
	border: 0 none;
	border-radius: 1px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px;
	}
#form1 .Next:hover ,.Prev:hover,.Prev:focus, .Next:focus,.Signup :focus,.Signup:hover {
	box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
	}


#T2{
	font-size: 15px;
	text-transform: uppercase;
	color: #2C3E50;
	margin-bottom: 10px;
	}
#ST1 {
	font-weight: normal;
	font-size: 13px;
	color: #666;
	margin-bottom: 20px;
	}
#T1 {
	margin-bottom:30px;
	overflow: hidden;
	counter-reset: step;
	}
#T1 li {
	list-style-type: none;
	color: white;
	text-transform:uppercase;
	font-size:9px;
	width: 33.33%;
	float:left;	
	position:relative;
	}
#T1 li:before{
	content: counter(step);
	counter-increment: step;
	width: 20px;
	line-height:20px;
	display: block;
	font-size:10px;
	color:#333;
	background:white;
	border-radius:3px;
	margin:0 auto 10px auto;
	}
#T1 li:after{
	content: '';
	width:100%;
	background:white;
	height:2px;
	position:absolute;	
	left:-50%;
	top:9px;
	z-index: -1;
	}
#T1 li:first-child:after{
	content:none;
	}
#T1 li.active:before,#T1 li.active:after{
	background:#27AE60;
	color:white;	
	}
	select.UDay{width: 70px;}
	select.UMonth{width: 100px;margin-right:0px;}
	select.UYear{width: 80px;}
	select.UDay,.UMonth,.UYear {
		padding-top: 15px;
		padding-left: 5px;
		padding-right: 5px;
		padding-bottom: 15px;
		border: 1px solid #ccc;
		border-radius: 3px;
		margin-bottom: 10px;
		box-sizing: border-box;
		font-family: montserrat;
		color: #2C3E50;
		font-size:11px;
	}
	select.SQuestion{
		font-size: 16.7px;
		margin-top: 0px;
		padding-top: 3px;
		padding-left: 3px;
		padding-right: 3px;
		padding-bottom: 5px;
		border: 1px solid #ccc;
		border-radius: 3px;
		margin-bottom: 10px;
		width: 100%;
		box-sizing: border-box;
		font-family: montserrat;
		color: #2C3E50;
		font-size:13px;
		height: 43px;
		width: 260px;
	}

.flp div {position: relative; margin-bottom: 5px;}

 .flp label {
	width: 400px; display: block;
	font: inherit; font-size: 16px; line-height: 24px;
	height: 46px;
	border: 1px solid #999;
}
.flp label {
	position: absolute; left: 0; top: 0;
	padding: 10px 8px;
	border-color: transparent; color: #666;
	cursor: text;
}

.ch {
	display: block; float: left;
	position: relative;
	background: white; 
}
.ch:first-child {padding-left: 2px;}
.ch:last-child {padding-right: 2px;}

.focussed {
	pointer-events: none;
}

	a {
		text-decoration: none;
		color: blue;
		
	}
	a:hover {
		text-decoration: underline;
	}
	a:visited {
		color: blue;
	}
	a:active {
		color: red;
	}


</style>
<body>

<script src="JS/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="JS/jquery.easing.min.js" type="text/javascript"></script>

	
	
	



	<div id="form1" class="flp">
		
			<ul id="T1">
				<li class="active">Accounts</li>
				<li>Messages</li>
				<li>Setting</li>
			</ul>

			<fieldset>
				<h2 id="T2">Show Accounts</h2><br />
				<br /><a href="Accounts.php" target="_blank">All Accounts Even deleted</a><br /><br />
				<br /><a href="UAccounts.php" target="_blank">Accounts Which Available</a><br />	<br /><br />
				<input type="button" 		name="Next"  class="Next" value="Next" />

			</fieldset>
			<fieldset>
				<h2 id="T2">Show Messages</h2><br />
				<br /><a href="ContactThem.php" target="_blank">Send Messages To Users</a><br /><br /><br />	
				<br /><a href="MessageTU.php" target="_blank">Show Messages Was Sent To Users</a><br />	<br />
				<br /><a href="MessageFU.php" target="_blank">Show Messages Was Sent From Users</a><br /><br /><br />
				<input type="button" name="Prev" class="Prev" value="Previous" />
				<input type="text" name="" hidden/>
				<input type="button"name="Next" class="Next" value="Next" />
			</fieldset>
			<fieldset>
				<h2 id="T2">Reset Or Delete Acc & Mesg</h2><br/>
				<form method="post" action="Reset_ID.php" >
					<div><input name="RID" type="text" name="AEmail" id="Reset"  class="Text"/><label for="Reset">Reset</label></div>
					<input type="submit" value="Reset ID"  class="Signup" /><br/><br/>
				</form>
				<form method="post" action="DeleteAll.php" >
					<div><input name="DAP" type="text"  name="AEmail" id="Delete"  class="Text"/><label for="Delete">Delete</label></div>
					<input type="submit" value="Delete ALl in the Table" class="Signup" />
				</form>
				<input type="button"   class="Prev" name="Prev" value="Previous" />
			</fieldset>
		</div>







</body>	
<script>


	$(".flp label").each(function() {
		var sop = '<span class="ch">';
		var scl = '</span>';
		$(this).html(sop + $(this).html().split("").join(scl + sop) + scl);
		$(".ch:contains(' ')").html("&nbsp;");
	})
	var d;
	$(".flp input").focus(function() {
		var tm = $(this).outerHeight() / 2 * -1 + "px";
		$(this).next().addClass("focussed").children().stop(true).each(function(i) {
			d = i * 50;
			$(this).delay(d).animate({
				top : tm
			}, 200, 'easeOutBack');
		})
	})
	$(".flp input").blur(function() {
		if ($(this).val() == "") {
			$(this).next().removeClass("focussed").children().stop(true).each(function(i) {
				d = i * 50;
				$(this).delay(d).animate({
					top : 0
				}, 500, 'easeInOutBack');
			})
		}
	})

	



	var Currentfs, Nextfs, Prevfs;
	var left, opacity, scale;
	var animating;

	$(".Next").click(function() {
		if (animating)
			return false;
		animating = true;

		Currentfs = $(this).parent();
		Nextfs = $(this).parent().next();
		$("#T1 li").eq($("fieldset").index(Nextfs)).addClass("active");
		Nextfs.show();
		Currentfs.animate({
			opacity : 0
		}, {
			step : function(now, mx) {
				scale = 1 - (1 - now) * 0.2;
				left = (now * 50) + "%";
				opacity = 1 - now;
				Currentfs.css({
					'transform' : 'scale(' + scale + ')'
				});
				Nextfs.css({
					'left' : left,
					'opacity' : opacity
				});
			},
			duration : 800,
			complete : function() {
				Currentfs.hide();
				animating = false;
			},
			easing : 'easeInOutBack'
		});
	});

	$(".Prev").click(function() {
		if (animating)
			return false;
		animating = true;

		Currentfs = $(this).parent();
		Prevfs = $(this).parent().prev();

		$("#T1 li").eq($("fieldset").index(Currentfs)).removeClass("active");

		Prevfs.show();
		Currentfs.animate({
			opacity : 0
		}, {
			step : function(now, mx) {
				scale = 0.8 + (1 - now) * 0.2;
				left = ((1 - now) * 50) + "%";
				opacity = 1 - now;
				Currentfs.css({
					'left' : left
				});
				Prevfs.css({
					'transform' : 'scale(' + scale + ')',
					'opacity' : opacity
				});
			},
			duration : 800,
			complete : function() {
				Currentfs.hide();
				animating = false;
			},
			easing : 'easeInOutBack'
		});
	});


</script>
	
	
	

	
</html>
