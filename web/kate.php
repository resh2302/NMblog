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
                <p>Place content here.</p>
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
