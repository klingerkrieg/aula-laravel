<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
        
    public function list(Request $request){
        $pagination = Post::orderBy("subject");

        if (isset($request->busca) && $request->busca != "") {
            $pagination->orWhere("subject","like","%$request->busca%");
            $pagination->orWhere("text","like","%$request->busca%");
        }

        if (isset($request->subject) && $request->subject != "")
            $pagination->where("subject","like","%$request->subject%");

        if (isset($request->text) && $request->text != "")
            $pagination->where("text","like","%$request->text%");

        if (isset($request->publish_date) && $request->publish_date != "")
            $pagination->whereDate("publish_date",$request->publish_date);

        #$pagination->dd();
        #$pagination->dump();
        return view("admin.posts.index", ["list"=>$pagination->paginate(3)]);
    }

    public function create(){
        return view("admin.posts.form", ["data"=>new Post()] );
    }

    public function store(PostRequest $request){
        $validated = $request->validated();

        $path = $request->file('image')->store('posts',"public");

        $data = $request->all();
        $data["image"] = $path;
        $data["user_id"] = Auth::user()->id;

        $post = Post::create($data);
        return redirect(route("post.edit", $post))->with("success",__("Data saved!"));
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect(route("post.list"))->with("success",__("Data deleted!"));
    }


    #abre o formulario de edição
    public function edit(Post $post){
        return view("admin.posts.form",["data"=>$post]);
    }

    #salva as edições
    public function update(Post $post, PostRequest $request) {
        $validated = $request->validated();

        $data = $request->all();
        #necessário, pois não é obrigatório atualizar a imagem
        if ($request->file('image') != null){
            $path = $request->file('image')->store('posts',"public");
            $data["image"] = $path;
        }

        $post->update($data);
        return redirect()->back()->with("success",__("Data updated!"));
    }

    

}
