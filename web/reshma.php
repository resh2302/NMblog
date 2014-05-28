<?php

include "header.php";

?>
<div class="wrapper">
    <div class="row">
    <div class="large-12 columns blgcontent">
        <div class="black-ribbon">
<!--            <img class="bookmark" src="images/bookmark.png" />-->
        </div>
        <div class="row">
            <div class="small-8 small-centered columns blog-head">
                <div class="row">
                    <div class="small-10 columns line">
                        <h1>THE MARKET</h1>
                        <label class="by">By</label><label class="name"> RESHMA MATHEW</label>
                        <div class="divline"></div>
                        <div class="row">
                            <div class="medium-4 columns date-cont"><img src="images/clock.png" /><label class="date"> May 26, 2014</label></div>
                            <div class="medium-4 columns comments-cont"><img src="images/comments.png" /><label class="comments"></label></div>
                            <div class="medium-4 columns"></div>
                            <div class="medium-4 columns"></div>
                        </div>
                        
                    </div>
                    <div class="small-2 columns auth-img">
                        
                        <img src="images/reshma2.png" height="100" width="100">
                        
                    </div>
                </div>
                 

            </div>
        </div>
        <div class="row">
            <div class="small-8 small-centered columns blog-content">
                <p>The Night Market is an event organized by The Stop. All proceedings from the event's benefit will be used in The Stop's initiatives of anti-hunger and anti-poverty programs.</p>

<p>The Stop is a community food centre that encourages increasing access to healthy food. It has programs for everybody in the community to participate, so no matter what age group you are in you can still participate in contributing to The Stop's initiatives. </p>

<p>Other than the programs The Stop also organizes three food markets - Eat Local Taste Global, Good Food Market and Bake oven and The Stop's Farmer's Market at Wychwood Barns. I'm briefly going to talk about the first one Eat Local, Taste Global.</p>

<p>Eat Local, Taste Global was launched by Stop to demonstrate and encourage the local farmers of Ontario to grow vegetables and fruits from places around the world locally. This initiative is run in partnership with the Vineland Information and Research Centre. A rich variety of vegetables from all over the world are available to us in Toronto. The demographics of Toronto make Toronto one of the most multicultural cities in the world. This is why I love this city, not encouraging growing world crops here would be a crime.  A lot of farmers today are growing world crops here in Ontario. This provides us with fresh and nutritious food along with reducing the cost of import. Okra, bok choy, bottle gourd, and yard-long beans are some of the world crops the farmers are growing in Ontario. </p>

<p>People from different cultures get to enjoy their culture in the food and restaurants serving their cuisine. Every month GTA residents spend $61 million on Chinese, South Asian and African-Caribbean fruits and vegetables. Even if 10% of these are produced in Ontario we could generate major opportunities for the farmers and save a lot of fuel and have nutritional and tasty food. The Eat local, Taste Global project is helping the two ends meet – the farmers who grow these world crops locally and the consumers who want to purchase them.</p>

<p>The project also encourages and helps share recipes for cooking these vegetables. So this also benefits the people who know that they want to buy these vegetables for health benefits but do not know how to cook them. </p>

<p>For recipes and to know more about the project go to the official website of The Stop at <a href="http://thestop.org/eat-local-taste-global" target="blank">http://thestop.org/eat-local-taste-global</a></p>

            </div>
        </div>
        <div class="row">
            <div class="small-8 small-centered columns">
                <div id="comment_engine">
<h2>Comments</h2>
<div id="ce_list">
    
</div>

<form name="ce_form" id="ce_form" method="post" action=" ">
    Name:<br />
    <input type="Text" name="ce_name" id="ce_name"/>
    <br />
    
    Email:<br />
     <input type="Text" name="ce_email" id="ce_email"/>
    <br />
    
    Comment:<br />
    <textarea name="ce_comment" id="ce_comment"></textarea>
    
    <br />
    
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




