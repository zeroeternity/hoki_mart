@extends('layouts.template')
@section('title', 'dashboard', 'welcome')
@section('content')
 <!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Invoice</h3>
        </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Invoice</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <section class="content invoice">
                <!-- title row -->
                <div class="row">
                  <div class="  invoice-header">
                    <h1>
                        <i class="fa fa-globe"></i> No Faktur:
                        <small>16/08/2016</small>
                    </h1>
                    NO Faktur: 16/08/2016
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>Koperasi Mitramas</strong>
                            <br>Suplier Beras arjuna
                            <br>Alamat:
                            <br>Phone: 123455506789
                            <br>Email: Email@yahoo.com
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong>Tani yuk</strong>
                        <br>
                        <br>Alamat:
                        <br>Phone: 123400005678
                        <br>Email: Email@yahoo.com
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <b>Invoice ########</b>
                    <br>
                    <br>
                    <b>Order ID:</b> #####
                    <br>
                    <b>Payment Due:</b> 3/06/2023
                    <br>
                    <b>Account:</b> 968-34567
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                  <div class="  table">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Serial #</th>
                          <th>Harga</th>
                          <th>Qty</th>
                          <th>Unit</th>
                          <th>Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Beras arjuna 20 KG</td>
                          <td>455-981-221</td>
                          <td>185.000</td>
                          <td>265,0,0</td>
                          <td>KRG</td>
                          <td>Rp.49.025.000,0</td>
                        </tr>
                        <tr>
                          <td>Beras arjuna 10 KG</td>
                          <td>247-925-726</td>
                          <td>94.000</td>
                          <td>340,0,0</td>
                          <td>KRG</td>
                          <td>Rp.32.900.000,0</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                  <!-- accepted payments column -->
                  <div class="col-md-6">
                    <p class="lead">Payment Methods:</p>
                    <img src="images/visa.png" alt="Visa">
                    <img src="images/mastercard.png" alt="Mastercard">
                    <img src="images/american-express.png" alt="American Express">
                    <img src="images/paypal.png" alt="Paypal">
                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                    </p>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <p class="lead">Amount Due 3/06/2023</p>
                    <div class="table-responsive">
                      <table class="table">
                        <tbody>
                          <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>Rp.81.925.000,0</td>
                          </tr>
                          <tr>
                            <th>ppn</th>
                            <td>Rp.0.0</td>
                          </tr>
                          <tr>
                            <th>Total:</th>
                            <td>Rp.81.925.000,0</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                  <div class=" ">
                    <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                    <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                    <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->
@endsection
