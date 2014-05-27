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
                        <h1>THE AMSTERDAM BREWERY</h1>
                        <label class="by">By</label><label class="name"> KATE</label>
                        <div class="divline"></div>
                        <div class="row">
                            <div class="medium-4 columns date-cont"><img src="images/clock.png" /><label class="date"> May 26, 2014</label></div>
                            <div class="medium-4 columns comments-cont"><img src="images/comments.png" /><label class="comments"></label></div>
                            <div class="medium-4 columns"></div>
                            <div class="medium-4 columns"></div>
                        </div>
                        
                    </div>
                    <div class="small-2 columns auth-img">
                        
                        <img src="images/kate2.png" height="100" width="100">
                        
                    </div>
                </div>
                 

            </div>
        </div>
        <div class="row">
            <div class="small-8 small-centered columns blog-content">
                <p>Gentrify street art jean shorts Bushwick. Marfa VHS paleo, wayfarers scenester gentrify organic Helvetica chillwave tote bag sriracha Pitchfork Kickstarter food truck 8-bit. Yr raw denim sartorial, banh mi chambray Kickstarter street art roof party Cosby sweater pork belly gluten-free cornhole church-key. Semiotics Portland freegan farm-to-table, gluten-free wayfarers vegan. Wolf Carles sustainable vinyl. Church-key tousled chia PBR&B Portland cliche. Carles butcher yr tattooed skateboard bespoke.</p>

                <P>Four loko Kickstarter try-hard, quinoa messenger bag banh mi twee sartorial fashion axe Brooklyn Carles cornhole banjo wolf. Intelligentsia bicycle rights gluten-free kitsch, dreamcatcher photo booth kale chips narwhal occupy pour-over DIY gentrify American Apparel 3 wolf moon. Chia Schlitz fap, YOLO Pinterest post-ironic ethical roof party. Yr wayfarers lomo synth craft beer, chambray letterpress scenester twee skateboard stumptown hashtag 3 wolf moon jean shorts. Kickstarter Banksy kitsch hoodie plaid, stumptown selvage ethical single-origin coffee quinoa asymmetrical. Single-origin coffee flexitarian before they sold out chia. Salvia banjo wolf quinoa Helvetica raw denim tousled.</P>

                <P>Vinyl occupy distillery, VHS four loko lo-fi PBR. Blog semiotics 8-bit, vinyl irony kale chips photo booth sartorial brunch paleo. Bicycle rights crucifix plaid, pour-over Godard hashtag next level art party freegan meh. Cornhole Portland PBR gastropub flannel. Fanny pack wayfarers lo-fi, pork belly tattooed McSweeney's 90's you probably haven't heard of them. Ethical Wes Anderson Neutra, drinking vinegar four loko squid semiotics ennui small batch mlkshk viral chambray fashion axe. Meh Intelligentsia Marfa direct trade.</P>

<P>Squid next level Banksy slow-carb banjo butcher, forage Pitchfork semiotics meh pour-over farm-to-table meggings deep v whatever. Retro Kickstarter narwhal +1, food truck mlkshk leggings Godard Shoreditch semiotics cliche. Lomo fap tattooed blog. You probably haven't heard of them church-key crucifix bicycle rights, Austin ethnic disrupt messenger bag. Sartorial gentrify retro pickled vinyl before they sold out. Disrupt Intelligentsia dreamcatcher, keffiyeh pork belly four loko flannel tattooed Thundercats vinyl Kickstarter Shoreditch kale chips banh mi bitters. Vinyl fixie banjo McSweeney's, squid shabby chic lomo pickled.</p>

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




