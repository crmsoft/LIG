@extends('layout.main')

@section('content')
	<div class='row middle'>
			<div class='col-sm-2'>

			</div>
			<div class='col-sm-8'>

					<table class='table state-by-week'>
						<THEAD>
							<tr>
								<td><h3>T</h3></td>
								<td colspan='7'>
									<h3>Puan Durumu</h3>
								</td>
								<td colspan='3'>
									<h3>Maç Sonuçları</h3>
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
									<h6>Takımlar</h6>
								</td>
								<td><h6>P</h6></td>
								<td><h6>O</h6></td>
								<td><h6>G</h6></td>
								<td><h6>B</h6></td>
								<td><h6>M</h6></td>
								<td><h6>AV</h6></td>
								<td colspan='5' class='txt-center'>
									<h6>STS {{$week}}.Hafta Maç Sonuçları</h6>
								</td>
							</tr>
						</THEAD>
					 	<TBODY>
							<tr>
								<td>{{$results[9][0]}}</td>
								<td>
									{{$results[8][0]}}
								</td>
								<td>{{$results[0][0]}}</td>
								<td>{{$results[1][0]}}</td>
								<td>{{$results[2][0]}}</td>
								<td>{{$results[3][0]}}</td>
								<td>{{$results[4][0]}}</td>
								<td>{{$results[5][0]}}</td>
								<td colspan='5' class='txt-center'></td>
							</tr>
							<tr>
								<td>{{$results[9][1]}}</td>
								<td>
									{{$results[8][1]}}
								</td>
								<td>{{$results[0][1]}}</td>
								<td>{{$results[1][1]}}</td>
								<td>{{$results[2][1]}}</td>
								<td>{{$results[3][1]}}</td>
								<td>{{$results[4][1]}}</td>
								<td>{{$results[5][1]}}</td>
								<td class='txt-center spec-width'>{{$results[6][0]}}</td>
								<td class='txt-center score' id='{{$results[6][1]}}' {{$editable}}>
									{{$results[6][2]}}
								</td>
								<td class='txt-center'>:</td>
								<td class='txt-center score' id='{{$results[6][4]}}' {{$editable}}>
									{{$results[6][3]}}
								</td>
								<td class='txt-center spec-width'>{{$results[6][5]}}</td>
							</tr>
							<tr>
								<td>{{$results[9][2]}}</td>
								<td>
									{{$results[8][2]}}
								</td>
								<td>{{$results[0][2]}}</td>
								<td>{{$results[1][2]}}</td>
								<td>{{$results[2][2]}}</td>
								<td>{{$results[3][2]}}</td>
								<td>{{$results[4][2]}}</td>
								<td>{{$results[5][2]}}</td>
								<td class='txt-center spec-width'>{{$results[7][0]}}</td>
								<td class='txt-center score' id='{{$results[7][1]}}' {{$editable}}>
									{{$results[7][2]}}
								</td>
								<td class='txt-center'>:</td>
								<td class='txt-center score' id='{{$results[7][4]}}' {{$editable}}>
									{{$results[7][3]}}
								</td>
								<td class='txt-center spec-width'>{{$results[7][5]}}</td>
							</tr>
							<tr>
								<td>{{$results[9][3]}}</td>
								<td>
									{{$results[8][3]}}
								</td>
								<td>{{$results[0][3]}}</td>
								<td>{{$results[1][3]}}</td>
								<td>{{$results[2][3]}}</td>
								<td>{{$results[3][3]}}</td>
								<td>{{$results[4][3]}}</td>
								<td>{{$results[5][3]}}</td>
								<td colspan='5' class='txt-center'></td>
							</tr>
							<tr>
								<td></td>
								<td colspan='12'>
									@if( $hafta == 'hafta-1' )
										<a href='{{ URL::route('play-given') }}/{{$hafta}}' class='btn btn-success pull-right'>Sezonu Başlat</a>
									@elseif( $hafta == 'hafta-7' )
										<a href='{{ URL::route('show-end') }}' class='btn btn-success pull-right'>Tüm Oyunları Görüntüle</a>
									@else
									<a href='{{ URL::route('play-given') }}/{{$hafta}}' class='btn btn-success pull-right'>Sonraki Hafta</a>
									@endif
								</td>
							</tr>
						 </TBODY>
					</table>

			</div>
			<div class='col-sm-2'>
				<a href='{{ URL::route('show-end') }}' class="btn btn-info">Tüm Ligi Oynat</a>
			</div>
	</div>
@stop