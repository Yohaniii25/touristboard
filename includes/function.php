<?php

include('dbconfig.php');



function showevents()
{
    global $mysqli; // Declare $mysqli as a global variable
    $sql = "SELECT * FROM events";
    $resultevents = mysqli_query($mysqli, $sql);
    return $resultevents;
}



function showdestinations()
{
    global $mysqli;
    $sql = "SELECT * FROM destination";
    $resultdestinations = mysqli_query($mysqli, $sql);
    return $resultdestinations;
}



function rand_destinations()
{
    global $mysqli;
    $sql = "SELECT * FROM destination ORDER BY RAND() limit 4";
    $resultdestinations = mysqli_query($mysqli, $sql);
    return $resultdestinations;

}


// show all experiences

function showexperiences()

{

    global $mysqli;



    $sql = "SELECT * FROM experiences";

    $resultexperiences = mysqli_query($mysqli, $sql);



    return $resultexperiences;

}



// show colombo experiences

function showcolomboexperiences()

{

    global $mysqli;



    $sql = "SELECT * FROM experiences WHERE exp_district='Colombo'";

    $result_colombo_experiences = mysqli_query($mysqli, $sql);



    return $result_colombo_experiences;

}



// show Colombo experiences of category Seethawaka

function showcolomboexperiences_seethawaka()

{

    global $mysqli;



    $sql = "SELECT * FROM experiences WHERE exp_district='Colombo' AND exp_category='Seethawaka'";

    $result_colombo_experiences_seethawaka = mysqli_query($mysqli, $sql);



    return $result_colombo_experiences_seethawaka;

}



// show Colombo experiences of category Beach

function showcolomboexperiences_beach()

{

    global $mysqli;



    $sql = "SELECT * FROM experiences WHERE exp_district='Colombo' AND exp_category='Beach'";

    $result_colombo_experiences_beach = mysqli_query($mysqli, $sql);



    return $result_colombo_experiences_beach;

}



// show Colombo experiences of category Colonial

function showcolomboexperiences_colonial()

{

    global $mysqli;



    $sql = "SELECT * FROM experiences WHERE exp_district='Colombo' AND exp_category='Colonial'";

    $result_colombo_experiences_colonial = mysqli_query($mysqli, $sql);



    return $result_colombo_experiences_colonial;

}



// show Colombo experiences of category Mice

function showcolomboexperiences_mice()

{

    global $mysqli;



    $sql = "SELECT * FROM experiences WHERE exp_district='Colombo' AND exp_category='Mice'";

    $result_colombo_experiences_mice = mysqli_query($mysqli, $sql);



    return $result_colombo_experiences_mice;

}



// show Gampaja experiences of category Catamaran

function showgampahaexperiences_catamaran()

{

    global $mysqli;



    $sql = "SELECT * FROM experiences WHERE exp_district='Gampaha' AND exp_category='Catamaran'";

    $result_gampaha_experiences_catamaran = mysqli_query($mysqli, $sql);



    return $result_gampaha_experiences_catamaran;

}



// show Gampaja experiences of category Kelaniganthota

function showgampahaexperiences_kelaniganthota()

{

    global $mysqli;



    $sql = "SELECT * FROM experiences WHERE exp_district='Gampaha' AND exp_category='Kelaniganthota'";

    $result_gampaha_experiences_kelaniganthota = mysqli_query($mysqli, $sql);



    return $result_gampaha_experiences_kelaniganthota;

}



// show Gampaja experiences of category Pilikuththuwa

function showgampahaexperiences_pilikuththuwa()

{

    global $mysqli;



    $sql = "SELECT * FROM experiences WHERE exp_district='Gampaha' AND exp_category='Pilikuththuwa'";

    $result_gampaha_experiences_pilikuththuwa = mysqli_query($mysqli, $sql);



    return $result_gampaha_experiences_pilikuththuwa;

}





// show gampaha experiences

function showgampahaexperiences()

{

    global $mysqli;



    $sql = "SELECT * FROM experiences WHERE exp_district='Gampaha'";

    $result_gampaha_experiences = mysqli_query($mysqli, $sql);



    return $result_gampaha_experiences;

}



// show kalutara experiences

function showkalutaraexperiences()

{

    global $mysqli;



    $sql = "SELECT * FROM experiences WHERE exp_district='Kalutara'";

    $result_kalutara_experiences = mysqli_query($mysqli, $sql);



    return $result_kalutara_experiences;

}



// show kalutara experiences of category Wellness

function showkalutaraexperiences_wellness()

{

    global $mysqli;



    $sql = "SELECT * FROM experiences WHERE exp_district='Kalutara' AND exp_category='Wellness'";

    $result_kalutara_experiences_wellness = mysqli_query($mysqli, $sql);



    return $result_kalutara_experiences_wellness;

}



// show kalutara experiences of category Pre_Human

function showkalutaraexperiences_pre_human()

{

    global $mysqli;



    $sql = "SELECT * FROM experiences WHERE exp_district='Kalutara' AND exp_category='Pre_Human'";

    $result_kalutara_experiences_pre_human = mysqli_query($mysqli, $sql);



    return $result_kalutara_experiences_pre_human;

}



