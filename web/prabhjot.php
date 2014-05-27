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
                        <h1>REUNION ISLAND COFFEE</h1>
                        <label class="by">By</label><label class="name"> PRABHJOT MAND</label>
                        <div class="divline"></div>
                        <div class="row">
                            <div class="medium-4 columns date-cont"><img src="images/clock.png" /><label class="date"> May 26, 2014</label></div>
                            <div class="medium-4 columns comments-cont"><img src="images/comments.png" /><label class="comments"></label></div>
                            <div class="medium-4 columns"></div>
                            <div class="medium-4 columns"></div>
                        </div>
                        
                    </div>
                    <div class="small-2 columns auth-img">
                        
                        <img src="images/prabhjot2.png" height="100" width="100">
                        
                    </div>
                </div>
                 

            </div>
        </div>
        <div class="row">
            <div class="small-8 small-centered columns blog-content">
                <p>Reunion Island Coffee is a Canadian company that is founded on marvelous principles. It's not just about high-quality coffee - they really are stanch to sustainability, from auxiliary co-op farmers and fair profession to promoting liable farm administration. They support the Rainforest Alliance, and use Bullfrog Power in their Canadian sweltering operation. With fair trade and organic certified coffees, Reunion Island is bringing us astounding brews with zero culpability factors.</p>

                <P>Out of a bag of Reunion Island Coffee, and let me tell you, it is a thorny decision on which variety to choose. They have everything from the more stock to the exotic - I tried to count the available varieties and came up with ninety-six plus twenty-six kinds of pods! Um, wow. </P>

                <P>Although tempted by the gingered varieties, I went with the Siesta Decaf. It's a nice, bright, medium-light roast that is a perfect contrast to the dark and bold roast that is my regular brew. I'm a serious coffee lover - I grind fresh beans and make a cappuccino every morning with my beloved espresso machine, so I feel qualified to say that the Siesta Decaf is a lovely bean. It doesn't have the 'flat' flavour that is often found in a lighter roast; instead it has a robust flavour, just lighter. It is decaffeinated with the Swiss Water process (in British Columbia!), which uses no chemicals to remove the caffeine and also ensures the flavour stays at its fullest (some other decaffeinating methods which use chemicals also alter the flavour of the bean).</P>

<P>The quality of the coffee is a major selling point, but what tips the balance with Reunion Island Coffee for me is their commitment to better lives and a better world. I was thrilled to review the experiences of the workers as well as the customers associated with such an impressive Canadian company, and would honestly recommend their products.</p>

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



