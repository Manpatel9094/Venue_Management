<html>
    <head>
        <meta charset="UTF-8">
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald|Roboto">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <title></title>
    </head>
    
    
    <style>
        
.circle-wrapper {
  position: relative;
  width: 100px;
  height: 100px;
  float: left;
  margin: 10px;
}

.icon {
  position: absolute;
  color: #fff;
  font-size: 55px;
  top: 50px;
  left: 50px;
  transform: translate(-50%, -50%);
}

.circle {
  display: block;
  width: 100%;
  height: 100%;
  border-radius: 50%;
  padding: 2.5px;
  background-clip: content-box;
  animation: spin 10s linear infinite;
}

.circle-wrapper:active .circle {
  animation: spin 2s linear infinite;
}

.success {
  background-color: #4BB543;
  border: 2.5px dashed #4BB543;
}


@keyframes spin { 
  100% { 
    transform: rotateY(360deg);
  }
}

.page-wrapper {
  background-color: white;
  display: flex;
  align-items: center;
  justify-content: center;
}

.card-body{
    margin-top: 5%;
}
    </style>
    

    <body style="background-color: #DEDEE4">
        
        
        <div class="card-body">
            
            <div class="card">
                
                <br>
       
    <div class="page-wrapper">
  <div class="circle-wrapper">
    <div class="success circle"></div>
    <div class="icon">
      <i class="fa fa-check"></i>
    </div>
    
     
  </div>
 
            
       
</div>
            <br>
            <center>
            <h1>Thank You.! <br> Venue Book Successfully.!</h1>
            
            <p style="font-size: 23px;">Thanks for being awesome, <br> we hope you enjoy your booking.</p>
            
            <strong><p style="font-size: 18px">You can cancel booked venue before event day.</p></strong>
            
            <strong><p style="font-size: 18px;">If you cancel your booking then you cannot get refund your deposit amount.</p></strong>
            
            <a href="#" class="btn btn-primary">Continue To Booking Venue</a>
            
            </center>
        
            <br>
            
        </div>
        </div>
            
    </body>
</html>
