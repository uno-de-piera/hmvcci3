<?php
if( $this->session->flashdata( "logged" ) )
{
    ?>
    <h1><?php echo $this->session->flashdata("logged") ?></h1>
    <?php
}
