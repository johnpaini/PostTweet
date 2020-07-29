@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
     <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/posts/postCreate') }}">
                        <div class="form-group">
                            <input type="hidden"  name="_token" value="{{csrf_token()}}">
                            <input type="text" name="descricao" class="form-control" placeholder="O que voce esta pensando?">

                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="glyphicon glyphicon-comment"></i> Postar
                                </button>
                            </div>
                        </div>
                    </form>
                    @if (count($errors) > 0)
                     <div class="alert alert-danger">
                          <ul>
                             @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                             @endforeach
                        </ul>
                        </div>
                    @endif
                    
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                 
        
                <div class="panel-heading">Posts Do Momento</div>

                <div class="panel-body">
                  <div class="panel panel-default">
  					<!-- Default panel contents -->
 					 <div class="panel-heading">Lista de Posts</div>
  						
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
    							<td><input type="hidden" name="id" value=  "{{$post->id}}"  ></td>
    							<td>{{$post->data}}</td>
    							<td></td>
    							<td>{{$post->descricao}}</td>
    							<td></td>
    							<td>{{$post->user_id}}</td>
                                <td></td>
                           
                                    <td>
                                    <form action="{{ URL::to('posts/repost') }}" method="POST">
                                    <input type="hidden" name="_method" value="Post" >    
                                   <input type="hidden" name="id" value=  "{{$post->post_id}}" >
                                    <input type="hidden"  name="_token" value="{{csrf_token()}}">

                                    <button type="submit" class="btn btn-primary">
                                            <i class="glyphicon glyphicon-retweet"></i>Repostar</button></td>
                                    </form>
                                    </td>
                                   
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


