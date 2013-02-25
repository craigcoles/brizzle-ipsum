$(document).ready(function() {

  // JQUERY LIPSUM
  $("#generate").click(function() {
    paragraphs = $("#paragraphs").val();
    type = $("input:radio[name=type]:checked").val();
    startWith = ($("#start-with-luvver").attr("checked") == "checked") ? true : false;

    $.ajax({
      type: 'GET',
      url: "/get/?paras="+paragraphs+"&type="+type+"&start-with-luvver="+startWith,
      dataType: "html",
      success: function(html){
        $('.output').html(html);   
      },
      error: function(){
        alert('Whoa! HTTP bailed! Try again.');
      }
    });
    $(".output").show();
    return false;
  });

});
