<?php

$template = array(
    'table_open'    => '<table border="1 cellpadding="4" cellspacing="0">',
    'table_close'   => '</table>'
);

$this->table->set_template($template);
$this->table->set_heading(array('No', 'Nama', 'Alamat'));
$this->table->add_row(array('1', 'Budi', 'Rumbai'));
$this->table->add_row(array('2', 'Badu', 'Panam'));
$this->table->add_row(array('3', 'Bidi', 'Nangka'));

echo $this->table->generate();
?>