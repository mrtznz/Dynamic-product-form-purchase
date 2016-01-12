$( document ).ready(function() {

          // On click radio, image or price, selected product radio button is checked 
              $('#radio1, #img1, .price-50').click(function() {
              $('.price-50').addClass("checked");  
              $('.price-135, .price-240').removeClass("checked");
              $('#radio1').prop("checked",true);
              $('#radio2, #radio3').prop("checked",false);              
          });
              $('#radio2, #img2, .price-135').click(function() {
              $('.price-135').addClass("checked");
              $('.price-50, .price-240').removeClass("checked");
              $('#radio2').prop("checked",true);
              $('#radio1, #radio3').prop("checked",false);
          });
              $('#radio3, #img3, .price-240').click(function() {
              $('.price-240').addClass("checked");
              $('.price-50, .price-135').removeClass("checked");
              $('#radio3').prop("checked",true);          
              $('#radio1, #radio2').prop("checked",false); 
          });          
            
          //-----------------------------------------------------------------------
          // 1) Retrieve DATABASE data for PRICES
          //-----------------------------------------------------------------------
          $('.loaderImage').show();
          $('.loadersmImage').show();

          $.ajax({                                      
              url: 'backend/api.php',               //the script to call to get data          
              data: "",                             
              dataType: 'json',                     //data format      
              success: function(data)               //on recieve of reply
              {
                $('.loaderImage').hide();
                $('.loadersmImage').hide();

                // assign variables to json array elements 
                var price1 = data[0][0];           //get price
                var price2 = data[0][1];           //get price
                var price3 = data[0][2];           //get price
                var ship_us = data[0][3];          //get shipping
                var ship_can = data[0][4];         //get shipping
                var ship_col = data[0][5];         //get shipping
                var ship_esp = data[0][6];         //get shipping
                var country_us = data[1][0];       //get country
                var country_can = data[1][1];      //get country
                var country_col = data[1][2];      //get country
                var country_esp = data[1][3];      //get country 
        
                //--------------------------------------------------------------------
                // 2) Assign data values for price and shipping
                //--------------------------------------------------------------------
                $('.price-50').html("$" + price1); //Set output element html
                $('.price-135').html("$" + price2); //Set output element html
                $('.price-240').html("$" + price3); //Set output element html
                   
                // Display order price and shipping depending on product selection
                
                // default value
                if($('.price-50').hasClass("checked")) { 
                    $('.order-price').html(price1); 

                }
                $('#radio1, #img1, .price-50').click(function() {
                  if($('.price-50').hasClass("checked")) { 
                    $('.order-price').html(price1);          
                    $('.order-price').trigger('contentchanged');
                }
                });
                $('#radio2, #img2, .price-135').click(function() {
                  if($('.price-135').hasClass("checked")) { 
                    $('.order-price').html(price2);                 
                    $('.order-price').trigger('contentchanged');
                }
                });
                $('#radio3, #img3, .price-240').click(function() {
                  if($('.price-240').hasClass("checked")) { 
                    $('.order-price').html(price3);                    
                    $('.order-price').trigger('contentchanged');
                }
                }); 
                
                // Populate country select
                var option = '';
                for (var i=0; i < data[1].length; i++){
                   option += '<option value="'+ data[1][i] + '">' + data[1][i] + '</option>';
                }
                $('#country').append(option);
               
                // Detect whichever element is selected on input country
                $("select").change(function() {
                  var str = "";
                  $( "select option:selected" ).each(function() {
                  str += $( this ).text() + " ";
                  });

                // Assign shipping prices depending on country selection
                
                // default value
                $(".order-shipping").html(ship_us);

                if (str.indexOf("US") >= 0){
                    $('.order-shipping').html(ship_us);
                    $('.order-shipping').trigger('contentchanged');
                }                
                if (str.indexOf("CANADA") >= 0){
                    $('.order-shipping').html(ship_can);
                    $('.order-shipping').trigger('contentchanged');
                }
                if (str.indexOf("COLOMBIA") >= 0){
                    $('.order-shipping').html(ship_col);
                    $('.order-shipping').trigger('contentchanged');
                }
                if (str.indexOf("SPAIN") >= 0){
                    $('.order-shipping').html(ship_esp);
                    $('.order-shipping').trigger('contentchanged');
                }
                })
                .trigger("change");
              
                // Add up two values price and shipping   
                
                // default
                function totalsum () {
                var orderpricetotal = parseFloat($(".order-price").text(), 10);
                var shippingpricetotal = parseFloat($(".order-shipping").text(), 10);
                var totalprice = orderpricetotal + shippingpricetotal;
                $('.total-price').html(totalprice);
                }
                totalsum();
                // update price and shipping values on click and select
                $(document).on('contentchanged', '.order-price , .order-shipping', function() {               
                totalsum();
                });

                }
            }); // End import data
            
            // SUBMIT data to php files when clicking form button
            $("#submit").click(function(){

            // Initialize variables
            var user = "AdBullion";
            var key = "NextGeneration";
            var fullname = $("#name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var address = $("#address").val();
            var city = $("#city").val();
            var state = $("#state").val();
            var country = $("#country").val();
            var product = $(".order-price").html();
            var shipping = $(".order-shipping").html();
            var total = $(".total-price").html();
          
            // Validate form          
            var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
            
            if (fullname ==''|| email ==''|| phone ==''|| address =='' || city ==''|| state ==''){
             $(".validation-alert").html("Please fill all Fields");
             $(".validation-alert").css("display","block");
             $("html, body").animate({ scrollTop: 0 }, 0);
            }
           
            else if (testEmail.test($("#email").val()) == false ){
             $(".validation-alert").html("Please enter a correct email address");           
             $('.validation-alert').css("display","block");
             $('html, body').animate({ scrollTop: 0 }, 0);
            }

            else if ( $("#terms-checkbox").prop( "checked" ) == false ){
             $(".validation-alert").html("Please Check terms and conditions");
             $(".validation-alert").css("display","block");
             $("html, body").animate({ scrollTop: 0 }, 0);
             }
              
            else{
            // Hide alert if has been previously displayed
            $('.validation-alert').css("display","none");

            var sendajaxadata = {user : user, key : key, fullname : fullname, email : email, phone : phone, address : address,
                                city : city, state : state, country : country, product : product, shipping : shipping, total : total };
            
            // Populate personal DDBB table _sales
            var populateMarioSales = function(){
            var myorderid = $("#order-id").html();

              $.ajax({
                type: "POST",
                url: "backend/form.php",
                data: { myorderid : myorderid, fullname : fullname, email : email, phone : phone, address : address,
                city : city, state : state, country : country, product : product, shipping : shipping, total : total},
                cache: false,
                success: function(result){
                  console.log(result);
                  // Show alert successful submit
                  $('.success-alert').css("display","block");
                  $('html, body').animate({ scrollTop: 0 }, 0);
                }
                }); //End DDBB injection 
            }

           // Submit Form to remote api
           $.ajax({
            type: "POST",
            url: "http://quiz.adsbullion.com/quiz/quizTestsAddOrder.php",
            data: sendajaxadata,
            cache: false,
            success: function(result){
            obj = JSON.parse(result);
            $("#order-id").html(obj.orderId);
            }
            }).done (function(){
            populateMarioSales();
            }); 
            return false; 
            };  

          });//End submit; 
});