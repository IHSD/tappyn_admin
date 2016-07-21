<?php ?>
<div class="page-title">
    <div class="title_left">
        <h3>Ads import</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title"><?php echo $msg ?></div>
            <div class="x_content">
                Chose a csv file: <input type="file" id="files">
                <form id="csv_form" method="post">
                    <input id="csv_data" type="hidden" name="csv_data" value="">
                    <input id="import_act" type="hidden" name="import_act" value="">
                </form>
                <?php
foreach ($not_found as $temp) {
    echo '"' . $temp . '" not found in submissions<br>';
}

if (count($found) > 0): ?>
<table>
  <thead>
    <tr>
      <th><?php echo implode('</th><th>', array_keys(current($found))); ?></th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($found as $row): array_map('htmlentities', $row);?>
				    <tr>
				      <td><?php echo implode('</td><td>', $row); ?></td>
				    </tr>
				<?php endforeach;?>
  </tbody>
</table>
<button id="button_import" class="btn btn-primary">Import</button>
<?php endif;?>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/jquery-csv/jquery.csv-0.71.min.js'); ?>"></script>
<script>
$(document).ready(function() {
    $('#files').bind('change', handleFileSelect);
    $("#button_import").click(function(){
      var data = <?php echo ($post['csv_data'] ? $post['csv_data'] : "''"); ?>;
      $("#csv_data").val(JSON.stringify(data));
      $("#import_act").val('import');
      $("#csv_form").submit();
    });
});

function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object
    var file = files[0];
    var reader = new FileReader();
    reader.readAsText(file);
    reader.onload = function(event) {
        var csv = event.target.result;
        var data = $.csv.toObjects(csv);
        $("#csv_data").val(JSON.stringify(data));
        $("#csv_form").submit();
    };
    reader.onerror = function() {
        alert('Unable to read ' + file.fileName);
    };
}
</script>