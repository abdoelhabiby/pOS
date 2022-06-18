$(function(){



// ======================================================================


        if("{{ LaravelLocalization::getCurrentLocaleDirection() }}" == 'rtl'){

        $('.sidebar .nav-item .nav-link').css('textAlign','right');
		     }

		     $('.confirm').click(function(e){

		      var ask = confirm("are you shore");

		      if(ask === false){

		         e.preventDefault();
		      }

		     })




        $('.fix-foo').click(function(){

              if($("footer").offset().top < 580){

			}else{

			$("footer").css({'position' :'relative' });


			}

        });



//============================ add order ============================================



		$('.add-order').click(function(e){

			e.preventDefault();

			$(this).addClass('disabled');

		   var prod_id    = $(this).data('id'),
		       prod_name  = $(this).data('name'),
		       prod_price =$.number($(this).data('price'),2),
		       Client_id  = $(this).data('client') ;

var html = `<tr class='order-${prod_id}'>
             <input type='hidden' name='products_id[]' value='${prod_id }'>
             <input type='hidden' name='client_id' value='${Client_id }'>
              <td>${prod_name}</td>
              <td>
                 <input type='number' name='quantity[]' min=1 value=1 class='form-control decressIncress'>
              </td>
              <td class='ProductPrice' data-price='${prod_price}'>${prod_price}</td>
              <td> <button class='btn btn-danger btn-sm removeo'  data-id='${prod_id}'>
                     <i class='fa fa-trash'></i>
                   </button>
              </td>
            </tr>`;


            $('table .app-order').append(html);


             TotalAmount();



		});




        $('body').on('click','.disabled',function(e){

           e.preventDefault();

        });


       $('body').on('click','.removeo',function(e){

			e.preventDefault();

			var thisid = $(this).data('id');

			var testo = '#product-' + thisid;

			$(testo).removeClass('disabled');

			var order_r = '.order-' + thisid;

			$(order_r).remove();


             TotalAmount();





		});





//=================================================================================================





          $('body').on('keyup change','.decressIncress',function(){

               var TotalProdctPrice = $(this).closest('tr').find('.ProductPrice');

               if($(TotalProdctPrice).data('price') < 1000 ){

                     var unitPrice = Number($(TotalProdctPrice).data('price'));
               }else{

        var unitPrice = parseFloat($(TotalProdctPrice).data('price').replace(/,/g, '')); // price of the product
               }



               // parseFloat($(this).html().replace(/,/g, '')

               var TotalProdcQuantity = Number($(this).val()); //to quantity


               var ProductQuantity = $.number(unitPrice * TotalProdcQuantity,2);

               TotalProdctPrice.html(ProductQuantity);


              TotalAmount();





          });



  function TotalAmount(){

  	  var TotalAmount = 0;


    $('.app-order .ProductPrice').each(function(){

          TotalAmount += parseFloat($(this).html().replace(/,/g, ''));



     });




      $('.TotalAmount').html($.number(TotalAmount,2));



      if(TotalAmount > 0){

      	 $('.SubmitOrder').removeClass("disabled");
      }else{

          $('.SubmitOrder').addClass("disabled");

      }



  }






 //===========================showProducts================================


 // $(".showProducts").on('click',function(e){

  $('body').on('click',".showProducts",function(e){

  // })

          e.preventDefault();

         $(".lds-dual-ring").removeClass('d-none');
          var url = $(this).data('url');
          var method = $(this).data('method');



          $.ajax({

           url:url,
           method:method,
           success: function(data){

         $(".lds-dual-ring").removeClass('d-none');

            $('.toAppendProduct').empty();
            $('.toAppendProduct').append(data);


           }



          });




 });


//=====================================plugin print =================

$("body").on("click",".toprint",function(){

  $('.printMe').printThis();



});



//===========================================================


});  //end of ready jquery hhhh
