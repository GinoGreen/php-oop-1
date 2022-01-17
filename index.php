<!-- create un file `index.php` in cui:
- è definita una **classe ‘Movie’**
   => all’interno della classe sono dichiarate delle **variabili d’istanza**
   => all’interno della classe è definito **un costruttore**
   => all’interno della classe è definito almeno **un metodo**
- vengono **istanziati almeno due oggetti ‘Movie’** e stampati a schermo i valori delle relative proprietà
- BONUS: creare un file “database” contenente una lista di film che poi vengono istanziati in un ciclo -->
<?php 

   require_once __DIR__ . "/database.php";
   require_once __DIR__ . "/Movie.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <title>Film</title>
   <style>
      body {
         background-color: #92929A;
      }
      .myCard {
         min-height: 350px;
         width: 250px;
         padding: 20px;
         margin: 20px;
         background: linear-gradient(#E5E5E5, #cdd);
         border-radius: 7px;
         box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.39);
      }
      .title {
         min-height: 75px;
         display: grid;
         place-items: center;
      }
   </style>
</head>
<body>
   
   <h1 class="text-center fw-bold py-4">Films!</h1>

   <div class="container-fluid d-flex flex-wrap justify-content-center">
      <?php foreach ($movies as $movie) :
         $new_movie = new Movie($movie['title']);
         $new_movie->movieDirector = $movie['movieDirector'];
         $new_movie->minutesDuration = $movie['minutesDuration'];
         $new_movie->genre = $movie['genre'];
         $new_movie->cast = $movie['cast'];
         $new_movie->vote = $movie['vote'];

      ?>
      <div class="myCard">
         <div class="title">
            <h3 class="text-center"><?php echo $new_movie->title; ?></h3>
         </div>
         <p>Regista: <strong><?php echo $new_movie->movieDirector; ?></strong></p>
         <p>Durata: <strong><?php echo $new_movie->minutesDuration; ?></strong> min</p>
         <p>Genere: <strong><?php echo $new_movie->genre; ?></strong></p>
         <p class="text-center">Votazione finale: <strong><?php echo $new_movie->getFeedback(); ?></strong></p>
         <h3 class="text-center">Cast</h3>
         <ul class="d-flex flex-wrap justify-content-center">
            <?php foreach ($new_movie->cast as $key => $cast_member) :?>
               <li class="mx-3"><?php echo $cast_member; ?></li>
            <?php endforeach; ?>
         </ul>
      </div>
      <?php endforeach; ?>
   </div>

</body>
</html>