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
                        <h1>The Amsterdam Brewery</h1>
                        
                        <p><span class="by">By</span> <span class="name">Kate Gollogly</span></p>

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
                        <img src="images/kate2.png">
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="small-8 small-centered columns blog-content">
                <p>With so many beers to choose from, where do I begin?</p>
                <p><span class="enlarge">ATTENTION BEER LOVERS</span>, while visiting <i>The Stop’s Night Market</i>, you must check out what The Amsterdam Brewery has to offer. </p>
                <p>"They have a little something for everyone when it comes to beers. At the Amsterdam Brewery, beer is clearly the focal point as there's a wide selection of draft, cask offerings, seasonals, and even bottles from the cellar. As a creative way to sample your way through the beer menu, The BrewHouse offers a series of tasting flights, each named with a nod to the brewery's past: there's the Richmond and John, the King and Portland, the Front and Bathurst, and the Leaside." - blogTO</p>
                <p>If you have not yet visited one of Toronto’s original craft brewer’s locations, you must go. Here are a few reasons why:</p>
                <ol>
                    <li>Free tours and tastings every Saturday!</li>
                    <li>Fancy a beer by the fire? Or a cold brew outside while lounging on a Muskoka chair with a beautiful view of the water? Yes, that’s right, lakeside patio at your service.</li>
                    <li>Did I mention they have their own beer store, which is open until 11pm and open on holidays?</li>
                </ol>
                <p>What’s not to love?</p>
                <p>"The Amsterdam Brewing Company is an independently owned and operated craft brewery that is deeply rooted in the city of Toronto. A pioneer of the Canadian craft beer revolution in 1986, initially called the Amsterdam Brasserie and Brew Pub, The Amsterdam was the first craft brewery in Toronto. All beers are GMO free, without preservatives, and never heat pasteurized. Back to their roots as a brewpub, Amsterdam Brewery now pours its brews at Amsterdam BrewHouse.” -torontobeerblog </p>
                <p>To learn more about the Amsterdam Brewing Co. visit <a href="http://www.amsterdambeer.com/" target="_blank">amsterdambeer.com</a>.</p>
                <p>To learn more about Amsterdam BrewHouse, visit <a href="http://www.amsterdambrewhouse.com/" target="_blank">amsterdambrewhouse.com</a>.</p>
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
