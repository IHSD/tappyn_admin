<form method='post'>
    <textarea name='query' rows="3" style='width:100%'><?php echo $this->input->post('query') ? $this->input->post('query') : ''?></textarea>
    <div class='clearfix'></div>
    <input class='btn btn-primary pull-right' type='submit' />
</form>

<?php if(isset($error)): ?>
    <div class='alert alert-danger'><?php echo $error; ?></div>
<?php elseif(isset($results)): ?>
    <div class="x_content scroll-vertical">
      <table class="table table-striped responsive-utilities jambo_table bulk_action">
        <thead>
          <tr class="headings">
              <?php foreach(get_object_vars($results[0]) as $key => $val): ?>
              <th><?php echo $key; ?>
              <?php endforeach; ?>
          </tr>
        </thead>

        <tbody>
              <?php foreach($results as $result): ?>
                  <tr class="even pointer " onclick="toggleRowClass(this, 'selected');">
                      <?php foreach(get_object_vars($result) as $key => $value): ?>
                          <td><?php echo $value; ?></td>
                      <?php endforeach; ?>
                  </tr>
              <?php endforeach; ?>
        </tbody>
      </table>
    </div>
<?php else: ?>
    <div class='alert alert-info'>No resultset found</div>
<?php endif; ?>
<div class='clearfix'></div>
