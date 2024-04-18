<?php
include "Functions.php";
acthead("Activities");
?>

<body>
    <div id="header">
        <h1 class="actorman">ACTIVITIES OF ORMAN</h1>
        <p>Remember that the happiest people are not those getting more, but those giving more. </p>
          </div>
        <div class="card-container">
        <div class="card" id="hunger">
          <div class="card-image">
            <img src="images/hunger.jpg">
          </div>
          <div class="card-text">
            
            <h2 class="card-title">Ending Hunger and Poverty</h2>
            <p class="card-body">Food is national security. Food is economy. It is employment, energy, history .Food is everything.</p>
            
            <form action="Ending hunger and Poverty.php" method="post">
            <button class="card-button" >Explore</button>
            </form>


            
          </div>

          
        </div>
          <div class="card" id="cities">
          <div class="card-image">
            <img src="images/cities.jpg">
          </div>
          <div class="card-text">
            
            <h2 class="card-title">Sustainable Cities and Communities</h2>
            <p class="card-body">Sustainability is the key to creating thriving cities and communities</p>
            <form action="Sustainable Cities and Communities.php" method="post">
            <button class="card-button" >Explore</button>
            </form>
          </div>
          
        </div>
          <div class="card" id="education">
          <div class="card-image">
            <img src="images/eduction.jpg">
          </div>
          <div class="card-text">
            
            <h2 class="card-title">Well Education</h2>
            <p class="card-body">Education is the kindling of a flame, not the filling of a vessel</p>
            <form action="Well Education.php" method="post">
            <button class="card-button" >Explore</button>
            </form>
          </div>
          
        </div>
          <div class="card" id="health">
          <div class="card-image">
            <img src="images/good health.webp">
          </div>
          <div class="card-text">
            
            <h2 class="card-title">Good Health and Well-Being</h2>
            <p class="card-body">Ensure healthy lives and promote well-being for all at all ages</p>
            <form action="Good Health and Well-Being.php" method="post">
            <button class="card-button" >Explore</button>
            </form>
          </div>
       
        </div>
        <div class="card" id="orphans">
            <div class="card-image">
              <img src="images/orphan.jpg">
            </div>
            <div class="card-text">
             
              <h2 class="card-title">Orphans</h2>
              <p class="card-body">Orphaned children need support from their communities, whether it's through adoption, or other forms of assistance</p>
              <form action="Orphans.php" method="post">
            <button class="card-button" >Explore</button>
            </form>
            </div>

            
          </div>
          <div class="card" id="economy">
            <div class="card-image">
              <img src="images/economy.jpg">
            </div>
            <div class="card-text">
              
              <h2 class="card-title">Decent Work and Economic Growthy</h2>
              <p class="card-body">can provide economic opportunities for everyone and help more people to escape poverty.</p>
              <form action="Decent Work and Economic Growth.php" method="post">
            <button class="card-button" >Explore</button>
            </form>
            </div>
            
          </div>
          
        
        </div>
        <?php
foot()
?>