
<div class="clearfix"></div>

<!-- <?php var_dump($contest);?> -->
<div class="row">

  <div class="clearfix"></div>
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Update Submission</h3>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <?php echo form_open('submissions/update/' . $submission->id, array('id' => 'demo-form2', 'data-parsley-validate' => null, 'class' => 'form-horizontal form-label-left')); ?>
                    <div><img src="<?php echo $submission->thumbnail_url; ?>"></div>
                    <div><h4><?php echo $submission->text ?></h4></div>
                      <div class="form-group">
                        <label for="ctr" class="control-label col-md-3 col-sm-3 col-xs-12">CTR</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ctr" class="form-control col-md-7 col-xs-12" type="text" name="ctr" value="<?php echo $submission->ctr; ?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    <?php echo form_close(); ?>
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
      url : "<?php echo base_url('contests/submissions_by_time_range/' . $contest->id) ?>",
      dataType: 'json',
      success: function(response)
      {
          if(response.success)
          {
              for(var i = 0; i < response.data.length; i++)
              {
                 chart_data.dates.push(response.data[i].date);
                 chart_data.amounts.push(response.data[i].count);
              }
              myChart9.setOption({
                title: {
                  x: 'center',
                  y: 'top',
                  padding: [0, 0, 20, 0],
                  text: 'Submissions Over Time',
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
                  name: 'Submissions',
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
