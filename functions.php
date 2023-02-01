<?php

// register the CPT Movies
function register_movie_cpt() {
  register_post_type( 'movies', array(
    'label' => 'Movies',
    'show_in_rest' => true,
    'public' => true,
    'capability_type' => 'post',
  ));
}
add_action( 'init', 'register_movie_cpt' );
//  update cron job
if ( ! wp_next_scheduled( 'update_movie_list' ) ) {
  wp_schedule_event( time(), 'weekly', 'update_movie_list' );
}
// run function wether not logged in or logged in
add_action('wp_ajax_nopriv_get_movies_api', 'get_movies_api');
add_action('wp_ajax_get_movies_api', 'get_movies_api');
function get_movies_api () {
// $current_page = ( ! empty( $_POST['current_page'] ) ) ? $_POST['current_page'] : 1;
    
    // returning array of objects
      // HTTP request
      $getresults = wp_remote_retrieve_body( wp_remote_get('https://api.themoviedb.org/3/movie/now_playing?api_key=5e6c8a2634f9053bc5bd33d1cc80a33d&language=en-US&page=1' ) );
        // decode json , if set to true will retun array , if false - string
          $getresults = json_decode($getresults, true);

          // loop trough json array
          //get the titlte
            $results = $getresults['results'];

              // title loop
              foreach($results as $result) {
              $original_title = $result['original_title'];
                
              //  overview loop
              $results = $getresults['results'];
              foreach($results as $overviews){
                $overview = $overviews['overview'];
              }
              //  release date loop
              $results = $getresults['results'];
              foreach($results as $releases){
                $release = $releases['release_date'];
              }
              // poster loop
              $results = $getresults['results'];
              foreach($results as $posters){
                $poster = $posters['poster_path'];

              }
              // appending the title,poster,release date to the posts and inserting posts
              $movie_slug = ($result['original_title'] );
              $overview = ($result['overview'] );
              $poster = ($result['poster_path'] );
              $release = ($result['release_date'] );
              $my_post =  wp_insert_post([
                'original_title' => $movie_slug,
                'post_title' => $movie_slug,
                'post_type' => 'movies',
                'post_status' => 'publish',
                'status' => 'publish',
                'slug' =>'slug',
                                     ]);
                // if error don't continue || continue
                if( is_wp_error( $my_post ) || $my_post === 0 ) {
                    die();
                    // continue;
                  }
                 //ACF key array
                  $acf_keys = [
                          'field_634a9c08dcae4' => 'overview',
                      ];
                  //loop trough array and update the fields
                      foreach($acf_keys as $key => $name) {
                          update_field($key, $overview , $my_post);
                      }
                    $date = [
                     'field_6350541b9e90d' => 'release_date',

                    ];
                    foreach($date as $keys => $name) {
                      update_field($keys, $release , $my_post);
                  }
                      $image = [
                        'field_6355552df2bbf' => 'poster',
                      ];
                      foreach($image as $images => $name){
                        update_field($images, $poster, $my_post);
                      }
                  }
                    // either array with results or empty array
                      // if empty array return false stop getting results
                      if (! is_array($getresults) ||  empty($getresults)) {
                          return false;
                      }
                      
                      // call the api until there are empty results 
    //                   wp_remote_post (admin_url('admin-ajax.php?action=get_movies_api'), [
    //                       // no blocking by WP
    //                       'blocking' => false,
    //                       'sslverify' => false,
    //                       // argument intake and adding to current page variable
    //                       'body' => [
    //                       // 'current_page' => $current_page 


    //                       ]

    //  ]);
}










/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

try {
    \Roots\bootloader();
} catch (Throwable $e) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://docs.roots.io/acorn/2.x/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

/*
|--------------------------------------------------------------------------
| Enable Sage Theme Support
|--------------------------------------------------------------------------
|
| Once our theme files are registered and available for use, we are almost
| ready to boot our application. But first, we need to signal to Acorn
| that we will need to initialize the necessary service providers built in
| for Sage when booting.
|
*/

add_theme_support('sage');



// ///////////////////////////


  
