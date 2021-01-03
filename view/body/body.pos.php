<!-- Start app main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Ken's POS System</h1> 
                    <div class="row" >
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12" style="float:right" >
                            <button  type="button" class="btn btn-dark" style="float: right"> Clear Order</button>
                        </div>     
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12" style="float:right" >
                            <button  type="button" class="btn btn-dark" style="float: right"> Proceed Order</button>
                        </div>                
                    </div>  
                </div>   

                <div class="row">
                     <?php
                     $SelectQuery = "SELECT * FROM product";
                     $s_res = $c_Select->fn_SelectAll($conn, $SelectQuery);  
                     while ($row = $s_res->fetch())
                    {  
                        echo '
                         <div class="col-lg-3 col-md-6 col-sm-6 col-12" >
                            <button onclick="func_addcart('.$row['id'].', '.$_SESSION["orderid"].');" type="button" class="btn btn-dark card card-statistic-1" style="height:90%;">
                                <div class="card-icon bg-primary">
                                    <img src="'.$row['photo'].'" height="100px;" width="200px;">
                                </div>
                                <br/>
                                <div class="card-wrap" style="float: right">
                                    <div class="card-header">
                                        <h4>'.$row['productname'].'</h4>
                                    </div>
                                    <div class="card-body" style="color: white">
                                      P '.$row['price'].'
                                    </div>
                                </div>
                            </button>
                        </div>   
                        ';
                    }
                     ?>
                              
                </div>
            </section>
        </div>

  <!-- Modal -->
  <div class="modal fade" id="modalReloadDuration" role="dialog"  data-backdrop="static">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">        
          <h4 class="modal-title" style="float:left">Add Order</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>          
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="pwd">OrderID</label>
              <input type="text" class="form-control" id="OrderID" name="OrderID" disabled>
            </div>
            <div class="form-group">
              <label for="pwd">ProductID</label>
              <input type="text" class="form-control" id="ProductID" name="ProductID" disabled>    
            </div>
            <div class="form-group">
              <label for="pwd">No. of Order</label>
              <input type="number" class="form-control" id="qtyoforder" name="qtyoforder">    
            </div>
        </div>        
        <button type="button" class="btn btn-success"  style="float:left">Add order</button>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>      
    </div>
  </div>

        <script type="text/javascript">
            function func_addcart(id, orderid)
            {
              debugger;
              $.ajax({
                  type: "POST",
                  url: "class/api.function.php",
                  data:
                  {
                      id : 'GetProduct',
                      data  : id
                  },
                  success: function(response)
                  {
                    var a_response = JSON.parse(response);
                    if (response !="[]")
                      {
                        document.getElementById("ProductID").value = a_response[0].productid; 
                        document.getElementById("OrderID").value =  orderid; 
                        $("#modalReloadDuration").modal();
                      }
                      else
                      {
                        alert("Record not found!");
                      }
                  }
              });
               // $("#modalReloadDuration").modal();
            }
        </script>