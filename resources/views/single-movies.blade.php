@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-single-' . get_post_type(), 'partials.content-single'])
  @endwhile
  {{-- @section('sidebar')
    @include('sections.sidebar')
  @endsection --}}
@endsection
@section('after-content')
    {{-- <div class="container" id="horizontal-form">
        @include('sections.horizontal-form')
    </div> --}}
@endsection