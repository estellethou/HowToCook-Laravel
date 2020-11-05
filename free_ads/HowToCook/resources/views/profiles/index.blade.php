@extends('layouts.app')

@section('content')
<div class="container .flex-*-wrap">
   <div class="row">
       <div class="col-3 p-5">
       <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100" alt="logo">
       </div>
       <div class="col-9 pt-5">
       <div class="d-flex justify-content-between align-items-baseline"> 
            <div><h1>{{ $user->nickname }}</h1></div>

            @can('update', $user->profile)
            <a href="/post/create"> ADD NEW POST</a>
            @endcan
        </div> 

        @can('update', $user->profile)
        <a href="/profile/{{ $user->id }}/edit"> EDIT PROFIL</a>
        @endcan

            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>23k</strong> followers</div>
            </div>
            <div class="pt-4 font-weight-bold"> {{ $user->profile->title }} </div>
            <div> {{ $user->profile->description }} </div>
            <div><a href="#"> {{ $user->profile->url }} </a></div>
       </div>

       <div class="row pt-5">
            @foreach($user->posts as $post)
                    <div class="col-4  pl-3 .align-self-*-start">
                        <div class="pb-2 pl-0"> <img src="/storage/{{ $post->image }}" class="w-100" alt="post image"> </div>  
                            <div>
                                <div class="pb-2" style="font-size:20px">{{ $post->caption }} by <span style="color:#3490dc">{{ $post->user->nickname }} </span></div>
                                <div class="d-flex align-items-end justify-content-between">
                                    <div>
                                        <div class="pb-2">{{ $post->category }}</div>
                                        <div class="pb-2">{{ $post->description }}</div>
                                        <div class="pb-2"> PRICE : {{ $post->price }} €</div>
                                        <div class="pb-0 mb-3"><i class="material-icons pr-2">&#xe55f;</i> {{ $post->location }}</div>  
                                    </div>
                                    @can('update', $user->profile)
                                        <div class="pr-3 pb-3"> <a href="/post/{{ $post->id }}/{{ $user->id }}/edit" class="btn btn-primary">EDIT POST</a></div>
                                    @endcan
                                </div>
                            </div>
                    </div>
            @endforeach
        </div>
   </div>
</div>
@endsection