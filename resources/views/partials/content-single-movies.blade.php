<article @php(post_class())>
  @include('partials.navigation')
  @include('sections.front-page.hero')
  <div class=" text-center  ">
    <header class="bg-black ">
      <h1 class="text-white font-bebas text-5xl underline underline-offset-4  py-9">
        {!! $title !!}
      </h1>
      <img class="mx-auto  border-2 border-red-500 " src="https://image.tmdb.org/t/p/w500<?php the_field('poster'); ?>">
      <p class="text-white font-bebas text-xl p-6 w-80 mx-auto"> <?php the_field('overview'); ?> </p>
      <h3 class="text-white mx-auto p-6 font-bebas text-xl"> Release Date - <?php the_field('release_date'); ?> </h3>
    </header>
  </div>
  <div class="entry-content">
    @php(the_content())
  </div>

  <footer>
  </footer>

  {{-- @php(comments_template()) --}}
</article>
@include('partials.footer-menu')



