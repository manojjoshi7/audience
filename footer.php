<script type="text/javascript">
      $(function(){
          $('.showLLA').on('click',function(e){
              var $thisEle = $(this);
              //Hide Already Open TD (LLA)
              $('.have_LLA_item').hide("slow");
              $(".btn").removeClass("btn-success").addClass('btn-info');
              var dataVal = $(this).attr("href");
              dataVal = dataVal.replace("#","");
              $('tr').filter(function(){
                  $thisEle.removeClass("btn-info").addClass('btn-success');
                 return $(this).attr('data-CAkey') === dataVal;
             }).show('fast');
              //alert(dataVal);
             e.preventDefault();
          });
      });
  </script>
  <!-- End of scripts -->
  <!--Boot Strap -->
  <script type="text/javascript"  src="https://app.redretarget.com/camodule/audience/js/bootstrap.min.js"></script>


</body>
</html>