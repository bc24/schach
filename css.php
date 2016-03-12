<?php
   header("Content-type: text/css; charset: UTF-8");
   
   $darkbg = "#1c1c1c"; 
   $lightbg = "#848484"; 
   $fieldwidth = "60px"; 
   $fieldheight = "60px";	
   $whitefig = "#ffa500"; 				//Weiß
   $blackfig = "#00bfff";				   //Schwarz
   $bordercol = "#ff8000";
?>
body
{
	text-align: ;
	margin: auto;
	padding: auto;
	font-family: sans serif, Verdana;
	background-image: url("hintergrund.jpg");
	background-color: #000000;
	color: #ffffff;

	background-repeat:no-repeat;
	background-position:100px 50%;
	bottom;
	right;

}

.Menue
{

}

.Frank_Ueberschrift
{
font-family: Vivaldi;
font-size: 50px;
}

.Von_Nach
{
position: absolute;
right: 0px;
width: 300px;
padding: auto;

}

span
{
background: yellow;
color:#000000;
}

.Frank_T
{
margin: auto;
border: 3px solid black;
border-collapse: collapse;
background-color: #a0a0a0;
color: #000000;
transform: rotateX(30deg);
text-align: center

}



div {
perspective: 400px;
width: 800px;
margin: auto;
}


th {	
	border: 1px solid black;
	padding: 5px;
	font-size: 0.8em;
}

td {
	border: 1px solid black;
	width: <?php echo $fieldwidth; ?>;
	height: <?php echo $fieldheight; ?>;
	font-size: 2.7em;
}

.white {
	color: <?php echo $whitefig; ?>;
}

.black {
	color: <?php echo $blackfig; ?>;
}

tr:nth-child(even) td:nth-child(odd),tr:nth-child(odd) td:nth-child(even) {
	//background-color: <?php echo $darkbg; ?>;
	background-image: url("schwarz.jpg");
}

tr:nth-child(even) td:nth-child(even),tr:nth-child(odd) td:nth-child(odd) {
	//background: <?php echo $lightbg; ?>;
	background-image: url("weiss.jpg");
}

tr:first-child td:nth-child(n),tr:last-child td:nth-child(n),
tr:nth-child(n) td:first-child,tr:nth-child(n) td:last-child
{
		border: 1px solid black;
		padding: 5px;
		font-size: 0.8em;
		font-weight: bold;
		width: 12px;
		height: 12px;
		background-color: #a0a0a0;
}

a{
color:#000;
text-decoration:none;
}
a:visited{
color:#FFF;
text-decoration: none;
}
a:active{
color:#3F3F3F;
text-decoration: none;
}
a:hover{
color:#CC5200;
text-decoration:underline;
}
a:focus{
color:#CC5200;
text-decoration: none;
}

