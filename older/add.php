<?php
print('<html>');
print('<head><title>');
print('Upload File Example</title>');
print("</head>");
print('<body>');
print('<form name=myform ENCTYPE="multipart/form-data" method="post" action="act_upload_file.php">');
print('<table class="aaa" align="center" width=80% border=0>');
print('<tr><th align="center">Upload File Exaple</th></tr>');
print('<INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="1000000">');
print('<tr><td align="center">Upload File: <INPUT NAME="uploaded_file" TYPE="file"></td></tr>');
print('<tr><td> </td></tr>');
print('<tr><td align="center" ><input type=submit name=submit value="Upload"></td></tr>');
print('</table></form>');
print('<body></html>');
?>