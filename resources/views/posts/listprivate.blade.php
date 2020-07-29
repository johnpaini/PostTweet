@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
     <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                <div class="panel-heading">Seus Posts</div>

                <div class="panel-body">
                  <div class="panel panel-default">
  					<!-- Default panel contents -->
 					 <div class="panel-heading">Lista de Posts Privados</div>
  						
  						<!-- Table -->
  						<table class="table">
    				
    						<th>
    							<td>Data</td>	
    						</th>
    						<th>
    							<td>Post</td>	
    						</th>
    						<th>
    							<td>User</td>	
    						</th>
                            <th>
                            <td></td>
                            </th>
                            
                            <th>
                            <td></td>
                            </th>
                            
    						<tbody>

    							@foreach($posts as $post)
    							<tr>
    							<td></td>
    							<td>{{$post->data}}</td>
    							<td></td>
    							<td>{{$post->descricao}}</td>
    							<td></td>
    							<td>{{$post->user_id}}</td>
                                <td></td>
                                    <td>
                                    <form action="{{ URL::to('posts/delete') }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE" >    
                                    <input type="hidden" name="id" value=  "{{$post->post_id}}" >
                                    <input type="hidden"  name="_token" value="{{csrf_token()}}">

                                    <button type="submit" class="btn btn-danger" >
                                        <i class="glyphicon glyphicon-retweet"></i>Deletar
                                    </button>

                                    </form>
                                    </td>


                                    
                                    
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


