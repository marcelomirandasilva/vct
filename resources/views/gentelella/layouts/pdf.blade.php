<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>@section('title') @show</title>
		<link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
 
	</head>
  	<body>
	 	<div id= "app"> </div>
  	<!-- Conteúdo -->
  	
		@yield('conteudo')  
		
		<button type="button" class="print btn btn-app">
			<span class="glyphicon glyphicon-print" aria-hidden="true"></span>
			<span >Imprimir</span>
		</button>
  </body>
  <script src="{{ asset('/js/app.js')}}"></script>
  <script src="{{ asset('/js/components.js')}}"></script>
  <script type="text/javascript">
		var bottom = 0; /* Position of first page number - 0 for bottom of first page */
		var pagNum = 2; /* First sequence - Second number */
		$(document).ready(function() {
			/* For each 10 paragraphs, this function: clones the h3 with a new page number */
		
			$("tr:nth-child(60n)").each(function() {
				bottom -= 118;
				botString = bottom.toString();
				var $counter = $('h3.pag1').clone().removeClass('pag1');
				$counter.css("bottom", botString + "vh");
				numString = pagNum.toString();
				$counter.addClass("pag" + numString);
				($counter).insertBefore('.insert');
				pagNum = parseInt(numString);
				pagNum++; /* Next number */
			});
		
			var pagTotal = $('.pag').length; /* Gets the total amount of pages by total classes of paragraphs */
			pagTotalString = pagTotal.toString();
		
			$("h3[class^=pag]").each(function() {
				/* Gets the numbers of each classes and pages */
				var numId = this.className.match(/\d+/)[0];
				document.styleSheets[0].addRule('h3.pag' + numId + '::before', 'content: " ' + numId + ' de ' + pagTotalString + '";');
			});
		});

		$('.print').on('click', function() {
			window.print();
			return false;
		});
  </script>
</html>