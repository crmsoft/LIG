@extends('layout.main')

@section('content')
	<div class="row middle">
			<div class="col-sm-6">
				<table class='table all-teams'>
					@for( $i = 0; $i < $count; $i++ )
						<tr>

							<td><img src="media/img/teams-logo/{{$teams[$i]->logo}}"></td>
							<td id="selectable{{ $teams[$i]->id }}">{{$teams[$i]->name}}</td>

							<td><img src="media/img/teams-logo/{{$teams[++$i]->logo}}"></td>
							<td id="selectable{{ $teams[$i]->id }}">{{$teams[$i]->name}}</td>

						</tr>
					@endfor
					@if( $odd )
						<tr>

							<td><img src="media/img/teams-logo/{{$teams[$i]->logo}}"></td>
							<td>{{$teams[$i]->name}}</td>

						</tr>
					@endif
				</table>
			</div>
			<div class="col-sm-6">
				<div class="selected">
					<div class="team0">
						<div class="removeFav">
							&times;
						</div>
						<img src="media/img/q.png" id="-1">
					</div>
					<div class="team1">
						<div class="removeFav">
							&times;
						</div>
						<img src="media/img/q.png" id="-1">
					</div>
					<div class="team2">
						<div class="removeFav">
							&times;
						</div>
						<img src="media/img/q.png" id="-1">
					</div>
					<div class="team3">
						<div class="removeFav">
							&times;
						</div>
						<img src="media/img/q.png" id="-1">
					</div>
				</div>
			</div>
	</div>
@stop