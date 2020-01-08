
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
box-sizing: border-box;
}

body {
font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
float: left;
width: 25%;
padding: 0 5px;
}

.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
content: "";
display: table;
clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
.column {
    width: 100%;
    display: block;
    margin-bottom: 10px;
}
}

/* Style the counter cards */
.card {
    box-shadow: 0 4px 8px 0
    rgba(0, 0, 0, 0.2);
    padding: 16px;
    text-align: center;
    background-color:#fff;
    color:#818181;
}

.card p{
   color: #8d8d8d;
}

.card .fa {font-size:50px;}
</style>
<div class="row mt-3">
    <div class="column">
        <div class="card">
        <p><i class="fa fa-money"></i></p>
        <h3>0</h3>
        <p>Revenue</p>
        </div>
    </div>
    <div class="column">
        <div class="card">
        <p><i class="fa fa-shopping-basket"></i></p>
        <h3>0</h3>
        <p>Sold Out Iteams</p>
        </div>
    </div>
    
    <div class="column">
        <div class="card">
        <p><i class="fa fa-recycle"></i></p>
        <h3>0</h3>
        <p>Ticket Remaining</p>
        </div>
    </div>
    
    <div class="column">
        <div class="card">
        <p><i class='fas fa-chair' style='font-size:48px'></i></p>
        <h3>100+</h3>
        <p>Events Seats</p>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="column">
        <div class="card">
        <p><i class="fa fa-users"></i></p>
        <h3>11+</h3>
        <p>Attende</p>
        </div>
    </div>
    <div class="column">
        <div class="card">
        <p><i class="fa fa-handshake-o"></i></p>
        <h3>3</h3>
        <p>Sponsers</p>
        </div>
    </div>
    
    <div class="column">
        <div class="card">
        <p><i class="fa fa-newspaper-o"></i></p>
        <h3>2</h3>
        <p>Create Tickets</p>
        </div>
    </div>
    
    <div class="column">
        <div class="card">
        <p><i class="fa fa-heart"></i></p>
        <h3>100+</h3>
        <p>Event Interested</p>
        </div>
    </div>
</div>
