<?php include "header.php"; ?>

<div class="wrapper">

    <div class="row">
    <div class="large-12 columns blgcontent">
        
        <div class="row">  
          <div class="small-12 black-ribbon">
              <a href="index.php"><img class="bookmark" src="images/bookmark.png" /></a>
          </div>
        </div>
        
        <div class="row">
            <div class="small-8 small-centered columns blog-head">

                <div class="row">                    
                    <div class="small-12 medium-10 columns line">
                        <h1>Green Vendors</h1>
                        
                        <p><span class="by">By</span> <span class="name">Shannon Quinn</span></p>

                        <div class="divline"></div>
                        
                        <div class="row">                         
                            <div class="medium-4 columns date-cont">
                                <img src="images/clock.png" />
                                <span class="date"> May 26, 2014</span>
                            </div>
                            
                            <div class="medium-4 columns comments-cont">
                                <img src="images/comments.png" />
                                <label class="comments"></label>
                            </div>

                            <div class="medium-4 columns"></div>
                        </div>
                    </div>

                    <div class="small-12 medium-2 columns auth-img">                      
                        <img src="images/shannon2.png">
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="small-8 small-centered columns blog-content">
                <p>One of the main focusses of The Stop Night Market is highlighting environmentally conscious food and drink vendors. With that, there are some great environmentally friendly food options at this year’s Night Market, and I’d like to share my favorite green vendors with you!</p>
                <p>First, there is BC based Blue Goose - “From farm to fork with nothing in-between”. Blue Goose grow, process, and package their own beef, chicken, and fish, all through a process of Vertical Integration. Their unique process entails that they themselves take care of each step of the process of preparing meat products, and therefore are in complete control of keeping their food natural and sustainable. Blue Goose has designed Vertical Integration to ensure quality animal living standards and conditions, healthy diet and nutrition, humane treatment (influenced by the practices of Temple Grandin), and official recognition by organic authorities. With that, I’m very excited that Blue Goose has made it to the Night Market, for meat-eaters who are looking for sustainable and ethical options.</p>
                
                <p>Next, I would like to talk about Tori’s Bakeshop! My sweet tooth aches for this one. Tori’s Bakeshop is all about the environment. Being eco-friendly and all-natural organic means you can have your cake and eat it too (see what I did there?). This bakery offers dairy-free, egg-free, casein-free, refined sugar-free, and a variety of gluten-free treats. Refined sugar-free? How do they even do that? Tori’s pays close attention to how their ingredients are sourced, how much packaging is used, and how much waste they produce. Donuts, cinnamon buns, cupcakes, cookies, muffins, and scones, is your mouth watering yet? See you at the Night Market, Tori’s Bakeshop!</p>
                
                <p>Last but not least, there’s Toronto’s Actinolite. These guys know a thing or two about being green. Their focus is bringing urban gardens to the table for fresh and local menu options that evolve with seasonal availability. They believe that fresh tastes better, and constantly seek high-quality ingredients, visiting farmers markets and the actual town of Actinolite where the restaurant got its name. I’d LOVE to try their squid with wild ginger and peas, or the pike with knotweed, watercress, and elm. Look for Actinolite at this year’s Night Market and enjoy some environmentally friendly goodness!</p>
                
<p>These are only a few of the Night Market’s amazing vendors. The best way to find even more great green vendors is to head out to the Market yourself and try some fantastic food. Keep greening!
</p>
            </div>
        </div>

        <div class="row">
            <div class="small-8 small-centered columns blog-content">

                <div id="comment_engine">
                    <h2 class="name">So, What do you think?</h2>

                    <div id="ce_list">                      
                    </div>

                    <form name="ce_form" id="ce_form" method="post" action=" ">

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
