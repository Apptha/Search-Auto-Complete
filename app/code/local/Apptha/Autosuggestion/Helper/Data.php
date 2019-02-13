<?php
class Apptha_Autosuggestion_Helper_Data extends Mage_Core_Helper_Abstract{
    
	public function getSuggestUrl()
    {
        return $this->_getUrl('autosuggestion', array(
            '_secure' => Mage::app()->getFrontController()->getRequest()->isSecure()
        ));
    }
    
    public function getSearchBoxDefaultText(){
    	$config = Mage::getStoreConfig('autosuggestion/custom_group');
    	return $config["autosuggestion_default_text"];
    }
    
    public function getProductCollectionByQueryString($query){
    	
        $config = Mage::getStoreConfig('autosuggestion/custom_group');
        
        $autosuggestion_options = explode(",",$config["autosuggestion_options"]);
        
       //Connection to database
	  	$model = Mage::getModel('catalog/product');
	  	
	  	$store_id = $storeId = Mage::app()->getStore()->getId();
	  	
	  	$collection = "";
	  	
	  	$count = 0;
	  	  	
    	if( (isset($autosuggestion_options[0]) && $autosuggestion_options[0] =="1" ) && (isset($autosuggestion_options[1]) && $autosuggestion_options[1] =="2"  )   && ( isset($autosuggestion_options[2]) && $autosuggestion_options[2] =="3") && ( isset($autosuggestion_options[3]) && $autosuggestion_options[3] =="4") ) {
	  		$collection = $model->getCollection()
	  		->setStoreId( $store_id )
	    	->addAttributeToFilter(
	    		array(
	                   array('attribute'=>'name','like'=>'%'.$query["query"].'%'  ),
	                   array('attribute'=>'price','like' =>$query["query"].'%'  ),
	                   array('attribute'=>'description','like'=>'%'.$query["query"].'%'  ),
	                   array('attribute'=>'meta_keyword','like'=>'%'.$query["query"].'%' )
	                )
	    	);
	    	
	  	}    
	  	
    	elseif( (isset($autosuggestion_options[0]) && $autosuggestion_options[0] == '1' )  && (isset($autosuggestion_options[1]) && $autosuggestion_options[1] == '2' ) && (isset($autosuggestion_options[2]) && $autosuggestion_options[2] == '3' ) ){
	  		$collection = $model->getCollection()
	  		->setStoreId( $store_id )
	    	->addAttributeToFilter(
	    		array(
	                   array('attribute'=>'name', 'like'=>'%'.$query["query"].'%'),
	                   array('attribute'=>'price','like' =>$query["query"].'%'  ),
	                   array('attribute'=>'description', 'like'=>'%'.$query["query"].'%')
	                )
	    	);
			
	  	}
	  	
   	    elseif( (isset($autosuggestion_options[0]) && $autosuggestion_options[0] == '2' )  && (isset($autosuggestion_options[1]) && $autosuggestion_options[1] == '3' ) && (isset($autosuggestion_options[2]) && $autosuggestion_options[2] == '4' ) ){
	  		$collection = $model->getCollection()
	  		->setStoreId( $store_id )
	    	->addAttributeToFilter(
	    		array(
	                   array('attribute'=>'price','like' =>$query["query"].'%'  ),
	                   array('attribute'=>'description', 'like'=>'%'.$query["query"].'%'),
	                   array('attribute'=>'meta_keyword','like'=>'%'.$query["query"].'%' )
	                )
	    	);
	  	}
	  	
     	elseif( (isset($autosuggestion_options[0]) && $autosuggestion_options[0] == '1' )  && (isset($autosuggestion_options[1]) && $autosuggestion_options[1] == '3' ) && (isset($autosuggestion_options[2]) && $autosuggestion_options[2] == '4' ) ){
	  		$collection = $model->getCollection()
	  		->setStoreId( $store_id )
	    	->addAttributeToFilter(
	    		array(
	                   array('attribute'=>'name', 'like'=>'%'.$query["query"].'%'),
	                   array('attribute'=>'description', 'like'=>'%'.$query["query"].'%'),
	                   array('attribute'=>'meta_keyword','like'=>'%'.$query["query"].'%' )
	                )
	    	);
	    	
	  	}
	  	
	  	elseif( (isset($autosuggestion_options[0]) && $autosuggestion_options[0] == '1' )  && (isset($autosuggestion_options[1]) && $autosuggestion_options[1] == '2' ) ){
	  		$collection = $model->getCollection()
	  		->setStoreId( $store_id )
	    	->addAttributeToFilter(
	    		array(
	                   array('attribute'=>'name', 'like'=>'%'.$query["query"].'%'),
	                   array('attribute'=>'description', 'like'=>'%'.$query["query"].'%')
	                )
	    	);
	  	}
	  	elseif( (isset($autosuggestion_options[0]) && $autosuggestion_options[0] == '2') && (isset($autosuggestion_options[1]) && $autosuggestion_options[1] == '3' ) ){
	  		$collection = $model->getCollection()
	  		->setStoreId( $store_id )
	    	->addAttributeToFilter(
	    		array(
	                   array('attribute'=>'price', 'like'=>$query["query"].'%'),
	                   array('attribute'=>'description', 'like'=>'%'.$query["query"].'%')
	                )
	    	);

	  	}
	  	elseif( (isset($autosuggestion_options[0]) && $autosuggestion_options[0] == '1') && (isset($autosuggestion_options[1]) && $autosuggestion_options[1] == '3' ) ){
	  		$collection = $model->getCollection()
	  		->setStoreId( $store_id )
	    	->addAttributeToFilter(
	    		array(
	    				array('attribute'=>'name', 'like'=>'%'.$query["query"].'%'),
	                    array('attribute'=>'price', 'like'=>$query["query"].'%')
	                )
	    	);    	
	  	}
    	elseif( (isset($autosuggestion_options[0]) && $autosuggestion_options[0] == '1') && (isset($autosuggestion_options[1]) && $autosuggestion_options[1] == '4' ) ){
	  		$collection = $model->getCollection()
	  		->setStoreId( $store_id )
	    	->addAttributeToFilter(
	    		array(
	    				array('attribute'=>'name', 'like'=>'%'.$query["query"].'%'),
	                    array('attribute'=>'meta_keyword', 'like'=>'%'.$query["query"].'%')
	                )
	    	);    	
	  	}
   		elseif( (isset($autosuggestion_options[0]) && $autosuggestion_options[0] == '2') && (isset($autosuggestion_options[1]) && $autosuggestion_options[1] == '4' ) ){
	  		$collection = $model->getCollection()
	  		->setStoreId( $store_id )
	    	->addAttributeToFilter(
	    		array(
	    				array('attribute'=>'price', 'like'=>'%'.$query["query"].'%'),
	                    array('attribute'=>'meta_keyword', 'like'=>'%'.$query["query"].'%')
	                )
	    	);    	
	  	}
    	elseif( (isset($autosuggestion_options[0]) && $autosuggestion_options[0] == '3') && (isset($autosuggestion_options[1]) && $autosuggestion_options[1] == '4' ) ){
	  		$collection = $model->getCollection()
	  		->setStoreId( $store_id )
	    	->addAttributeToFilter(
	    		array(
	    				array('attribute'=>'description', 'like'=>'%'.$query["query"].'%'),
	                    array('attribute'=>'meta_keyword', 'like'=>'%'.$query["query"].'%')
	                )
	    	);    	
	  	}
    	elseif(isset($autosuggestion_options[0])  && $autosuggestion_options[0] =="1"   ){
	  		$collection = $model->getCollection()
	  		->setStoreId( $store_id )
	    	->addAttributeToFilter(
	    		array(
	    				array('attribute'=>'name', 'like'=>'%'.$query["query"].'%')
	                )
	    	);
	  	}
    	elseif(isset($autosuggestion_options[0]) && $autosuggestion_options[0] =="2"   ){
	  		$collection = $model->getCollection()
	  		->setStoreId( $store_id )
	    	->addAttributeToFilter(
	    		array(
	    				array('attribute'=>'description', 'like'=>'%'.$query["query"].'%')
	                )
	    	);
	  	}
    	elseif(isset($autosuggestion_options[0]) && $autosuggestion_options[0] =="3" ){
	  		$collection = $model->getCollection()
	  		->setStoreId( $store_id )
	    	->addAttributeToFilter(
	    		array(
	    				 array('attribute'=>'price', 'like'=>$query["query"].'%')
	                )
	    	);
	  	}
   		elseif(isset($autosuggestion_options[0]) && $autosuggestion_options[0] =="4" ){
	  		$collection = $model->getCollection()
	  		->setStoreId( $store_id )
	    	->addAttributeToFilter(
	    		array(
	    				 array('attribute'=>'meta_keyword', 'like'=>'%'.$query["query"].'%')
	                )
	    	);
	  	}
	  	else{
	  		$collection = $model->getCollection()
	  		->setStoreId( $store_id )
	    	->addAttributeToFilter(
	    		array(
	    				array('attribute'=>'name', 'like'=>'%'.$query["query"].'%')
	                )
	    	);
	  	}
	  	$collection->setOrder('name', 'ASC');
	  	return $collection;
    }
}

?>
