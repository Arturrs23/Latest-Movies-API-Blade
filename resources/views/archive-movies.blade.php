@extends('layouts.app')

@section('content')
  <div class="page-header">
    <h1 class="mb-5">News</h1>
  </div>
  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  @while(have_posts()) @php(the_post())
    <article @php(post_class('border mb-10'))>
        <header class="bg-grey border-b p-4">
            <a href="{{ get_permalink() }}" title="Read More About @title">
                <h2 class="entry-title mb-0 text-gold text-xl">@title</h2>
            </a>
        </header>
        <div class="entry-summary p-4">
          @php(the_excerpt())
          <a class="text-gold hover:text-goldDark" href="{{ get_permalink() }}" title="Read More About @title">Read More.</a>
        </div>
      </article>

  @endwhile

  {!! get_the_posts_navigation() !!}
@endsection

@section('sidebar')
  @include('sections.sidebar')
@endsection