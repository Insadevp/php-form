<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <style>
        .output {
    font: 1rem 'Fira Sans', sans-serif;
}

label {
    font-size: .8rem;
}

label,
input[type='image'] {
    margin-top: 1rem;
}

input[type='image'] {
    width: 80px;
}
    </style>
</head>
<body>
   <?php
   //pour afficher un contenu

   echo  "
    <h1> tralala </h1> ";//ou //
    echo "<h2>";
    echo "tralala";
    echo "<h2>";

    //variables

    $mavar = "pouet";
    echo "<h2>";
    echo $mavar;
    echo "<h2>";
     
    //concatener

    $mavar = "pouet";
    echo"<h2>" . $mavar . "<h2>";

    ?>

   
    
<form action="analyse.php" method="post">
  <label for="tagada">Nom</label>
   <input type="text" id="tagada" name="badaboum">
   
   <label for="tsoin">Prenom</label>
   <input type="text" id="tsoin" name="splash">
   <button> Envoyer
   </button>
 <label for="name">Name (4 to 8 characters):</label>
 

 <!--  <input type="text" id="name" name="name" required
       minlength="4" maxlength="8" size="10">
       <br>


       <p>Choose your monster's features:</p>

<div>
  <input type="checkbox" id="scales" name="scales"
         checked>
  <label for="scales">Scales</label>
</div>

<div>
  <input type="checkbox" id="horns" name="horns">
  <label for="horns">Horns</label>
</div> 
<div>
    <button type="submit">S'abonner</button>
  </div>

<div>
    <input type="color" id="body" name="body"
            value="#f6b73c">
    <label for="body">Body</label>
</div>

<label for="start">Start date:</label>

<input type="date" id="start" name="trip-start"
       value="2018-07-22"
       
       min="2018-01-01" max="2018-12-31">
<br>
       <label for="meeting-time">Choose a time for your appointment:</label>

<input type="datetime-local" id="meeting-time"
       name="meeting-time" value="2018-06-12T19:30"
       min="2018-06-07T00:00" max="2018-06-14T00:00">

     <input id="prodId" name="prodId" type="hidden" value="xm234jq">

     <p>Sign in to your account:</p>

<div>
  <label for="userId">User ID</label>
  <input type="text" id="userId" name="userId">
</div>

<input type="image" id="image" alt="Login"
       src="/media/examples/login-button.png">
 
       <div>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">
</div>

<div>
    <label for="pass">Password (8 characters minimum):</label>
    <input type="password" id="pass" name="password"
           minlength="8" required>
</div>

<input type="submit" value="Sign in">-->

   </form>





  
</body>
</html>