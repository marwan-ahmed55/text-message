<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>
   upload image example
</title>
</head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data"  >
<input type="file" name="image[]" multiple  />
<input type="submit" value="upload Images" name="upload"/>
</form>
</body>
</html>


<?php
error_reporting(0);
$up= "upload/";
$i=0;
$t=array('image/jpeg' , 'image/png' , 'image/gif');
if($_POST['upload']=='upload Images')
{
  while($_FILES['image']['name'][$i] != null)
   {
    $fname = $_FILES['image']['name'][$i];
    $fsize = $_FILES['image']['size'][$i];
    $ftype = $_FILES['image']['type'][$i];
    $ftemp = $_FILES['image']['tmp_name'][$i];
    
    if($fname == '')
    {
        echo 'please enter a file';
    }
    elseif($fsize > 500000)
    {
        echo 'the file size is bigger than 5mb';
    }
    elseif(!in_array($ftype,$t))
    {
        echo 'the type of file is not allowed';
    }
    else
    {
        
        if(!file_exists('upload'))
         {
           mkdir('upload','777');
         }
         
        move_uploaded_file($ftemp, $up.$fname );
        echo 'the image: '.$fname.' is uploaded <br>';

    }
 $i++;
   }
}

?>