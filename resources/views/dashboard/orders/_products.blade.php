               <table class="table text-center printMe">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Quantity</th>
                          <th>Unit Price</th>
                        </tr>
                      </thead>
                      <tbody class="app-order">

           @foreach($products as $allProducts)
             <tr>
               <td>{!! $allProducts->name !!}</td>
               <td>{!! $allProducts->pivot->quantity !!}</td>
               <td>{!! number_format($allProducts->sale_price,2) !!}</td>
             </tr>

               @endforeach

                      </tbody>


                </table>
                <div class="mb-4">

                 <h5 class="d-inline ml-4">Total Price : </h5><span> {!! number_format($totalPrice,2) !!}</span>

                 <button class="btn btn-info mt-2 toprint" style="width: 100%">Print</button>

             
               </div>