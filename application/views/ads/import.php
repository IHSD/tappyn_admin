<div class="page-title">
    <div class="title_left">
        <h3>Ads import</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title"></div>
            <div class="x_content">
                <input type="file" id="files">
                <form id="csv_form" method="post">
                    <input id="csv_data" type="hidden" name="csv_data">
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/jquery-csv/jquery.csv-0.71.min.js'); ?>"></script>
<script>
$(document).ready(function() {
    $('#files').bind('change', handleFileSelect);
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