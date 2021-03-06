<?php include "header.php"; ?>

<div class="wrapper">

    <div class="row">
    <div class="large-12 columns blgcontent">
        
        <div class="row">  
          <div class="small-12 black-ribbon">
              <a href="index.php"><img class="bookmark" src="images/bookmark.png" alt="[image] bookmark icon" /></a>
          </div>
        </div>
        
        <div class="row">
            <div class="small-8 small-centered columns blog-head">

                <div class="row">                    
                    <div class="small-12 medium-10 columns line">
                        <h1>Rose &amp; Sons, Carmen</h1>
                        
                        <p><span class="by">By</span> <span class="name">Jacqueline Liu</span></p>

                        <div class="divline"></div>
                        
                        <div class="row">                         
                            <div class="medium-4 columns date-cont">
                                <img src="images/clock.png" alt="[image] clock icon" />
                                <span class="date"> May 26, 2014</span>
                            </div>
                            
                            <div class="medium-4 columns comments-cont">
                                <img src="images/comments.png" alt="[image] comments icon" />
                                <label class="comments"></label>
                            </div>

                            <div class="medium-4 columns"></div>
                        </div>
                    </div>

                    <div class="small-12 medium-2 columns auth-img">                      
                        <img src="images/jackie2.png" alt="[image] Portrait Jacqueline Liu">
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="small-8 small-centered columns blog-content">
                <p>Toronto's <span class="emph">Night Market</span> is an annual summer event offering a healthy selection of not-so-healthy delicacies. Once again, the fab foodie fest presented by <span class="emph">The Stop</span> features 60+ participating chefs, taking place over two nights (June 17 and 18) in the ample alleyway behind the late <span class="emph">Honest Ed's</span> discount megastore. Tickets cost $65 per night for an all-you-can-eat/drink overload, and unsurprisingly sold out within the morning of their opening sale on May 1. Spin through the Night Market's stylish and fun interactive <a href="http://nightmarket.thestop.org/">website</a>.</p>

                <p>One of the standout participants for 2014 is <span class="emph">Rose &amp; Sons</span>, a small but beloved Annex brunch hotspot. Its slightly tight diner-style layout of booths and barstools may require a wait on weekends, but your patience will be paid off. The indulgent eats of owner Anthony Rose's menu stretch the definitions of breakfast with a beefy patty melt, syrupy bread pudding, and brisket on cornbread leaving the hungriest brunch-goers satisfied. Even the Caesar follows suit with the eyeball-popping additions of a speared pickle and sausage on top of the heavily salt and peppered glass. Ready your taste buds to feel the heat!</p>

                <p class="imgContent"><img src="images/ceasar.jpg" alt="[image] Ceasar from Rose &amp; Sons"  /></p>

                <p>For carnivorous cravers --- or anyone nursing a hangover --- these meaty dishes will surely do the trick. The brisket is prepared with tender love and care, falling off the fork in perfect bite-sized flakes while providing the perfect foil for the cornbread. This should come as no surprise to anyone who's had the pleasure of pigging out at <span class="emph">Big Crow</span>, Rose's equally mouth watering (and meat heavy) restaurant located directly behind Rose &amp; Sons. Downtown dwellers won't regret the trip up to Dupont.</p>

                <p>From the south side of the city, another vendor to look for at Night Market this year is <span class="emph">Carmen Cocina Española</span>. Located on a block packed with excellent eateries at Queen and Shaw, Carmen sits on the fancier end of the food spectrum, yet offers a wide range of tasting-style Tapas options sure to please even the most particular. The Tentempi&eacute; de Ceviche (white fish Ceviche on beds of Boston lettuce) is a tasty treat to whet the palette, while the "Antoni Gaudi" (Wild B.C. sockeye salmon in gazpacho sauce and a side of Gaudi-esque vegetable --- whatever that means) is another excellent choice for the Pescatarians in your party.</p>
                
                <p>However, the Paella del Carmen truly lives up to its name-brand specialty with an unbelievably rich stew of shrimp, clams, mussels, scallops, chorizo, chicken and saffron. It's $45 well spent, and in the humble opinion of this seasoned Toronto eater, one of the most delicious food items that can be found anywhere in the city.</p>
            </div>
        
        <div class="row">
            <div class="small-8 small-centered columns blog-content">
                <div class="fb-share-button" data-href="http://markisveen.com/nightMarket/index.php" data-type="button"></div>
            </div>
        </div>

        </div>

        <div class="row">
            <div class="small-8 small-centered columns blog-content">

                <div id="comment_engine">
                    <h2 class="name">So, What do you think?</h2>

                    <div id="ce_list">                      
                    </div>

                    <form name="ce_form" id="ce_form" method="post" action=".">

                      <div class="row">
                        <div class="large-12 columns">
                      
                            <input class="r_input" type="text" name="ce_name" id="ce_name" placeholder="Your name" />
                          
                        </div>
                      </div>

                      <div class="row">
                        <div class="large-12 columns">
                        
                            <input class="r_input"  type="text" name="ce_email" id="ce_email" placeholder="Your email" />
                          
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="large-12 columns">
                        
                            <textarea class="r_input"  name="ce_comment" id="ce_comment" placeholder="Your comment"></textarea>
                         
                        </div>
                      </div>

                    <input type="submit" id="reply_submit" value="Add Comment"/>

                    </form>
                </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        
        $('#ce_form').submit(function(){
           validateForm();
            ceAddComments();
            document.getElementById("ce_form").reset();
            return false;
        });
        
        ceLoadComments();
    
    });
    
    
    function validateForm()
    {
        var name = document.forms["ce_form"]["ce_name"].value;
            var email = document.forms["ce_form"]["ce_email"].value;
            var comment = document.forms["ce_form"]["ce_comment"].value;
            if(name==null || name=="")
            {
                alert("Please enter your name");
                return false;
            }
            if(email==null || email=="")
            {
                alert("Please enter your email");
                return false;
            }
            else
            {
                var atpos = email.indexOf("@");
                var dotpos = email.lastIndexOf(".");
                if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
                {
                    alert("Not a valid e-mail address");
                    return false;
                }
            }
            if(comment==null || comment=="")
            {
                alert("Please enter your comments");
                return false;
            }
        
    }
    
    function ceLoadComments()
    {
      $.ajax({
          url:"ce/loadComment.php",
          dataType: "json",
          success:function(data){
              $('#ce_list').html("<ul></ul>");
              
              $.each(data,function(){
                  console.log(this.name);
                  $('#ce_list ul').append("<li>"+this.name+"<br />"+this.comment+"<br/>Posted: "+this.date+"</li>");
              });
              
          }
      });
    }
    
    function ceAddComments()
    {
        $.ajax({
                data:{
                    name:$("#ce_name").val(),
                    email:$("#ce_email").val(),
                    comment:$("#ce_comment").val()},
                    url:"ce/addComment.php",
                    dataType:"json",
                    success:function(data){
                        ("#ce_name").val="";
                        ("#ce_comment").val="";
                        if(data.result == true)
                            ceLoadComments();
                }});
    }
</script>
    
            </div>
        </div>

    </div>
    </div>
</div>

<?php include 'footer.php'; ?>
