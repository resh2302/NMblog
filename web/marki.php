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
                        <h1>Pizzeria Libretto</h1>
                        
                        <p><span class="by">By</span> <span class="name">Marki Sveen</span></p>

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
                        <img src="images/marki2.png">
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="small-8 small-centered columns blog-content">
                <p>On the popular Ossington strip between Dundas and Queen, one restaurant smokes out the rest. Pizzeria Libretto provides some of the best thin-crust pies in the city with a fresh and delicious range of topping options. Chefs Rocco Agostino and Max Rimaldi pride themselves on their traditional Neapolitan approach, using local ingredients and a wood fired oven with extremely high heat. At 900 degrees, baking time takes less than 90 seconds, and results in a crust charred to perfection.</p>

                <p>For an appetizer, calamari is offered breaded with buttermilk and a red pepper almond sauce, or grilled with chickpeas and dandelion greens. When it’s time for the main course, the white anchovy pizza with tomato, red chili and Buffalo mozzarella or duck confit with bosc pear are both solid picks. However, it doesn’t get any better than Libretto’s house-made sausage. This simple recipe with caramelized onions, mozzarella and chili oil is a consistently delicious go-to slice.</p>

                <p>Paulette’s Donuts originally made its name with a mash-up combination of baked sweets and fried chicken. Sadly, they’ve since dropped the poultry half of the equation, but their sugary side is still going strong with unusual options such as the Root Beer Float, Blueberry Balsamic, Candy Apple, Mango Lassi, and Mojito. These days, the hole-y grails can be gripped at both the Yonge Street and Queen East locations of Delica Kitchen, or ordered online for special events. For a sweet treat at the Night Market, make sure you don’t skip past Paulette.</p>

                <p>For BBQ cravers, Barque is a no-brainer. The Roncesvalles smokehouse tavern is best known for its “Family Night” offered every Sunday with hefty portions made for heftier appetites. Loosen your pants and make room for multiple courses featuring a rotating menu of Southern-style sauce-slathered baby back ribs, chicken, brisket, wings, chili cheese fries, and maybe even something green. Desserts range from dark chocolate brownies to red velvet cookie sandwiches with more cream cheese than a Tim Horton’s bagel.</p>

                <p>Of course, these are merely three of the many restaurants taking part in the Night Market for 2014. At least half the fun of this kind of event comes from exploring and discovering a few new favourites. If one tip can be passed along to a first-timer, make sure you pace yourself (and leave room for dessert)!</p>
            </div>
        </div>

        <div class="row">
            <div class="small-8 small-centered columns blog-content">

                <div id="comment_engine">
                    <h2 class="name">Comments</h2>

                    <div id="ce_list">                      
                    </div>

                    <form name="ce_form" id="ce_form" method="post" action=" ">

                      <div class="row">
                        <div class="large-12 columns">
                          <label>Name:
                            <input type="text" name="ce_name" id="ce_name" />
                          </label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="large-12 columns">
                          <label>Email:
                            <input type="text" name="ce_email" id="ce_email" />
                          </label>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="large-12 columns">
                          <label>Comment:
                            <textarea name="ce_comment" id="ce_comment"></textarea>
                          </label>
                        </div>
                      </div>

                    <input type="submit" value="Add Comment"/>

                    </form>
                </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        
        $('#ce_form').submit(function(){
            ceAddComments();
            return false;
        });
        
        ceLoadComments();
    
    });
    
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



