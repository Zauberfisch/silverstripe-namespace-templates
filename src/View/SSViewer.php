<?php

namespace zauberfisch\NamespaceTemplates\View;

class SSViewer extends \SSViewer {
	public static function get_templates_by_class($classOrObject, $suffix = '', $baseClass = null) {
		// Figure out the class name from the supplied context.
		if (!is_object($classOrObject) && !(
				is_string($classOrObject) && class_exists($classOrObject)
			)
		) {
			throw new \InvalidArgumentException(
				'SSViewer::get_templates_by_class() expects a valid class name as its first parameter.'
			);
		}
		$templates = [];
		$classes = array_reverse(\ClassInfo::ancestry($classOrObject));
		foreach ($classes as $class) {
			foreach([
						str_replace('\\', '-', $class),
						str_replace('\\', '-', preg_replace('/^[^\\\\]*?\\\\/', '', $class))
					] as $_class) {
				$template = $_class . $suffix;
				$templates[] = $template;
				//$templates[] = ['type' => 'Includes', $template];
				// If the class is "PageController" (PSR-2 compatibility) or "Page_Controller" (legacy), look for Page.ss
				if (preg_match('/^(?<name>.+[^\\\\])_?Controller$/iU', $class, $matches)) {
					$templates[] = $matches['name'] . $suffix;
				}
			}
			if ($baseClass && $class == $baseClass) {
				break;
			}
		}
		return $templates;
	}
}
