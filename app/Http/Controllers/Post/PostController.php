<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('destak', 'desc')->orderBy('status', 'desc')->orderBy('id', 'desc')->latest()->paginate(10);
        return view('posts.listar', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.criar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validando inputs
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'title' => 'required',
            'cover' => 'required',
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('success', 'O campo de conteúdo não pode ficar vazio.');
        }

        //inserindo no banco pegando o id
        $postId = Post::insertGetId([
            'type' => $request->type,
            'title' => $request->title,
            'cover' => $request->cover,
            'content' => $request->content,
            'slug' => time(),
            'brief' => $request->title,
        ]);

        //fazendo slug com o id e salvando
        $slug = Str::of($request->title . ' ' . $postId)->slug('-');

        $post = Post::findOrFail($postId);

        //tratando nome da imagem de capa
        $imageName = $slug . '.' . $request->cover->extension();

        //salvando imagem de capa no public path 
        $request->cover->storeAs('public/imagens/noticias/capas', $imageName);

        //inserindo slug e imagens
        $post->update([
            'slug' => $slug,
            'cover' => $imageName,
        ]);

        return redirect('admin/post/editar/' . $postId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);


        //dd($post->posted_at);


        if (empty($post->posted_at)) {
            //datatime 
            $today = Carbon::now()->toRfc3339String();
            $today = Str::limit($today, 16, '');
            $post->posted_at = $today;
        } else {
            $dt = $post->posted_at;
            $dt = Carbon::createFromFormat('Y-m-d H:i:s', $dt)->toRfc3339String();
            $dt = Str::limit($dt, 16, '');
            $post->posted_at = $dt;
        }


        return view('posts.editar', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validando inputs
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'title' => 'required',
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('success', 'O campo de conteúdo não pode ficar vazio.');
        }

        //atualizando slug
        $slug = $request->title . ' ' . $id;
        $slug = Str::of($slug)->slug('-');


        //verificando se a image da capa houve alteração
        if (empty($request->new_cover)) {
            $cover = $request->old_cover;
        } else {
            $cover = $request->new_cover;

            //tratando nome da imagem de capa
            $cover = $slug . '.' . $request->new_cover->extension();

            //salvando imagem de capa no public path 
            $request->new_cover->storeAs('public/imagens/noticias/capas', $cover);
        }

        //verificado datetime do posted_at
        $request->posted_at = Str::replace('T', ' ', $request->posted_at) . ':00';
        //$request->posted_at->strtotime($request->posted_at);
        //dd($request->posted_at);



        $post = Post::findOrFail($id);

        $post->update([
            'type' => $request->type,
            'title' => $request->title,
            'cover' => $cover,
            'content' => $request->content,
            'slug' => $slug,
            'brief' => $request->title,
            'posted_at' => $request->posted_at,
        ]);

        return redirect()->back()->with('success', 'Notícia alterada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts')->with('success', 'Notícia excluída com sucesso.');
    }


    /**
     * Change the status of the post
     *
     */

    public function changeStatus(Request $request)
    {
        $post = Post::findOrFail($request->status);

        $post->status = !$post->status;

        $post->update();

        return redirect()->back();
    }

    /**
     * Change the destak of the post
     *
     */

    public function changeDestak(Request $request)
    {
        $post = Post::findOrFail($request->destak);

        $post->destak = !$post->destak;

        $post->update();

        return redirect()->back();
    }

    /**
     * save img inside post content
     * 
     */

    public function imgUpload(Request $request)
    {

        $file = $request->file('file');
        $path = url('storage/imagens/noticias/content') . '/' . $file->getClientOriginalName();
        $imgpath = $file->storeAs('public/imagens/noticias/content', $file->getClientOriginalName());
        $fileNameToStore = $path;
        return json_encode(['location' => $fileNameToStore]);
    }
}
