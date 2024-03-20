
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> 
    <title>Form</title>
</head>
<body>
    <div class="container">
    <form action = "validate.php" method = "POST" enctype = "multipart/form_data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
   </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nom</label>
    <input type="text" class="form-control" name="nom">
  </div>

   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Fichier</label>
    <input type="file" class="form-control" name="screenshot">
  </div>
 
  <button type="submit" name ="submit" class="btn btn-primary">Envoyer</button>
</form>
</div>
</body>
</html>
