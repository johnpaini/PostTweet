<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Models\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function  getPosts(){
        $posts = post::orderBy('data', 'DESC')->get();   
        return view('posts.list', ['posts'=> $posts] );


    }

    public function getPostPrivate(){

        if (Auth::check()){ 
            $usuario_id = Auth::user()->id;

        }
        $posts=  DB::table('post')->where('user_id',$usuario_id )->get();
        return view('posts.listprivate',['posts'=> $posts] );
    }

    public function getPostPublic(){
        if (Auth::check()){ 
            $usuario_id = Auth::user()->id;

        }
        $posts=  DB::table('post')->where('user_id','!=', $usuario_id )->get();
        return view('posts.listpublic',['posts'=> $posts] );
    }

    //verificar se ta certo
    public function deletePost(Request $post){
        if (Auth::check()){ 
            $usuario_id = Auth::user()->id;

        }
        
        
        $posta = post::find($post['id']);
       
        if($usuario_id ==  $posta['user_id']){
            $posta->delete();
            return redirect('/posts')->with('status', 'Post Apagado com sucesso!');
        }
        return redirect('/posts')->with('status', 'Impossivel Apagar Post, ele e de outro usuario!');

    }

     public function Repost(Request $post){
       
        $repost= post::find($post['id']);//pegar a descricao do posto original
        if (Auth::check()){ 
            $usuario_id = Auth::user()->id;
            
             $postCreated = post::create([
                'descricao' => $repost['descricao'], 
                'data' =>(Carbon::now()) , 
                    'user_id' => $usuario_id]);
            return redirect('/posts')->with('status', 'Repost compartilhado!');


        }
         return redirect('/posts')->with('status', 'Repost nao compartilhado!');
    }
    public function postCreate(Request $post){
        $this->validate($post, [ 
            'descricao' =>['required',
            'max:140']

        ]);

        if (Auth::check()){ 
            $usuario_id = Auth::user()->id;
             $postCreated = post::create([
                'descricao' => $post['descricao'], 
                'data' =>(Carbon::now()) , 
                    'user_id' => $usuario_id]);
            return redirect('/posts')->with('status', 'Post Cadastrado!');


        }
         return redirect('/posts')->with('status', 'Post Nao cadastrado!');
       

       
    }




}
