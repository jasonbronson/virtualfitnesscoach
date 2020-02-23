<?php
/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  Backup mySql tables
  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  Copyright 2006 by Richard Williamson (aka OldGuy).
  Website: http://www.scripts.oldguy.us - noldguy@gmail.com
  Support: http://www.scripts.oldguy.us/forums/
  Licensed under the terms of the GNU General Public License, June 1991.
  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
*/

class mysqldump {


public function init(){


// basic configuration entries
$secret			= 'adminj'; 				// a password to prevent unauthorized access to the script
$from			= 'jasonbronson@gmail.com';			// email address for the "from" header
$to				= 'jasonbronson@gmail.com';			// address to which emails will be sent
$dir			= '/home/jbronson/public_html/virtualfitnesscoach/web/backup/';	// directory where the files are to be placed, must have write permissions
$bundle_name	= 'sqldump';				// date/time will be appended to the bundle name
$email			= 1;							// 0 = don't send the completion email (error emails will still be sent)
                        // 1 = send email notice upon successful completion,
$debug			= 1;							// 0 = don't print to browser, use this when executing from cron!
                        // 1 = print debug information to browser
$command		= 'mysqldump';          		// The mysqldump program name. Should work as is. If you get an empty
                        // backup file try entering the full path to the dump program. e.g.
                        // /user/bin/mysqldump
// the first database to be backed up - referred to in the user guide as"dbid=0"
$cfg[]['dbhost']			= 'localhost';		// your mySQL server name
$cfg[]['dbuser']			= 'jbronson_virtual';		// your mySQL user name
$cfg[]['dbpass']			= 'adminj';		// your mySQL password
$cfg[]['dbname']			= 'jbronson_tannerltest1';			// database name
$cfg[]['dbprefix']			= '';				// empty = backup all tables in the database
                        // prefix string = backup only table names beginning with the string
$cfg[]['optimize']			= '1';				// 1 = optimize tables, 0 = don't optimize them
$cfg[]['extended_inserts']	= '1';				// 1 = one INSERT per table (smaller file), 0 = one INSERT per row
$cfg[]['options']			= '';				// add any additional mysqldump optons if you know what you are doing

// uncomment (remove /* and */) and edit the below entries to add another database
// you can add any number of additional databases, each will be put in a separate output file
// each will be one ID number greater...$cfg[1] dbid=1, $cfg[2] dbid=2, etc.
/*
// 2nd database
$cfg[]['dbhost']			= '';
$cfg[]['dbuser']			= '';
$cfg[]['dbpass']			= '';
$cfg[]['dbname']			= '';
$cfg[]['dbprefix']			= '';
$cfg[]['optimize']			= '';
$cfg[]['extended_inserts']	= '';
$cfg[]['options']			= '';
*/

// ---- end of configuration settings array -----
// Don't change anything after this line unless you know what you are doing

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  Dump a database to a file and send email containing download link
  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  mysqldump.php, version 1.2, Sep 2008
  By Richard Williamson (aka OldGuy).
  Website: http://www.scripts.oldguy.us/mysqldump
  Email: oldguy@oldguy.us

  Licensed under the terms of the GNU General Public License, June 1991.

  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
  WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
  CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
*/

// define end of line character
$os = strtoupper(substr(php_uname(), 0, 3));
if ($os == 'WIN') {
  define(EOL, "\r\n");
} elseif ($os == 'MAC') {
  define(EOL, "\r");
} else {
  define(EOL, "\n");
}

// manually decode query string...we use - instead of & because Cpanel cron page doesn't like & in commands
$dbid		= 9999; // a large number which will cause an error if query string argument is missing
$code		= '';
$bundle		= '';
$filename	= '';
$query = explode('-',$_SERVER['QUERY_STRING']);
for($x = 0; $x <= count($query); $x++) {
  $strings =  explode('=', $query[$x]);
  if ($strings[0] == 'dbid') {
    if (is_numeric($strings[1])) $dbid = intval($strings[1]);
  }
  if ($strings[0] == 'code')		$code     = $strings[1];
  if ($strings[0] == 'bundle')	$bundle   = $strings[1];
  if ($strings[0] == 'filename')	$filename = $strings[1];
}

// shorter variables names means less typing :-)
$dbhost 	= $cfg[$dbid]['dbhost'];
$dbuser 	= $cfg[$dbid]['dbuser'];
$dbpass 	= $cfg[$dbid]['dbpass'];
$dbname 	= $cfg[$dbid]['dbname'];
$dbprefix	= $cfg[$dbid]['dbprefix'];
$optimize 	= $cfg[$dbid]['optimize'];
$inserts 	= $cfg[$dbid]['extended_inserts'];
$options 	= $cfg[$dbid]['options'];

// are we downloading a file?
if ($filename) {
  // no password required, the file name is dynamically generated and thus "somewhat" secure
  // if someone has intercepted the email containing the link they can download it
  // that's the tradeoff for making it easier to download via a link (user doesn't have to paste a url and append a password)
  downloadFile($filename);
  exit();
}

// validate query string arguments
if (!$bundle && $dbid > count($cfg)) {
  $msg = "Invalid or missing dbid argument in the query string: ?{$_SERVER['QUERY_STRING']}";
  if ($debug) print "$msg<br />";
  sendEmail(1, $msg . EOL);
}
if ($code !== $secret) {
  $msg = "Invalid code in the query string: \"?{$_SERVER['QUERY_STRING']}\"";
  if ($debug) print "$msg<br />";
  sendEmail(1, $msg  . EOL);
}

// are we downloading a bundle?
if ($bundle) {
  sendBundle();
  exit();
}

// Check to make sure we can write the dump file
$time		= date('Ymd_His');
$dumpfile	= $dir . $dbname . '_' . $time . '.sql.gz';
if ($handle = @fopen($dumpfile, 'w')) {
  fclose($handle);
} else {
  $msg = "Unable to open $dumpfile for writing.". EOL;
  if ($debug) print "$msg<br />";
  sendEmail(1, $msg  . EOL);
}

// delete old backup files for the database
deleteFiles();

// Open the database
$dblink = @mysql_connect($dbhost, $dbuser, $dbpass);
if (!$dblink) {
  $msg = "Unable to connect to mysql server using the host, user and password in \$cfg[$dbid]". EOL;
  if ($debug) print "$msg<br />";
  sendEmail(1, $msg  . EOL);
}
$result = @mysql_select_db($dbname);
if (!$result) {
  $msg = "The database does not exist or the \$cfg[$dbid] user does not have permission to access it". EOL;
  if ($debug) print "$msg<br />";
  sendEmail(1, $msg  . EOL);
}

// Get table names
$rows    = 0;
$tables  = array();
$result = mysql_query("SHOW TABLES FROM $dbname ", $dblink);
if (!$result) {
  $msg = "Error doing SHOW TABLES " . mysql_error() . EOL;
  if ($debug) print "$msg<br />";
  sendEmail(1, $msg  . EOL);
}
while (list($table_name) = mysql_fetch_row($result)) {
  if ($dbprefix) {
    if (preg_match("/^$dbprefix/", $table_name)) {
      $tables[$rows] = $table_name;
      $rows++;
    }
  } else {
    $tables[$rows] = $table_name;
    $rows++;
  }

}

// Optimize tables, build dump command tables variable
$tables_list = '';
$msg = '';
for($i = 0; $i < $rows; $i++) {
  if ($dbprefix) $tables_list .= " {$tables[$i]}";
  if ($optimize) {
    $result	= mysql_query("OPTIMIZE TABLE {$tables[$i]}", $dblink);
    if (!$result) $msg .= "Optimize query failed. mysql error = " . mysql_error() . EOL . EOL;
  }
}
if ($msg) sendEmail(0, $msg  . EOL);
if ($debug) print "$i tables were optimized<br />";


// dump the database
$options		.= ($inserts) ? '' : ' --skip-extended-insert ';
$cmd			= "$command $options --user $dbuser --password=$dbpass $dbname $tables_list | gzip > $dumpfile";
$last_line	= system($cmd, $result);
if ($debug) {
  print "
    <br />Download file name is: $dumpfile
    <br />The mysql dump command is:
    <br /> $cmd";
  if (!$dbname) print " <br /><b>Error...</b>the database name is empty";
  print "<br />";
}

if ($email) sendEmail(1, "Download the dump file: http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}?filename=$dumpfile" . EOL);

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  Functions
  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
*/

// download a dump file
function downloadFile($filename) {
  global $dir;

  $handle = @fopen($filename, 'r');
  if (!$handle) {
    sendEmail(1, "Can't open file: $filename. Download cancelled."  . EOL);
  }

  ob_end_clean();

  header("Content-type: application/force-download");
  header("Content-Disposition: attachment; filename=\"$filename\"");

  while(!feof($handle) and (connection_status()==0)) {
    print(fread($handle, 1024*8));
    flush();
  }
  fclose($handle);
  if ($delete_file == 2) unlink($file);
}

// download all backup files in one archive
function sendBundle() {
  global $dir, $bundle_name, $cfg;

  if (!$dh = opendir($dir)) exit("Attempt to open directory $dir failed");

  $time				= date('Ymd-Hi');
  $bundle_name	= $bundle_name . '_' . $time . '.zip';
  $archive			= new zipfile();
  $archive -> add_dir("mysqldump/");

  // for each set of configuration entries
  $files_message		= '';
  $fa = 0;
  for($x = 0; $x <= count($cfg); $x++) {
    rewinddir ($dh);
    $buffer = '';
    while (false !== ($file = readdir($dh))) {
      if (!is_dir($file) && strstr($file, $cfg[$x]['dbname'])) {
        $fh = fopen($dir . $file, 'rb');
        if (!$fh) exit("Attempt to read $file failed");
        $filesize   = sprintf("%u", filesize($dir . $file));
        $filedata   = fread($fh, $filesize);
        fclose($fh);
        $archive -> add_file($filedata, "mysqldump/$file");
        $fa++;
      }
    }
  }

  if (!$fa) exit('No files to download');

  ob_end_clean();

  header("Content-type: application/force-download");
  header("Content-Disposition: attachment; filename=\"$bundle_name\"");
  print $archive -> file();

}

// send email
function sendEmail($die, $body) {
  global $from, $to, $dbname, $dbid;

  $headers = "From: $from" . EOL
  . "Content-Type: text/plain; charset=utf-8" . EOL
  . "Content-Transfer-Encoding: 8bit" . EOL;

  ini_set('sendmail_from', $from);
  mail($to, "Message from {$_SERVER['PHP_SELF']}, dbname= '$dbname'", $body, $headers);
  if ($die) exit("Email sent");
}

function deleteFiles() {
  global $dir, $dbname;

  if (!$handle = @opendir($dir)) {
    $msg = "Error, can't open the files directory: '$dir'" . EOL;
    sendEmail(1, $msg  . EOL);
  } else {
    $msg = '';
    while (false !== ($del_file = readdir($handle))) {
      if (!is_dir($del_file) && preg_match("#$dbname#", $del_file)) {
        $result = unlink($dir . $del_file);
        if (!$result) {
          $msg .= "Attempt to delete $dir$del_file was unsuccessful" . EOL;
          if ($debug) $msg .= "<br />";
        } else {
          if ($debug) print "File deleted: $dir$del_file<br />";
        }
      }
    }

  }
  if ($msg) {
    if ($debug) print "$msg<br />";
    sendEmail(0, $msg  . EOL);
  }
}

/*
Zip file creation class
by Eric Mueller
http://www.themepark.com
initial version with:
  - class appearance
  - add_file() and file() methods
  - gzcompress() output hacking
by Denis O.Philippov, webmaster@atlant.ru, http://www.atlant.ru
official ZIP file format: http://www. // pkware.com/appnote.txt
*/

class zipfile
{

    var $datasec = array(); // array to store compressed data
    var $ctrl_dir = array(); // central directory
    var $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00"; //end of Central directory record
    var $old_offset = 0;

    function add_dir($name)

    // adds "directory" to archive - do this before putting any files in directory!
    // $name - name of directory... like this: "path/"
    // ...then you can add files using add_file with names like "path/file.txt"
    {
        $name = str_replace("\\", "/", $name);

        $fr = "\x50\x4b\x03\x04";
        $fr .= "\x0a\x00";    // ver needed to extract
        $fr .= "\x00\x00";    // gen purpose bit flag
        $fr .= "\x00\x00";    // compression method
        $fr .= "\x00\x00\x00\x00"; // last mod time and date

        $fr .= pack("V",0); // crc32
        $fr .= pack("V",0); //compressed filesize
        $fr .= pack("V",0); //uncompressed filesize
        $fr .= pack("v", strlen($name) ); //length of pathname
        $fr .= pack("v", 0 ); //extra field length
        $fr .= $name;
        // end of "local file header" segment

        // no "file data" segment for path

        // "data descriptor" segment (optional but necessary if archive is not served as file)
        $fr .= pack("V",$crc); //crc32
        $fr .= pack("V",$c_len); //compressed filesize
        $fr .= pack("V",$unc_len); //uncompressed filesize

        // add this entry to array
        $this -> datasec[] = $fr;

        $new_offset = strlen(implode("", $this->datasec));

        // ext. file attributes mirrors MS-DOS directory attr byte, detailed
        // at http://support.microsoft.com/support/kb/articles/Q125/0/19.asp

        // now add to central record
        $cdrec = "\x50\x4b\x01\x02";
        $cdrec .="\x00\x00";    // version made by
        $cdrec .="\x0a\x00";    // version needed to extract
        $cdrec .="\x00\x00";    // gen purpose bit flag
        $cdrec .="\x00\x00";    // compression method
        $cdrec .="\x00\x00\x00\x00"; // last mod time & date
        $cdrec .= pack("V",0); // crc32
        $cdrec .= pack("V",0); //compressed filesize
        $cdrec .= pack("V",0); //uncompressed filesize
        $cdrec .= pack("v", strlen($name) ); //length of filename
        $cdrec .= pack("v", 0 ); //extra field length
        $cdrec .= pack("v", 0 ); //file comment length
        $cdrec .= pack("v", 0 ); //disk number start
        $cdrec .= pack("v", 0 ); //internal file attributes
        $ext = "\x00\x00\x10\x00";
        $ext = "\xff\xff\xff\xff";
        $cdrec .= pack("V", 16 ); //external file attributes  - 'directory' bit set

        $cdrec .= pack("V", $this -> old_offset ); //relative offset of local header
        $this -> old_offset = $new_offset;

        $cdrec .= $name;
        // optional extra field, file comment goes here
        // save to array
        $this -> ctrl_dir[] = $cdrec;


    }

    function add_file($data, $name)

    // adds "file" to archive
    // $data - file contents
    // $name - name of file in archive. Add path if your want

    {
        $name = str_replace("\\", "/", $name);
        //$name = str_replace("\\", "\\\\", $name);

        $fr = "\x50\x4b\x03\x04";
        $fr .= "\x14\x00";    // ver needed to extract
        $fr .= "\x00\x00";    // gen purpose bit flag
        $fr .= "\x08\x00";    // compression method
        $fr .= "\x00\x00\x00\x00"; // last mod time and date

        $unc_len = strlen($data);
        $crc = crc32($data);
        // $zdata = gzcompress($data);  it is already compressed
        $zdata = substr( substr($zdata, 0, strlen($zdata) - 4), 2); // fix crc bug
        $c_len = strlen($zdata);
        $fr .= pack("V",$crc); // crc32
        $fr .= pack("V",$c_len); //compressed filesize
        $fr .= pack("V",$unc_len); //uncompressed filesize
        $fr .= pack("v", strlen($name) ); //length of filename
        $fr .= pack("v", 0 ); //extra field length
        $fr .= $name;
        // end of "local file header" segment

        // "file data" segment
        $fr .= $zdata;

        // "data descriptor" segment (optional but necessary if archive is not served as file)
        $fr .= pack("V",$crc); //crc32
        $fr .= pack("V",$c_len); //compressed filesize
        $fr .= pack("V",$unc_len); //uncompressed filesize

        // add this entry to array
        $this -> datasec[] = $fr;

        $new_offset = strlen(implode("", $this->datasec));

        // now add to central directory record
        $cdrec = "\x50\x4b\x01\x02";
        $cdrec .="\x00\x00";    // version made by
        $cdrec .="\x14\x00";    // version needed to extract
        $cdrec .="\x00\x00";    // gen purpose bit flag
        $cdrec .="\x08\x00";    // compression method
        $cdrec .="\x00\x00\x00\x00"; // last mod time & date
        $cdrec .= pack("V",$crc); // crc32
        $cdrec .= pack("V",$c_len); //compressed filesize
        $cdrec .= pack("V",$unc_len); //uncompressed filesize
        $cdrec .= pack("v", strlen($name) ); //length of filename
        $cdrec .= pack("v", 0 ); //extra field length
        $cdrec .= pack("v", 0 ); //file comment length
        $cdrec .= pack("v", 0 ); //disk number start
        $cdrec .= pack("v", 0 ); //internal file attributes
        $cdrec .= pack("V", 32 ); //external file attributes - 'archive' bit set

        $cdrec .= pack("V", $this -> old_offset ); //relative offset of local header
//      &n // bsp; echo "old offset is ".$this->old_offset.", new offset is $new_offset<br>";
        $this -> old_offset = $new_offset;

        $cdrec .= $name;
        // optional extra field, file comment goes here
        // save to central directory
        $this -> ctrl_dir[] = $cdrec;
    }

    function file() { // dump out file
        $data = implode("", $this -> datasec);
        $ctrldir = implode("", $this -> ctrl_dir);

        return
            $data.
            $ctrldir.
            $this -> eof_ctrl_dir.
            pack("v", sizeof($this -> ctrl_dir)).     // total # of entries "on this disk"
            pack("v", sizeof($this -> ctrl_dir)).     // total # of entries overall
            pack("V", strlen($ctrldir)).             // size of central dir
            pack("V", strlen($data)).                 // offset to start of central dir
            "\x00\x00";                             // .zip file comment length
    }
}

}


}
?>