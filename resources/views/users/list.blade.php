@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <div class="panel panel-default">
  					<!-- Default panel contents -->
 					 <div class="panel-heading">Lista de Usuarios</div>
  						<div class="panel-body">
    						
  						</div>

  						<!-- Table -->
  						<table class="table">
    				
    						<th>
    							<td>ID</td>	
    						</th>
    						<th>
    							<td>Name</td>	
    						</th>
    						<th>
    							<td>Email</td>	
    						</th>
    						<tbody>

    							@foreach($users as $user)
    							<tr>
    							<td></td>
    							<td>{{$user->id}}</td>
    							<td></td>
    							<td>{{$user->name}}</td>
    							<td></td>
    							<td>{{$user->email}}</td>
    							</tr>
    							@endforeach
    						</tbody>
  						</table>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


