<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
/****************************************************
*
* @File: 			functions.php
* @Package:		GetSimple
* @Action:		Innovation theme for GetSimple CMS
*
*****************************************************/

/**
 * Innovation Parent Link
 *
 * This creates a link for a parent for the breadcrumb feature of this theme
 *
 * @param string $name - This is the slug of the link you want to create
 * @return string
 */
function Innovation_Parent_Link($name) {
	$file = GSDATAPAGESPATH . $name .'.xml';
	if (file_exists($file)) {
		$p = getXML($file);
		$title = $p->title;
		$parent = $p->parent;
		$slug = $p->slug;
		echo '<a href="'. find_url($name,'') .'">'. $title .'</a> &nbsp;&nbsp;&#149;&nbsp;&nbsp; ';
	}
}

/**
 * Innovation Settings
 *
 * This defines variables based on the theme plugin's settings
 *
 * @return bool
 */
function Innovation_Settings() {
	$file = GSDATAOTHERPATH . 'InnovationSettings.xml';
	if (file_exists($file)) {
		$p = getXML($file);
		return $p;
	} else {
		return false;
	}
}

/**
 * This function returns SimpleItem object assigned to the current page.
 * Function expects category id as parameter.
 *
 * @param int $category_id - Category id to which item belongs
 *
 * @return SimpleItem object | null
 */
function get_page_item($category_id) {
    $imanager = imanager();
    $mapper = $imanager->getItemMapper();
    $mapper->alloc($category_id);
    $pageId = Util::computeUnsignedCRC32(return_page_slug());
    return $mapper->getSimpleItem($pageId);
}
