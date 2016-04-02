
<!-- <?php var_dump($contest); ?> -->
<div class="row">

  <div class="clearfix"></div>

          <div class="row tile_count">
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
              <div class="left"></div>
              <div class="right_test">
                <span class="count_top"><i class="fa fa-user"></i> Users</span>
                <div class="count"><?php echo $user_count; ?></div>
              </div>
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
              <div class="left"></div>
              <div class="right_test">
                <span class="count_top"><i class="fa fa-clock-o"></i> Companies</span>
                <div class="count green"><?php echo $company_count; ?></div>
              </div>
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
              <div class="left"></div>
              <div class="right_test">
                <span class="count_top"><i class="fa fa-clock-o"></i> Active Contests</span>
                <div class="count"><?php echo $active_contests; ?></div>
              </div>
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
              <div class="left"></div>
              <div class="right_test">
                <span class="count_top"><i class="fa fa-clock-o"></i> Submissions</span>
                <div class="count green"><?php echo $submission_count; ?></div>
              </div>
            </div>


        </div>
        <div class='clearfix'></div>

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

              <div class="row x_title">
                <div class="col-md-6">
                  <h3>Network Activities <small>Graph title sub-title</small></h3>
                </div>
                <div class="col-md-6">
                  <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                    <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                  </div>
                </div>
              </div>

              <div class="col-md-9 col-sm-9 col-xs-12">
                <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                <div style="width: 100%;">
                  <div id="mainb" class="demo-placeholder" style="width: 100%; height:270px;"></div>
                </div>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                <div class="x_title">
                  <h2>Top Campaign Performance</h2>
                  <div class="clearfix"></div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-6">
                  <div>
                    <p>Facebook Campaign</p>
                    <div class="">
                      <div class="progress progress_sm" style="width: 76%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <p>Twitter Campaign</p>
                    <div class="">
                      <div class="progress progress_sm" style="width: 76%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-6">
                  <div>
                    <p>Conventional Media</p>
                    <div class="">
                      <div class="progress progress_sm" style="width: 76%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <p>Bill boards</p>
                    <div class="">
                      <div class="progress progress_sm" style="width: 76%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <div class="clearfix"></div>
            </div>
          </div>

        </div>
        <br />

        <div class="row">


          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile fixed_height_320">
              <div class="x_title">
                <h2>Genders</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <h4>App Usage across versions</h4>
                <div class="widget_summary">
                  <div class="w_left w_25">
                    <span>0.1.5.2</span>
                  </div>
                  <div class="w_center w_55">
                    <div class="progress">
                      <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                        <span class="sr-only">60% Complete</span>
                      </div>
                    </div>
                  </div>
                  <div class="w_right w_20">
                    <span>123k</span>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget_summary">
                  <div class="w_left w_25">
                    <span>0.1.5.3</span>
                  </div>
                  <div class="w_center w_55">
                    <div class="progress">
                      <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                        <span class="sr-only">60% Complete</span>
                      </div>
                    </div>
                  </div>
                  <div class="w_right w_20">
                    <span>53k</span>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget_summary">
                  <div class="w_left w_25">
                    <span>0.1.5.4</span>
                  </div>
                  <div class="w_center w_55">
                    <div class="progress">
                      <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                        <span class="sr-only">60% Complete</span>
                      </div>
                    </div>
                  </div>
                  <div class="w_right w_20">
                    <span>23k</span>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget_summary">
                  <div class="w_left w_25">
                    <span>0.1.5.5</span>
                  </div>
                  <div class="w_center w_55">
                    <div class="progress">
                      <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                        <span class="sr-only">60% Complete</span>
                      </div>
                    </div>
                  </div>
                  <div class="w_right w_20">
                    <span>3k</span>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget_summary">
                  <div class="w_left w_25">
                    <span>0.1.5.6</span>
                  </div>
                  <div class="w_center w_55">
                    <div class="progress">
                      <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                        <span class="sr-only">60% Complete</span>
                      </div>
                    </div>
                  </div>
                  <div class="w_right w_20">
                    <span>1k</span>
                  </div>
                  <div class="clearfix"></div>
                </div>

              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile fixed_height_320 overflow_hidden">
              <div class="x_title">
                <h2>Males</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Settings 1</a>
                      </li>
                      <li><a href="#">Settings 2</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <table class="" style="width:100%">
                  <tr>
                    <th style="width:37%;">

                    </th>
                    <th>
                      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <p class="">Range</p>
                      </div>
                      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                        <p class="">Percent</p>
                      </div>
                    </th>
                  </tr>
                  <tr>
                    <td>
                      <canvas id="male_breakdown" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                    </td>
                    <td>
                      <table class="tile_info">
                        <tr>
                          <td>
                            <p><i class="fa fa-square blue"></i>18-24 </p>
                          </td>
                          <td id='male_18_24'></td>
                        </tr>
                        <tr>
                          <td>
                            <p><i class="fa fa-square green"></i>25-34 </p>
                          </td>
                          <td id='male_25_34'></td>
                        </tr>
                        <tr>
                          <td>
                            <p><i class="fa fa-square purple"></i>35-44 </p>
                          </td>
                          <td id='male_35_44'></td>
                        </tr>
                        <tr>
                          <td>
                            <p><i class="fa fa-square aero"></i>45-54 </p>
                          </td>
                          <td id='male_45_54'></td>
                        </tr>
                        <tr>
                          <td>
                            <p><i class="fa fa-square red"></i>55+ </p>
                          </td>
                          <td id='male_55'></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile fixed_height_320 overflow_hidden">
              <div class="x_title">
                <h2>Females</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Settings 1</a>
                      </li>
                      <li><a href="#">Settings 2</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <table class="" style="width:100%">
                  <tr>
                    <th style="width:37%;">

                    </th>
                    <th>
                      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <p class="">Range</p>
                      </div>
                      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                        <p class="">Percent</p>
                      </div>
                    </th>
                  </tr>
                  <tr>
                    <td>
                      <canvas id="female_breakdown" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                    </td>
                    <td>
                      <table class="tile_info">
                        <tr>
                          <td>
                            <p><i class="fa fa-square blue"></i>18-24 </p>
                          </td>
                          <td id='female_18_24'></td>
                        </tr>
                        <tr>
                          <td>
                            <p><i class="fa fa-square green"></i>25-34 </p>
                          </td>
                          <td id='female_25_34'></td>
                        </tr>
                        <tr>
                          <td>
                            <p><i class="fa fa-square purple"></i>35-44 </p>
                          </td>
                          <td id='female_35_44'></td>
                        </tr>
                        <tr>
                          <td>
                            <p><i class="fa fa-square aero"></i>45-54 </p>
                          </td>
                          <td id='female_45_54'></td>
                        </tr>
                        <tr>
                          <td>
                            <p><i class="fa fa-square red"></i>55+ </p>
                          </td>
                          <td id='female_55'></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

      </div>
    </div>
  </div>
