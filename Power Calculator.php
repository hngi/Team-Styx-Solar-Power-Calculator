<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Solar Power Calculator</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='/css/power.css'>
</head>
<body>
        <div class="nav">
                <img src="https://res.cloudinary.com/ddtech/image/upload/v1569250993/TEAM%20STYX/ECO_y47s24.png" alt="some text"
                    width=120 height=80>
                <div id="link_bar">
                    <a href="index.html">HOME</a>
                    <a href="Power Calculator.html">POWER CALCULATOR</a>
                    <a href="contact.html">CONTACT</a>
                </div>
            </div>
            <!--Section 1-->
<div class="subj">
<form method="post" id="subj" action="calculate.php"><br><br>
    <br><br><br>
<div class="sub1">   
<label class="ud"></label><h4>Appliance/Load Name</h4></label> <br><br>
    <div class="sub12"><input type="text" name="lname" id="lname"> <br> 
    <input type="text" name="lname" id="lname"> <br> 
    <input type="text" name="lname" id="lname"> <br>
    <input type="text" name="lname" id="lname"><br>
</div>

</div>
    <div class="sub2">
    <label for=""><h4>Quantity</h4></label><br><br>
    <input type="number" name="quant" id="quant"> <br> 
    <input type="number" name="quant1" id="quant"> <br>
    <input type="number" name="quant2" id="quant"> <br>
    <input type="number" name="quant3" id="quant"> <br>
</div>
<div class="sub3">
    <label for=""><h4>AC Watt</h4></label><br><br>
    <input type="number" name="watts" id="quant"> <br> 
    <input type="number" name="watts1" id="quant"> <br>
    <input type="number" name="watts2" id="quant"> <br>
    <input type="number" name="watts3" id="quant"> <br>
</div>
<div class="sub4">
    <label for=""><h4>Hours per day</h4></label><br>
    <select name="hours" id="quant">
        <option value="">1</option><option value="">2</option><option value="">3</option>
        <option value="">4</option><option value="">5</option><option value="">6</option>
        <option value="">7</option><option value="">8</option><option value="">9</option>
        <option value="">10</option><option value="">11</option><option value="">12</option>
        <option value="">13</option><option value="">14</option><option value="">15</option>
        <option value="">16</option><option value="">17</option><option value="">18</option>
        <option value="">19</option><option value="">20</option><option value="">21</option>
        <option value="">22</option><option value="">23</option><option value="">24</option>
    </select>
    <br>
    <select name="hours1" id="quant">
        <option value="">1</option><option value="">2</option><option value="">3</option>
        <option value="">4</option><option value="">5</option><option value="">6</option>
        <option value="">7</option><option value="">8</option><option value="">9</option>
        <option value="">10</option><option value="">11</option><option value="">12</option>
        <option value="">13</option><option value="">14</option><option value="">15</option>
        <option value="">16</option><option value="">17</option><option value="">18</option>
        <option value="">19</option><option value="">20</option><option value="">21</option>
        <option value="">22</option><option value="">23</option><option value="">24</option>
    </select>
    <br>
    <select name="hours2" id="quant">
        <option value="">1</option><option value="">2</option><option value="">3</option>
        <option value="">4</option><option value="">5</option><option value="">6</option>
        <option value="">7</option><option value="">8</option><option value="">9</option>
        <option value="">10</option><option value="">11</option><option value="">12</option>
        <option value="">13</option><option value="">14</option><option value="">15</option>
        <option value="">16</option><option value="">17</option><option value="">18</option>
        <option value="">19</option><option value="">20</option><option value="">21</option>
        <option value="">22</option><option value="">23</option><option value="">24</option>
    </select>
    <br>
    <select name="hours3" id="quant">
        <option value="">1</option><option value="">2</option><option value="">3</option>
        <option value="">4</option><option value="">5</option><option value="">6</option>
        <option value="">7</option><option value="">8</option><option value="">9</option>
        <option value="">10</option><option value="">11</option><option value="">12</option>
        <option value="">13</option><option value="">14</option><option value="">15</option>
        <option value="">16</option><option value="">17</option><option value="">18</option>
        <option value="">19</option><option value="">20</option><option value="">21</option>
        <option value="">22</option><option value="">23</option><option value="">24</option>
    </select>
    <br>
</div>
    <div class="sub5">
    <label for=""><h4>Watt-Hours per day</h4></label><br>
    <input type="number" name="watth" id="quant"> <br> 
    <input type="number" name="watth1" id="quant"> <br>
    <input type="number" name="watth2" id="quant"> <br> 
    <input type="number" name="watth3" id="quant"> <br> 
 

</div> <br><br><br>
<ul>
<div class="sub6">
    <h4><label>Total Watt-hour per Day</label></h4>
    <input type="number" name="twatth" id="quant">
   <h4> <label>Total Watt-hour per Hour</label></h4>
    <input type="number" name="twatthp" id="quant"><br><br>
</div>
<div class="jay"><ul><li><c><input type="submit" value="Calculate" id="cal"></c></li></ul></div><br><br><br>

<br><br><br>
<!--Section 2-->
<ul>
<li><b><label> <h4>Solar Panel Type</h4></label></b><br>
    <ul>
        <li>
<select name="panel" id="panel">
  <input type="radio"  name="panel1" value="">250W</option>
  <input type="radio" name="panel2" value="">500w</option>
</select></li>
</ul>
</li>

<li><label><h4><b>Sun Exposure per day</h4></label></b><br>
<ul>
    <li>
    <select name="hours4" id="quant">
    <option value="">1</option><option value="">2</option><option value="">3</option>
    <option value="">4</option><option value="">5</option><option value="">6</option>
    <option value="">7</option><option value="">8</option><option value="">9</option>
    <option value="">10</option><option value="">11</option><option value="">12</option>
    <option value="">13</option><option value="">14</option><option value="">15</option>
    <option value="">16</option><option value="">17</option><option value="">18</option>
    <option value="">19</option><option value="">20</option><option value="">21</option>
    <option value="">22</option><option value="">23</option><option value="">24</option>
</select>
</li>

</ul>
</li>
<li>
        <b><label for=""><h4>Solar Pannels Required</h4></label></b><br>
    <ul>
    <li><input type="number" name="solar" id="quant"></li>  
  

    <div class="jay"><ul><li><c><input type="submit" name="calculate2" value="Calculate" id="cal"></c></li></ul>

</ul>
</li>
</ul>
</form>
</div> 

<br><br><br><br><br><br>
            <div id="foot-icons">
             <img src="https://res.cloudinary.com/burinious/image/upload/v1569291583/solar%20icons/icons8-facebook-f-24_dorknm.png"
                    alt="some text" width=30 height=30>
                <img src="https://res.cloudinary.com/burinious/image/upload/v1569291582/solar%20icons/icons8-twitter-50_kib9j7.png"
                    alt="some text" width=30 height=30>
                <img src="https://res.cloudinary.com/burinious/image/upload/v1569291585/solar%20icons/icons8-instagram-50_wdhyem.png"
                    alt="some text" width=30 height=30>
                </footer>
            </div>
</body>
</html>