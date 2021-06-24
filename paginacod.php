<!DOCTYPE html>
<html lang="ro">
<head>
  <title>Inversarea unei matrice</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  
 #pozameniu{

background-image: url("img/pozabara.jpg");
  background-repeat: repeat-x;
}


  p{
	font-family:Verdana;
  }
  .multumiri{
	text-decoration: overline; 
	text-align:right
	}
	
	h1{
		font-family:Verdana;
		align:center;
		color:lightblue;
	}
	 h3{
	text-align:left;
	color:lightblue;
	font-family:Verdana;
  }
	
	
	#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: lightblue;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}
#myBtn:hover {
  background-color: #555;
}


	
	
	</style>
  
</head>

<body style="height:1500px">



<nav class="navbar navbar-inverse  navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" title="nume">Inversa unei matrice</a>
    </div>
    <ul class="nav navbar-nav">
	  <li ><a title="proiect" href='index.html'>	Acasă	</a></li>
	  <li><a title="aplicatii" href='info.html'>	Teorie	</a></li>
	  
      <li class="active"><a title="cod" href='paginacod.php'>		Aplicație 	</a></li>
      <li><a title="sugestii" href='descriere.html'>	Descriere	</a></li>
      <li><a title="sugestii" href='paginasugestii.html'>	Alte idei/sugestii</a></li>
      <li><a title="autor" href='paginaautor.html'>	Despre autor	</a></li>
	  <li><a title="bibliografie" href='paginabibliografie.html'>	Bibliografie	</a></li>
    </ul>
  </div>
</nav>


<div  id="pozameniu">
<br><br><br><br><br>

  <h1 style="font-size:50px; text-align: center; color: white; font-family:fantasy;">INVERSAREA UNEI MATRICE</h1>
	
<br><br><br><br><br><br>
</div>
  
  <div class="row">
  <div class="container"  style="margin-top:50px">
  <H3>Calculul matricei inverse</h3>
	<p> 
	Pentru a introduce matricea, aceasta se va scrie prin separarea coloanelor cu ajutorul <code>,</code> iar liniile cu ajutorul <code>;</code><br>
	</p>
	<p style="text-decoration:underline"><br> Dimensiunea maxima este 9x9	</p><br>Exemplu:<br>
	<p>Pentru o matrice de forma:  <img src="img/1.jpg">  Elementele 3 0 1 0 2 0 0 0 1, se vor trece in formular astfel:<br> 3,0,1;<br>0,2,0;<br>0,0,1;<br></p>
<br><br>
	</p>
	<p>
	<form action="paginacod.php" method="post">
	<textarea name="text" rows="10" cols="30">Introdu aici datele</textarea><br>
	<input type="submit" name="buton" value="submit">
	</form>
	<?php
		function transpusa(&$A,$n)
		{
			$B = array( array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0));
			for($i=1;$i<=$n;$i++)
				for($j=1;$j<=$n;$j++)
					$B[$i][$j]=$A[$j][$i];
			$A=$B;
			
		}
		
		function afisare($A,$n)
		{
			for($i=1;$i<=$n;$i++)
			{
				for($j=1;$j<=$n;$j++)
					echo $A[$i][$j], "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; //pt spatii sa afiseze frumos
				echo "<br>";
			}
		}
		
		function determinant($A,$n)
		{
			$B = array( array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0));
			$B=$A;
			$max=0;
			$semn=0;
			
			for($i=1;$i<=$n-1;$i++)
			{
				//caut maximul
				$indi=$indj=0;
				$max= -1000000000;
				for($m=$i;$m<=$n;$m++)
					for($k=$i;$k<=$n;$k++)
					{
						if($B[$m][$k]>$max && $B[$m][$k] != 0)
						{
							$max=$B[$m][$k];
							$indi=$m;//linie
							$indj=$k;//coloana
						}
					
					}
				if($indi != $i) $semn++;
				if($indj != $i) $semn++;
				for($m=$i;$m<=$n;$m++) //mut orizontal liniile 
				{
					$aux=$B[$i][$m];
					$B[$i][$m]=$B[$indi][$m];
					$B[$indi][$m]=$aux;
					
				}
				for($m=$i;$m<=$n;$m++) //mut vertical coloanele
				{
					$aux=$B[$m][$i];
					$B[$m][$i]=$B[$m][$indj];
					$B[$m][$indj]=$aux;
				}
					
					
				for($j=$i+1;$j<=$n;$j++)
					if($B[$j][$i] != 0)
				{
					$alfa= (-$B[$j][$i]/$B[$i][$i]);

					for($k=$i;$k<=$n;$k++)
						$B[$j][$k]=$B[$j][$k]+$alfa*$B[$i][$k];
					
				}

			}
			$P=1;
			for($i=1;$i<=$n;$i++)
				$P=$P*$B[$i][$i];
			if( $semn % 2 ) $P = -$P;
			return $P;
		}
		
		function minor($A,$n,$i,$j)
		{
			$B = array( array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0));
			$B=$A;
			$det=0;
			for($f=1;$f<=$n;$f++) //elimin  linia i
				for($k=$i+1;$k<=$n;$k++)
					$B[$k-1][$f]=$B[$k][$f];
			for($f=1;$f<$n;$f++) //elimin coloana j
				for($k=$j+1;$k<=$n;$k++)
					$B[$f][$k-1]=$B[$f][$k];
			$n--;

			if(($i+$j)%2==0) $det=determinant($B,$n);
			else $det=-determinant($B,$n);
			
			return $det;
		}
		
		 function adjuncta($A,$n)
		 {
			 	$Adj = array( array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0));
			for($i=1;$i<=$n;$i++)
			{
				for($j=1;$j<=$n;$j++)
					$Adj[$i][$j] = minor($A, $n, $i, $j);
			}
			return $Adj;
			 
		 }
		 
		 function inmultire($A,$n,$k)
		 {
			 
			 $B = array( array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0));
			for($i=1;$i<=$n;$i++)
				for($j=1;$j<=$n;$j++)
					$B[$i][$j]=$A[$i][$j]*$k;
			return $B;
			
			
			 
		 }
		 
		 function inversa($A,$n)
		 {
			 $B = array( array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0));
			$inv = array( array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0));
			$k=1/determinant($A,$n);
			 transpusa($A,$n);
			 $B=adjuncta($A,$n);
			 $inv=inmultire($B,$n,$k);
			 return $inv;
			 
		 }
		
		if(isset($_POST['buton']))
		{
			$text=$_POST['text'];
			$A = array( array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0), array(0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0), 
						array(0,0,0,0,0,0,0,0,0,0));
			
			
			$V1=explode(';',$text);
			$n=count($V1)-1;
			for($i=0;$i<count($V1)-1;$i++)
			{	
				$V2=explode(',',$V1[$i]);
				for($j=0;$j<count($V2);$j++)
					$A[$i+1][$j+1]=$V2[$j];	
			}
			 //calculul efectiv al inversei unui numar:
			 
			 
			echo "<br>Determinantul este: ".determinant($A,$n). "<br>";
			afisare(inversa($A,$n),$n);
		
			//afisare($Adj, $n);
			
			
			
		}
	?>
	
  
  </div>
</div> 
  <br>
  <br>
  <div class="row">
  <div class="col-lg-12" style="background-color:black;">
  
  <h5 style="font-size:10px; text-align: center; color: white; ">Acest proiect a fost realizat sub îndrumarea profesorului Alin Burța-C.N. ,,B.P. Hasdeu"</h5>
  
  </div>
</div> 
  



<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>





</body>
</html>