</div>

<script>
  var myChart9 = echarts.init(document.getElementById('mainb'), theme);
  var chart_data = {
      dates : [],
      amounts : []
  };
  $.ajax({
      url : "<?php echo base_url('home/users_by_date'); ?>",
      dataType: 'json',
      success: function(response)
      {
          if(response.success)
          {
              for(var i = 0; i < response.data.length; i++)
              {
                 chart_data.dates.push(response.data[i].created);
                 chart_data.amounts.push(response.data[i].count);
              }
              myChart9.setOption({
                title: {
                  x: 'center',
                  y: 'top',
                  padding: [0, 0, 20, 0],
                  text: 'User Signups',
                  textStyle: {
                    fontSize: 15,
                    fontWeight: 'normal'
                  }
                },
                tooltip: {
                  trigger: 'axis'
                },
                calculable: true,
                xAxis: [{
                  type: 'category',
                  data: chart_data.dates
                }],
                yAxis: [{
                  type: 'value',
                  name: 'Amount',
                  axisLabel: {
                    formatter: '{value}'
                  }
                }],
                series: [{
                  name: 'SignUps',
                  type: 'line',
                  data: chart_data.amounts
                }]
              });
          } else {
              alert('error fetching data from contest url');
          }
      }
  })

</script>


<script>
Chart.defaults.global.legend = {
  enabled: false
};

var total_users = "<?php echo $user_count; ?>";
console.log(total_users);
var graph_data = {
    'males' : [],
    'females' : [],
};
$.ajax({
    method: 'get',
    url : "<?php echo base_url('home/users_by_age_gender');  ?>",
    dataType: 'json',
    success: function(response) {
        if(!response.success) return;

        for(var key in response.data.male)
        {
            graph_data.males.push(response.data.male[key]);
            var id = '#male_'+key.replace('-','_').replace('+','');
            console.log(id);
            $(id).text(response.data.male[key]);
        }
        for(var key in response.data.female)
        {
            graph_data.females.push(response.data.female[key]);
            var id = '#female_'+key.replace('-','_').replace('+','');
            $(id).text(response.data.female[key]);
        }

        var male_data = {
          labels: [
            "18-24",
            "25-34",
            "35-44",
            "45-54",
            "55+"
          ],
          datasets: [{
            data: graph_data.males,
            backgroundColor: [
              "#BDC3C7",
              "#9B59B6",
              "#455C73",
              "#26B99A",
              "#3498DB"
            ],
            hoverBackgroundColor: [
              "#CFD4D8",
              "#B370CF",
              "#34495E",
              "#36CAAB",
              "#49A9EA"
            ]

          }]
        };

        var female_data = {
          labels: [
            "18-24",
            "25-34",
            "35-44",
            "45-54",
            "55+"
          ],
          datasets: [{
            data: graph_data.females,
            backgroundColor: [
              "#BDC3C7",
              "#9B59B6",
              "#455C73",
              "#26B99A",
              "#3498DB"
            ],
            hoverBackgroundColor: [
              "#CFD4D8",
              "#B370CF",
              "#34495E",
              "#36CAAB",
              "#49A9EA"
            ]

          }]
        };

        var maleCanvasDoughnut = new Chart(document.getElementById("male_breakdown"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: male_data
        });

        var femaleCanvasDoughnut = new Chart(document.getElementById("female_breakdown"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: female_data
        });
    }
})





</script>
