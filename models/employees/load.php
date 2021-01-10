<?

class LoadFile
{
  private $filename;
  private $filetmp;
  private $doc;
  private $dir;
  private $getMime;
  private $mime;
  private $away;
  private $types;
//
public function __construct($fl, $dc, $dr)
{
  $this->filename = $fl['name'];
  $this->filetmp = $fl['tmp_name'];
  $this->doc = $dc;
  $this->dir = $dr;
  $this->types = array('jpg', 'png', 'gif', 'bmp', 'jpeg', 'csv');
  $this->away = "../img/{$this->dir}/";
  $this->getMime = explode('.', $this->filename);
  $this->mime = strtolower(end($this->getMime));
  if(!in_array($this->mime, $this->types))
		return 'Недопустимый тип файла.';
    if (file_exists($this->away))
  {
    copy($this->filetmp, "../img/{$this->dir}/"."$this->doc.$this->mime");
  }
  else
  {
    mkdir("$this->away", 0777);
    copy($this->filetmp, "../img/{$this->dir}/"."$this->doc.$this->mime");
  }

}

}


if(!empty($_FILES['file']['name']))
{
  $pasport = new LoadFile($_FILES['file'], $_POST['pasport'],$_POST['dir']);
}
if(!empty($_FILES['file2']['name']))
{
  $pasport = new LoadFile($_FILES['file2'], $_POST['snils'],$_POST['dir']);
}


//$inn = new LoadFile($_FILES['file4'], $_POST['inn'],$_POST['dir']);
//$other = new LoadFile($_FILES['file5'], $_POST['other'],$_POST['dir']);
//$pasport->view();
