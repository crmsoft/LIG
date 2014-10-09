@extends('layout.main')

@section('content')
	<div class='row middle'>

					<table class='table final-table'>
						<THEAD>
							<tr>
								<td><h4>Birinci Yarı</h4></td>
								<td colspan='5' class='txt-center'>
									{{$huge[0][6][0]}} {{$huge[0][6][2]}} : {{$huge[0][6][3]}} {{$huge[0][6][5]}}
										<br />
									{{$huge[0][7][0]}} {{$huge[0][7][2]}} : {{$huge[0][7][3]}} {{$huge[0][7][5]}}
								</td>
								<td></td>
								<td colspan='5' class='txt-center'>
									{{$huge[1][6][0]}} {{$huge[1][6][2]}} : {{$huge[1][6][3]}} {{$huge[1][6][5]}}
										<br />
									{{$huge[1][7][0]}} {{$huge[1][7][2]}} : {{$huge[1][7][3]}} {{$huge[1][7][5]}}
								</td>
								<td></td>
								<td colspan='5' class='txt-center'>
									{{$huge[2][6][0]}} {{$huge[2][6][2]}} : {{$huge[2][6][3]}} {{$huge[2][6][5]}}
										<br />
									{{$huge[2][7][0]}} {{$huge[2][7][2]}} : {{$huge[2][7][3]}} {{$huge[2][7][5]}}
								</td>
							</tr>
							<tr>
								<td>
									<h6>Takımlar [ hafta 1 ]</h6>
								</td>
								<td><h6>P</h6></td>
								<td><h6>G</h6></td>
								<td><h6>B</h6></td>
								<td><h6>M</h6></td>
								<td><h6>AV</h6></td>
								<td>
									<h6>Takımlar [ hafta 2 ]</h6>
								</td>
								<td><h6>P</h6></td>
								<td><h6>G</h6></td>
								<td><h6>B</h6></td>
								<td><h6>M</h6></td>
								<td><h6>AV</h6></td>
								<td>
									<h6>Takımlar [ hafta 3 ]</h6>
								</td>
								<td><h6>P</h6></td>
								<td><h6>G</h6></td>
								<td><h6>B</h6></td>
								<td><h6>M</h6></td>
								<td><h6>AV</h6></td>
							</tr>
						</THEAD>
					 	<TBODY>
							<tr>
								<td>
									{{$huge[0][8][0]}}
								</td>
								<td>{{$huge[0][0][0]}}</td>
								<td>{{$huge[0][2][0]}}</td>
								<td>{{$huge[0][3][0]}}</td>
								<td>{{$huge[0][4][0]}}</td>
								<td>{{$huge[0][5][0]}}</td>
								<td>
									{{$huge[1][8][0]}}
								</td>
								<td>{{$huge[1][0][0]}}</td>
								<td>{{$huge[1][2][0]}}</td>
								<td>{{$huge[1][3][0]}}</td>
								<td>{{$huge[1][4][0]}}</td>
								<td>{{$huge[1][5][0]}}</td>
								<td>
									{{$huge[2][8][0]}}
								</td>
								<td>{{$huge[2][0][0]}}</td>
								<td>{{$huge[2][2][0]}}</td>
								<td>{{$huge[2][3][0]}}</td>
								<td>{{$huge[2][4][0]}}</td>
								<td>{{$huge[2][5][0]}}</td>
							</tr>
							<tr>
								<td>
									{{$huge[0][8][1]}}
								</td>
								<td>{{$huge[0][0][1]}}</td>
								<td>{{$huge[0][2][1]}}</td>
								<td>{{$huge[0][3][1]}}</td>
								<td>{{$huge[0][4][1]}}</td>
								<td>{{$huge[0][5][1]}}</td>
								<td>
									{{$huge[1][8][1]}}
								</td>
								<td>{{$huge[1][0][1]}}</td>
								<td>{{$huge[1][2][1]}}</td>
								<td>{{$huge[1][3][1]}}</td>
								<td>{{$huge[1][4][1]}}</td>
								<td>{{$huge[1][5][1]}}</td>
								<td>
									{{$huge[2][8][1]}}
								</td>
								<td>{{$huge[2][0][1]}}</td>
								<td>{{$huge[2][2][1]}}</td>
								<td>{{$huge[2][3][1]}}</td>
								<td>{{$huge[2][4][1]}}</td>
								<td>{{$huge[2][5][1]}}</td>
							</tr>
							<tr>
								<td>
									{{$huge[0][8][2]}}
								</td>
								<td>{{$huge[0][0][2]}}</td>
								<td>{{$huge[0][2][2]}}</td>
								<td>{{$huge[0][3][2]}}</td>
								<td>{{$huge[0][4][2]}}</td>
								<td>{{$huge[0][5][2]}}</td>
								<td>
									{{$huge[1][8][2]}}
								</td>
								<td>{{$huge[1][0][2]}}</td>
								<td>{{$huge[1][2][2]}}</td>
								<td>{{$huge[1][3][2]}}</td>
								<td>{{$huge[1][4][2]}}</td>
								<td>{{$huge[1][5][2]}}</td>
								<td>
									{{$huge[2][8][2]}}
								</td>
								<td>{{$huge[2][0][2]}}</td>
								<td>{{$huge[2][2][2]}}</td>
								<td>{{$huge[2][3][2]}}</td>
								<td>{{$huge[2][4][2]}}</td>
								<td>{{$huge[2][5][2]}}</td>
							</tr>
							<tr>
								<td>
									{{$huge[0][8][3]}}
								</td>
								<td>{{$huge[0][0][3]}}</td>
								<td>{{$huge[0][2][3]}}</td>
								<td>{{$huge[0][3][3]}}</td>
								<td>{{$huge[0][4][3]}}</td>
								<td>{{$huge[0][5][3]}}</td>
								<td>
									{{$huge[1][8][3]}}
								</td>
								<td>{{$huge[1][0][3]}}</td>
								<td>{{$huge[1][2][3]}}</td>
								<td>{{$huge[1][3][3]}}</td>
								<td>{{$huge[1][4][3]}}</td>
								<td>{{$huge[1][5][3]}}</td>
								<td>
									{{$huge[2][8][3]}}
								</td>
								<td>{{$huge[2][0][3]}}</td>
								<td>{{$huge[2][2][3]}}</td>
								<td>{{$huge[2][3][3]}}</td>
								<td>{{$huge[2][4][3]}}</td>
								<td>{{$huge[2][5][3]}}</td>
							</tr>
						 </TBODY>
					</table>
					<!-- birinci yari bitti 
					     ikinci yari basliyor -->
					<table class='table final-table'>
						<THEAD>
							<tr>
								<td><h4>İkinci Yarı</h4></td>
								<td colspan='5' class='txt-center'>
									{{$huge[3][6][0]}} {{$huge[3][6][2]}} : {{$huge[3][6][3]}} {{$huge[3][6][5]}}
										<br />
									{{$huge[3][7][0]}} {{$huge[3][7][2]}} : {{$huge[3][7][3]}} {{$huge[3][7][5]}}
								</td>
								<td></td>
								<td colspan='5' class='txt-center'>
									{{$huge[4][6][0]}} {{$huge[0][6][2]}} : {{$huge[4][6][3]}} {{$huge[4][6][5]}}
										<br />
									{{$huge[4][7][0]}} {{$huge[0][7][2]}} : {{$huge[4][7][3]}} {{$huge[4][7][5]}}
								</td>
								<td></td>
								<td colspan='5' class='txt-center'>
									{{$huge[5][6][0]}} {{$huge[5][6][2]}} : {{$huge[5][6][3]}} {{$huge[5][6][5]}}
										<br />
									{{$huge[5][7][0]}} {{$huge[5][7][2]}} : {{$huge[5][7][3]}} {{$huge[5][7][5]}}
								</td>
							</tr>
							<tr>
								<td>
									<h6>Takımlar [ hafta 4 ]</h6>
								</td>
								<td><h6>P</h6></td>
								<td><h6>G</h6></td>
								<td><h6>B</h6></td>
								<td><h6>M</h6></td>
								<td><h6>AV</h6></td>
								<td><h6>Takımlar [ hafta 5 ]</h6></td>
								<td><h6>P</h6></td>
								<td><h6>G</h6></td>
								<td><h6>B</h6></td>
								<td><h6>M</h6></td>
								<td><h6>AV</h6></td>
								<td><h6>Takımlar [ hafta 6 ]</h6></td>
								<td><h6>P</h6></td>
								<td><h6>G</h6></td>
								<td><h6>B</h6></td>
								<td><h6>M</h6></td>
								<td><h6>AV</h6></td>
							</tr>
						</THEAD>
					 	<TBODY>
							<tr>
								<td>
									{{$huge[3][8][0]}}
								</td>
								<td>{{$huge[3][0][0]}}</td>
								<td>{{$huge[3][2][0]}}</td>
								<td>{{$huge[3][3][0]}}</td>
								<td>{{$huge[3][4][0]}}</td>
								<td>{{$huge[3][5][0]}}</td>
								<td>
									{{$huge[4][8][0]}}
								</td>
								<td>{{$huge[4][0][0]}}</td>
								<td>{{$huge[4][2][0]}}</td>
								<td>{{$huge[4][3][0]}}</td>
								<td>{{$huge[4][4][0]}}</td>
								<td>{{$huge[4][5][0]}}</td>
								<td>
									{{$huge[5][8][0]}}
								</td>
								<td>{{$huge[5][0][0]}}</td>
								<td>{{$huge[5][2][0]}}</td>
								<td>{{$huge[5][3][0]}}</td>
								<td>{{$huge[5][4][0]}}</td>
								<td>{{$huge[5][5][0]}}</td>
							</tr>
							<tr>
								<td>
									{{$huge[3][8][1]}}
								</td>
								<td>{{$huge[3][0][1]}}</td>
								<td>{{$huge[3][2][1]}}</td>
								<td>{{$huge[3][3][1]}}</td>
								<td>{{$huge[3][4][1]}}</td>
								<td>{{$huge[3][5][1]}}</td>
								<td>
									{{$huge[4][8][1]}}
								</td>
								<td>{{$huge[4][0][1]}}</td>
								<td>{{$huge[4][2][1]}}</td>
								<td>{{$huge[4][3][1]}}</td>
								<td>{{$huge[4][4][1]}}</td>
								<td>{{$huge[4][5][1]}}</td>
								<td>
									{{$huge[5][8][1]}}
								</td>
								<td>{{$huge[5][0][1]}}</td>
								<td>{{$huge[5][2][1]}}</td>
								<td>{{$huge[5][3][1]}}</td>
								<td>{{$huge[5][4][1]}}</td>
								<td>{{$huge[5][5][1]}}</td>
							</tr>
							<tr>
								<td>
									{{$huge[3][8][2]}}
								</td>
								<td>{{$huge[3][0][2]}}</td>
								<td>{{$huge[3][2][2]}}</td>
								<td>{{$huge[3][3][2]}}</td>
								<td>{{$huge[3][4][2]}}</td>
								<td>{{$huge[3][5][2]}}</td>
								<td>
									{{$huge[4][8][2]}}
								</td>
								<td>{{$huge[4][0][2]}}</td>
								<td>{{$huge[4][2][2]}}</td>
								<td>{{$huge[4][3][2]}}</td>
								<td>{{$huge[4][4][2]}}</td>
								<td>{{$huge[4][5][2]}}</td>
								<td>
									{{$huge[5][8][2]}}
								</td>
								<td>{{$huge[5][0][2]}}</td>
								<td>{{$huge[5][2][2]}}</td>
								<td>{{$huge[5][3][2]}}</td>
								<td>{{$huge[5][4][2]}}</td>
								<td>{{$huge[5][5][2]}}</td>
							</tr>
							<tr>
								<td>
									{{$huge[3][8][3]}}
								</td>
								<td>{{$huge[3][0][3]}}</td>
								<td>{{$huge[3][2][3]}}</td>
								<td>{{$huge[3][3][3]}}</td>
								<td>{{$huge[3][4][3]}}</td>
								<td>{{$huge[3][5][3]}}</td>
								<td>
									{{$huge[4][8][3]}}
								</td>
								<td>{{$huge[4][0][3]}}</td>
								<td>{{$huge[4][2][3]}}</td>
								<td>{{$huge[4][3][3]}}</td>
								<td>{{$huge[4][4][3]}}</td>
								<td>{{$huge[4][5][3]}}</td>
								<td>
									{{$huge[5][8][3]}}
								</td>
								<td>{{$huge[5][0][3]}}</td>
								<td>{{$huge[5][2][3]}}</td>
								<td>{{$huge[5][3][3]}}</td>
								<td>{{$huge[5][4][3]}}</td>
								<td>{{$huge[5][5][3]}}</td>
							</tr>
						 </TBODY>
					</table>


			</div>
	</div>
@stop