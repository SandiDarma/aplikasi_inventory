<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
			<title>Generate Laporan</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<style>
			body{
				font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
				color:#333;
				text-align:left;
				font-size:18px;
				margin:0;
			}

			.container{
				margin:0 auto;
				margin-top:35px;
				padding:40px;
				width:750px;
				height:auto;
				background-color:#fff;
			}
			
			caption{
				font-size:28px;
				margin-bottom:15px;
			}

			table{
				border:1px solid #333;
				border-collapse:collapse;
				margin:0 auto;
				width:740px;
			}		
			
			td, tr, th{
				padding:12px;
				border:1px solid #333;
				width:185px;
			}
			
			th{
				background-color: #f0f0f0;
			}
			
			h4, p{
				margin:0px;
			}
		</style>
	</head>
	
	<body>
		<div class="container">
			<table>
				<caption>Inventaris Invoice App</caption>
				<thead>					
					<tr>
						<td colspan="2">
							<h4>Perusahaan: Inventaris GGC</h4>
							<p>Dhenkweb.<br>
							support@dhenkweb.id
							</p>
						</td>						
					</tr>			
				</thead>			
				@yield('content')
			</table>
		</div>
	</body>
</html>