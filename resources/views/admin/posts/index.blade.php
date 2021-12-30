@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Posts') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('post.list') }}">
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

                                <a class='btn btn-secondary' href="{{route('post.create')}}">
                                    {{__('New post')}}
                                </a>
                                
                            </div>
                        </div>
                    </form>


                    <ul>
                        @foreach ($list as $item)
                        <li>

                            <a href="{{route("post.edit",$item)}}" class="btn btn-primary">
                                {{ __('Edit') }}
                            </a>
                             |                             

                            {{$item->subject}} | {{$item->slug}} | {{$item->text}} |
                           
                            <form action="{{route('post.destroy',$item)}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                    {{ $list->links() }}
                


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
