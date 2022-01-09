<?php
 ob_start();

$post_image = "./images/logos/backgroundtext.jpg";

if(isset($_GET['p_id'])) {

    $post_id = $_GET['p_id'];

    $query = "SELECT * FROM posts WHERE post_id = {$post_id}";
    $select_post = mysqli_query($connection, $query);

    $row = mysqli_fetch_assoc($select_post);

    $post_title = $row['post_title'];
    $post_image = $row['post_image_1'];

    $post_image = "./images/news/".$post_image;
} else {
    $post_title = '';
    $post_image = '';
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-164966875-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-164966875-1');
</script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="<?php echo $post_image; ?>">
    <meta property="og:title" content="<?php echo $post_title; ?>">

    <meta name="keywords" content="News,Bangla,Banglanews,News24,Banglanews24,Abirvab,Abirvabnews,Abirvabnews24,সংবাদ,বাংলা সংবাদ">

    <meta name="description" content="এটি একটি অনলাইন নিউজ পোর্টাল যেটি সারা বিশ্বের বাংলা ভাষাভাষী মানুষদের সবচেয়ে কম সময়ে বাংলা নিউজ সরবরাহ করে">


    <title>Abirvab News 24</title>

    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    <link href="https://fonts.maateen.me/siyam-rupali/font.css" rel="stylesheet">




    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri&display=swap" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="../css/jquery.jConveyorTicker.min.css" />
    <!-- Bootstrap Core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <link href="../fonts/stylesheet.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/blog-home.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="..//js/jquery.jConveyorTicker.min.js"></script>



</head>

<body>
