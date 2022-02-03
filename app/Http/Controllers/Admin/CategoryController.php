<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
        
    public function list(Request $request){
        $pagination = Category::orderBy("name");

        if (isset($request->busca) && $request->busca != "") {
            $pagination->orWhere("name","like","%$request->busca%");
        }

        #$pagination->dd();
        #$pagination->dump();
        return view("admin.category.index", ["list"=>$pagination->paginate(3)]);
    }

    public function create(){
        $postsList = Post::all();
        return view("admin.category.form", ["data"=>new Category(),
                                            "postsList"=>$postsList] );
    }

    public function validator(array $data){
        $rules = [
            'name' => 'required|max:500',
            'post_id' => 'exclude_if:post_id,null|exists:posts,id',
        ];

        return Validator::make($data, $rules)->validate();
    }

    public function store(Request $request){
        $validated = $this->validator($request->all());
        
        $cat = Category::create($validated);

        
        #vinculação com post
        $post = Post::find($request["post_id"]);
        CategoryPost::updateOrCreate(["post_id"=>$post->id,"category_id"=>$cat->id]);
    

        return redirect(route("category.edit", $cat))->with("success",__("Data saved!"));
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect(route("category.list"))->with("success",__("Data deleted!"));
    }

    public function desvincular(CategoryPost $category_post){
        $category_post->delete();
        return redirect()->back()->with("success",__("Data deleted!"));
    }


    #abre o formulario de edição
    public function edit(Category $category){
        $postsList = Post::all();

        $posts = Post::select("posts.*", "category_posts.id as category_posts_id")
                ->join("category_posts","category_posts.post_id","=","posts.id")
                ->where("category_id",$category->id)->paginate(2);
    
        
        return view("admin.category.form",["data"=>$category,
                                           "postsList"=>$postsList,
                                           "posts"=>$posts
                                         ]);
    }

    #salva as edições
    public function update(Category $category, Request $request) {
        $validated = $this->validator($request->all());
        $category->update($validated);


        $post = Post::find($request["post_id"]);
        #na documentação consta esse método
        #funciona, mas não insere os timestamps
        #$category->posts()->attach($post);
        CategoryPost::updateOrCreate(["post_id"=>$post->id,"category_id"=>$category->id]);
    

        return redirect()->back()->with("success",__("Data updated!"));
    }

}
