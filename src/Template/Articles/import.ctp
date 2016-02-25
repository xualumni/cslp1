<h3>CSV Import</h3>
<?php
    echo $this->Form->create('Post',array('action'=>'import','type'=>'file'));
    echo $this->Form->input('CsvFile',array('label'=>'','type'=>'file'));
	echo $this->$Form->submit(__('Upload', true));
    echo $this->Form->end();
?>