// show kalutara experiences of category Astapala_Bodhi

function showkalutaraexperiences_astapala_bodhi()

{

    global $mysqli;



    $sql = "SELECT * FROM experiences WHERE exp_district='Kalutara' AND exp_category='Astapala_Bodhi'";

    $result_kalutara_experiences_astapala_bodhi = mysqli_query($mysqli, $sql);



    return $result_kalutara_experiences_astapala_bodhi;

}



// show kalutara experiences of category Meditation

function showkalutaraexperiences_meditation()

{

    global $mysqli;



    $sql = "SELECT * FROM experiences WHERE exp_district='Kalutara' AND exp_category='Meditation'";

    $result_kalutara_experiences_meditation = mysqli_query($mysqli, $sql);



    return $result_kalutara_experiences_meditation;

}



// show kalutara experiences of category Beruwala

function showkalutaraexperiences_beruwala()

{

    global $mysqli;



    $sql = "SELECT * FROM experiences WHERE exp_district='Kalutara' AND exp_category='Beruwala'";

    $result_kalutara_experiences_beruwala = mysqli_query($mysqli, $sql);



    return $result_kalutara_experiences_beruwala;

}



// show kalutara experiences of category Goleden_Mile_Tourism

function showkalutaraexperiences_goleden_mile_tourism()

{

    global $mysqli;



    $sql = "SELECT * FROM experiences WHERE exp_district='Kalutara' AND exp_category='Goleden_Mile_Tourism'";

    $result_kalutara_experiences_goleden_mile_tourism = mysqli_query($mysqli, $sql);



    return $result_kalutara_experiences_goleden_mile_tourism;

}



// show kalutara experiences of category Bentara

function showkalutaraexperiences_bentara()

{

    global $mysqli;



    $sql = "SELECT * FROM experiences WHERE exp_district='Kalutara' AND exp_category='Bentara'";

    $result_kalutara_experiences_bentara = mysqli_query($mysqli, $sql);



    return $result_kalutara_experiences_bentara;

}







function showsingledestination($tourid)

{

    global $mysqli;



    $sql = "SELECT * FROM destination WHERE id='$tourid'";

    $result = mysqli_query($mysqli, $sql);



    return $result;

}





// view single experience

function showsingleexperience($exp_id)

{

    global $mysqli;



    $sql = "SELECT * FROM experiences WHERE exp_id='$exp_id'";

    $result = mysqli_query($mysqli, $sql);



    return $result;

}



// view next 3 related tours

// search destinations

function showdestinations_bykeyword($keyword, $catname, $segname, $district)

{

    include('dbconfig.php');



    $sql = "SELECT * FROM destination";



    // Check if any search criteria are provided

    if ($keyword != "") {

        $sql .= " WHERE dest_name LIKE '%$keyword%'";

    }

    if ($district != "") {

        $sql .= ($keyword != "") ? " AND district='$district'" : " WHERE district='$district'";

    }

    if ($catname != "") {

        $sql .= ($keyword != "") ? " AND category='$catname'" : " WHERE category='$catname'";

    }

    if ($segname != "") {

        $sql .= ($keyword != "" || $catname != "") ? " AND segment='$segname'" : " WHERE segment='$segname'";

    }

    $resultdestinations = mysqli_query($mysqli, $sql);



    return $resultdestinations;

}





// search events

function showevents_bykeyword($keyword, $monthname, $districtname)

{

    include('dbconfig.php');





    $sql = "SELECT * FROM events";



    // Check if any search criteria are provided

    if ($keyword != "") {

        $sql .= " WHERE event_name LIKE '%$keyword%'";

    }



    if ($monthname != "") {

        $sql .= ($keyword != "") ? " AND event_month='$monthname'" : " WHERE event_month='$monthname'";

    }



    if ($districtname != "") {

        $sql .= ($keyword != "" || $monthname != "") ? " AND event_district='$districtname'" : " WHERE event_district='$districtname'";

    }



    $resultevents = mysqli_query($mysqli, $sql);



    return $resultevents;

}





// search experiences

function showexperiences_bykeyword($keyword, $districtname)

{

    include('dbconfig.php');



    $sql = "SELECT * FROM experiences";



    // Check if any search criteria are provided

    if ($keyword != "") {

        $sql .= " WHERE exp_name LIKE '%$keyword%'";

    }



    if ($districtname != "") {

        $sql .= ($keyword != "") ? " AND exp_district='$districtname'" : " WHERE exp_district='$districtname'";

    }



    $resultexperiences = mysqli_query($mysqli, $sql);



    return $resultexperiences;

}





function fetchMediaImages($destinationId)

{

    global $mysqli;



    $sql = "SELECT image_path FROM Media WHERE destination_id = '$destinationId'";

    $result = mysqli_query($mysqli, $sql);



    while ($row = mysqli_fetch_assoc($result)) {

        // Display images

        $imagePaths = explode(',', $row['image_path']);

        foreach ($imagePaths as $imagePath) {

            echo "<div class='col-lg-4 col-sm-6'><img src='../assets/images/background/" . trim($imagePath) . "' alt='' width='370' height='288' /></div>";

        }

    }

}









