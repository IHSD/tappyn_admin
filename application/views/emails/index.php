<!-- <?php echo json_encode($contests); ?> -->

    <div class="page-title">
      <div class="title_left">
        <h3>
             Contests

          </h3>
      </div>
    </div>
    <div class="clearfix"></div>


    <div class="row">

      <div class="clearfix"></div>

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div class="clearfix"></div>
            <span class='pull-right'><?php echo $pagination; ?></span>
          </div>
          <div class="x_content" style='overflow:auto'>
            <?php if(empty($emails)): ?>
                <div class='text-center alert alert-warning col-sm-12'><strong>Sorry, there are no emails to show! </strong><a href="<?php echo base_url(); ?>emails/index" ?>Try clearing your filters?</a></div>
            <?php else: ?>
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                        <td></td>
                        <td>ID</td>
                        <td>Queued At</td>
                        <td>Sent At</td>
                        <td>Status</td>
                        <td>Recipient</td>
                        <td>Recipient ID</td>
                        <td>Type</td>
                        <td>Object Type</td>
                        <td>Object ID</td>
                        <td>Opened</td>
                        <td>Clicks</td>
                    </tr>
                  </thead>

                  <tbody>
                        <?php foreach($emails as $email): ?>
                            <tr class="even pointer">
                                <td>
                                    <div class="btn-group">
                                     <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       Actions <span class="caret"></span>
                                     </button>
                                     <ul class="dropdown-menu">
                                       <li><a class="email_resend" data-id="<?php echo $email->id; ?>">Resend</a></li>
                                       <li><a href="#">View</a></li>
                                       <li><a href="#">Send To</a></li>
                                       <!-- <li>
                                               <a href="<?php echo base_url('emails/'.$email->id.'/confirm_delete'); ?>" class='dropdown-danger' type='submit'>Delete</a>
                                       </li> -->
                                     </ul>
                                   </div>
                                </td>
                                <td><?php echo $email->id; ?></td>
                                <td><?php echo date('Y-n-j H:i', $email->queued_at); ?></td>
                                <td><?php echo date('Y-n-j H:i', $email->sent_at); ?></td>
                                <td>
                                    <?php if($email->processing == 0): ?>
                                        Pending
                                    <?php elseif(is_null($email->errors)): ?>
                                        Sent
                                    <?php else: ?>
                                        <?php
                                            $errors = json_decode($email->errors);
                                            foreach($errors as $error): ?>
                                            <div class='alert alert-danger'><?php echo $error; ?></div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $email->recipient; ?></td>
                                <td><?php echo $email->recipient_id; ?></td>
                                <td><?php echo $email->email_type; ?></td>
                                <td><?php echo $email->object_type; ?></td>
                                <td><?php echo $email->object_id; ?></td>
                                <td>
                                    <?php if($email->opened == 0): ?>
                                        <span class='glyphicon glyphicon-remove glyphicon-red'></span>
                                    <?php else: ?>
                                        <span class='glyphicon glyphicon-ok glyphicon-green'></span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $email->clicks; ?></td>
                            </tr>
                        <?php endforeach; ?>
                  </tbody>

                </table>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

  </div>

<script>
$(document).ready(function() {
    console.log("Email loaded");
    $(".email_resend").on('click', function() {
        id = $(this).attr('data-id');
        $.ajax({
            type: "POST",
            url : "<?php echo base_url(); ?>emails/resend/"+id,
            dataType: "json",
            success: function(response){
                if(response.success)
                {
                    alert("Email successfully resent");
                }
                else
                {
                    alert("We were unable to resend that email");
                }
            }
        })
    })
})
</script>
