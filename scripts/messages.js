$(document).ready(function(){
     
         
   $("#button").click(function(){
   $("#popur_messages").css("display","block"); 
    $("#popur_messages").show("fast");
      $("#hover").css("display","block");
   });
 
$('#novosti_3').scrollTop(400);

$("#submit_messs").click(function(event){
       event.preventDefault();
       var author=$("#author").val();
       var poluchatel=$("#poluchatel").val();
         var mess=$("#messs").val();
       
       $.ajax({
          type:"post",
          url:"setting/action_message.php",
          data:{
              author:author,
              poluchatel:poluchatel,
              mess:mess
           
          },
          success:function(data){
                   $('#messs').val('');
             $(".inform_mess").html(data); 
          }
       });
   });
   $("#submit_5").click(function(event){
       event.preventDefault();
       var author=$("#author").val();
       var poluchatel=$("#poluchatel").val();
         var textarea=$("#textarea").val();
       
       $.ajax({
          type:"post",
          url:"action_messages_2.php",
          data:{
              author:author,
              poluchatel:poluchatel,
              textarea:textarea
           
          },
          success:function(data){
             $("#inform_3").html(data); 
          }
       });
   });
    
});