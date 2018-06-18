<?php  ?>
<div id="main-content container" style="margin-top: 20px;">

  <article id="post-2941" class="post-2941 page type-page status-publish hentry common-page">

    <div class="entry-content">

      <div class="balance-page">

        <section class="section1">

          <div class="container">

            <h3 class="h3"><b>Welcome, <?php echo $balanceInfoObject->getCardHolderName(); ?> </b></h3>

          </div>

        </section>

        <section class="section2">

          <div class="container">

                <div class="text-blk1">

                  <p>Card Balance: <b><?php echo $balanceInfoObject->getCardBalance(); ?></b></p>

                </div>

                <div class="text-blk2">

                  <p>Card Status: <b>Normal</b></p>

                </div>
            
            <ul class="nav nav-tabs" id="balanceTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="transactions-tab" data-toggle="tab" href="#transactions" role="tab" aria-controls="transactions" aria-selected="true">Transactions</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="refill-card-tab" data-toggle="tab" href="#refill-card" role="tab" aria-controls="refill-card" aria-selected="false">Refill card</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="transactions" role="tabpanel" aria-labelledby="transactions-tab">
                
                <div class="table-wrp js-table-wrp" style="margin-top: 15px;">

                    <?php 

                      $TransactionTable = $balanceInfoObject->getRawTransationsList();

                      $TransactionTable = str_replace("<table", "<table class='table table-striped'", $TransactionTable);

                      $TransactionTable = str_replace("<td>Date</td>", "<td scope='col'><b>Date</b></td>", $TransactionTable);

                      $TransactionTable = str_replace("<td>Transaction</td>", "<td scope='col'><b>Transaction</b></td>", $TransactionTable);

                      $TransactionTable = str_replace("<td>Description</td>", "<td scope='col'><b>Description</b></td>", $TransactionTable);

                      $TransactionTable = str_replace("<td>Debit (-)</td>", "<td scope='col'><b>Debit (-)</b></td>", $TransactionTable);

                      $TransactionTable = str_replace("<td>Credit (+)</td>", "<td scope='col'><b>Credit (+)</b></td>", $TransactionTable);

                      echo $TransactionTable; 

                    ?>

                </div>

              </div>
              <div class="tab-pane fade" id="refill-card" role="tabpanel" aria-labelledby="refill-card-tab">
              
                <div style="margin-top: 15px;">

                <?php

                if(get_option("bctc_is_anable") == 1){

                  echo "<div class='container'><div class='row justify-content-center'>

                  <p class='lead'>
                     Here you can top up your card with cryptocurrency
                  </p>

                    <div class='col-12 col-sm-10'>

                        <form id='convert-form' class='container' method='POST' action='".get_option("bctc_convert_page_link")."'>

                        <div class='form-group row'>
                                <label for='cardNumber' class='col-sm-4 col-form-label'>Card Number</label>
                                <div class='col-sm-8'>
                                    <input type='text' class='form-control' name='cardNumber' id='cardNumber' value='"
                                    .substr($balancePage->cardNumber, 0,4)
                                    ." ".substr($balancePage->cardNumber, 4,4)
                                    ." ".substr($balancePage->cardNumber, 8,4)
                                    ." ".substr($balancePage->cardNumber, 12,4)
                                    ."' readonly>
                                </div>
                            </div>

                            <div class='form-group row'>

                                <label for='amount' class='col-sm-4 col-form-label'>Amount</label>

                                <div class='col-sm-8 input-group'>

                                    <input type='text' class='col-7 form-control' name='amount' id='amount' placeholder='0.00' data-mask='#0.00'

                                           data-mask-reverse='true'>

                                    <select class='col-5 form-control' name='currency' id='currency' style='height:auto'>";

                          global $wpdb;

                          $data = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix.'cbtc_bitcoin_convert_currency', ARRAY_A);

                          foreach ($data as $currency){

                              $code = $currency['currency'];

                              echo "<option value='$code'>$code</option>";

                          }

                          echo "</select>

                                </div>

                            </div>

                            <input type=\"hidden\" name=\"action\" value=\"cbtc_convert_form\">

                            <button
                                    type='submit'
                                    class='btn btn-primary btn-block g-recaptcha'                                    >
                                <strong>Top Up</strong>
                            </button>

                        </form>

                    </div>

                </div>

                </div> <br>"; 

              }?>

              </div>

              </div>
            </div>

            

        

          <!--

              <div class="filter-wrp">

              <form>

                <div class="form-item">

                  <select name="" id="" title="Select Year">

                    <option value="" selected="">2018</option>

                    <option value="">2017</option>

                    <option value="">2016</option>

                    <option value="">2015</option>

                    <option value="">2014</option>

                    <option value="">2013</option>

                    <option value="">2012</option>

                    <option value="">2011</option>

                    <option value="">2010</option>

                  </select>

                  <div class="select-tip">Select Year</div>

                </div>

                <div class="form-item">

                  <select name="" id="" title="Select Month">

                    <option value="" selected="">01</option>

                    <option value="">02</option>

                    <option value="">03</option>

                    <option value="">04</option>

                    <option value="">05</option>

                    <option value="">06</option>

                    <option value="">07</option>

                    <option value="">08</option>

                    <option value="">09</option>

                    <option value="">10</option>

                    <option value="">11</option>

                    <option value="">12</option>

                    <option value="">13</option>

                    <option value="">15</option>

                    <option value="">16</option>

                    <option value="">17</option>

                    <option value="">18</option>

                    <option value="">19</option>

                    <option value="">20</option>

                    <option value="">21</option>

                    <option value="">22</option>

                    <option value="">23</option>

                    <option value="">24</option>

                    <option value="">25</option>

                    <option value="">26</option>

                    <option value="">27</option>

                    <option value="">28</option>

                    <option value="">29</option>

                    <option value="">30</option>

                    <option value="">31</option>

                  </select>

                  <div class="select-tip">Select Month</div>

                </div>

                <div class="form-item">

                  <select name="" id="" title="Transaction Type">

                    <option value="" selected="">All</option>

                    <option value="">All</option>

                    <option value="">All</option>

                  </select>

                  <div class="select-tip">Transaction Type</div>

                </div>

                <div class="form-item">

                  <input type="submit" value="Filter">

                </div>

              </form>

            </div>

            -->

            

           

            </div>

          </div> 

        </section>

      </div>

    

    </div>

    <!-- .entry-content -->

  </article>

  <!-- .et_pb_post -->

</div>

<?php get_footer(); ?>