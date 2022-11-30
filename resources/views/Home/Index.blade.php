@extends('Home.app')
@section('title')
    Diamond Jubliee
@endsection
@section('content')       
        
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <div class="container">
          
            <div class="row row-xs mg-b-25">

                <div class="package-buttons w-100 pd-l-10 pd-r-10 pd-b-15 pd-t-15 bg-light border-bottom">
                    <div class="d-flex w-100 align-items-center">
            
                        <div class="flex-grow-1">
                            <div class="w-100 tx-11 font-weight-bold mg-b- mg-t-0 text-primary">Diamond Jubliee of SGHS</div>
                            <div><strong>17 February, 2023</strong></div>
                        </div>
                        <a class="btn btn-lg btn-primary mg-l-20" href="https://reg.ex-students-sghs.org/Registration">Start REGISTRATION</a>
                    </div>
                </div>
            
        <div class="col-12 offers-list">
            
                   
         <div class="w-100 d-block p-0 m-0">
            
            
            <div class="slider banner-slider d-none d-md-block">
              <div><a class="p-0 m-0" href=""><img src="https://ex-students-sghs.org/old_website/assets/uploads/media-uploader/4c5480da-1d7e-4118-980a-c773de39a0681666870110.jpg" class="w-100 m-0 d-none" /></a></div>
              <div><a class="p-0 m-0" href=""><img src="https://ex-students-sghs.org/old_website/assets/uploads/media-uploader/leak-viewhigh1667153342.jpg" class="w-100 m-0" /></a></div>
              <div><a class="p-0 m-0" href=""><img src="https://ex-students-sghs.org/old_website/assets/uploads/media-uploader/screenshot-3-1200x2801667292425.png" class="w-100 m-0" /></a></div>
            </div>
            
            <div class="slider banner-slider d-block d-md-none">
              <div><a class="p-0 m-0" href=""><img src="https://ex-students-sghs.org/old_website/assets/uploads/media-uploader/glow-1200-550-px-41667311556.png" class="w-100 m-0 d-none" /></a></div>
              <div><a class="p-0 m-0" href=""><img src="https://ex-students-sghs.org/old_website/assets/uploads/media-uploader/glow-1200-550-px-51667311723.png" class="w-100 m-0" /></a></div>
              <div><a class="p-0 m-0" href=""><img src="https://ex-students-sghs.org/old_website/assets/uploads/media-uploader/glow-1200-550-px-61667311828.png" class="w-100 m-0" /></a></div>
              <div><a class="p-0 m-0" href=""><img src="https://ex-students-sghs.org/old_website/assets/uploads/media-uploader/glow-1200-550-px1667241892.png" class="w-100 m-0" /></a></div>
            </div>
            
        </div>
                    
                    <div class="row row-xs mg-b-25 mg-t-0">
            
                    <div class="w-100 d-block">
                        <div class="d-flex col-12 justify-content-center align-items-center mg-b-30 pd-15">
                            <div class="flex-grow-1 text-center">
                                <h3 class="w-100 mg-b-0 mg-t-10 text-primary">Diamond Jubliee of SGHS</h3>
                                <h6 class="w-100 mg-b-0 mg-t-0">17 February, 2023</h6>
                            </div>
                        </div>
                    </div>
                    
                    <div class="w-100 d-block">
                        <div class="col-12">
                            <div class="w-100 mg-b-20 mg-t-0 text-center d-block card rounded-10">
                                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                <script type="text/javascript">
                                    google.charts.load('current', {'packages':['corechart']});
                                    google.charts.setOnLoadCallback(drawChart);
                            
                                    function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['Batch', 'Total'],
                                        {{$data}}
                                    ]);
                            
                                    var options = {
                                        title: 'Diamond Jobilee Registration',
                                        curveType: 'function',
                                        legend: { position: 'bottom' }
                                    };
                            
                                    var chart = new google.visualization.ColumnChart(document.getElementById('curve_chart'));
                            
                                    chart.draw(data, options);
                                    }
                                </script>
                                
                                <div id="curve_chart" style=" text-align: center; width: 900px; height: 500px"></div>
                            </div>
                        </div>
            
                      <!--  <div class="col-12">
            
                            <div class="w-100 mg-b-20 mg-t-0 text-center d-block card rounded-10">
                            
                                <h4 class="mg-t-15 mg-b-15 text-success">Pre-Requisite</h4>
                                <hr class="mg-0" />
                                <div class="row pd-20 text-left mg-l-0 mg-r-0 text-left">
                                    <ul class="w-100 pd-l-20 general-list">
                                        <li>Update your info for SGHS DIRECTORY.<br/><i>(If not updated, click <a href="">HERE</a>.)</i></li>
                                    </ul>
                                </div>
                                
                            </div>
                        
                        </div>-->
            
                        <!-- <div class="col-12 d-block d-md-none">
            
                            <div class="w-100 mg-b-20 mg-t-0 text-center d-block card rounded-10">
                            
                                <h4 class="mg-t-15 mg-b-15 text-success">sfdj</h4>
                                <hr class="mg-0" />
                                <div class="row pd-20 mg-l-0 mg-r-0 text-left">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="align-middle">Batch No</th>
                                                <th class="align-middle text-center">Subscription</th>
                                                <th class="align-middle text-center bg-light">LTSM Fee</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">1st to 15th</td>
                                                <td class="align-middle text-center">9600 Tk.</td>
                                                <td rowspan="5" class="align-middle text-center bg-light"><del class="mg-r-4">30,000</del>25,000 Tk.<br/>(Valid till 31 Dec, 2022)</td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">16th to 25th</td>
                                                <td class="align-middle text-center">9600 Tk.</td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">26th to 31st</td>
                                                <td class="align-middle text-center">9600 Tk.</td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">32nd to 34th</td>
                                                <td class="align-middle text-center"><del class="mg-r-4">4800</del>2400 Tk.</td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">35th to 39th</td>
                                                <td class="align-middle text-center">N/A</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        
                        </div> -->
            
                        <div class="col-12 d-block d-md-none">
            
                            <div class="w-100 mg-b-20 mg-t-0 text-center d-block card rounded-10">
                            
                                <h4 class="mg-t-15 mg-b-15 text-success">Registration Fee</h4>
                                <hr class="mg-0" />
                                <div class="row pd-20 mg-l-0 mg-r-0 text-left">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="align-middle">Batch No</th>
                                                <th class="align-middle text-center">Fees</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">1962 to 2014</td>
                                                <td class="align-middle text-center">1000 Tk.</td>
                                            </tr>
                                            <tr>
                                              <td class="align-middle">2015 to 2022</td>
                                              <td class="align-middle text-center">500 Tk.</td>
                                            </tr>
                                            <tr>
                                              <td class="align-middle">Running Students</td>
                                              <td class="align-middle text-center">Free </td>
                                            </tr>
                                            <tr>
                                              <td class="align-middle">Payment Gateway Charge</td>
                                              <td class="align-middle text-center">2.5%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        
                        </div>
            
                        <div class="col-12 d-none d-md-block">
            
                            <div class="w-100 mg-b-20 mg-t-0 text-center d-block card rounded-10">
                            
                                <h4 class="mg-t-15 mg-b-15 text-success">Registration Fee</h4>
                                <hr class="mg-0" />
                                <div class="row pd-20 mg-l-0 mg-r-0 text-left">
                                  <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">Batch No</th>
                                            <th class="align-middle text-center">Fees</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">1962 to 2014</td>
                                            <td class="align-middle text-center">1000 Tk.</td>
                                        </tr>
                                        <tr>
                                          <td class="align-middle">2015 to 2022</td>
                                          <td class="align-middle text-center">500 Tk.</td>
                                        </tr>
                                        <tr>
                                          <td class="align-middle">Running Students</td>
                                          <td class="align-middle text-center">Free </td>
                                        </tr>
                                        <tr>
                                          <td class="align-middle">Payment Gateway Charge</td>
                                          <td class="align-middle text-center">2.5%</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                                
                            </div>
                        
                        </div>
                        
                        
                        
                         <div class="col-12 d-block d-md-none">
            
                            <div class="w-100 mg-b-20 mg-t-0 text-center d-block card rounded-10">
                            
                                <h4 class="mg-t-15 mg-b-15 text-success">Polo/T-shirt Size Measurement:</h4>
                                <h6 class="w-100 mg-b-0 mg-t-0">*All Measurements In Inches</h6>
                                <hr class="mg-0" />
                                <div class="row pd-20 mg-l-0 mg-r-0 text-left">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                 <th class="align-middle">Size</th>
                                                <th class="align-middle">Chest</th>
                                                <th class="align-middle text-center">Length</th>
                                                <th class="align-middle text-center">Sleeve Length</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">S</td>
                                                <td class="align-middle text-center">38"</td>
                                                 <td class="align-middle text-center">26"</td>
                                                  <td class="align-middle text-center">7.5"</td>
                                                
                                            </tr>
                                            <tr>
                                             <td class="align-middle">M</td>
                                                <td class="align-middle text-center">40"</td>
                                                 <td class="align-middle text-center">27"</td>
                                                  <td class="align-middle text-center">8"</td>
                                            </tr>
                                            <tr>
                                             <td class="align-middle">L</td>
                                                <td class="align-middle text-center">42"</td>
                                                 <td class="align-middle text-center">28"</td>
                                                  <td class="align-middle text-center">8"</td>
                                            </tr>
                                            <tr>
                                             <td class="align-middle">XL</td>
                                                <td class="align-middle text-center">44"</td>
                                                 <td class="align-middle text-center">29"</td>
                                                  <td class="align-middle text-center">8.5"</td>
                                            </tr>
                                             <tr>
                                             <td class="align-middle">2XL</td>
                                                <td class="align-middle text-center">46"</td>
                                                 <td class="align-middle text-center">30"</td>
                                                  <td class="align-middle text-center">9"</td>
                                            </tr>
                                             <tr>
                                             <td class="align-middle">3XL</td>
                                                <td class="align-middle text-center">48"</td>
                                                 <td class="align-middle text-center">31"</td>
                                                  <td class="align-middle text-center">9.5"</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        
                        </div>
                        
                        
                        
                        <div class="col-12 d-none d-md-block">
            
                            <div class="w-100 mg-b-20 mg-t-0 text-center d-block card rounded-10">
                            
                                <h4 class="mg-t-15 mg-b-15 text-success">Polo/T-shirt Size Measurement:</h4>
                                <h6 class="w-100 mg-b-0 mg-t-0">*All Measurements In Inches</h6>
                                <hr class="mg-0" />
                                <div class="row pd-20 mg-l-0 mg-r-0 text-left">
                                   <table class="table">
                                        <thead>
                                            <tr>
                                                 <th class="align-middle">Size</th>
                                                <th class="align-middle text-center">Chest</th>
                                                <th class="align-middle text-center">Length</th>
                                                <th class="align-middle text-center">Sleeve Length</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">S</td>
                                                <td class="align-middle text-center">38"</td>
                                                 <td class="align-middle text-center">26"</td>
                                                  <td class="align-middle text-center">7.5"</td>
                                                
                                            </tr>
                                            <tr>
                                             <td class="align-middle">M</td>
                                                <td class="align-middle text-center">40"</td>
                                                 <td class="align-middle text-center">27"</td>
                                                  <td class="align-middle text-center">8"</td>
                                            </tr>
                                            <tr>
                                             <td class="align-middle">L</td>
                                                <td class="align-middle text-center">42"</td>
                                                 <td class="align-middle text-center">28"</td>
                                                  <td class="align-middle text-center">8"</td>
                                            </tr>
                                            <tr>
                                             <td class="align-middle">XL</td>
                                                <td class="align-middle text-center">44"</td>
                                                 <td class="align-middle text-center">29"</td>
                                                  <td class="align-middle text-center">8.5"</td>
                                            </tr>
                                             <tr>
                                             <td class="align-middle">2XL</td>
                                                <td class="align-middle text-center">46"</td>
                                                 <td class="align-middle text-center">30"</td>
                                                  <td class="align-middle text-center">9"</td>
                                            </tr>
                                             <tr>
                                             <td class="align-middle">3XL</td>
                                                <td class="align-middle text-center">48"</td>
                                                 <td class="align-middle text-center">31"</td>
                                                  <td class="align-middle text-center">9.5"</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        
                        </div>
                        
                        
                        
                        
                        
                        
                        
            
                        <div class="col-12">
            
                            <div class="w-100 mg-b-20 mg-t-0 text-center d-block card rounded-10">
                            
                                <h4 class="mg-t-15 mg-b-15 text-success">Important Notes</h4>
                                <hr class="mg-0" />
                                <div class="row pd-20 text-left mg-l-0 mg-r-0 text-left">
                                    <ul class="w-100 pd-l-20 general-list">
                                        <li>Registration fees are non-refundable and non-transferable</li>
                                    </ul>
                                    <!-- <p>
                                        <strong>TRANSPORTATION:</strong><br>
                                        A bus service from Dhaka to reunion venue and return will be arranged. Please pay Tk 2000/=(may be changed if needed) per person within 15-01.23 to confirm seat.
                                        <br><br><strong>ACCOMMODATION:</strong><br>
                                        Accommodation is arranged at college campus. Special arrangement is made for ladies and children.
            
                                    </p> -->
                                </div>
                                
                            </div>
                        
                        </div>
            
                        
                    </div>
            
                    <div class="col-md-6 col-12 pd-t-20">
                        
                        <h5>Payment Methods</h5>
                        <ul class="pd-l-20">
                            <li>Online Payment (using register option on website).</li>
                               <li>Only Bkash, Nagad & OK wallet Available Right Now.</li>
                        </ul>
            
                    </div>
            
                    <div class="col-md-6 col-12 pd-t-20">
                        
                        <h5>How to register</h5>
                        <ul class="pd-l-20">
                            <li>Click on the 'REGISTER' button to do it instantly.</li>
                            <li>Contact EX-SGHS office to register offline.</li>
                            <li>For any queries, please contact your batch representative first.</li>
                        </ul>
            
                    </div>
            
                    <div class="col-12 pd-t-20">
                        
                        <h5>Terms & Conditions</h5>
                        <ul class="pd-l-20">
                            <li>Registration amount is non-refundable and non-transferable.</li>
                            <li>For any issues, contact BR first then EX-SGHS office.</li>
                        </ul>
            
                    </div>
            
            
                    </div>
            
                </div>
              </div>
          
          
          
          @endsection