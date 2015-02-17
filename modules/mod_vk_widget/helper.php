<?php
/**
 * @version $Id: header.php 739 2008-11-16 22:07:19Z elkuku $
 * @package    scatalog_categories
 * @subpackage 
 * @author     EasyJoomla {@link http://www.easy-joomla.org Easy-Joomla.org}
 * @author     Constantine Poltyrev {@link http://www.clubrally.spb.ru}
 * @author     Created on 27-Dec-2008
 */

// no direct access
defined( '_JEXEC' ) or die( ';)' );

/**
 * Helper class for scatalog_products
 */
class Modvk_widgetHelper
{
	function getProducts($catid = 0)
	{
		static $model;
		if(!$model)$model = Modscatalog_productsHelper::getModel();
		if(!$model)return null;
		
		$options['category_id'] = $catid;
		$cats = $model->getProducts($options);
		for($i=0, $sz=count($cats); $i < $sz; $i++)
		{
			JFilterOutput::objectHTMLSafe( $cats[$i], ENT_QUOTES, 'desc' );
			$cats[$i]->link = JRoute::_('index.php?option=com_scatalog&view=product&id='.$cats[$i]->slug);
		}	  
		return $cats;
   }
   /**
     * Returns a list of products
     */
    public function getItems($params)
    {
		$catid = $params->get('cat_name');		
		return Modscatalog_productsHelper::getProducts($catid);
    } //end getItems

   function getModel()
   {
      if (!class_exists( 'SCatalogModelCategory' ))
      {
         // Build the path to the model based upon a supplied base path
         $path = JPATH_SITE.DS.'components'.DS.'com_scatalog'.DS.'models'.DS.'category.php';
         $false = false;

         // If the model file exists include it and try to instantiate the object
         if (file_exists( $path )) {
            require_once( $path );
            if (!class_exists( 'SCatalogModelCategory' )) {
               JError::raiseWarning( 0, 'Model class SCatalogModelCategory not found in file.' );
               return $false;
            }
         } else {
            JError::raiseWarning( 0, 'Model SCatalogModelCategory not supported. File not found.' );
            return $false;
         }
      }

      $model = new SCatalogModelCategory();
      return $model;
   }
   
   /**
     * Returns a desc of category products
     */
    public function getDesc($params)
    {
		$catid = $params->get('cat_name');
		
		static $model;
		if(!$model)$model = Modscatalog_productsHelper::getModel();
		if(!$model)return null;
		
		$options['category_id'] = $catid;
		$cat = $model->getCategory($catid);
		//print_r($cat->desc);
		return $cat->desc;
		

    } //end getDesc

 
} //end Modscatalog_productsHelper