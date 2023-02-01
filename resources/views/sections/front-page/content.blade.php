<section class="bg-black">
  <main class="p-10 min-h-screen">
    <div class="container-fluid">
      <div class="grid grid-cols-1 ">
        {{-- wp query outputing movies to frontend --}}
        <?php 
      query_posts(array( 
          'post_type' => 'movies',
          'showposts' => 20 
      ) );  
  ?>
        <?php while (have_posts()) : the_post(); ?>
        <div class="min-h-screen grid place-items-center bg-black">
          <div class="bg-white rounded-md bg-gray-800 shadow-lg">
            <div class="md:flex md:flex px-4 py-4 leading-none max-w-4xl leading-none max-w-4xl">
              <div class="flex-none ">
                <img class="mx-auto  border-2 border-red-500 "
                  src="https://image.tmdb.org/t/p/w500<?php the_field('poster'); ?>">
              </div>
              <div class="flex-col ">
                <h1 class="text-white mx-auto font-bebas text-5xl underline underline-offset-4 px-8 py-9"><a
                    href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
                    {{-- <hr>
                <hr class="divide-y" > --}}
                <div class="text-md flex justify-between px-4 my-2">
                  <h3 class="text-white  p-6 w-80 font-bebas text-xl"> Release Date -
                    <?php the_field('release_date'); ?> </h3>
                </div>
                <p class="text-white font-bebas text-xl p-6 w-80 mx-auto"> <?php the_field('overview'); ?> </p>
              </div>
            </div>
           </div>
        </div>
        <p><?php echo get_the_excerpt(); ?></p>
        <?php endwhile;?>
      </div>
    </div>
  </main>
  {{-- <script>
    // fetch function
    (async () => {
      async function getMovies() {
        const url =
          `https://api.themoviedb.org/3/movie/now_playing?api_key=5e6c8a2634f9053bc5bd33d1cc80a33d&language=en-US&page=1`;  
          // https://api.openbrewerydb.org/breweries/?page=
        const response = await fetch(url);
        // dumping json
        const movies = await response.json();
        return movies;
        
      }
      // loging json obj to console
      const movies = await getMovies();
      console.log(movies);

      // loop trough movies 
      for (var key in movies) {
        for (var i = 0; i < movies[key].length; i++) {
          var title = movies[key][i].original_title;
          var desc = movies[key][i].overview;
          var image = movies[key][i].poster_path;
          var vote = movies[key][i].vote_average;
          // var posterFullUrl = "https://image.tmdb.org/t/p/w185//" + item.poster_path;
          var something = document.createElement('div');
          something.className = 'movie  text-center w-80 border-2 border-red-500 ';
          something.innerHTML =
            '<img class="mx-auto" src="https://image.tmdb.org/t/p/w500' + image + ' "   </img>' +
            '<h2 class="text-white font-bebas text-5xl underline underline-offset-4  py-9">' + title + '</h2>' +
            '<h3 class="text-white font-bebas text-xl">' + desc + '</h3>' +
            // '<h2>' + vote + '</h2>' +

            // <img src="${BASE_URL}${movieTmdb.backdrop_path}" class="figure-img img-fluid rounded" alt="A">

            document.getElementById(key).appendChild(something);

            
        }
      }
    })();
  </script> --}}
</section>
