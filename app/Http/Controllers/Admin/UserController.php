<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
        
    public function list(Request $request){
        $pagination = User::orderBy("name");

        return view("admin.users.index", ["list"=>$pagination->paginate(3)]);
    }

    /*public function create(){
        return view("admin.users.form", ["data"=>new User()] );
    }

    public function store(UserRequest $request){
        $validated = $request->validated();

        $path = $request->file('image')->store('users',"public");

        $data = $request->all();
        $data["image"] = $path;
        $data["user_id"] = Auth::user()->id;

        $user = User::create($data);
        return redirect(route("user.edit", $user))->with("success",__("Data saved!"));
    }

    public function destroy(User $user){
        $user->delete();
        return redirect(route("user.list"))->with("success",__("Data deleted!"));
    }*/


    #abre o formulario de edição
    public function edit(User $user){

        $posts = Post::where("user_id",$user->id)->paginate(5);

        return view("admin.users.form",["data"=>$user, 
                                        "posts"=>$posts]);
    }

    #salva as edições
    /*public function update(User $user, UserRequest $request) {
        $validated = $request->validated();

        $data = $request->all();
        #necessário, pois não é obrigatório atualizar a imagem
        if ($request->file('image') != null){
            $path = $request->file('image')->store('users',"public");
            $data["image"] = $path;
        }

        $user->update($data);
        return redirect()->back()->with("success",__("Data updated!"));
    }*/

    

}