function showdestinations_bycat_map($destination_id)

{

    global $mysqli;





    $destination_id = $mysqli->real_escape_string($destination_id);



    $query = "SELECT map_iframe FROM map WHERE destination_id = '$destination_id'";

    $result = $mysqli->query($query);



    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        return $row['map_iframe'];

    } else {

        return null;

    }

}



function displayNews()
{
    global $mysqli;
    $sql = "SELECT * FROM news";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            echo "<div class='col-lg-4 col-sm-6'>";

            echo "<article class='card-classic'><a class='card-classic__media' href='single-news.php?id=" . $row['news_id'] . "'><img src='images/news/" . $row['main_image_url'] . "' alt='" . $row['title'] . "' width='370' height='288'/></a>";

            echo "<h5><a href='single-news.php?id=" . $row['news_id'] . "'>" . $row['title'] . "</a></h5>";

            echo "<p>" . substr($row['content'], 0, 100) . "...</p>";

            echo "<a class='button button-primary-2 button-md' href='single-news.php?id=" . $row['news_id'] . "'>Read More</a>";

            echo "</article>";

            echo "</div>";

        }

    } else {

        echo "No news found.";

    }

}


function displaySingleNews($newsId)
{
    global $mysqli;
    $sql = "SELECT * FROM news WHERE news_id = $newsId";

    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $title = $row['title'];
        $mainImageUrl = $row['main_image_url'];
        $content = $row['content'];
        $galleryImages = !empty($row['gallery_images']) ? explode(",", $row['gallery_images']) : [];


        echo "<section class='section section-lg bg-default'>";

        echo "<div class='container'>";

        echo "<div class='row'>";

        echo "<div class='col-12'>";

        echo "<div class='blog-post-classic'>";

        echo "<h2>$title</h2>";

        echo "<img src='images/news/$mainImageUrl' class='mx-auto d-block' alt='$title' style='width: 500px;'/>";

        echo "<p class='fw-sbold'>$content</p>";


        if (!empty($galleryImages)) {

            echo "<div class='blog-post-classic__media-group'>";

            echo "<div class='row row-30 justify-content-center' data-lightgallery='group'>";

            foreach ($galleryImages as $image) {

                echo '<div class="zoom col-lg-3 col-md-4 col-sm-6"><a class="gallery-link" href="images/news/n_gallery/' . trim($image) . '" data-lightgallery="item">
                <img style="border-radius: 0px 30px;" src="images/news/n_gallery/' . trim($image) . '" alt="" width="370" height="288"/></a></div>';

            }
            echo "</div>";

            echo "</div>";
        }

        echo "</div>";

        echo "</div>";

        echo "</div>";

        echo "</div>";

        echo "</section>";

    } else {

        echo "News not found.";

    }

}



// show experiences by map

function showexperiences_bycat_map($exp_id)

{

    global $mysqli;



    $exp_id = $mysqli->real_escape_string($exp_id);



    $query = "SELECT map_iframe FROM map WHERE exp_id = '$exp_id'";

    $result = $mysqli->query($query);



    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        return $row['map_iframe'];

    } else {

        return null;

    }

}




function search_terms($key)

{

    global $mysqli;



    $sql = "SELECT * FROM `destination` where dest_name LIKE '%$key%'";

    $resultsearchterms = mysqli_query($mysqli, $sql);



    return $resultsearchterms;

}

// newly added

// show all hotels related to each destination id 
function showhotels($dest_id = null)
{
    global $mysqli;

    $query = "SELECT hotel_id, hotel_name, hotel_image FROM hotel";

    if ($dest_id !== null) {
        $dest_id = $mysqli->real_escape_string($dest_id);
        $query .= " WHERE dest_id = '$dest_id'";
    }

    $result = $mysqli->query($query);

    return $result;
}


// show single hotel hotel_id is the id of the hotel
function showsinglehotel($hotel_id)
{
    global $mysqli;

    $hotel_id = $mysqli->real_escape_string($hotel_id);

    $query = "SELECT * FROM hotel WHERE hotel_id = '$hotel_id'";
    $result = $mysqli->query($query);

    return $result;
}

// show hotel map related to each hotel_id
function showhotel_map($hotel_id)
{
    global $mysqli;

    $hotel_id = $mysqli->real_escape_string($hotel_id );

    $query = "SELECT map_iframe_hotel FROM hotel_map WHERE hotel_id  = '$hotel_id '";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['map_iframe_hotel'];
    } else {
        return null;
    }
}

// fetch gallery images for each hotel
function fetchHotelMediaImages($hotel_id)
{
    global $mysqli;

    $sql = "SELECT image_path FROM single_hotel_media WHERE hotel_id = '$hotel_id'";
    $result = mysqli_query($mysqli, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        // Display images
        $imagePaths = explode(',', $row['image_path']);
        foreach ($imagePaths as $imagePath) {
            echo "<div class='col-lg-4 col-sm-6'>
            <img src='../assets/images/hotel_gallery/" . trim($imagePath) . "' alt='' width='370' height='288' />
            </div>";
        }
    }
}

