
@extends('pages.profile.tabs.base')

@section('tab')
        <turbo-frame id="posts-frame" target="_top" src="{{route('posts',['user_id'=>$user->id])}}"/>
@endsection
