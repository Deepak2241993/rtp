@extends('layouts.master')

@section('content')
@php
    $content = staticcontent(16);
@endphp
    <div class="container terms-head">
        <h1>{!! $content->title !!}</h1>
    </div>
{{-- Description --}}
    <div class="container">
        {!! $content->description !!}
 </div>
@endsection
