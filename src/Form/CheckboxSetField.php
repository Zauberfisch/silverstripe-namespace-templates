<?php

namespace zauberfisch\NamespaceTemplates\Form;

use zauberfisch\NamespaceTemplates\View\SSViewer;

class CheckboxSetField extends \CheckboxSetField {
	/**
	 * Returns an array of templates to use for rendering {@link FieldHolder}.
	 *
	 * @return array
	 */
	public function getTemplates() {
		return $this->__templates($this->getTemplate());
	}
	
	/**
	 * Returns an array of templates to use for rendering {@link FieldHolder}.
	 *
	 * @return array
	 */
	public function getFieldHolderTemplates() {
		return $this->__templates(
			$this->getFieldHolderTemplate(),
			'_holder'
		);
	}
	
	/**
	 * Returns an array of templates to use for rendering {@link SmallFieldHolder}.
	 *
	 * @return array
	 */
	public function getSmallFieldHolderTemplates() {
		return $this->__templates(
			$this->getSmallFieldHolderTemplate(),
			'_holder_small'
		);
	}
	
	/**
	 * Generate an array of class name strings to use for rendering this form field into HTML.
	 *
	 * @param string $customTemplate
	 * @param string $customTemplateSuffix
	 *
	 * @return array
	 */
	protected function __templates($customTemplate = null, $customTemplateSuffix = null) {
		$templates = SSViewer::get_templates_by_class($this->class, $customTemplateSuffix, \FormField::class);
		//$templates = \SSViewer::get_templates_by_class($this->class, '', __CLASS__);
		if (!$templates) {
			throw new \Exception("No template found for {$this->class}");
		}
		if($customTemplate) {
			array_unshift($templates, $customTemplate);
		}
		return $templates;
	}
}
