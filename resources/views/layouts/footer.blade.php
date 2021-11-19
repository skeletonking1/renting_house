
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    @if ((request()->route()->getName()) === 'top')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/vendors/scrolloverflow.min.js" integrity="sha512-FzESM/E7XJBqcJyrXa08gRcpp5rDHO661C0L3vH4NsZfUWUsjN4+t6Lg8h+e8TMR2aYijIrcT+CPGq7tSugRzA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/jquery.fullpage.min.js" integrity="sha512-bxzECOBohzcTcWocMAlNDE2kYs0QgwGs4eD8TlAN2vfovq13kfDfp95sJSZrNpt0VMkpP93ZxLC/+WN/7Trw2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ URL::asset('js/top.js') }}" async defer></script>
    @endif
    <script src="{{ URL::asset('js/common.js') }}" async defer></script>
    @if ((request()->route()->getName()) === 'case-study')
    <script>
      function fetch_data(page,area,amount,housetype)
      {
        let url = "/case-study?page="+page;
        url=url+"&area=";
        ( typeof(area) ==='undefined'||area==='' ) ?  url=url+null : url=url+area;
        url=url+"&amount=";
        ( typeof(amount) === 'undefined' || amount === '' ) ? url=url+null : url+=amount;
        url=url+"&housetype=";
        ( typeof(housetype) ==='undefined'||housetype==='' ) ? url=url+null : url+=housetype;
        console.log(url);
        $.ajax({
            url:url,
            method:"GET",
            success:function(data){
              $('.content search-result').html(data);
            },
            error:function(err){
              console.log(err);
            }
        })
      }
      $('#searchButton').click(function(e){      
        var index = 0;
        $("#areas input[type=radio]:checked").each(function () {
          console.log(this.value)
        });
        $("#amounts input[type=radio]:checked").each(function(){
          console.log(this.value)
        })
        $('#housetypes input[type=radio]:checked').each(function(){
          console.log(this.value)
        });
        page = 1;
        fetch_data(page,area,amount,housetype);
      })  
      $(document).on('click', 'a .btn', function(event){
        event.preventDefault(); 
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page,area,amount,housetype);
      });
    <script>
    @endif
    @if ((request()->route()->getName()) === 'case-study-single')
    <script>
      $(document).ready(function() {
        let result = <?php echo json_encode($result)?>;
        console.log(result);
        $('#firstview').html('<img src="'+result.firstview_url+'"/>');
        $('#instruction_bg').html('<img src="'+result.instruction_bg_url+'"/>');
        $('#post_introduction_bg').html('<img src="'+result.post_introduction_url+'"/>');
        $('#eyecatch_image').html('<img src="'+result.eyecatch_image_url+'"/>');
        
      });
    </script>
    @endif
  </body>
</html>