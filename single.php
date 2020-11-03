<?php
if ( in_category( array( 'interview', 'how-to', 'column')) ) {
  get_template_part( 'pages/interview' , false );
} else {
  get_template_part( 'pages/normal' , false );
}
?>