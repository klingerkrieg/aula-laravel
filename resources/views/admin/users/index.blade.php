@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                    <form method="GET" action="{{ route('user.list') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="busca" class="col-md-4 col-form-label text-md-end">{{ __('Search') }}</label>
                            <div class="col-md-6">
                                <input id="busca" type="text" class="form-control" 
                                         name="busca" value="{{ old('busca') }}" 
                                         autofocus>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Search') }}
                                </button>

                                {{--<a class='btn btn-secondary' href="{{route('user.create')}}">
                                    {{__('New user')}}
                                </a>--}}
                                
                            </div>
                        </div>
                    </form>


                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">{{__("Edit")}}</th>
                            <th scope="col">{{__("Name")}}</th>
                            <th scope="col">{{__("E-mail")}}</th>
                            <th scope="col">{{__("Posts count")}}</th>
                            {{--<th scope="col">{{__("Delete")}}</th>--}}
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                                <tr>
                                    <td>
                                        <a href="{{route("user.edit",$item)}}" class="btn btn-primary">
                                            {{ __('Edit') }}
                                        </a>
                                    </td>
                                    <td>{{$item->name}}</td>    
                                    <td>{{$item->email}}</td>    
                                    <td>{{$item->posts->count()}}</td>    
                                    {{--<td>
                                        <form action="{{route('user.destroy',$item)}}" method="user">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-danger" type="button" onclick="confirmDeleteModal(this)"  >
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </td>--}}
                                </tr>
                            @endforeach

                        </tbody>
                      </table>


                    
                        
                    
                    {{ $list->links() }}
                


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
