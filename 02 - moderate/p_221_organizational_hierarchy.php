<?php

class organizationalHierarchy {
    private function _createTree(&$list, $parent){
        $tree = array();
        foreach ($parent as $k=>$l){
            if(isset($list[$l['id']])){
                $l['children'] = $this->_createTree($list, $list[$l['id']]);
            }
            $tree[] = $l;
        }
        return $tree;
    }
 
    private function _printTree($tree) {
       foreach ($tree as $key => $item) {
            echo $item['name'];
            if (isset($item['children'])) {
                echo ' [';
                $this->_printTree($item['children']);
                echo ']';
            }
           
            if ((count($tree) - 1) != $key) {
                echo ', ';
            }
        }
    }
 
    public function getValue($input) {
        $elements = explode(' | ', $input);
        
        $in = array();
        $in[] = array('id'=>'a', 'parentid'=>null, 'name'=>'a');
        foreach($elements as $item) {
            list($parentid, $id) = str_split($item);
            $in[] = array('id'=>$id, 'parentid'=>$parentid, 'name'=>$id);
        }
       
        $new = array();
        foreach ($in as $a){
            $new[$a['parentid']][] = $a;
        }
 
        $tree = $this->_createTree($new, array($in[0]));
       
        $this->_printTree($tree);
    }
}

$class = new organizationalHierarchy();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
