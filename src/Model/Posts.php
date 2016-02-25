<?php   

use Cake\ORM\Table;
class Posts extends AppModel {
    function import() {
    //    $this->loadModel('Posts');
             // to avoid having to tweak the contents of
             // $data you should use your db field name as the heading name
            // eg: Post.id, Post.title, Post.description


            // set the filename to read CSV from
            $filename = TMP . 'uploads' . DS . 'Sc_widths' . DS . 'scwidths.csv';


            // open the file
             $handle = fopen($filename, "r");


             // read the 1st row as headings
             $header = fgetcsv($handle);


            // create a message container
            $return = array(
                    'messages' => array(),
                    'errors' => array(),
            );


             // read each data row in the file
            $i = 0;
             while (($row = fgetcsv($handle)) !== FALSE) {
                     $i++;
                     $data = array();


                     // for each header field
                     foreach ($header as $k=>$head) {

                             // get the data field from Model.field
                             if (strpos($head,'.')!==false) {

                                     $h = explode('.',$head);
                 #die(debug($h));
                                     $data[$h[0]][$h[1]]=isset($row[$k]) ? $row[$k] : '';

                            }

                             // get the data field from field
                            else {
                                     $data['Post'][$head]=isset($row[$k]) ? $row[$k]: '';
                            }

                     }



    $data['Post']['section_id']=1;
    $this->Post->create();





                     // success or not :/
                    if ($this->Post->save($data)) {  
            echo "success";

                    }
             }


             // close the file
             fclose($handle);


             // return the messages
             //return $return;


    }

}