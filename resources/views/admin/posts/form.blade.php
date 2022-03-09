@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Posts') }}</div>

                <div class="card-body">


                    @if (!$data->exists)
                        <form id="main" method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                    @else
                        <form id="main" method="POST" action="{{ route('post.update',$data) }}" enctype="multipart/form-data">
                        @method('PUT')
                    @endif

                        @csrf

                        @if ($data->exists)            
                        <div class="row mb-3">
                            <label for="subject" class="col-md-4 col-form-label text-md-end">
                                {{ __('Owner') }}</label>
                            
                                <div class="col-md-6">
                                    <input  class="form-control"
                                    name="subject" value="{{ $data->user->name }}"
                                    disabled>
                                </div>
                        </div>
                        @endif

                        
                        
                        <x-input name="subject" id="subject" label="Subject" 
                            required="true" :value="$data->subject"></x-input>



                        <x-input name="publish_date" id="publish_date" label="Publish date" style="background-color:red;"
                            required="true" type="date" :value="$data->publish_date"></x-input>


                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">
                                {{ __('Category') }}
                            </label>
    
                            <div class="col-md-6">
                            <select class="form-select @error('category_id') is-invalid @enderror"
                                    id="category_id"
                                    name="category_id" >
                                    <option value=''>{{__("Select one option")}}</option>
                                @foreach($categoriesList as $cat)
                                
                                    <option value='{{$cat->id}}'
                                        @if (old('category_id',$data->category_id) == $cat->id)
                                            selected
                                        @endif
                                        >{{$cat->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>



                            @if($data->exists)
                                <ol>
                                @foreach ($categories as $cat)
                                    <li>
                                        <a href='{{route('category.edit',$cat)}}'>{{ $cat->name }}</a>
                                        <a href="{{route('category.desvincular',$cat->category_posts_id)}}">X</a>
                                    </li>
                                @endforeach
                                </ol>
                                {{ $categories->links() }}
                            @endif

                        </div>


                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">
                                {{ __('Image') }}
                            </label>

                            <div class="col-md-6">
                                <input id="image" type="file" 
                                    class="form-control @error('image') is-invalid @enderror" 
                                    name="image" value="{{ old('image', $data->image) }}"  >


                                @if ($data->id)
                                    <img src="{{asset($data->image)}}" class="rounded" width='200'/>
                                @endif
                                

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="slug" class="col-md-4 col-form-label text-md-end">
                                {{ __('Slug') }}
                            </label>

                            <div class="col-md-6">
                                <input id="slug" type="text" 
                                    class="form-control" 
                                    value="{{ old('slug', $data->slug) }}" 
                                    disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="text" class="col-md-4 col-form-label text-md-end">
                                {{ __('Text') }}
                            </label>

                            <div class="col-md-6">
                                <textarea id="text" type="text" 
                                    class="form-control @error('text') is-invalid @enderror" 
                                    name="text" >{{ old('text', $data->text) }}</textarea>

                                @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </form>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                @can('update',$data)
                                    <button type="submit" id="btn-save" class="btn btn-primary" form="main">
                                        {{ __('Save') }}
                                    </button>
                                @endcan

                                @can('create','App\\Models\Post')
                                <a class='btn btn-secondary' href="{{route('post.create')}}">
                                    {{__('New post')}}
                                </a>
                                @endcan


                                                                
                                @can ('delete',$data)
                                <form name='delete' action="{{route('post.destroy',$data)}}"
                                    method="post"
                                    style='display: inline-block;'>
                                    @csrf
                                    @method("DELETE")
                                    <button type="button" onclick="confirmDeleteModal(this)" class="btn btn-danger">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                                @endcan

                                
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
