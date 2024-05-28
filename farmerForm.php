<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter your information</title>

    <!--Bootstrap library-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!--My Own style element-->
    <link rel="stylesheet" href="./style/style.css">

</head>
<body>
    <!--Form to take the information from farmers about their details. -->
    <div class="container-sm">

    <form class="row g-3 needs-validation" novalidate>

     <div class="col-md-4 position-relative">
        <label for="validationTooltip01" class="form-label">First name</label>
        <input type="text" class="form-control" id="validationTooltip01" value="Mark" required>
    </div>

    <div class="col-md-4 position-relative">
        <label for="validationTooltip02" class="form-label">Last name</label>
        <input type="text" class="form-control" id="validationTooltip02" value="Otto" required>
    </div>
    
  <div class="col-md-3 position-relative">
    <label for="validationTooltip04" class="form-label">State</label>
    <select class="form-select" id="validationTooltip04" required>
      <option selected disabled value="">Choose...</option>
      <option>...</option>
    </select>
    <div class="invalid-tooltip">
      Please select a valid state.
    </div>
  </div>
  
  <div class="col-md-3 position-relative">
    <label for="validationTooltip05" class="form-label">Zip</label>
    <input type="text" class="form-control" id="validationTooltip05" required>
    <div class="invalid-tooltip">
      Please provide a valid zip.
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>

    </div>
</body>
</html>